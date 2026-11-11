<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PersonalInfo;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Certificate;
use App\Models\Hobby;
use App\Models\ContactInfo;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@cvgisaldapa.com'],
            [
                'name'     => 'Gisaldapa Admin',
                'email'    => 'admin@cvgisaldapa.com',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. Personal Information
        PersonalInfo::updateOrCreate(
            ['id' => 1],
            [
                'full_name'    => 'Gisaldapa',
                'birth_place'  => 'Sukabumi',
                'birth_date'   => '2004-05-15',
                'gender'       => 'Laki-laki',
                'profession'   => 'Web Developer & Information Systems Scholar',
                'address'      => 'Jl. Raya Cisaat No. 123, Sukabumi, Jawa Barat',
                'phone'        => '+62 812 3456 7890',
                'email'        => 'gisaldapa@email.com',
                'description'  => "Seorang mahasiswa dan pengembang web yang berdedikasi dengan fokus pada pengembangan aplikasi modern menggunakan Laravel, MySQL, dan arsitektur web kontemporer.\n\nMemadukan logika analitis dan estetika visual bergaya petualangan RPG untuk menghasilkan solusi perangkat lunak yang andal, efisien, dan berpusat pada pengguna.",
                'profile_photo' => null,
            ]
        );

        // 3. Contact Info
        ContactInfo::updateOrCreate(
            ['id' => 1],
            [
                'address'  => 'Jl. Raya Cisaat No. 123, Sukabumi, Jawa Barat',
                'phone'    => '+62 812 3456 7890',
                'email'    => 'gisaldapa@email.com',
                'whatsapp' => '6281234567890',
            ]
        );

        // 4. Educations
        if (Education::count() === 0) {
            Education::create([
                'institution_name' => 'Universitas Muhammadiyah Sukabumi',
                'education_level'  => 'S1 - Sarjana',
                'major'            => 'Teknik Informatika',
                'start_year'       => 2024,
                'end_year'         => null,
                'description'      => 'Mempelajari rekayasa perangkat lunak, sistem basis data relasional, algoritma komputasi, dan arsitektur web modern.',
                'status'           => 'ongoing',
            ]);

            Education::create([
                'institution_name' => 'SMK Negeri 1 Sukabumi',
                'education_level'  => 'SMA / SMK',
                'major'            => 'Rekayasa Perangkat Lunak',
                'start_year'       => 2021,
                'end_year'         => 2024,
                'description'      => 'Fokus pada fondasi pemrograman, basis data MySQL, dan dasar pengembangan aplikasi berbasis web.',
                'status'           => 'completed',
            ]);
        }

        // 5. Skills
        if (Skill::count() === 0) {
            $skillsData = [
                ['Laravel 12', 'Backend Magic', 'Master', 90, 'Pengembangan RESTful API, arsitektur MVC, Eloquent ORM, dan authentication system.'],
                ['PHP 8.3', 'Backend Magic', 'Advanced', 88, 'Pemrograman berorientasi objek (OOP), fitur modern PHP, dan clean architecture.'],
                ['MySQL Database', 'Data Sorcery', 'Advanced', 85, 'Perancangan skema relasional, optimasi query, indexing, dan migrasi terstruktur.'],
                ['Tailwind CSS', 'Visual Alchemy', 'Master', 92, 'Desain antarmuka responsif modern, custom utility classes, dan palet warna tematik.'],
                ['JavaScript / Alpine.js', 'Frontend Sorcery', 'Advanced', 82, 'Interaktivitas antarmuka, event handling reaktif, dan integrasi UI asinkron.'],
                ['Git & GitHub', 'DevOps Arts', 'Advanced', 85, 'Version control, kolaborasi branch, semantic commit, dan alur kerja deployment.'],
            ];

            foreach ($skillsData as $s) {
                Skill::create([
                    'skill_name'  => $s[0],
                    'category'    => $s[1],
                    'skill_level' => $s[2],
                    'percentage'  => $s[3],
                    'description' => $s[4],
                ]);
            }
        }

        // 6. Experiences
        if (Experience::count() === 0) {
            Experience::create([
                'company_name'    => 'Digital Arcana Studio',
                'position'        => 'Junior Web Developer (Internship)',
                'location'        => 'Sukabumi / Hybrid',
                'start_date'      => '2023-07-01',
                'end_date'        => '2023-12-31',
                'description'     => 'Membantu tim inti dalam pengembangan sistem manajemen informasi berbasis Laravel dan MySQL untuk klien institusi.',
                'responsibilities' => "Mengembangkan modul CRUD untuk modul inventaris dan pelaporan\nMengoptimalkan query database relasional pada tabel bervolume besar\nBerkolaborasi dengan UI designer dalam pembuatan template responsif",
            ]);
        }

        // 7. Certificates
        if (Certificate::count() === 0) {
            Certificate::create([
                'certificate_name'   => 'Junior Web Developer Certification',
                'issuer'             => 'Badan Nasional Sertifikasi Profesi (BNSP)',
                'issue_date'         => '2024-03-10',
                'certificate_number' => 'BNSP-JWD-2024-78901',
                'description'        => 'Sertifikasi kompetensi nasional dalam pemrograman web, integrasi basis data, dan implementasi keamanan dasar aplikasi web.',
                'certificate_url'    => 'https://bnsp.go.id',
            ]);
        }

        // 8. Hobbies
        if (Hobby::count() === 0) {
            Hobby::create([
                'hobby_name'  => 'RPG & Strategy Gaming',
                'category'    => 'Gaming & Leisure',
                'description' => 'Mengeksplorasi mekanisme sistem level, ekonomi item in-game, dan storytelling dunia fantasi yang menginspirasi desain UI.',
                'photo'       => null,
            ]);

            Hobby::create([
                'hobby_name'  => 'Open Source Exploration',
                'category'    => 'Technology',
                'description' => 'Mengeksplorasi pustaka open-source, menguji framework baru, dan mempelajari pola arsitektur kode modern.',
                'photo'       => null,
            ]);
        }

        $this->command->info('Seed complete! Admin: admin@cvgisaldapa.com / admin123');
    }
}
