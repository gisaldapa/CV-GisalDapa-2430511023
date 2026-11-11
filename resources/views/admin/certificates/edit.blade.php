@extends('layouts.admin')

@section('title', 'Edit Certificate')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-trophy text-[#D6AC55]"></i> REVISE TROPHY
            </h1>
            <p class="text-xs text-[#B8B4AC]">Update certificate details and verification links</p>
        </div>
        <a href="{{ route('admin.certificates.index') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to List
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.certificates.update', $certificate) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Certificate Name -->
            <div>
                <label for="certificate_name" class="rpg-label">Certificate / Trophy Name *</label>
                <input type="text" name="certificate_name" id="certificate_name" value="{{ old('certificate_name', $certificate->certificate_name) }}" required class="rpg-input">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Issuer -->
                <div>
                    <label for="issuer" class="rpg-label">Issuing Organization / Guild</label>
                    <input type="text" name="issuer" id="issuer" value="{{ old('issuer', $certificate->issuer) }}" class="rpg-input">
                </div>

                <!-- Issue Date -->
                <div>
                    <label for="issue_date" class="rpg-label">Issue Date</label>
                    <input type="date" name="issue_date" id="issue_date" value="{{ old('issue_date', $certificate->issue_date ? $certificate->issue_date->format('Y-m-d') : '') }}" class="rpg-input">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Certificate Number -->
                <div>
                    <label for="certificate_number" class="rpg-label">Certificate Serial Number (Optional)</label>
                    <input type="text" name="certificate_number" id="certificate_number" value="{{ old('certificate_number', $certificate->certificate_number) }}" class="rpg-input">
                </div>

                <!-- Certificate URL -->
                <div>
                    <label for="certificate_url" class="rpg-label">Verification URL (Optional)</label>
                    <input type="url" name="certificate_url" id="certificate_url" value="{{ old('certificate_url', $certificate->certificate_url) }}" class="rpg-input">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="rpg-label">Description / Acquired Competencies</label>
                <textarea name="description" id="description" rows="3" class="rpg-input">{{ old('description', $certificate->description) }}</textarea>
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.certificates.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Update Trophy
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
