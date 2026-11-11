@extends('layouts.public')

@section('title', 'Character Sheet')

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Section Header -->
        <div class="section-header">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1B2233] border border-[#D6AC55]/30 text-[#D6AC55] text-xs font-mono uppercase mb-3">
                <i class="fa-solid fa-id-badge"></i> CHARACTER STATUS SCREEN
            </div>
            <h1 class="section-title">HERO SPECIFICATIONS</h1>
            <p class="section-subtitle">Detailed attributes, personal dossier, and lineage of the adventurer</p>
            <div class="gold-divider max-w-xs mx-auto">
                <i class="fa-solid fa-dice-d20 text-[#D6AC55] text-xs"></i>
            </div>
        </div>

        <!-- Main Character Sheet Panel -->
        <div class="rpg-panel p-6 sm:p-10 relative">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Left Column: Portrait & RPG Attributes -->
                <div class="lg:col-span-5 space-y-6">
                    <!-- Character Portrait Frame -->
                    <div class="relative bg-[#10131D] p-3 rounded-xl border border-[#D6AC55]/50 shadow-xl">
                        <div class="w-full h-80 rounded-lg overflow-hidden bg-[#1B2233] relative flex items-center justify-center border border-[#D6AC55]/20">
                            @if($personal && $personal->profile_photo)
                                <img src="{{ $personal->profile_photo_url }}" alt="{{ $personal->full_name }}" class="w-full h-full object-cover object-top">
                            @else
                                <div class="text-center p-6">
                                    <i class="fa-solid fa-user-shield text-6xl text-[#D6AC55]/60 mb-3"></i>
                                    <p class="text-xs text-[#B8B4AC] font-mono">No portrait uploaded</p>
                                </div>
                            @endif
                            <div class="absolute top-2 left-2 badge-gold text-[10px]">
                                CLASS: DEVELOPER
                            </div>
                            <div class="absolute top-2 right-2 badge-cyan text-[10px]">
                                LEVEL 24
                            </div>
                        </div>
                    </div>

                    <!-- RPG Character Attributes -->
                    <div class="bg-[#10131D]/80 p-5 rounded-xl border border-[#D6AC55]/30 space-y-3">
                        <h3 class="font-rpg text-xs font-bold uppercase tracking-widest text-[#D6AC55] flex items-center gap-2">
                            <i class="fa-solid fa-chart-simple"></i> Core Attributes
                        </h3>

                        <!-- INTELLECT -->
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-[#B8B4AC]">INT (Logic & Code)</span>
                                <span class="text-[#54D5E8] font-mono font-bold">96 / 100</span>
                            </div>
                            <div class="h-2 bg-[#1B2233] rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-[#0e7490] to-[#54D5E8] rounded-full" style="width: 96%"></div>
                            </div>
                        </div>

                        <!-- AGILITY -->
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-[#B8B4AC]">AGI (Fast Learner & Adaptability)</span>
                                <span class="text-[#D6AC55] font-mono font-bold">92 / 100</span>
                            </div>
                            <div class="h-2 bg-[#1B2233] rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-[#A87D2E] to-[#D6AC55] rounded-full" style="width: 92%"></div>
                            </div>
                        </div>

                        <!-- STAMINA -->
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-[#B8B4AC]">STA (Debugging Endurance)</span>
                                <span class="text-[#22c55e] font-mono font-bold">95 / 100</span>
                            </div>
                            <div class="h-2 bg-[#1B2233] rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-emerald-600 to-[#22c55e] rounded-full" style="width: 95%"></div>
                            </div>
                        </div>

                        <!-- CHARISMA -->
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-[#B8B4AC]">CHA (Teamwork & Communication)</span>
                                <span class="text-purple-400 font-mono font-bold">88 / 100</span>
                            </div>
                            <div class="h-2 bg-[#1B2233] rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-purple-700 to-purple-400 rounded-full" style="width: 88%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Personal Dossier & Biography -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="border-b border-[#D6AC55]/20 pb-4">
                        <span class="text-[11px] font-mono text-[#54D5E8] uppercase tracking-wider">Identity Document</span>
                        <h2 class="font-rpg text-2xl sm:text-3xl font-bold text-white mt-1">
                            {{ $personal->full_name ?? 'Gisaldapa' }}
                        </h2>
                        <p class="text-sm text-[#D6AC55] font-serif italic mt-0.5">
                            {{ $personal->profession ?? 'Web Developer & Information Systems Scholar' }}
                        </p>
                    </div>

                    <!-- Dossier Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        <!-- Birth Place & Date -->
                        <div class="bg-[#10131D]/60 p-4 rounded-lg border border-[#D6AC55]/20">
                            <span class="text-[11px] uppercase tracking-wider text-[#D6AC55] font-mono block mb-1">
                                <i class="fa-solid fa-cake-candles mr-1"></i> Origin & Date of Birth
                            </span>
                            <p class="text-sm font-medium text-white">
                                {{ $personal->birth_place ?? '-' }}, 
                                {{ $personal && $personal->birth_date ? $personal->birth_date->format('d F Y') : '-' }}
                            </p>
                        </div>

                        <!-- Gender -->
                        <div class="bg-[#10131D]/60 p-4 rounded-lg border border-[#D6AC55]/20">
                            <span class="text-[11px] uppercase tracking-wider text-[#D6AC55] font-mono block mb-1">
                                <i class="fa-solid fa-venus-mars mr-1"></i> Gender Classification
                            </span>
                            <p class="text-sm font-medium text-white">
                                {{ $personal->gender ?? '-' }}
                            </p>
                        </div>

                        <!-- Email -->
                        <div class="bg-[#10131D]/60 p-4 rounded-lg border border-[#D6AC55]/20">
                            <span class="text-[11px] uppercase tracking-wider text-[#D6AC55] font-mono block mb-1">
                                <i class="fa-solid fa-envelope mr-1"></i> Electronic Raven (Email)
                            </span>
                            <p class="text-sm font-medium text-white truncate">
                                {{ $personal->email ?? '-' }}
                            </p>
                        </div>

                        <!-- Phone -->
                        <div class="bg-[#10131D]/60 p-4 rounded-lg border border-[#D6AC55]/20">
                            <span class="text-[11px] uppercase tracking-wider text-[#D6AC55] font-mono block mb-1">
                                <i class="fa-solid fa-phone mr-1"></i> Signal Beacon (Phone)
                            </span>
                            <p class="text-sm font-medium text-white">
                                {{ $personal->phone ?? '-' }}
                            </p>
                        </div>

                        <!-- Address (Span 2) -->
                        <div class="sm:col-span-2 bg-[#10131D]/60 p-4 rounded-lg border border-[#D6AC55]/20">
                            <span class="text-[11px] uppercase tracking-wider text-[#D6AC55] font-mono block mb-1">
                                <i class="fa-solid fa-map-location-dot mr-1"></i> Sanctuary Location (Address)
                            </span>
                            <p class="text-sm font-medium text-white">
                                {{ $personal->address ?? '-' }}
                            </p>
                        </div>

                    </div>

                    <!-- Adventurer Lore / Description -->
                    <div class="bg-[#10131D]/60 p-5 rounded-lg border border-[#D6AC55]/20">
                        <span class="text-[11px] uppercase tracking-wider text-[#D6AC55] font-mono block mb-2">
                            <i class="fa-solid fa-feather-pointed mr-1"></i> Character Biography & Lore
                        </span>
                        <div class="text-[#B8B4AC] font-story text-base sm:text-lg leading-relaxed whitespace-pre-line">
                            {{ $personal->description ?? 'No biography has been inscribed in the archives yet.' }}
                        </div>
                    </div>

                    <!-- Action buttons -->
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="{{ route('education') }}" class="btn-gold text-xs !py-3">
                            <i class="fa-solid fa-scroll mr-1"></i> Academic Journey
                        </a>
                        <a href="{{ route('contact') }}" class="btn-outline text-xs !py-3">
                            <i class="fa-solid fa-message mr-1"></i> Summon Adventurer
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
