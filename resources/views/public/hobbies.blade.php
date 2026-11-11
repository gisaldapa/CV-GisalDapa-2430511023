@extends('layouts.public')

@section('title', 'Side Quests & Hobbies')

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Section Header -->
        <div class="section-header">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1B2233] border border-[#D6AC55]/30 text-[#D6AC55] text-xs font-mono uppercase mb-3">
                <i class="fa-solid fa-compass"></i> EXTRA-CURRICULAR EXPEDITIONS
            </div>
            <h1 class="section-title">SIDE QUESTS & PASSIONS</h1>
            <p class="section-subtitle">Adventures beyond the main storyline — creative hobbies, lifestyle quests, and community activities</p>
            <div class="gold-divider max-w-xs mx-auto">
                <i class="fa-solid fa-gamepad text-[#D6AC55] text-xs"></i>
            </div>
        </div>

        @if($hobbies->isEmpty())
            <div class="rpg-panel p-12 text-center">
                <div class="empty-state">
                    <div class="empty-state-icon">🧭</div>
                    <h3 class="font-rpg text-xl text-[#D6AC55] font-semibold mb-2">No Active Side Quests</h3>
                    <p class="text-sm text-[#B8B4AC]">The hero is currently focused solely on the primary campaign.</p>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($hobbies as $hobby)
                    <div class="rpg-panel rpg-panel-hover rounded-xl overflow-hidden flex flex-col group">
                        <!-- Photo if present -->
                        @if($hobby->photo)
                            <div class="h-48 w-full bg-[#10131D] relative overflow-hidden border-b border-[#D6AC55]/20">
                                <img src="{{ $hobby->photo_url }}" 
                                     alt="{{ $hobby->hobby_name }}" 
                                     data-lightbox="{{ $hobby->photo_url }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 cursor-pointer">
                                @if($hobby->category)
                                    <div class="absolute top-3 left-3 badge-gold text-[10px] shadow">
                                        {{ $hobby->category }}
                                    </div>
                                @endif
                            </div>
                        @endif

                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                @if(!$hobby->photo && $hobby->category)
                                    <div class="mb-2">
                                        <span class="badge-gold text-[10px]">{{ $hobby->category }}</span>
                                    </div>
                                @endif

                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-[#D6AC55] text-xs">✦</span>
                                    <h3 class="font-rpg text-xl font-bold text-white group-hover:text-[#D6AC55] transition-colors">
                                        {{ $hobby->hobby_name }}
                                    </h3>
                                </div>

                                @if($hobby->description)
                                    <p class="text-sm text-[#B8B4AC] font-story leading-relaxed">
                                        {{ $hobby->description }}
                                    </p>
                                @endif
                            </div>

                            <div class="pt-4 mt-4 border-t border-[#D6AC55]/10 flex items-center justify-between text-xs text-[#54D5E8]">
                                <span><i class="fa-solid fa-flag mr-1"></i> Side Quest Active</span>
                                <span class="font-mono text-white/50">XP +150</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-12 text-center">
            <a href="{{ route('contact') }}" class="btn-gold">
                <span>Summon the Adventurer (Contact)</span>
                <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>
@endsection
