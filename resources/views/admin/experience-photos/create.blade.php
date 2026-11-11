@extends('layouts.admin')

@section('title', 'Upload Campaign Photos')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-camera-retro text-[#D6AC55]"></i> ATTACH CAMPAIGN ARTIFACTS
            </h1>
            <p class="text-xs text-[#B8B4AC]">Upload screenshots, event photos, or project evidence</p>
        </div>
        <a href="{{ route('admin.experience-photos.index') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to Vault
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.experience-photos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Target Experience Selection -->
            <div>
                <label for="experience_id" class="rpg-label">Select Target Campaign / Experience *</label>
                <select name="experience_id" id="experience_id" required class="rpg-select">
                    <option value="">-- Choose Campaign --</option>
                    @foreach($experiences as $exp)
                        <option value="{{ $exp->id }}" {{ (string)old('experience_id', request('experience_id')) === (string)$exp->id ? 'selected' : '' }}>
                            {{ $exp->company_name }} - {{ $exp->position }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Photos input (multi-upload) -->
            <div>
                <label for="photos" class="rpg-label">Select Photo Artifacts (Multiple Allowed) *</label>
                <input type="file" 
                       name="photos[]" 
                       id="photos" 
                       multiple 
                       required 
                       accept="image/jpeg,image/png,image/webp,image/jpg"
                       class="rpg-input text-xs file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#D6AC55] file:text-[#10131D] hover:file:bg-[#E8C97A]">
                <p class="text-[11px] text-[#B8B4AC] mt-1">
                    Hold Ctrl (Windows) to select multiple files. Formats: JPG, PNG, WEBP. Max 2MB per file.
                </p>
            </div>

            <!-- Single or primary caption -->
            <div>
                <label for="caption" class="rpg-label">General Photo Caption (Optional)</label>
                <input type="text" name="captions[]" id="caption" placeholder="e.g. System Architecture Demo or Team Conference" class="rpg-input">
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.experience-photos.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-cloud-arrow-up mr-2"></i> Upload Photo Artifacts
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
