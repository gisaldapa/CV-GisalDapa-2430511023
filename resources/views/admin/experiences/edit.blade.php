@extends('layouts.admin')

@section('title', 'Edit Experience')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-briefcase text-[#D6AC55]"></i> REVISE CAMPAIGN LOG
            </h1>
            <p class="text-xs text-[#B8B4AC]">Update employment or organization experience details</p>
        </div>
        <a href="{{ route('admin.experiences.index') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to List
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Company Name -->
                <div>
                    <label for="company_name" class="rpg-label">Company / Organization *</label>
                    <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $experience->company_name) }}" required class="rpg-input">
                </div>

                <!-- Position -->
                <div>
                    <label for="position" class="rpg-label">Position / Role *</label>
                    <input type="text" name="position" id="position" value="{{ old('position', $experience->position) }}" required class="rpg-input">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Location -->
                <div>
                    <label for="location" class="rpg-label">Location (City / Remote)</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $experience->location) }}" class="rpg-input">
                </div>

                <!-- Start Date -->
                <div>
                    <label for="start_date" class="rpg-label">Start Date *</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $experience->start_date ? $experience->start_date->format('Y-m-d') : '') }}" required class="rpg-input">
                </div>

                <!-- End Date -->
                <div>
                    <label for="end_date" class="rpg-label">End Date (Leave blank if present)</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}" class="rpg-input">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="rpg-label">Campaign Overview / Job Summary</label>
                <textarea name="description" id="description" rows="3" class="rpg-input">{{ old('description', $experience->description) }}</textarea>
            </div>

            <!-- Responsibilities -->
            <div>
                <label for="responsibilities" class="rpg-label">Key Responsibilities & Quests (One per line)</label>
                <textarea name="responsibilities" id="responsibilities" rows="5" class="rpg-input font-mono text-xs">{{ old('responsibilities', $experience->responsibilities) }}</textarea>
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.experiences.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Update Campaign Log
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
