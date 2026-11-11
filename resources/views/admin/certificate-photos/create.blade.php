@extends('layouts.admin')

@section('title', 'Upload Certificate Photos')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-file-arrow-up text-[#D6AC55]"></i> ATTACH CERTIFICATE SCANS
            </h1>
            <p class="text-xs text-[#B8B4AC]">Upload scanned credentials, badges, or verification screenshots</p>
        </div>
        <a href="{{ route('admin.certificate-photos.index') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to Vault
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.certificate-photos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Target Certificate -->
            <div>
                <label for="certificate_id" class="rpg-label">Select Certificate / Trophy *</label>
                <select name="certificate_id" id="certificate_id" required class="rpg-select">
                    <option value="">-- Choose Certificate --</option>
                    @foreach($certificates as $cert)
                        <option value="{{ $cert->id }}" {{ (string)old('certificate_id', request('certificate_id')) === (string)$cert->id ? 'selected' : '' }}>
                            {{ $cert->certificate_name }} ({{ $cert->issuer ?: 'N/A' }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Photos input (multi-upload) -->
            <div>
                <label for="photos" class="rpg-label">Select Certificate Scans (Multiple Allowed) *</label>
                <input type="file" 
                       name="photos[]" 
                       id="photos" 
                       multiple 
                       required 
                       accept="image/jpeg,image/png,image/webp,image/jpg"
                       class="rpg-input text-xs file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#D6AC55] file:text-[#10131D] hover:file:bg-[#E8C97A]">
                <p class="text-[11px] text-[#B8B4AC] mt-1">
                    Hold Ctrl (Windows) to select multiple scans. Formats: JPG, PNG, WEBP. Max 2MB per file.
                </p>
            </div>

            <!-- Caption -->
            <div>
                <label for="caption" class="rpg-label">Certificate Caption (Optional)</label>
                <input type="text" name="captions[]" id="caption" placeholder="e.g. Official Diploma Seal / Completion Badge" class="rpg-input">
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.certificate-photos.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-cloud-arrow-up mr-2"></i> Upload Certificate Images
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
