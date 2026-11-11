@extends('layouts.admin')

@section('title', 'Edit Campaign Photo')

@section('content')
<div class="max-w-xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-camera-retro text-[#D6AC55]"></i> REVISE ARTIFACT
            </h1>
            <p class="text-xs text-[#B8B4AC]">Update caption or replace image file</p>
        </div>
        <a href="{{ route('admin.experience-photos.index') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to Vault
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.experience-photos.update', $experiencePhoto) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Target Experience -->
            <div>
                <label for="experience_id" class="rpg-label">Connected Campaign *</label>
                <select name="experience_id" id="experience_id" required class="rpg-select">
                    @foreach($experiences as $exp)
                        <option value="{{ $exp->id }}" {{ (string)old('experience_id', $experiencePhoto->experience_id) === (string)$exp->id ? 'selected' : '' }}>
                            {{ $exp->company_name }} - {{ $exp->position }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Current Image Preview -->
            <div class="p-3 bg-[#10131D] rounded-xl border border-[#D6AC55]/30">
                <label class="rpg-label text-xs">Current Photo Relic</label>
                <div class="h-44 w-full rounded-lg overflow-hidden bg-[#1B2233] mt-2">
                    <img id="photo-preview" src="{{ $experiencePhoto->photo_url }}" alt="Preview" class="w-full h-full object-cover">
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
                <input type="text" name="caption" id="caption" value="{{ old('caption', $experiencePhoto->caption) }}" class="rpg-input">
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.experience-photos.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Update Artifact
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
