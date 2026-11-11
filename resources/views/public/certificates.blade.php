@extends('layouts.public')

@section('title', 'Trophy Collection & Certificates')

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Section Header -->
        <div class="section-header">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1B2233] border border-[#D6AC55]/30 text-[#D6AC55] text-xs font-mono uppercase mb-3">
                <i class="fa-solid fa-trophy"></i> ACHIEVEMENT VAULT
            </div>
            <h1 class="section-title">CERTIFICATES & TROPHIES</h1>
            <p class="section-subtitle">Official seals of mastery, licenses, and accolades awarded by renowned guilds</p>
            <div class="gold-divider max-w-xs mx-auto">
                <i class="fa-solid fa-medal text-[#D6AC55] text-xs"></i>
            </div>
        </div>

        @if($certificates->isEmpty())
            <div class="rpg-panel p-12 text-center">
                <div class="empty-state">
                    <div class="empty-state-icon">🏆</div>
                    <h3 class="font-rpg text-xl text-[#D6AC55] font-semibold mb-2">Vault Unoccupied</h3>
                    <p class="text-sm text-[#B8B4AC]">No certificate relics have been stored in the hall of trophies yet.</p>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($certificates as $cert)
                    <div class="rpg-panel rpg-panel-hover p-6 rounded-xl flex flex-col justify-between group">
                        <div>
                            <!-- Badge and Date Row -->
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <span class="badge-gold text-[10px]">
                                    <i class="fa-solid fa-award mr-1"></i> Official Relic
                                </span>
                                @if($cert->issue_date)
                                    <span class="text-xs font-mono text-[#B8B4AC]">
                                        {{ $cert->issue_date->format('M Y') }}
                                    </span>
                                @endif
                            </div>

                            <!-- Certificate Title -->
                            <h3 class="font-rpg text-lg font-bold text-white group-hover:text-[#D6AC55] transition-colors leading-snug mb-1">
                                {{ $cert->certificate_name }}
                            </h3>

                            <!-- Issuer Guild -->
                            @if($cert->issuer)
                                <p class="text-xs text-[#54D5E8] font-mono mb-3">
                                    <i class="fa-solid fa-building-columns mr-1"></i> {{ $cert->issuer }}
                                </p>
                            @endif

                            <!-- Certificate Photo / Thumbnail -->
                            @if($cert->photos && $cert->photos->isNotEmpty())
                                <div class="mb-4 rounded-lg overflow-hidden border border-[#D6AC55]/30 bg-[#10131D] aspect-[4/3] cursor-pointer relative group/img">
                                    <img src="{{ $cert->photos->first()->photo_url }}" 
                                         alt="{{ $cert->certificate_name }}" 
                                         data-lightbox="{{ $cert->photos->first()->photo_url }}"
                                         class="w-full h-full object-cover group-hover/img:scale-105 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/img:opacity-100 flex items-center justify-center transition-opacity">
                                        <span class="btn-gold !py-1 !px-3 text-[10px]">
                                            <i class="fa-solid fa-magnifying-glass-plus mr-1"></i> Inspect Relic
                                        </span>
                                    </div>
                                    @if($cert->photos->count() > 1)
                                        <div class="absolute bottom-2 right-2 badge-cyan text-[10px]">
                                            +{{ $cert->photos->count() - 1 }} more
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Description -->
                            @if($cert->description)
                                <p class="text-xs text-[#B8B4AC] font-story text-sm leading-relaxed mb-3">
                                    {{ $cert->description }}
                                </p>
                            @endif

                            <!-- Number -->
                            @if($cert->certificate_number)
                                <div class="text-[11px] font-mono text-[#B8B4AC]/70 mb-4 truncate">
                                    <span class="text-[#D6AC55]">ID:</span> {{ $cert->certificate_number }}
                                </div>
                            @endif
                        </div>

                        <!-- Action Links -->
                        <div class="pt-3 border-t border-[#D6AC55]/15 flex items-center justify-between">
                            @if($cert->certificate_url)
                                <a href="{{ $cert->certificate_url }}" target="_blank" rel="noopener noreferrer" class="btn-outline !py-1.5 !px-3 text-xs w-full text-center justify-center">
                                    <i class="fa-solid fa-arrow-up-right-from-square mr-1"></i> Verify Credential
                                </a>
                            @else
                                <span class="text-[11px] text-[#B8B4AC]/60 italic font-serif">Verified Certificate</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-12 text-center">
            <a href="{{ route('hobbies') }}" class="btn-gold">
                <span>Discover Side Quests & Activities</span>
                <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>
@endsection
