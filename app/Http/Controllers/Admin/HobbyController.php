<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HobbyController extends Controller
{
    public function index()
    {
        $hobbies = Hobby::latest()->paginate(10);
        return view('admin.hobbies.index', compact('hobbies'));
    }

    public function create()
    {
        return view('admin.hobbies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hobby_name'  => 'required|string|max:255',
            'category'    => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos/hobbies', 'public');
        }

        Hobby::create($validated);
        return redirect()->route('admin.hobbies.index')
            ->with('success', 'Hobby added successfully!');
    }

    public function edit(Hobby $hobby)
    {
        return view('admin.hobbies.edit', compact('hobby'));
    }

    public function update(Request $request, Hobby $hobby)
    {
        $validated = $request->validate([
            'hobby_name'  => 'required|string|max:255',
            'category'    => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($hobby->photo && Storage::disk('public')->exists($hobby->photo)) {
                Storage::disk('public')->delete($hobby->photo);
            }
            $validated['photo'] = $request->file('photo')->store('photos/hobbies', 'public');
        }

        $hobby->update($validated);
        return redirect()->route('admin.hobbies.index')
            ->with('success', 'Hobby updated successfully!');
    }

    public function destroy(Hobby $hobby)
    {
        $hobby->delete();
        return redirect()->route('admin.hobbies.index')
            ->with('success', 'Hobby deleted successfully!');
    }
}
