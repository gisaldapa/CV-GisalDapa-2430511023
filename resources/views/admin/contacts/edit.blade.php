@extends('layouts.admin')

@section('title', 'Contact Info Management')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-envelope-open-text text-[#D6AC55]"></i> CARRIER BEACONS & CONTACTS
            </h1>
            <p class="text-xs text-[#B8B4AC]">Configure communication channels displayed on the public CV</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn-outline !py-2 text-xs">
            <i class="fa-solid fa-arrow-left mr-1"></i> Dashboard
        </a>
    </div>

    <div class="rpg-panel p-6 sm:p-8 rounded-2xl">
        <form action="{{ route('admin.contacts.update') }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Sanctuary Address -->
            <div>
                <label for="address" class="rpg-label flex items-center gap-2">
                    <i class="fa-solid fa-map-location-dot text-xs"></i>
                    <span>Sanctuary Address / Base Coordinates</span>
                </label>
                <textarea name="address" 
                          id="address" 
                          rows="2" 
                          placeholder="e.g. Jl. Bhayangkara No. 45, Kota Sukabumi, Jawa Barat" 
                          class="rpg-input">{{ old('address', $contact->address ?? '') }}</textarea>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="rpg-label flex items-center gap-2">
                    <i class="fa-solid fa-envelope text-xs"></i>
                    <span>Electronic Raven Address (Public Email)</span>
                </label>
                <input type="email" 
                       name="email" 
                       id="email" 
                       value="{{ old('email', $contact->email ?? '') }}" 
                       placeholder="e.g. gisaldapa@email.com" 
                       class="rpg-input">
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="rpg-label flex items-center gap-2">
                    <i class="fa-solid fa-phone text-xs"></i>
                    <span>Voice Signal Horn (Phone Display)</span>
                </label>
                <input type="text" 
                       name="phone" 
                       id="phone" 
                       value="{{ old('phone', $contact->phone ?? '') }}" 
                       placeholder="e.g. +62 812 3456 7890" 
                       class="rpg-input">
            </div>

            <!-- WhatsApp -->
            <div>
                <label for="whatsapp" class="rpg-label flex items-center gap-2">
                    <i class="fa-brands fa-whatsapp text-xs text-emerald-400"></i>
                    <span>WhatsApp Instant Dispatch Number</span>
                </label>
                <input type="text" 
                       name="whatsapp" 
                       id="whatsapp" 
                       value="{{ old('whatsapp', $contact->whatsapp ?? '') }}" 
                       placeholder="e.g. 6281234567890 (start with country code 62)" 
                       class="rpg-input">
                <p class="text-[11px] text-[#B8B4AC] mt-1">
                    Enter numbers only starting with country code (e.g. <code>6281234567890</code>). This activates the one-click WhatsApp button on the public page!
                </p>
            </div>

            <div class="pt-4 border-t border-[#D6AC55]/20 flex items-center justify-end gap-3">
                <a href="{{ route('admin.dashboard') }}" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-gold !py-3 !px-6 shadow-xl">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Save Communication Channels
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
