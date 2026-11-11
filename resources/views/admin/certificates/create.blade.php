@extends('layouts.admin')

@section('title', 'Add Certificate')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-trophy text-[#D6AC55]"></i> INSCRIBE TROPHY (CERTIFICATE)
            </h1>
            <p class="text-xs text-[#B8B4AC]">Record newly acquired certification or license</p>
        </div>
        <a href="{{ route('admin.certificates.index') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to List
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.certificates.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Certificate Name -->
            <div>
                <label for="certificate_name" class="rpg-label">Certificate / Trophy Name *</label>
                <input type="text" name="certificate_name" id="certificate_name" value="{{ old('certificate_name') }}" required placeholder="e.g. Certified Laravel Professional / AWS Cloud Practitioner" class="rpg-input">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Issuer -->
                <div>
                    <label for="issuer" class="rpg-label">Issuing Organization / Guild</label>
                    <input type="text" name="issuer" id="issuer" value="{{ old('issuer') }}" placeholder="e.g. Coursera, BNSP, Dicoding" class="rpg-input">
                </div>

                <!-- Issue Date -->
                <div>
                    <label for="issue_date" class="rpg-label">Issue Date</label>
                    <input type="date" name="issue_date" id="issue_date" value="{{ old('issue_date') }}" class="rpg-input">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Certificate Number -->
                <div>
                    <label for="certificate_number" class="rpg-label">Certificate Serial Number (Optional)</label>
                    <input type="text" name="certificate_number" id="certificate_number" value="{{ old('certificate_number') }}" placeholder="e.g. CERT-2024-8849" class="rpg-input">
                </div>

                <!-- Certificate URL -->
                <div>
                    <label for="certificate_url" class="rpg-label">Verification URL (Optional)</label>
                    <input type="url" name="certificate_url" id="certificate_url" value="{{ old('certificate_url') }}" placeholder="https://example.com/verify/..." class="rpg-input">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="rpg-label">Description / Acquired Competencies</label>
                <textarea name="description" id="description" rows="3" placeholder="Summary of skills validated by this certificate..." class="rpg-input">{{ old('description') }}</textarea>
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.certificates.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Inscribe Trophy
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
