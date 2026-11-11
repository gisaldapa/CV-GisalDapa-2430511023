@extends('layouts.public')

@section('title', 'Skill Tree & Abilities')

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Section Header -->
        <div class="section-header">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1B2233] border border-[#D6AC55]/30 text-[#D6AC55] text-xs font-mono uppercase mb-3">
                <i class="fa-solid fa-wand-magic-sparkles"></i> ABILITIES & SPELLBOOK
            </div>
            <h1 class="section-title">THE SKILL TREE</h1>
            <p class="section-subtitle">Proficiencies in programming spells, engineering arts, and arcane tools</p>
            <div class="gold-divider max-w-xs mx-auto">
                <i class="fa-solid fa-flask-vial text-[#D6AC55] text-xs"></i>
            </div>
        </div>

        @if($skills->isEmpty())
            <div class="rpg-panel p-12 text-center">
                <div class="empty-state">
                    <div class="empty-state-icon">🔮</div>
                    <h3 class="font-rpg text-xl text-[#D6AC55] font-semibold mb-2">Spellbook Empty</h3>
                    <p class="text-sm text-[#B8B4AC]">No abilities or magical affinities have been recorded yet.</p>
                </div>
            </div>
        @else
            <!-- Skill Categories Display -->
            <div class="space-y-12">
                @foreach($categories as $categoryName => $skillList)
                    <div class="rpg-panel p-6 sm:p-8 rounded-xl relative">
                        <!-- Category Header -->
                        <div class="flex items-center gap-3 border-b border-[#D6AC55]/20 pb-4 mb-6">
                            <div class="w-10 h-10 rounded-lg bg-[#D6AC55]/10 border border-[#D6AC55]/40 flex items-center justify-center text-[#D6AC55]">
                                <i class="fa-solid fa-gem text-lg"></i>
                            </div>
                            <div>
                                <h2 class="font-rpg text-xl font-bold text-white tracking-wide">
                                    {{ $categoryName ?: 'General Proficiencies' }}
                                </h2>
                                <span class="text-xs text-[#54D5E8] font-mono uppercase">
                                    {{ count($skillList) }} Ability Nodes Active
                                </span>
                            </div>
                        </div>

                        <!-- Skills Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($skillList as $skill)
                                <div class="bg-[#10131D]/70 p-5 rounded-lg border border-[#D6AC55]/20 hover:border-[#D6AC55]/60 transition-all duration-300">
                                    <div class="flex items-center justify-between gap-2 mb-2">
                                        <div class="flex items-center gap-2">
                                            <span class="text-[#D6AC55] text-xs">◈</span>
                                            <h3 class="font-rpg text-base font-bold text-white">{{ $skill->skill_name }}</h3>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            @if($skill->skill_level)
                                                <span class="badge-cyan text-[10px]">{{ $skill->skill_level }}</span>
                                            @endif
                                            <span class="text-sm font-mono font-bold text-[#D6AC55]">{{ $skill->percentage }}%</span>
                                        </div>
                                    </div>

                                    <!-- Animated Progress Bar -->
                                    <div class="skill-bar mt-2 mb-3">
                                        <div class="skill-bar-fill" data-width="{{ $skill->percentage }}" style="width: 0%"></div>
                                    </div>

                                    @if($skill->description)
                                        <p class="text-xs text-[#B8B4AC] font-story mt-2 leading-relaxed">
                                            {{ $skill->description }}
                                        </p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-12 text-center">
            <a href="{{ route('experience') }}" class="btn-gold">
                <span>View Adventure Campaign Logs</span>
                <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>
@endsection
