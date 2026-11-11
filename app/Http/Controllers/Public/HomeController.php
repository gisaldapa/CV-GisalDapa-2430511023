<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PersonalInfo;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Certificate;
use App\Models\Hobby;
use App\Models\ContactInfo;

class HomeController extends Controller
{
    public function index()
    {
        $personal = PersonalInfo::first();
        return view('public.home', compact('personal'));
    }

    public function profile()
    {
        $personal = PersonalInfo::first();
        return view('public.profile', compact('personal'));
    }

    public function education()
    {
        $educations = Education::orderByDesc('start_year')->get();
        return view('public.education', compact('educations'));
    }

    public function skills()
    {
        $skills = Skill::orderByDesc('percentage')->get();
        $categories = $skills->groupBy('category');
        return view('public.skills', compact('skills', 'categories'));
    }

    public function experience()
    {
        $experiences = Experience::with('photos')->orderByDesc('start_date')->get();
        return view('public.experience', compact('experiences'));
    }

    public function certificates()
    {
        $certificates = Certificate::with('photos')->orderByDesc('issue_date')->get();
        return view('public.certificates', compact('certificates'));
    }

    public function hobbies()
    {
        $hobbies = Hobby::latest()->get();
        return view('public.hobbies', compact('hobbies'));
    }

    public function contact()
    {
        $contact  = ContactInfo::first();
        $personal = PersonalInfo::first();
        return view('public.contact', compact('contact', 'personal'));
    }
}
