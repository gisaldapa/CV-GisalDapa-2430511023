@extends('layouts.admin')

@section('title', 'Change Passphrase')

@section('content')
<div class="max-w-xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-key text-[#D6AC55]"></i> SANCTUARY PASSPHRASE
            </h1>
            <p class="text-xs text-[#B8B4AC]">Recast the secret incantation protecting your administrative realm</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Dashboard
        </a>
    </div>

    <!-- Password Form Panel -->
    <div class="rpg-panel p-6 sm:p-8 rounded-2xl relative">
        <form action="{{ route('admin.change-password.update') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Current Password -->
            <div>
                <label for="current_password" class="rpg-label flex items-center gap-2">
                    <i class="fa-solid fa-lock text-xs"></i>
                    <span>Current Secret Rune (Current Password) *</span>
                </label>
                <input type="password" 
                       name="current_password" 
                       id="current_password" 
                       required 
                       placeholder="••••••••"
                       class="rpg-input">
            </div>

            <!-- New Password -->
            <div>
                <label for="password" class="rpg-label flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved text-xs"></i>
                    <span>New Secret Rune (Min 8 Characters) *</span>
                </label>
                <input type="password" 
                       name="password" 
                       id="password" 
                       required 
                       placeholder="••••••••"
                       class="rpg-input">
            </div>

            <!-- Confirm New Password -->
            <div>
                <label for="password_confirmation" class="rpg-label flex items-center gap-2">
                    <i class="fa-solid fa-check-double text-xs"></i>
                    <span>Confirm New Secret Rune *</span>
                </label>
                <input type="password" 
                       name="password_confirmation" 
                       id="password_confirmation" 
                       required 
                       placeholder="••••••••"
                       class="rpg-input">
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.dashboard') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-key mr-2"></i> Recast Passphrase
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
