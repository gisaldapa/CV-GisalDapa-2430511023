<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::with('photos')->latest()->paginate(10);
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'certificate_name'   => 'required|string|max:255',
            'issuer'             => 'nullable|string|max:255',
            'issue_date'         => 'nullable|date',
            'certificate_number' => 'nullable|string|max:255',
            'description'        => 'nullable|string',
            'certificate_url'    => 'nullable|url|max:500',
        ]);

        Certificate::create($validated);
        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate added successfully!');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'certificate_name'   => 'required|string|max:255',
            'issuer'             => 'nullable|string|max:255',
            'issue_date'         => 'nullable|date',
            'certificate_number' => 'nullable|string|max:255',
            'description'        => 'nullable|string',
            'certificate_url'    => 'nullable|url|max:500',
        ]);

        $certificate->update($validated);
        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully!');
    }

    public function destroy(Certificate $certificate)
    {
        foreach ($certificate->photos as $photo) {
            $photo->delete();
        }
        $certificate->delete();
        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate deleted successfully!');
    }
}
