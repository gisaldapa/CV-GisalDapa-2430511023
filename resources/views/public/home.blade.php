@extends('layouts.public')

@section('title', 'Hero Status')

@section('content')
<!-- Hero / Character Introduction Section -->
<section class="hero-bg relative min-h-[90vh] flex items-center justify-center py-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <!-- Ambient RPG light effects -->
    <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-[#D6AC55]/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 right-10 w-[400px] h-[400px] bg-[#54D5E8]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl w-full mx-auto relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left: Character Card / Avatar -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative group">
                    <!-- Glow ring -->
                    <div class="absolute -inset-1.5 bg-gradient-to-r from-[#D6AC55] via-[#54D5E8] to-[#D6AC55] rounded-2xl blur-md opacity-50 group-hover:opacity-80 transition duration-1000 group-hover:duration-200"></div>
                    
                    <!-- Portrait Frame -->
                    <div class="relative bg-[#1B2233] p-4 rounded-2xl border-2 border-[#D6AC55]/60 shadow-2xl">
                        <!-- Corner jewels -->
                        <div class="absolute top-2 left-2 text-[#D6AC55] text-xs">◆</div>
                        <div class="absolute top-2 right-2 text-[#D6AC55] text-xs">◆</div>
                        <div class="absolute bottom-2 left-2 text-[#D6AC55] text-xs">◆</div>
                        <div class="absolute bottom-2 right-2 text-[#D6AC55] text-xs">◆</div>

                        <div class="w-64 sm:w-72 h-80 sm:h-96 rounded-xl overflow-hidden bg-[#10131D] border border-[#D6AC55]/30 relative flex items-center justify-center">
                            @if($personal && $personal->profile_photo)
                                <img src="{{ $personal->profile_photo_url }}" alt="{{ $personal->full_name }}" class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="text-center p-6">
                                    <div class="w-24 h-24 mx-auto rounded-full bg-[#1B2233] border-2 border-[#D6AC55]/50 flex items-center justify-center text-[#D6AC55] text-4xl mb-4 shadow-inner">
                                        <i class="fa-solid fa-user-ninja"></i>
                                    </div>
                                    <span class="font-rpg text-[#D6AC55] text-sm block">Adventurer Portrait</span>
                                    <span class="text-xs text-[#B8B4AC] mt-1 block">Class: Fullstack Sorcerer</span>
                                </div>
                            @endif
                            
                            <!-- Class Badge Overlay -->
                            <div class="absolute bottom-3 left-3 right-3 bg-[#10131D]/90 backdrop-blur-sm border border-[#D6AC55]/40 rounded-lg p-2.5 text-center">
                                <span class="text-[10px] uppercase tracking-widest text-[#54D5E8] font-mono block">Character Title</span>
                                <span class="font-rpg text-sm font-semibold text-[#D6AC55] truncate block">
                                    {{ $personal->profession ?? 'Full Stack Developer & Adventurer' }}
                                </span>
                            </div>
                        </div>

                        <!-- Level & HP Bar decoration -->
                        <div class="mt-4 space-y-2">
                            <div class="flex justify-between text-xs text-[#B8B4AC]">
                                <span class="font-mono text-[#D6AC55] font-bold"><i class="fa-solid fa-bolt mr-1"></i>HP / Stamina</span>
                                <span class="font-mono text-[#22c55e]">100% Active</span>
                            </div>
                            <div class="h-2 bg-[#10131D] rounded-full overflow-hidden border border-[#D6AC55]/30">
                                <div class="h-full bg-gradient-to-r from-[#22c55e] to-[#54D5E8] rounded-full w-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Character Introduction & Story -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <!-- Guild Tag -->
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#1B2233] border border-[#D6AC55]/40 text-[#D6AC55] text-xs font-semibold tracking-wider uppercase">
                    <span class="w-2 h-2 rounded-full bg-[#54D5E8] animate-ping"></span>
                    <span>CHARACTER SELECTION SCREEN</span>
                </div>

                <!-- Character Name & Title -->
                <div>
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black font-rpg tracking-wide text-white leading-tight">
                        I am <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D6AC55] via-[#FFE299] to-[#D6AC55]">{{ $personal->full_name ?? 'Gisaldapa' }}</span>
                    </h1>
                    <p class="text-lg sm:text-xl font-rpg text-[#54D5E8] mt-2 tracking-wide font-medium">
                        {{ $personal->profession ?? 'Web Craftsman & Digital Adventurer' }}
                    </p>
                </div>

                <!-- Gold Divider -->
                <div class="gold-divider justify-center lg:justify-start max-w-md">
                    <span class="text-[#D6AC55] text-xs tracking-widest font-serif uppercase">◆ PROLOGUE ◆</span>
                </div>

                <!-- Lore / Bio -->
                <p class="text-[#B8B4AC] font-story text-lg sm:text-xl leading-relaxed max-w-2xl">
                    {{ $personal->description ?? 'Welcome, traveler, to my digital sanctuary. Within these enchanted scrolls lie the chronicles of my academic journey, mastery over the arcane arts of programming, victories earned in real-world campaigns, and sacred relics collected along the path.' }}
                </p>

                <!-- Action Quests / Buttons -->
                <div class="pt-4 flex flex-wrap items-center justify-center lg:justify-start gap-4">
                    <a href="{{ route('profile') }}" class="btn-gold !py-3.5 !px-7 text-sm shadow-xl">
                        <i class="fa-solid fa-scroll mr-2"></i> Inspect Character Sheet
                    </a>
                    <a href="{{ route('skills') }}" class="btn-outline !py-3.5 !px-6 text-sm">
                        <i class="fa-solid fa-wand-magic-sparkles mr-2"></i> View Skill Tree
                    </a>
                    <a href="{{ route('contact') }}" class="btn-cyan !py-3.5 !px-6 text-sm">
                        <i class="fa-solid fa-feather mr-2"></i> Summon Adventurer
                    </a>
                </div>

                <!-- Status Stats Grid -->
                <div class="pt-8 border-t border-[#D6AC55]/20 grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="stat-box">
                        <div class="stat-value">{{ \App\Models\Education::count() }}</div>
                        <div class="stat-label">Academies</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-value">{{ \App\Models\Skill::count() }}</div>
                        <div class="stat-label">Spells & Skills</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-value">{{ \App\Models\Experience::count() }}</div>
                        <div class="stat-label">Guild Quests</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-value">{{ \App\Models\Certificate::count() }}</div>
                        <div class="stat-label">Trophies</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Quick Lore Showcase Section -->
<section class="py-16 bg-[#161C2E]/60 border-y border-[#D6AC55]/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <h2 class="section-title">CHOOSE YOUR PATHWAY</h2>
            <p class="section-subtitle">Navigate through the realms of my professional portfolio</p>
            <div class="gold-divider max-w-xs mx-auto">
                <i class="fa-solid fa-dungeon text-[#D6AC55] text-xs"></i>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Pathway 1 -->
            <a href="{{ route('education') }}" class="rpg-panel rpg-panel-hover p-6 rounded-xl block group">
                <div class="w-12 h-12 rounded-lg bg-[#D6AC55]/10 border border-[#D6AC55]/40 flex items-center justify-center text-[#D6AC55] text-xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <h3 class="font-rpg text-lg font-bold text-white group-hover:text-[#D6AC55] transition-colors">Academic History</h3>
                <p class="text-sm text-[#B8B4AC] mt-2 font-story">Chronicles of knowledge acquired from ancient academies and scholarly institutions.</p>
                <div class="mt-4 flex items-center text-xs text-[#54D5E8] font-semibold">
                    <span>Enter Academy</span> <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                </div>
            </a>

            <!-- Pathway 2 -->
            <a href="{{ route('experience') }}" class="rpg-panel rpg-panel-hover p-6 rounded-xl block group">
                <div class="w-12 h-12 rounded-lg bg-[#54D5E8]/10 border border-[#54D5E8]/40 flex items-center justify-center text-[#54D5E8] text-xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h3 class="font-rpg text-lg font-bold text-white group-hover:text-[#54D5E8] transition-colors">Campaign Logs</h3>
                <p class="text-sm text-[#B8B4AC] mt-2 font-story">Real-world missions, battlefield engineering, and software guild contributions.</p>
                <div class="mt-4 flex items-center text-xs text-[#54D5E8] font-semibold">
                    <span>Inspect Log</span> <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                </div>
            </a>

            <!-- Pathway 3 -->
            <a href="{{ route('certificates') }}" class="rpg-panel rpg-panel-hover p-6 rounded-xl block group">
                <div class="w-12 h-12 rounded-lg bg-[#D6AC55]/10 border border-[#D6AC55]/40 flex items-center justify-center text-[#D6AC55] text-xl mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-trophy"></i>
                </div>
                <h3 class="font-rpg text-lg font-bold text-white group-hover:text-[#D6AC55] transition-colors">Trophy Vault</h3>
                <p class="text-sm text-[#B8B4AC] mt-2 font-story">Certificates of valor, badges of honor, and proven mastery in modern technologies.</p>
                <div class="mt-4 flex items-center text-xs text-[#54D5E8] font-semibold">
                    <span>Unlock Vault</span> <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection
