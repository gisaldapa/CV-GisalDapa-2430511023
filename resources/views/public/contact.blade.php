@extends('layouts.public')

@section('title', 'Summon Adventurer / Contact')

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Section Header -->
        <div class="section-header">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1B2233] border border-[#D6AC55]/30 text-[#D6AC55] text-xs font-mono uppercase mb-3">
                <i class="fa-solid fa-feather"></i> GUILD CARRIER RAVEN
            </div>
            <h1 class="section-title">COMMUNICATION REALM</h1>
            <p class="section-subtitle">Dispatch your quest proposals, collaboration inquiries, or academic dispatches</p>
            <div class="gold-divider max-w-xs mx-auto">
                <i class="fa-solid fa-envelope-open-text text-[#D6AC55] text-xs"></i>
            </div>
        </div>

        <div class="rpg-panel p-6 sm:p-10 rounded-2xl relative">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- Left: Communication Relics (Details) -->
                <div class="space-y-6">
                    <div>
                        <h2 class="font-rpg text-xl font-bold text-white mb-1">
                            Dispatch a Message
                        </h2>
                        <p class="text-sm text-[#B8B4AC] font-story">
                            Have an epic mission, an open internship position, or an exciting project in need of a fullstack adventurer? Reach out through any of these magical beacons.
                        </p>
                    </div>

                    <!-- Beacon 1: Sanctuary Address -->
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-[#10131D]/80 border border-[#D6AC55]/20">
                        <div class="w-10 h-10 rounded-lg bg-[#D6AC55]/15 border border-[#D6AC55]/40 flex items-center justify-center text-[#D6AC55] text-base shrink-0">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase tracking-wider text-[#D6AC55] font-mono block">Sanctuary Coordinates</span>
                            <p class="text-sm font-medium text-white mt-0.5">
                                {{ $contact->address ?? ($personal->address ?? 'Indonesia') }}
                            </p>
                        </div>
                    </div>

                    <!-- Beacon 2: Electronic Raven (Email) -->
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-[#10131D]/80 border border-[#D6AC55]/20">
                        <div class="w-10 h-10 rounded-lg bg-[#54D5E8]/15 border border-[#54D5E8]/40 flex items-center justify-center text-[#54D5E8] text-base shrink-0">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="overflow-hidden">
                            <span class="text-[10px] uppercase tracking-wider text-[#54D5E8] font-mono block">Electronic Raven (Email)</span>
                            <p class="text-sm font-medium text-white mt-0.5 truncate">
                                {{ $contact->email ?? ($personal->email ?? 'gisaldapa@email.com') }}
                            </p>
                        </div>
                    </div>

                    <!-- Beacon 3: Signal Horn (Phone / WhatsApp) -->
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-[#10131D]/80 border border-[#D6AC55]/20">
                        <div class="w-10 h-10 rounded-lg bg-[#22c55e]/15 border border-[#22c55e]/40 flex items-center justify-center text-[#22c55e] text-base shrink-0">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase tracking-wider text-[#22c55e] font-mono block">Signal Beacon (Phone & WA)</span>
                            <p class="text-sm font-medium text-white mt-0.5">
                                {{ $contact->phone ?? ($personal->phone ?? '+62 812 3456 7890') }}
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Right: Instant Transmission Actions -->
                <div class="bg-[#10131D]/60 p-6 sm:p-8 rounded-xl border border-[#D6AC55]/30 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-[#D6AC55] text-base">⚔</span>
                            <h3 class="font-rpg text-lg font-bold text-[#D6AC55]">INSTANT DISPATCH BEACONS</h3>
                        </div>
                        <p class="text-xs text-[#B8B4AC] leading-relaxed mb-6">
                            Choose your preferred spell to transmit an immediate inquiry directly to the adventurer's pocket parchment.
                        </p>

                        <!-- WhatsApp Transmission Button -->
                        @php
                            $waNumber = preg_replace('/[^0-9]/', '', $contact->whatsapp ?? ($contact->phone ?? '6281234567890'));
                            if (str_starts_with($waNumber, '0')) {
                                $waNumber = '62' . substr($waNumber, 1);
                            }
                        @endphp

                        <div class="space-y-4">
                            <a href="https://wa.me/{{ $waNumber }}?text=Hello%20Gisaldapa,%20I%20visited%20your%20RPG%20CV%20and%20would%20like%20to%20connect%20with%20you!" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="w-full flex items-center justify-center gap-3 bg-gradient-to-r from-emerald-700 to-emerald-500 hover:from-emerald-600 hover:to-emerald-400 text-white font-bold py-3.5 px-6 rounded-lg shadow-lg hover:shadow-emerald-500/30 transition-all duration-300 text-sm">
                                <i class="fa-brands fa-whatsapp text-xl"></i>
                                <span>Summon via WhatsApp</span>
                            </a>

                            <!-- Email Transmission Button -->
                            @php
                                $targetEmail = $contact->email ?? ($personal->email ?? 'gisaldapa@email.com');
                            @endphp
                            <a href="mailto:{{ $targetEmail }}?subject=Quest%20Inquiry%20from%20RPG%20Portfolio" 
                               class="w-full flex items-center justify-center gap-3 bg-gradient-to-r from-cyan-700 to-cyan-500 hover:from-cyan-600 hover:to-cyan-400 text-white font-bold py-3.5 px-6 rounded-lg shadow-lg hover:shadow-cyan-500/30 transition-all duration-300 text-sm">
                                <i class="fa-solid fa-envelope text-lg"></i>
                                <span>Send Electronic Raven</span>
                            </a>
                        </div>
                    </div>

                    <!-- Guild Oath / Disclaimer -->
                    <div class="mt-8 pt-4 border-t border-[#D6AC55]/15 text-[11px] text-[#B8B4AC]/70 text-center font-story">
                        "Your dispatches are handled with high confidentiality and honored according to the Adventurer's Code."
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('home') }}" class="btn-outline">
                <i class="fa-solid fa-campground mr-2"></i>
                <span>Return to Base Camp</span>
            </a>
        </div>
    </div>
</section>
@endsection
