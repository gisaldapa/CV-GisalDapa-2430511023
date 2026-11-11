@extends('layouts.admin')

@section('title', 'Add Experience')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-briefcase text-[#D6AC55]"></i> INSCRIBE CAMPAIGN LOG
            </h1>
            <p class="text-xs text-[#B8B4AC]">Record employment or organization experience</p>
        </div>
        <a href="{{ route('admin.experiences.index') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to List
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.experiences.store') }}" method="POST" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Company Name -->
                <div>
                    <label for="company_name" class="rpg-label">Company / Organization *</label>
                    <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" required placeholder="e.g. PT Tech Nusantara / Guild Studio" class="rpg-input">
                </div>

                <!-- Position -->
                <div>
                    <label for="position" class="rpg-label">Position / Role *</label>
                    <input type="text" name="position" id="position" value="{{ old('position') }}" required placeholder="e.g. Senior Frontend Sorcerer" class="rpg-input">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Location -->
                <div>
                    <label for="location" class="rpg-label">Location (City / Remote)</label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder="e.g. Jakarta (Remote)" class="rpg-input">
                </div>

                <!-- Start Date -->
                <div>
                    <label for="start_date" class="rpg-label">Start Date *</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required class="rpg-input">
                </div>

                <!-- End Date -->
                <div>
                    <label for="end_date" class="rpg-label">End Date (Empty if current)</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" class="rpg-input">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="rpg-label">Campaign Overview / Job Summary</label>
                <textarea name="description" id="description" rows="3" placeholder="Brief explanation of the company and your overall mission..." class="rpg-input">{{ old('description') }}</textarea>
            </div>

            <!-- Responsibilities -->
            <div>
                <label for="responsibilities" class="rpg-label">Key Responsibilities & Quests (One per line)</label>
                <textarea name="responsibilities" id="responsibilities" rows="5" placeholder="Engineered responsive client dashboards with Laravel 12
Led database schema optimization resulting in 40% speed boost
Collaborated with guild designers on UI/UX workflows" class="rpg-input font-mono text-xs">{{ old('responsibilities') }}</textarea>
                <p class="text-[11px] text-[#B8B4AC] mt-1">Hint: Enter each quest or responsibility on a new line; it will be formatted as list items with swords on the public CV.</p>
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.experiences.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Save Campaign Log
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
