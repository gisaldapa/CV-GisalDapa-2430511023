@extends('layouts.public')

@section('content')
<div class="hero-bg min-h-screen flex items-center justify-center">
    <div class="text-center px-6">
        <div class="rpg-panel rpg-corner inline-block p-12 max-w-lg mx-auto">
            <div class="text-8xl mb-6 text-gold" style="font-family: 'Cinzel', serif; color: var(--gold);">404</div>
            <div class="gold-divider">
                <span style="color: var(--gold); font-family: 'Cinzel', serif; font-size: 0.8rem; letter-spacing: 3px;">QUEST FAILED</span>
            </div>
            <h1 class="mt-4 mb-3" style="font-family: 'Cinzel', serif; color: var(--text-primary); font-size: 1.5rem;">Page Not Found</h1>
            <p class="text-muted mb-8 font-story text-lg">The dungeon you seek does not exist in this realm. Perhaps you took a wrong turn on your adventure.</p>
            <a href="{{ route('home') }}" class="btn-gold">
                <i class="fas fa-home"></i> Return to Base Camp
            </a>
        </div>
    </div>
</div>
@endsection
