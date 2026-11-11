<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Certificate;
use App\Models\Hobby;
use App\Models\PersonalInfo;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'educations'   => Education::count(),
            'skills'       => Skill::count(),
            'experiences'  => Experience::count(),
            'certificates' => Certificate::count(),
            'hobbies'      => Hobby::count(),
        ];
        $personal = PersonalInfo::first();
        return view('admin.dashboard', compact('stats', 'personal'));
    }
}
