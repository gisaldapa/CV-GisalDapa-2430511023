@extends('layouts.admin')

@section('title', 'Character Dossier Management')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-id-card-clip text-[#D6AC55]"></i> CHARACTER STATUS MANAGEMENT
            </h1>
            <p class="text-xs text-[#B8B4AC]">Configure the hero's personal identity, class title, and public portrait</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Dashboard
        </a>
    </div>

    <!-- Main Edit Form -->
    <div class="rpg-panel p-6 sm:p-8 rounded-2xl relative">
        <form action="{{ route('admin.personal.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Profile Photo Section -->
            <div class="bg-[#10131D]/80 p-5 rounded-xl border border-[#D6AC55]/30">
                <label class="rpg-label mb-3 flex items-center gap-2">
                    <i class="fa-solid fa-camera-retro"></i> Character Portrait (Profile Photo)
                </label>

                <div class="flex flex-col sm:flex-row items-center gap-6">
                    <!-- Current / Preview Thumbnail -->
                    <div class="relative w-28 h-28 rounded-xl bg-[#1B2233] border-2 border-[#D6AC55]/50 overflow-hidden flex items-center justify-center shrink-0 shadow-lg">
                        <img id="photo-preview" 
                             src="{{ $personal && $personal->profile_photo ? $personal->profile_photo_url : asset('assets/images/default-avatar.png') }}" 
                             alt="Avatar" 
                             class="w-full h-full object-cover">
                    </div>

                    <div class="flex-1 space-y-3 text-center sm:text-left">
                        <input type="file" 
                               name="profile_photo" 
                               id="profile_photo" 
                               accept="image/jpeg,image/png,image/webp,image/jpg" 
                               data-preview="photo-preview"
                               class="rpg-input text-xs file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#D6AC55] file:text-[#10131D] hover:file:bg-[#E8C97A]">
                        
                        <p class="text-[11px] text-[#B8B4AC]">
                            Supported formats: JPG, JPEG, PNG, WEBP. Maximum file size: 2 MB.
                        </p>

                        @if($personal && $personal->profile_photo)
                            <div class="pt-1">
                                <button type="button" 
                                        onclick="if(confirm('Are you certain you wish to banish this portrait relic?')) { document.getElementById('delete-photo-form').submit(); }"
                                        class="btn-danger !py-1 !px-3 text-xs">
                                    <i class="fa-solid fa-trash mr-1"></i> Remove Current Photo
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Identity Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                
                <!-- Full Name -->
                <div>
                    <label for="full_name" class="rpg-label">
                        <i class="fa-solid fa-signature text-xs mr-1"></i> Full Name *
                    </label>
                    <input type="text" 
                           name="full_name" 
                           id="full_name" 
                           value="{{ old('full_name', $personal->full_name ?? '') }}" 
                           required 
                           class="rpg-input">
                </div>

                <!-- Profession / Title -->
                <div>
                    <label for="profession" class="rpg-label">
                        <i class="fa-solid fa-user-tag text-xs mr-1"></i> Profession / RPG Title
                    </label>
                    <input type="text" 
                           name="profession" 
                           id="profession" 
                           value="{{ old('profession', $personal->profession ?? '') }}" 
                           placeholder="e.g. Full Stack Sorcerer / Web Craftsman"
                           class="rpg-input">
                </div>

                <!-- Birth Place -->
                <div>
                    <label for="birth_place" class="rpg-label">
                        <i class="fa-solid fa-location-dot text-xs mr-1"></i> Birth Place
                    </label>
                    <input type="text" 
                           name="birth_place" 
                           id="birth_place" 
                           value="{{ old('birth_place', $personal->birth_place ?? '') }}" 
                           class="rpg-input">
                </div>

                <!-- Birth Date -->
                <div>
                    <label for="birth_date" class="rpg-label">
                        <i class="fa-regular fa-calendar-days text-xs mr-1"></i> Birth Date
                    </label>
                    <input type="date" 
                           name="birth_date" 
                           id="birth_date" 
                           value="{{ old('birth_date', $personal && $personal->birth_date ? $personal->birth_date->format('Y-m-d') : '') }}" 
                           class="rpg-input">
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="rpg-label">
                        <i class="fa-solid fa-venus-mars text-xs mr-1"></i> Gender Classification
                    </label>
                    <select name="gender" id="gender" class="rpg-select">
                        <option value="">-- Select Gender --</option>
                        <option value="Laki-laki" {{ old('gender', $personal->gender ?? '') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki (Male Warrior)</option>
                        <option value="Perempuan" {{ old('gender', $personal->gender ?? '') === 'Perempuan' ? 'selected' : '' }}>Perempuan (Female Warrior)</option>
                        <option value="Other" {{ old('gender', $personal->gender ?? '') === 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="rpg-label">
                        <i class="fa-solid fa-envelope text-xs mr-1"></i> Electronic Raven (Email)
                    </label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email', $personal->email ?? '') }}" 
                           class="rpg-input">
                </div>

                <!-- Phone -->
                <div class="sm:col-span-2">
                    <label for="phone" class="rpg-label">
                        <i class="fa-solid fa-phone text-xs mr-1"></i> Signal Beacon (Phone Number)
                    </label>
                    <input type="text" 
                           name="phone" 
                           id="phone" 
                           value="{{ old('phone', $personal->phone ?? '') }}" 
                           placeholder="+62 812 3456 7890"
                           class="rpg-input">
                </div>

                <!-- Address -->
                <div class="sm:col-span-2">
                    <label for="address" class="rpg-label">
                        <i class="fa-solid fa-map-marked-alt text-xs mr-1"></i> Sanctuary Location (Address)
                    </label>
                    <textarea name="address" 
                              id="address" 
                              rows="2" 
                              class="rpg-input">{{ old('address', $personal->address ?? '') }}</textarea>
                </div>

                <!-- Biography Lore -->
                <div class="sm:col-span-2">
                    <label for="description" class="rpg-label">
                        <i class="fa-solid fa-feather-pointed text-xs mr-1"></i> Adventurer Biography & Lore
                    </label>
                    <textarea name="description" 
                              id="description" 
                              rows="4" 
                              placeholder="Write your story, quest motivation, and career summary..."
                              class="rpg-input font-story text-base">{{ old('description', $personal->description ?? '') }}</textarea>
                </div>

            </div>

            <!-- Submit buttons -->
            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.dashboard') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Save Character Dossier
                </button>
            </div>
        </form>
    </div>

</div>

<!-- Hidden form for deleting profile photo -->
@if($personal && $personal->profile_photo)
    <form id="delete-photo-form" action="{{ route('admin.personal.photo.delete') }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
@endif
@endsection
