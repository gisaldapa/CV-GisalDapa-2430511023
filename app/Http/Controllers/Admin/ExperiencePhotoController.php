<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\ExperiencePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperiencePhotoController extends Controller
{
    public function index()
    {
        $experiences = Experience::with('photos')->latest()->get();
        return view('admin.experience-photos.index', compact('experiences'));
    }

    public function create()
    {
        $experiences = Experience::all();
        return view('admin.experience-photos.create', compact('experiences'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'experience_id' => 'required|exists:experiences,id',
            'photos'        => 'required|array|min:1',
            'photos.*'      => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'captions'      => 'nullable|array',
        ]);

        foreach ($request->file('photos') as $index => $file) {
            $path = $file->store('photos/experiences', 'public');
            ExperiencePhoto::create([
                'experience_id' => $request->experience_id,
                'photo'         => $path,
                'caption'       => $request->captions[$index] ?? null,
            ]);
        }

        return redirect()->route('admin.experience-photos.index')
            ->with('success', 'Photos uploaded successfully!');
    }

    public function edit(ExperiencePhoto $experiencePhoto)
    {
        $experiences = Experience::all();
        return view('admin.experience-photos.edit', compact('experiencePhoto', 'experiences'));
    }

    public function update(Request $request, ExperiencePhoto $experiencePhoto)
    {
        $request->validate([
            'experience_id' => 'required|exists:experiences,id',
            'caption'       => 'nullable|string|max:255',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'experience_id' => $request->experience_id,
            'caption'       => $request->caption,
        ];

        if ($request->hasFile('photo')) {
            if ($experiencePhoto->photo && Storage::disk('public')->exists($experiencePhoto->photo)) {
                Storage::disk('public')->delete($experiencePhoto->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos/experiences', 'public');
        }

        $experiencePhoto->update($data);

        return redirect()->route('admin.experience-photos.index')
            ->with('success', 'Photo updated successfully!');
    }

    public function destroy(ExperiencePhoto $experiencePhoto)
    {
        $experiencePhoto->delete(); // Model observer handles file deletion
        return redirect()->route('admin.experience-photos.index')
            ->with('success', 'Photo deleted successfully!');
    }
}
