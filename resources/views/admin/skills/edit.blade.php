@extends('layouts.admin')

@section('title', 'Edit Skill')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-wand-magic-sparkles text-[#D6AC55]"></i> REFORGE ABILITY
            </h1>
            <p class="text-xs text-[#B8B4AC]">Update proficiency levels and spell parameters</p>
        </div>
        <a href="{{ route('admin.skills.index') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to List
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Skill Name -->
            <div>
                <label for="skill_name" class="rpg-label">Ability / Skill Name *</label>
                <input type="text" name="skill_name" id="skill_name" value="{{ old('skill_name', $skill->skill_name) }}" required class="rpg-input">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Category with Datalist -->
                <div>
                    <label for="category" class="rpg-label">Category / School of Magic</label>
                    <input type="text" name="category" id="category" list="category-suggestions" value="{{ old('category', $skill->category) }}" class="rpg-input">
                    <datalist id="category-suggestions">
                        <option value="Backend Development">
                        <option value="Frontend Development">
                        <option value="Database Engineering">
                        <option value="Mobile Development">
                        <option value="DevOps & Cloud">
                        <option value="UI/UX Design">
                        <option value="Soft Skills & Leadership">
                    </datalist>
                </div>

                <!-- Skill Level -->
                <div>
                    <label for="skill_level" class="rpg-label">Mastery Rank</label>
                    <select name="skill_level" id="skill_level" class="rpg-select">
                        <option value="Beginner" {{ old('skill_level', $skill->skill_level) === 'Beginner' ? 'selected' : '' }}>Novice (Beginner)</option>
                        <option value="Intermediate" {{ old('skill_level', $skill->skill_level) === 'Intermediate' ? 'selected' : '' }}>Adept (Intermediate)</option>
                        <option value="Advanced" {{ old('skill_level', $skill->skill_level) === 'Advanced' ? 'selected' : '' }}>Expert (Advanced)</option>
                        <option value="Master" {{ old('skill_level', $skill->skill_level) === 'Master' ? 'selected' : '' }}>Grandmaster (Master)</option>
                    </select>
                </div>
            </div>

            <!-- Percentage (0 - 100) with Live Range Preview -->
            <div>
                <div class="flex items-center justify-between mb-1">
                    <label for="percentage" class="rpg-label !mb-0">Proficiency Mastery Percentage (0 - 100%) *</label>
                    <span id="percentage-val" class="font-mono text-sm font-bold text-[#D6AC55]">{{ old('percentage', $skill->percentage) }}%</span>
                </div>
                <input type="range" 
                       name="percentage" 
                       id="percentage" 
                       min="0" 
                       max="100" 
                       value="{{ old('percentage', $skill->percentage) }}" 
                       oninput="document.getElementById('percentage-val').textContent = this.value + '%'"
                       class="w-full accent-[#D6AC55] cursor-pointer">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="rpg-label">Spell Description / Capability Details</label>
                <textarea name="description" id="description" rows="3" class="rpg-input">{{ old('description', $skill->description) }}</textarea>
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.skills.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Update Ability
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
