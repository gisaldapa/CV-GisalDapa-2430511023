@extends('layouts.admin')

@section('title', 'Edit Certificate Photo')

@section('content')
<div class="max-w-xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-file-image text-[#D6AC55]"></i> REVISE CERTIFICATE SCAN
            </h1>
            <p class="text-xs text-[#B8B4AC]">Update caption or replace image file</p>
        </div>
        <a href="{{ route('admin.certificate-photos.index') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to Vault
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.certificate-photos.update', $certificatePhoto) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Connected Certificate -->
            <div>
                <label for="certificate_id" class="rpg-label">Connected Certificate *</label>
                <select name="certificate_id" id="certificate_id" required class="rpg-select">
                    @foreach($certificates as $cert)
                        <option value="{{ $cert->id }}" {{ (string)old('certificate_id', $certificatePhoto->certificate_id) === (string)$cert->id ? 'selected' : '' }}>
                            {{ $cert->certificate_name }} ({{ $cert->issuer ?: 'N/A' }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Current Scan Preview -->
            <div class="p-3 bg-[#10131D] rounded-xl border border-[#D6AC55]/30">
                <label class="rpg-label text-xs">Current Certificate Scan</label>
                <div class="h-44 w-full rounded-lg overflow-hidden bg-[#1B2233] mt-2">
                    <img id="photo-preview" src="{{ $certificatePhoto->photo_url }}" alt="Preview" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Replace Image File (Optional) -->
            <div>
                <label for="photo" class="rpg-label">Replace Image File (Optional)</label>
                <input type="file" 
                       name="photo" 
                       id="photo" 
                       accept="image/jpeg,image/png,image/webp,image/jpg" 
                       data-preview="photo-preview"
                       class="rpg-input text-xs">
            </div>

            <!-- Caption -->
            <div>
                <label for="caption" class="rpg-label">Caption / Description</label>
                <input type="text" name="caption" id="caption" value="{{ old('caption', $certificatePhoto->caption) }}" class="rpg-input">
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.certificate-photos.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Update Scan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
