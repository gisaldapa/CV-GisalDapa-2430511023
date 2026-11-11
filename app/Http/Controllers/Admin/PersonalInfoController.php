<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalInfoController extends Controller
{
    public function edit()
    {
        $personal = PersonalInfo::firstOrNew([]);
        return view('admin.personal.edit', compact('personal'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'full_name'    => 'required|string|max:255',
            'birth_place'  => 'nullable|string|max:255',
            'birth_date'   => 'nullable|date',
            'gender'       => 'nullable|string|max:50',
            'profession'   => 'nullable|string|max:255',
            'address'      => 'nullable|string',
            'phone'        => 'nullable|string|max:20',
            'email'        => 'nullable|email|max:255',
            'description'  => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $personal = PersonalInfo::firstOrNew([]);

        if ($request->hasFile('profile_photo')) {
            // Delete old photo
            if ($personal->profile_photo && Storage::disk('public')->exists($personal->profile_photo)) {
                Storage::disk('public')->delete($personal->profile_photo);
            }
            $path = $request->file('profile_photo')->store('photos/profile', 'public');
            $validated['profile_photo'] = $path;
        }

        $personal->fill($validated)->save();

        return redirect()->route('admin.personal.edit')
            ->with('success', 'Personal information updated successfully!');
    }

    public function deletePhoto()
    {
        $personal = PersonalInfo::first();
        if ($personal && $personal->profile_photo) {
            if (Storage::disk('public')->exists($personal->profile_photo)) {
                Storage::disk('public')->delete($personal->profile_photo);
            }
            $personal->update(['profile_photo' => null]);
        }
        return redirect()->route('admin.personal.edit')
            ->with('success', 'Profile photo deleted.');
    }
}
