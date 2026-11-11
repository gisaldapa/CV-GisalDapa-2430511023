@extends('layouts.admin')

@section('title', 'Edit Education')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-graduation-cap text-[#D6AC55]"></i> REVISE ACADEMY
            </h1>
            <p class="text-xs text-[#B8B4AC]">Update educational chronicle credentials</p>
        </div>
        <a href="{{ route('admin.educations.index') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to List
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.educations.update', $education) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Institution Name -->
            <div>
                <label for="institution_name" class="rpg-label">Institution / Academy Name *</label>
                <input type="text" name="institution_name" id="institution_name" value="{{ old('institution_name', $education->institution_name) }}" required class="rpg-input">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Education Level -->
                <div>
                    <label for="education_level" class="rpg-label">Degree / Level *</label>
                    <select name="education_level" id="education_level" required class="rpg-select">
                        <option value="S1 - Sarjana" {{ old('education_level', $education->education_level) === 'S1 - Sarjana' ? 'selected' : '' }}>S1 - Sarjana (Bachelor)</option>
                        <option value="D3 - Diploma" {{ old('education_level', $education->education_level) === 'D3 - Diploma' ? 'selected' : '' }}>D3 - Diploma</option>
                        <option value="SMA / SMK" {{ old('education_level', $education->education_level) === 'SMA / SMK' ? 'selected' : '' }}>SMA / SMK (Senior High)</option>
                        <option value="SMP" {{ old('education_level', $education->education_level) === 'SMP' ? 'selected' : '' }}>SMP (Junior High)</option>
                        <option value="S2 - Magister" {{ old('education_level', $education->education_level) === 'S2 - Magister' ? 'selected' : '' }}>S2 - Magister (Master)</option>
                        <option value="Bootcamp / Course" {{ old('education_level', $education->education_level) === 'Bootcamp / Course' ? 'selected' : '' }}>Bootcamp / Non-formal</option>
                    </select>
                </div>

                <!-- Major -->
                <div>
                    <label for="major" class="rpg-label">Field of Study / Major</label>
                    <input type="text" name="major" id="major" value="{{ old('major', $education->major) }}" class="rpg-input">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Start Year -->
                <div>
                    <label for="start_year" class="rpg-label">Start Year *</label>
                    <input type="number" name="start_year" id="start_year" min="1950" max="2100" value="{{ old('start_year', $education->start_year) }}" required class="rpg-input">
                </div>

                <!-- End Year -->
                <div>
                    <label for="end_year" class="rpg-label">End Year</label>
                    <input type="number" name="end_year" id="end_year" min="1950" max="2100" value="{{ old('end_year', $education->end_year) }}" placeholder="Leave blank if ongoing" class="rpg-input">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="rpg-label">Status *</label>
                    <select name="status" id="status" required class="rpg-select">
                        <option value="completed" {{ old('status', $education->status) === 'completed' ? 'selected' : '' }}>Completed (Graduated)</option>
                        <option value="ongoing" {{ old('status', $education->status) === 'ongoing' ? 'selected' : '' }}>Ongoing (Enrolled)</option>
                    </select>
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="rpg-label">Academic Description & Achievements</label>
                <textarea name="description" id="description" rows="3" class="rpg-input">{{ old('description', $education->description) }}</textarea>
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.educations.index') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Update Academy Record
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
