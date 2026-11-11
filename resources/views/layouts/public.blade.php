<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CV RPG Website') }} - @yield('title', 'Hero Journey')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800;900&family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#10131D] text-[#F0EDE8] antialiased min-h-screen flex flex-col font-sans selection:bg-[#D6AC55] selection:text-[#10131D]">

    <!-- RPG Page Loader -->
    <div id="rpg-loader" class="rpg-loader">
        <div class="text-center">
            <div class="loader-rune">⚔️ LOADING REALM ⚔️</div>
            <p class="text-xs tracking-widest text-[#D6AC55] mt-2 uppercase font-serif">Preparing Adventurer Status...</p>
        </div>
    </div>

    <!-- Navigation Header -->
    <header class="public-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- RPG Logo / Banner -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-lg border border-[#D6AC55]/50 bg-[#1B2233] flex items-center justify-center text-[#D6AC55] shadow-lg shadow-[#D6AC55]/10 group-hover:scale-105 group-hover:border-[#D6AC55] transition-all duration-300">
                        <i class="fa-solid fa-shield-halved text-xl"></i>
                    </div>
                    <div>
                        <span class="font-rpg text-xl font-bold tracking-wider text-[#D6AC55] block leading-tight">GISALDAPA</span>
                        <span class="text-[10px] tracking-widest text-[#54D5E8] uppercase font-mono">Level 24 • Adventurer</span>
                    </div>
                </a>

                <!-- Desktop Nav Links -->
                <nav class="hidden md:flex items-center gap-6">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fa-solid fa-campground text-xs mr-1 opacity-70"></i> Home
                    </a>
                    <a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-shield text-xs mr-1 opacity-70"></i> Profile
                    </a>
                    <a href="{{ route('education') }}" class="nav-link {{ request()->routeIs('education') ? 'active' : '' }}">
                        <i class="fa-solid fa-scroll text-xs mr-1 opacity-70"></i> Education
                    </a>
                    <a href="{{ route('skills') }}" class="nav-link {{ request()->routeIs('skills') ? 'active' : '' }}">
                        <i class="fa-solid fa-wand-magic-sparkles text-xs mr-1 opacity-70"></i> Skills
                    </a>
                    <a href="{{ route('experience') }}" class="nav-link {{ request()->routeIs('experience') ? 'active' : '' }}">
                        <i class="fa-solid fa-dungeon text-xs mr-1 opacity-70"></i> Experience
                    </a>
                    <a href="{{ route('certificates') }}" class="nav-link {{ request()->routeIs('certificates') ? 'active' : '' }}">
                        <i class="fa-solid fa-trophy text-xs mr-1 opacity-70"></i> Achievements
                    </a>
                    <a href="{{ route('hobbies') }}" class="nav-link {{ request()->routeIs('hobbies') ? 'active' : '' }}">
                        <i class="fa-solid fa-compass text-xs mr-1 opacity-70"></i> Quests
                    </a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <i class="fa-solid fa-feather text-xs mr-1 opacity-70"></i> Contact
                    </a>
                </nav>

                <!-- Action CTA -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('contact') }}" class="btn-gold !py-2 !px-4 text-xs">
                        <i class="fa-solid fa-paper-plane mr-1"></i> Send Quest
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" type="button" class="md:hidden text-[#D6AC55] hover:text-white p-2 rounded-md focus:outline-none">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Nav Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-[#D6AC55]/20 bg-[#161C2E]/95 backdrop-blur-md px-4 pt-3 pb-5 space-y-2">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded text-sm {{ request()->routeIs('home') ? 'text-[#D6AC55] bg-[#1B2233]' : 'text-[#B8B4AC] hover:text-white' }}">
                <i class="fa-solid fa-campground mr-2"></i> Home
            </a>
            <a href="{{ route('profile') }}" class="block px-3 py-2 rounded text-sm {{ request()->routeIs('profile') ? 'text-[#D6AC55] bg-[#1B2233]' : 'text-[#B8B4AC] hover:text-white' }}">
                <i class="fa-solid fa-user-shield mr-2"></i> Profile
            </a>
            <a href="{{ route('education') }}" class="block px-3 py-2 rounded text-sm {{ request()->routeIs('education') ? 'text-[#D6AC55] bg-[#1B2233]' : 'text-[#B8B4AC] hover:text-white' }}">
                <i class="fa-solid fa-scroll mr-2"></i> Education
            </a>
            <a href="{{ route('skills') }}" class="block px-3 py-2 rounded text-sm {{ request()->routeIs('skills') ? 'text-[#D6AC55] bg-[#1B2233]' : 'text-[#B8B4AC] hover:text-white' }}">
                <i class="fa-solid fa-wand-magic-sparkles mr-2"></i> Skills
            </a>
            <a href="{{ route('experience') }}" class="block px-3 py-2 rounded text-sm {{ request()->routeIs('experience') ? 'text-[#D6AC55] bg-[#1B2233]' : 'text-[#B8B4AC] hover:text-white' }}">
                <i class="fa-solid fa-dungeon mr-2"></i> Experience
            </a>
            <a href="{{ route('certificates') }}" class="block px-3 py-2 rounded text-sm {{ request()->routeIs('certificates') ? 'text-[#D6AC55] bg-[#1B2233]' : 'text-[#B8B4AC] hover:text-white' }}">
                <i class="fa-solid fa-trophy mr-2"></i> Achievements
            </a>
            <a href="{{ route('hobbies') }}" class="block px-3 py-2 rounded text-sm {{ request()->routeIs('hobbies') ? 'text-[#D6AC55] bg-[#1B2233]' : 'text-[#B8B4AC] hover:text-white' }}">
                <i class="fa-solid fa-compass mr-2"></i> Quests
            </a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded text-sm {{ request()->routeIs('contact') ? 'text-[#D6AC55] bg-[#1B2233]' : 'text-[#B8B4AC] hover:text-white' }}">
                <i class="fa-solid fa-feather mr-2"></i> Contact
            </a>
            <div class="pt-2">
                <a href="{{ route('admin.login') }}" class="block text-center btn-outline !py-2 text-xs">
                    <i class="fa-solid fa-lock mr-1"></i> Admin Portal
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- RPG Footer -->
    <footer class="border-t border-[#D6AC55]/20 bg-[#0D1018] py-8 text-[#B8B4AC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <div class="flex items-center justify-center gap-3">
                <span class="h-px w-16 bg-gradient-to-r from-transparent to-[#D6AC55]"></span>
                <span class="font-rpg text-[#D6AC55] text-sm tracking-widest uppercase">⚔️ The Realm of Gisaldapa ⚔️</span>
                <span class="h-px w-16 bg-gradient-to-l from-transparent to-[#D6AC55]"></span>
            </div>
            <p class="text-xs text-[#B8B4AC]/70 max-w-xl mx-auto font-story text-base">
                "Not all those who wander are lost; some are just leveling up their skills across the realms of code and creativity."
            </p>
            <div class="flex items-center justify-center gap-6 text-sm">
                <a href="{{ route('home') }}" class="hover:text-[#D6AC55] transition-colors">Base Camp</a>
                <span class="text-[#D6AC55]/40">•</span>
                <a href="{{ route('skills') }}" class="hover:text-[#D6AC55] transition-colors">Skill Tree</a>
                <span class="text-[#D6AC55]/40">•</span>
                <a href="{{ route('experience') }}" class="hover:text-[#D6AC55] transition-colors">Quest Log</a>
                <span class="text-[#D6AC55]/40">•</span>
                <a href="{{ route('admin.login') }}" class="hover:text-[#54D5E8] transition-colors"><i class="fa-solid fa-key mr-1"></i>Admin</a>
            </div>
            <p class="text-[11px] text-[#B8B4AC]/50">
                &copy; {{ date('Y') }} Gisaldapa (2430511023). Crafted with Laravel 12 & RPG Fantasy Spirit.
            </p>
        </div>
    </footer>

    <!-- Lightbox Modal -->
    <div id="lightbox-overlay" class="lightbox-overlay">
        <div class="relative max-w-4xl mx-auto p-4">
            <button type="button" onclick="document.getElementById('lightbox-overlay').classList.remove('active')" class="absolute top-2 right-2 text-white bg-black/60 rounded-full w-10 h-10 flex items-center justify-center hover:bg-black/90 text-lg transition-all z-10">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <img id="lightbox-img" class="lightbox-img mx-auto max-h-[85vh] shadow-2xl rounded-lg" src="" alt="Enlarged View">
        </div>
    </div>

    <!-- Back to Top Button -->
    <a href="#" id="back-to-top" title="Ascend to Top">
        <i class="fa-solid fa-chevron-up"></i>
    </a>

    <!-- Toast Container -->
    <div id="toast-container" class="toast-container"></div>

    @yield('scripts')
</body>
</html>
