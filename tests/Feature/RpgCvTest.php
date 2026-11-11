<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\PersonalInfo;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Certificate;
use App\Models\Hobby;
use App\Models\ContactInfo;

use Illuminate\Foundation\Testing\RefreshDatabase;

class RpgCvTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\AdminSeeder::class);
    }
    public function test_all_public_pages_return_successful_status(): void
    {
        $this->get('/')->assertStatus(200);
        $this->get('/profile')->assertStatus(200);
        $this->get('/education')->assertStatus(200);
        $this->get('/skills')->assertStatus(200);
        $this->get('/experience')->assertStatus(200);
        $this->get('/certificates')->assertStatus(200);
        $this->get('/hobbies')->assertStatus(200);
        $this->get('/contact')->assertStatus(200);
    }

    public function test_admin_dashboard_requires_authentication(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_login_page_renders_successfully(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertSee('GUILD CONTROL GATE');
    }

    public function test_admin_login_with_valid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email'    => 'admin@cvgisaldapa.com',
            'password' => 'admin123',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticated();
    }

    public function test_admin_can_access_dashboard_and_crud_pages(): void
    {
        $admin = User::where('email', 'admin@cvgisaldapa.com')->first();
        $this->actingAs($admin);

        $this->get('/admin/dashboard')->assertStatus(200)->assertSee('GUILD COMMAND CENTER');
        $this->get('/admin/personal')->assertStatus(200)->assertSee('CHARACTER STATUS MANAGEMENT');
        $this->get('/admin/educations')->assertStatus(200);
        $this->get('/admin/skills')->assertStatus(200);
        $this->get('/admin/experiences')->assertStatus(200);
        $this->get('/admin/certificates')->assertStatus(200);
        $this->get('/admin/hobbies')->assertStatus(200);
        $this->get('/admin/contacts')->assertStatus(200);
        $this->get('/admin/change-password')->assertStatus(200);
    }

    public function test_crud_education_lifecycle(): void
    {
        $admin = User::where('email', 'admin@cvgisaldapa.com')->first();
        $this->actingAs($admin);

        // CREATE
        $postResponse = $this->post('/admin/educations', [
            'institution_name' => 'Universitas Muhammadiyah Sukabumi',
            'education_level'  => 'S1 - Sarjana',
            'major'            => 'Teknik Informatika',
            'start_year'       => 2024,
            'end_year'         => 2028,
            'description'      => 'Studying computer science and web development.',
            'status'           => 'ongoing',
        ]);
        $postResponse->assertRedirect('/admin/educations');

        $edu = Education::where('institution_name', 'Universitas Muhammadiyah Sukabumi')->first();
        $this->assertNotNull($edu);

        // UPDATE
        $putResponse = $this->put("/admin/educations/{$edu->id}", [
            'institution_name' => 'Universitas Muhammadiyah Sukabumi (UMMI)',
            'education_level'  => 'S1 - Sarjana',
            'major'            => 'Teknik Informatika',
            'start_year'       => 2024,
            'end_year'         => 2028,
            'description'      => 'Software Engineering emphasis.',
            'status'           => 'ongoing',
        ]);
        $putResponse->assertRedirect('/admin/educations');
        $this->assertEquals('Universitas Muhammadiyah Sukabumi (UMMI)', $edu->fresh()->institution_name);

        // DELETE
        $delResponse = $this->delete("/admin/educations/{$edu->id}");
        $delResponse->assertRedirect('/admin/educations');
        $this->assertNull(Education::find($edu->id));
    }

    public function test_crud_skill_lifecycle(): void
    {
        $admin = User::where('email', 'admin@cvgisaldapa.com')->first();
        $this->actingAs($admin);

        // CREATE
        $this->post('/admin/skills', [
            'skill_name'  => 'Laravel 12 Arcana',
            'category'    => 'Backend Development',
            'skill_level' => 'Master',
            'percentage'  => 95,
            'description' => 'Mastery over MVC architecture and Eloquent.',
        ])->assertRedirect('/admin/skills');

        $skill = Skill::where('skill_name', 'Laravel 12 Arcana')->first();
        $this->assertNotNull($skill);

        // DELETE
        $this->delete("/admin/skills/{$skill->id}")->assertRedirect('/admin/skills');
        $this->assertNull(Skill::find($skill->id));
    }
}
