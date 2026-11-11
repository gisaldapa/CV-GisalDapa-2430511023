<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\CertificatePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificatePhotoController extends Controller
{
    public function index()
    {
        $certificates = Certificate::with('photos')->latest()->get();
        return view('admin.certificate-photos.index', compact('certificates'));
    }

    public function create()
    {
        $certificates = Certificate::all();
        return view('admin.certificate-photos.create', compact('certificates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'certificate_id' => 'required|exists:certificates,id',
            'photos'         => 'required|array|min:1',
            'photos.*'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'captions'       => 'nullable|array',
        ]);

        foreach ($request->file('photos') as $index => $file) {
            $path = $file->store('photos/certificates', 'public');
            CertificatePhoto::create([
                'certificate_id' => $request->certificate_id,
                'photo'          => $path,
                'caption'        => $request->captions[$index] ?? null,
            ]);
        }

        return redirect()->route('admin.certificate-photos.index')
            ->with('success', 'Certificate photos uploaded successfully!');
    }

    public function edit(CertificatePhoto $certificatePhoto)
    {
        $certificates = Certificate::all();
        return view('admin.certificate-photos.edit', compact('certificatePhoto', 'certificates'));
    }

    public function update(Request $request, CertificatePhoto $certificatePhoto)
    {
        $request->validate([
            'certificate_id' => 'required|exists:certificates,id',
            'caption'        => 'nullable|string|max:255',
            'photo'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'certificate_id' => $request->certificate_id,
            'caption'        => $request->caption,
        ];

        if ($request->hasFile('photo')) {
            if ($certificatePhoto->photo && Storage::disk('public')->exists($certificatePhoto->photo)) {
                Storage::disk('public')->delete($certificatePhoto->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos/certificates', 'public');
        }

        $certificatePhoto->update($data);
        return redirect()->route('admin.certificate-photos.index')
            ->with('success', 'Certificate photo updated successfully!');
    }

    public function destroy(CertificatePhoto $certificatePhoto)
    {
        $certificatePhoto->delete();
        return redirect()->route('admin.certificate-photos.index')
            ->with('success', 'Certificate photo deleted successfully!');
    }
}
