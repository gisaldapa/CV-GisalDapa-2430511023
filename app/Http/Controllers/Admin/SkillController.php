<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->paginate(10);
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'skill_name'  => 'required|string|max:255',
            'category'    => 'nullable|string|max:100',
            'skill_level' => 'nullable|string|max:50',
            'percentage'  => 'required|integer|min:0|max:100',
            'description' => 'nullable|string',
        ]);

        Skill::create($validated);
        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill added successfully!');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'skill_name'  => 'required|string|max:255',
            'category'    => 'nullable|string|max:100',
            'skill_level' => 'nullable|string|max:50',
            'percentage'  => 'required|integer|min:0|max:100',
            'description' => 'nullable|string',
        ]);

        $skill->update($validated);
        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully!');
    }
}
