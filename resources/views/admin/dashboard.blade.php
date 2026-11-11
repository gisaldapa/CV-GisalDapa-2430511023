@extends('layouts.admin')

@section('title', 'Command Center')

@section('content')
<div class="space-y-8">
    
    <!-- Welcome Banner -->
    <div class="rpg-panel p-6 sm:p-8 rounded-2xl relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#10131D] border border-[#D6AC55]/40 text-[#D6AC55] text-xs font-mono uppercase mb-2">
                    <span class="w-2 h-2 rounded-full bg-[#22c55e] animate-ping"></span>
                    <span>REALM OVERVIEW ACTIVE</span>
                </div>
                <h1 class="font-rpg text-2xl sm:text-3xl font-black text-white">
                    GUILD COMMAND CENTER
                </h1>
                <p class="text-sm text-[#B8B4AC] font-story text-base mt-1">
                    Manage the archives, update adventurer abilities, upload relics, and command your online presence.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.personal.edit') }}" class="btn-gold !py-2.5 !px-4 text-xs">
                    <i class="fa-solid fa-pen-nib mr-1"></i> Edit Character
                </a>
                <a href="{{ route('home') }}" target="_blank" class="btn-cyan !py-2.5 !px-4 text-xs">
                    <i class="fa-solid fa-external-link mr-1"></i> Live CV
                </a>
            </div>
        </div>

        <div class="absolute -right-10 -bottom-10 opacity-5 pointer-events-none">
            <i class="fa-solid fa-chess-rook text-9xl text-white"></i>
        </div>
    </div>

    <!-- Stat Boxes (RPG Cards) -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        
        <!-- Educations -->
        <a href="{{ route('admin.educations.index') }}" class="rpg-panel rpg-panel-hover p-5 rounded-xl block group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-mono uppercase text-[#D6AC55]">Academia</span>
                <i class="fa-solid fa-graduation-cap text-[#D6AC55] text-lg group-hover:scale-110 transition-transform"></i>
            </div>
            <div class="text-3xl font-bold font-rpg text-white">{{ $stats['educations'] }}</div>
            <div class="text-[11px] text-[#B8B4AC] mt-1 flex items-center justify-between">
                <span>Manage</span>
                <i class="fa-solid fa-arrow-right text-[10px] text-[#54D5E8]"></i>
            </div>
        </a>

        <!-- Skills -->
        <a href="{{ route('admin.skills.index') }}" class="rpg-panel rpg-panel-hover p-5 rounded-xl block group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-mono uppercase text-[#54D5E8]">Spells & Skills</span>
                <i class="fa-solid fa-wand-magic-sparkles text-[#54D5E8] text-lg group-hover:scale-110 transition-transform"></i>
            </div>
            <div class="text-3xl font-bold font-rpg text-white">{{ $stats['skills'] }}</div>
            <div class="text-[11px] text-[#B8B4AC] mt-1 flex items-center justify-between">
                <span>Skill Tree</span>
                <i class="fa-solid fa-arrow-right text-[10px] text-[#54D5E8]"></i>
            </div>
        </a>

        <!-- Experiences -->
        <a href="{{ route('admin.experiences.index') }}" class="rpg-panel rpg-panel-hover p-5 rounded-xl block group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-mono uppercase text-[#22c55e]">Campaigns</span>
                <i class="fa-solid fa-briefcase text-[#22c55e] text-lg group-hover:scale-110 transition-transform"></i>
            </div>
            <div class="text-3xl font-bold font-rpg text-white">{{ $stats['experiences'] }}</div>
            <div class="text-[11px] text-[#B8B4AC] mt-1 flex items-center justify-between">
                <span>Quest Logs</span>
                <i class="fa-solid fa-arrow-right text-[10px] text-[#54D5E8]"></i>
            </div>
        </a>

        <!-- Certificates -->
        <a href="{{ route('admin.certificates.index') }}" class="rpg-panel rpg-panel-hover p-5 rounded-xl block group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-mono uppercase text-amber-400">Trophies</span>
                <i class="fa-solid fa-trophy text-amber-400 text-lg group-hover:scale-110 transition-transform"></i>
            </div>
            <div class="text-3xl font-bold font-rpg text-white">{{ $stats['certificates'] }}</div>
            <div class="text-[11px] text-[#B8B4AC] mt-1 flex items-center justify-between">
                <span>Certificates</span>
                <i class="fa-solid fa-arrow-right text-[10px] text-[#54D5E8]"></i>
            </div>
        </a>

        <!-- Hobbies -->
        <a href="{{ route('admin.hobbies.index') }}" class="rpg-panel rpg-panel-hover p-5 rounded-xl block group col-span-2 sm:col-span-1">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-mono uppercase text-purple-400">Side Quests</span>
                <i class="fa-solid fa-gamepad text-purple-400 text-lg group-hover:scale-110 transition-transform"></i>
            </div>
            <div class="text-3xl font-bold font-rpg text-white">{{ $stats['hobbies'] }}</div>
            <div class="text-[11px] text-[#B8B4AC] mt-1 flex items-center justify-between">
                <span>Hobbies</span>
                <i class="fa-solid fa-arrow-right text-[10px] text-[#54D5E8]"></i>
            </div>
        </a>

    </div>

    <!-- Quick Actions Panel & Character Card -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left 7 cols: Quick Add Actions -->
        <div class="lg:col-span-7 rpg-panel p-6 rounded-2xl space-y-4">
            <div class="flex items-center justify-between border-b border-[#D6AC55]/20 pb-3">
                <h2 class="font-rpg text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-bolt text-[#D6AC55]"></i> Quick Quest Dispatchers
                </h2>
                <span class="text-[10px] font-mono text-[#54D5E8] uppercase">CRUD Accelerators</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                <a href="{{ route('admin.educations.create') }}" class="p-4 rounded-xl bg-[#10131D]/80 border border-[#D6AC55]/20 hover:border-[#D6AC55] flex items-center gap-3 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-[#D6AC55]/10 flex items-center justify-center text-[#D6AC55] group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-white">Add Education</h3>
                        <p class="text-[11px] text-[#B8B4AC]">Record new academy degree</p>
                    </div>
                </a>

                <a href="{{ route('admin.skills.create') }}" class="p-4 rounded-xl bg-[#10131D]/80 border border-[#D6AC55]/20 hover:border-[#54D5E8] flex items-center gap-3 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-[#54D5E8]/10 flex items-center justify-center text-[#54D5E8] group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-white">Add Ability (Skill)</h3>
                        <p class="text-[11px] text-[#B8B4AC]">Unlock new programming skill</p>
                    </div>
                </a>

                <a href="{{ route('admin.experiences.create') }}" class="p-4 rounded-xl bg-[#10131D]/80 border border-[#D6AC55]/20 hover:border-[#22c55e] flex items-center gap-3 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-[#22c55e]/10 flex items-center justify-center text-[#22c55e] group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-white">Add Campaign</h3>
                        <p class="text-[11px] text-[#B8B4AC]">Log new work experience</p>
                    </div>
                </a>

                <a href="{{ route('admin.certificates.create') }}" class="p-4 rounded-xl bg-[#10131D]/80 border border-[#D6AC55]/20 hover:border-amber-400 flex items-center gap-3 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-amber-400/10 flex items-center justify-center text-amber-400 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-white">Add Trophy</h3>
                        <p class="text-[11px] text-[#B8B4AC]">Inscribe official certificate</p>
                    </div>
                </a>

                <a href="{{ route('admin.hobbies.create') }}" class="p-4 rounded-xl bg-[#10131D]/80 border border-[#D6AC55]/20 hover:border-purple-400 flex items-center gap-3 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-purple-400/10 flex items-center justify-center text-purple-400 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-white">Add Side Quest</h3>
                        <p class="text-[11px] text-[#B8B4AC]">Create hobby activity</p>
                    </div>
                </a>

                <a href="{{ route('admin.experience-photos.create') }}" class="p-4 rounded-xl bg-[#10131D]/80 border border-[#D6AC55]/20 hover:border-[#D6AC55] flex items-center gap-3 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-[#D6AC55]/10 flex items-center justify-center text-[#D6AC55] group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-upload"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-white">Upload Photos</h3>
                        <p class="text-[11px] text-[#B8B4AC]">Attach campaign gallery</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Right 5 cols: Character Status Preview -->
        <div class="lg:col-span-5 rpg-panel p-6 rounded-2xl flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between border-b border-[#D6AC55]/20 pb-3 mb-4">
                    <h2 class="font-rpg text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-user-shield text-[#D6AC55]"></i> Character Dossier
                    </h2>
                    <span class="badge-gold text-[10px]">Active Hero</span>
                </div>

                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 rounded-xl bg-[#10131D] border border-[#D6AC55]/40 overflow-hidden shrink-0 flex items-center justify-center">
                        @if($personal && $personal->profile_photo)
                            <img src="{{ $personal->profile_photo_url }}" alt="Profile" class="w-full h-full object-cover">
                        @else
                            <i class="fa-solid fa-user text-2xl text-[#D6AC55]"></i>
                        @endif
                    </div>
                    <div>
                        <h3 class="font-rpg text-base font-bold text-white">
                            {{ $personal->full_name ?? 'Gisaldapa' }}
                        </h3>
                        <p class="text-xs text-[#54D5E8] font-mono">
                            {{ $personal->profession ?? 'Full Stack Developer' }}
                        </p>
                        <p class="text-[11px] text-[#B8B4AC] mt-0.5">
                            {{ $personal->email ?? 'admin@cvgisaldapa.com' }}
                        </p>
                    </div>
                </div>

                <div class="bg-[#10131D]/60 p-3 rounded-lg border border-[#D6AC55]/15 text-xs text-[#B8B4AC] font-story">
                    {{ Str::limit($personal->description ?? 'No biography entered yet.', 160) }}
                </div>
            </div>

            <div class="mt-4 pt-4 border-t border-[#D6AC55]/15 flex items-center justify-between text-xs">
                <span class="text-[#B8B4AC]">Realm Host: <strong>MySQL 8.0</strong></span>
                <a href="{{ route('admin.personal.edit') }}" class="text-[#D6AC55] hover:underline font-semibold">
                    Update Profile →
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
