@extends('layouts.public')

@section('title', 'Academic Journey')

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Section Header -->
        <div class="section-header">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1B2233] border border-[#D6AC55]/30 text-[#D6AC55] text-xs font-mono uppercase mb-3">
                <i class="fa-solid fa-graduation-cap"></i> ACADEMIC CHRONICLES
            </div>
            <h1 class="section-title">QUEST FOR KNOWLEDGE</h1>
            <p class="section-subtitle">Chronological record of academies, scholarly training, and intellectual ascents</p>
            <div class="gold-divider max-w-xs mx-auto">
                <i class="fa-solid fa-scroll text-[#D6AC55] text-xs"></i>
            </div>
        </div>

        @if($educations->isEmpty())
            <div class="rpg-panel p-12 text-center">
                <div class="empty-state">
                    <div class="empty-state-icon">📜</div>
                    <h3 class="font-rpg text-xl text-[#D6AC55] font-semibold mb-2">No Chronicles Inscribed Yet</h3>
                    <p class="text-sm text-[#B8B4AC]">The archives of scholarly pursuits await the chronicler's quill.</p>
                </div>
            </div>
        @else
            <!-- Timeline Container -->
            <div class="timeline mt-8">
                @foreach($educations as $edu)
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="rpg-panel rpg-panel-hover p-6 rounded-xl">
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                                <span class="badge-gold text-xs font-mono">
                                    <i class="fa-regular fa-calendar-days mr-1"></i>
                                    {{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}
                                </span>
                                @if(strtolower($edu->status) === 'completed' || strtolower($edu->status) === 'lulus')
                                    <span class="badge-green text-xs">
                                        <i class="fa-solid fa-circle-check mr-1"></i> Completed
                                    </span>
                                @else
                                    <span class="badge-cyan text-xs">
                                        <i class="fa-solid fa-hourglass-half mr-1"></i> Ongoing
                                    </span>
                                @endif
                            </div>

                            <h3 class="font-rpg text-xl font-bold text-white mb-1">
                                {{ $edu->institution_name }}
                            </h3>

                            <div class="flex flex-wrap items-center gap-3 text-sm text-[#54D5E8] mb-3 font-medium">
                                <span><i class="fa-solid fa-award mr-1"></i>{{ $edu->education_level }}</span>
                                @if($edu->major)
                                    <span>•</span>
                                    <span><i class="fa-solid fa-book-open mr-1"></i>{{ $edu->major }}</span>
                                @endif
                            </div>

                            @if($edu->description)
                                <p class="text-[#B8B4AC] font-story text-base leading-relaxed border-t border-[#D6AC55]/10 pt-3">
                                    {{ $edu->description }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-12 text-center">
            <a href="{{ route('skills') }}" class="btn-gold">
                <span>Proceed to Skill Tree</span>
                <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>
@endsection
