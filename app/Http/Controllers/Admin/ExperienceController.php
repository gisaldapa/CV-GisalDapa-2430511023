<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::with('photos')->latest()->paginate(10);
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name'    => 'required|string|max:255',
            'position'        => 'required|string|max:255',
            'location'        => 'nullable|string|max:255',
            'start_date'      => 'required|date',
            'end_date'        => 'nullable|date|after_or_equal:start_date',
            'description'     => 'nullable|string',
            'responsibilities' => 'nullable|string',
        ]);

        Experience::create($validated);
        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience record added successfully!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'company_name'    => 'required|string|max:255',
            'position'        => 'required|string|max:255',
            'location'        => 'nullable|string|max:255',
            'start_date'      => 'required|date',
            'end_date'        => 'nullable|date|after_or_equal:start_date',
            'description'     => 'nullable|string',
            'responsibilities' => 'nullable|string',
        ]);

        $experience->update($validated);
        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience record updated successfully!');
    }

    public function destroy(Experience $experience)
    {
        // Photos will be deleted by cascade + model observer
        foreach ($experience->photos as $photo) {
            $photo->delete();
        }
        $experience->delete();
        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience record deleted successfully!');
    }
}
