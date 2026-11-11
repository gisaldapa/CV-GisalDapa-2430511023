<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RPG Admin - @yield('title', 'Command Center')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800;900&family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#10131D] text-[#F0EDE8] antialiased min-h-screen font-sans flex flex-col md:flex-row">

    <!-- Mobile Header -->
    <div class="md:hidden flex items-center justify-between p-4 bg-[#0D1018] border-b border-[#D6AC55]/30">
        <div class="flex items-center gap-2">
            <span class="text-[#D6AC55] text-lg font-bold font-rpg">⚔️ RPG ADMIN</span>
        </div>
        <button id="admin-mobile-toggle" type="button" class="text-[#D6AC55] hover:text-white p-2">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Admin Sidebar -->
    <aside id="admin-sidebar" class="admin-sidebar hidden md:flex flex-col justify-between">
        <div>
            <!-- Guild Emblem Header -->
            <div class="p-5 border-b border-[#D6AC55]/20 flex items-center gap-3">
                <div class="w-10 h-10 rounded border border-[#D6AC55] bg-[#10131D] flex items-center justify-center text-[#D6AC55] shadow-md shadow-[#D6AC55]/20">
                    <i class="fa-solid fa-crown text-lg"></i>
                </div>
                <div>
                    <h2 class="font-rpg text-sm font-bold tracking-wider text-[#D6AC55] leading-tight">REALM MASTER</h2>
                    <span class="text-[10px] text-[#54D5E8] tracking-widest uppercase font-mono">Guild Controller</span>
                </div>
            </div>

            <!-- User status badge -->
            <div class="px-5 py-3 bg-[#161C2E]/60 border-b border-[#D6AC55]/10 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-[#D6AC55]/20 border border-[#D6AC55]/40 flex items-center justify-center text-xs text-[#D6AC55] font-bold">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->name ?? 'Game Master' }}</p>
                    <span class="text-[10px] text-[#22c55e] flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#22c55e] inline-block animate-pulse"></span> Online
                    </span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="py-3 overflow-y-auto max-h-[calc(100vh-210px)]">
                <div class="admin-nav-category">Command</div>
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge-high w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.personal.edit') }}" class="admin-nav-link {{ request()->routeIs('admin.personal.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-id-card-clip w-5 text-center"></i>
                    <span>Character Status</span>
                </a>

                <div class="admin-nav-category">Hero Stats & Progress</div>
                <a href="{{ route('admin.educations.index') }}" class="admin-nav-link {{ request()->routeIs('admin.educations.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-graduation-cap w-5 text-center"></i>
                    <span>Education (Academia)</span>
                </a>
                <a href="{{ route('admin.skills.index') }}" class="admin-nav-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-wand-sparkles w-5 text-center"></i>
                    <span>Skills (Abilities)</span>
                </a>

                <div class="admin-nav-category">Campaign History</div>
                <a href="{{ route('admin.experiences.index') }}" class="admin-nav-link {{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-briefcase w-5 text-center"></i>
                    <span>Experience Logs</span>
                </a>
                <a href="{{ route('admin.experience-photos.index') }}" class="admin-nav-link {{ request()->routeIs('admin.experience-photos.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-images w-5 text-center"></i>
                    <span>Experience Gallery</span>
                </a>

                <div class="admin-nav-category">Loot & Achievements</div>
                <a href="{{ route('admin.certificates.index') }}" class="admin-nav-link {{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-award w-5 text-center"></i>
                    <span>Certificates</span>
                </a>
                <a href="{{ route('admin.certificate-photos.index') }}" class="admin-nav-link {{ request()->routeIs('admin.certificate-photos.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-file-image w-5 text-center"></i>
                    <span>Certificate Photos</span>
                </a>

                <div class="admin-nav-category">Side Quests & Comms</div>
                <a href="{{ route('admin.hobbies.index') }}" class="admin-nav-link {{ request()->routeIs('admin.hobbies.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-gamepad w-5 text-center"></i>
                    <span>Hobbies & Activities</span>
                </a>
                <a href="{{ route('admin.contacts.edit') }}" class="admin-nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-envelope-open-text w-5 text-center"></i>
                    <span>Contact Info</span>
                </a>

                <div class="admin-nav-category">Realm Security</div>
                <a href="{{ route('admin.change-password') }}" class="admin-nav-link {{ request()->routeIs('admin.change-password*') ? 'active' : '' }}">
                    <i class="fa-solid fa-key w-5 text-center"></i>
                    <span>Change Password</span>
                </a>
                <a href="{{ route('home') }}" target="_blank" class="admin-nav-link hover:text-[#54D5E8]">
                    <i class="fa-solid fa-arrow-up-right-from-square w-5 text-center"></i>
                    <span>View Public CV</span>
                </a>
            </nav>
        </div>

        <!-- Logout Bottom Bar -->
        <div class="p-4 border-t border-[#D6AC55]/20 bg-[#0D1018]/90">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full btn-danger !justify-center text-xs !py-2.5">
                    <i class="fa-solid fa-door-open mr-1"></i> Exit Realm (Logout)
                </button>
            </form>
        </div>
    </aside>

    <!-- Content Workspace -->
    <div class="flex-1 flex flex-col min-w-0 min-h-screen">
        <!-- Top Realm Bar -->
        <header class="hidden md:flex items-center justify-between px-8 py-4 bg-[#141A28] border-b border-[#D6AC55]/20">
            <div class="flex items-center gap-3">
                <span class="text-xs uppercase font-serif tracking-widest text-[#D6AC55]">⚔️ Guild Control Deck</span>
                <span class="text-[#D6AC55]/30">|</span>
                <span class="text-xs text-[#B8B4AC]">Session: Level 12 Admin</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" target="_blank" class="btn-outline !py-1.5 !px-3 text-xs">
                    <i class="fa-solid fa-eye mr-1"></i> Public View
                </a>
                <span class="text-xs text-[#B8B4AC] font-mono">{{ now()->format('d M Y - H:i') }}</span>
            </div>
        </header>

        <!-- Flash messages -->
        <div class="px-6 pt-4">
            @if(session('success'))
                <div class="p-4 rounded-lg bg-[#1B2233] border-l-4 border-[#D6AC55] text-white flex items-center justify-between shadow-lg">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-[#D6AC55] text-lg"></i>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-[#B8B4AC] hover:text-white">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="p-4 rounded-lg bg-[#1B2233] border-l-4 border-red-500 text-white flex items-center justify-between shadow-lg">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-triangle-exclamation text-red-500 text-lg"></i>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-[#B8B4AC] hover:text-white">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 rounded-lg bg-[#1B2233] border-l-4 border-red-500 text-white shadow-lg space-y-1">
                    <div class="flex items-center gap-2 text-red-400 font-semibold text-sm">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>Quest Validation Failed:</span>
                    </div>
                    <ul class="list-disc list-inside text-xs text-[#B8B4AC] pl-2">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Main Body -->
        <main class="flex-1 p-6 md:p-8 overflow-y-auto">
            @yield('content')
        </main>
    </div>

    <!-- Toast container -->
    <div id="toast-container" class="toast-container"></div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('admin-mobile-toggle');
            const sidebar = document.getElementById('admin-sidebar');
            if (toggle && sidebar) {
                toggle.addEventListener('click', () => {
                    sidebar.classList.toggle('hidden');
                });
            }
        });
    </script>

    @yield('scripts')
</body>
</html>
