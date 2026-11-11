@extends('layouts.public')

@section('title', 'Adventure Log & Experiences')

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <!-- Section Header -->
        <div class="section-header">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1B2233] border border-[#D6AC55]/30 text-[#D6AC55] text-xs font-mono uppercase mb-3">
                <i class="fa-solid fa-dungeon"></i> CAMPAIGN CHRONICLES
            </div>
            <h1 class="section-title">ADVENTURE HISTORY</h1>
            <p class="section-subtitle">Real-world campaigns, professional guild appointments, and engineering battles</p>
            <div class="gold-divider max-w-xs mx-auto">
                <i class="fa-solid fa-shield-halved text-[#D6AC55] text-xs"></i>
            </div>
        </div>

        @if($experiences->isEmpty())
            <div class="rpg-panel p-12 text-center">
                <div class="empty-state">
                    <div class="empty-state-icon">🛡️</div>
                    <h3 class="font-rpg text-xl text-[#D6AC55] font-semibold mb-2">No Past Campaigns</h3>
                    <p class="text-sm text-[#B8B4AC]">The hero is preparing for upcoming quests and guild alliances.</p>
                </div>
            </div>
        @else
            <div class="space-y-8">
                @foreach($experiences as $exp)
                    <div class="rpg-panel rpg-panel-hover p-6 sm:p-8 rounded-xl relative">
                        <!-- Top Header Row -->
                        <div class="flex flex-wrap items-start justify-between gap-4 border-b border-[#D6AC55]/20 pb-4">
                            <div>
                                <span class="text-xs font-mono text-[#54D5E8] uppercase tracking-wider block mb-1">
                                    <i class="fa-solid fa-building mr-1"></i> {{ $exp->company_name }}
                                </span>
                                <h2 class="font-rpg text-2xl font-bold text-white">
                                    {{ $exp->position }}
                                </h2>
                                @if($exp->location)
                                    <span class="text-xs text-[#B8B4AC] mt-1 inline-flex items-center gap-1">
                                        <i class="fa-solid fa-location-dot text-[#D6AC55]"></i> {{ $exp->location }}
                                    </span>
                                @endif
                            </div>

                            <div class="text-right">
                                <span class="badge-gold text-xs font-mono">
                                    <i class="fa-regular fa-calendar mr-1"></i>
                                    {{ $exp->start_date ? $exp->start_date->format('M Y') : '-' }} - 
                                    {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}
                                </span>
                            </div>
                        </div>

                        <!-- Description & Responsibilities -->
                        <div class="py-4 space-y-4">
                            @if($exp->description)
                                <div class="text-[#B8B4AC] font-story text-lg leading-relaxed">
                                    {{ $exp->description }}
                                </div>
                            @endif

                            @if($exp->responsibilities)
                                <div class="bg-[#10131D]/60 p-4 rounded-lg border border-[#D6AC55]/15">
                                    <h4 class="text-xs font-mono uppercase tracking-widest text-[#D6AC55] mb-2 flex items-center gap-2">
                                        <i class="fa-solid fa-list-check"></i> Primary Quests & Responsibilities
                                    </h4>
                                    <ul class="space-y-1.5 text-sm text-[#F0EDE8]">
                                        @foreach(explode("\n", str_replace("\r", "", $exp->responsibilities)) as $resp)
                                            @if(trim($resp))
                                                <li class="flex items-start gap-2">
                                                    <span class="text-[#54D5E8] mt-1 text-xs">⚔</span>
                                                    <span>{{ trim($resp) }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <!-- Experience Photo Gallery -->
                        @if($exp->photos && $exp->photos->isNotEmpty())
                            <div class="pt-4 border-t border-[#D6AC55]/15">
                                <h4 class="text-xs font-mono uppercase tracking-widest text-[#54D5E8] mb-3 flex items-center gap-2">
                                    <i class="fa-solid fa-camera-retro"></i> Mission Artifacts & Photos
                                </h4>
                                <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-3">
                                    @foreach($exp->photos as $photo)
                                        <div class="group relative rounded-lg overflow-hidden border border-[#D6AC55]/30 aspect-square bg-[#10131D] cursor-pointer">
                                            <img src="{{ $photo->photo_url }}" 
                                                 alt="{{ $photo->caption ?? 'Mission Photo' }}" 
                                                 data-lightbox="{{ $photo->photo_url }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                            @if($photo->caption)
                                                <div class="absolute inset-x-0 bottom-0 bg-black/80 text-[10px] text-white p-1 truncate text-center opacity-0 group-hover:opacity-100 transition-opacity">
                                                    {{ $photo->caption }}
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-12 text-center">
            <a href="{{ route('certificates') }}" class="btn-gold">
                <span>View Trophy Collection</span>
                <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>
@endsection
