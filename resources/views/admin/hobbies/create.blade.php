@extends('layouts.admin')

@section('title', 'Add Hobby')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-gamepad text-[#D6AC55]"></i> REGISTER SIDE QUEST
            </h1>
            <p class="text-xs text-[#B8B4AC]">Record a hobby, recreation, or community passion</p>
        </div>
        <a href="{{ route('admin.hobbies.index') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to List
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.hobbies.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Hobby Name -->
            <div>
                <label for="hobby_name" class="rpg-label">Side Quest / Hobby Name *</label>
                <input type="text" name="hobby_name" id="hobby_name" value="{{ old('hobby_name') }}" required placeholder="e.g. Competitive Gaming, Open Source Hacking, Chess" class="rpg-input">
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="rpg-label">Category / Quest Type</label>
                <input type="text" name="category" id="category" list="hobby-categories" value="{{ old('category') }}" placeholder="e.g. Technology, Gaming, Sports, Arts" class="rpg-input">
                <datalist id="hobby-categories">
                    <option value="Technology & Coding">
                    <option value="Gaming & Esports">
                    <option value="Reading & Philosophy">
                    <option value="Music & Audio">
                    <option value="Sports & Physical Training">
                    <option value="Creative Arts & Design">
                    <option value="Travel & Exploration">
                </datalist>
            </div>

            <!-- Photo Upload with Preview -->
            <div>
                <label for="photo" class="rpg-label">Activity Image / Quest Visual (Optional)</label>
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 rounded-lg bg-[#10131D] border border-[#D6AC55]/30 overflow-hidden flex items-center justify-center shrink-0">
                        <img id="hobby-preview" src="{{ asset('assets/images/default-photo.png') }}" alt="Preview" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <input type="file" 
                               name="photo" 
                               id="photo" 
                               accept="image/jpeg,image/png,image/webp,image/jpg" 
                               data-preview="hobby-preview"
                               class="rpg-input text-xs">
                        <p class="text-[11px] text-[#B8B4AC] mt-1">Formats: JPG, PNG, WEBP. Max 2MB.</p>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="rpg-label">Quest Description / Personal Significance</label>
                <textarea name="description" id="description" rows="3" placeholder="Tell how this activity sharpens your focus, creativity, or stamina..." class="rpg-input font-story text-base">{{ old('description') }}</textarea>
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.hobbies.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Register Side Quest
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
