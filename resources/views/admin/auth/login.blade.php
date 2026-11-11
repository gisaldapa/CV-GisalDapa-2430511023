<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPG Admin - Portal Gate</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#10131D] text-[#F0EDE8] antialiased min-h-screen flex items-center justify-center p-4 selection:bg-[#D6AC55] selection:text-[#10131D]">

    <!-- Ambient Glow Background -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[#D6AC55]/5 rounded-full blur-3xl"></div>
    </div>

    <!-- Login Container -->
    <div class="w-full max-w-md relative z-10">
        
        <!-- Emblems Top -->
        <div class="text-center mb-6">
            <div class="w-16 h-16 mx-auto rounded-2xl bg-[#1B2233] border-2 border-[#D6AC55] flex items-center justify-center text-[#D6AC55] text-2xl shadow-xl shadow-[#D6AC55]/20 mb-3">
                <i class="fa-solid fa-dungeon"></i>
            </div>
            <h1 class="font-rpg text-2xl sm:text-3xl font-bold tracking-wider text-[#D6AC55]">
                GUILD CONTROL GATE
            </h1>
            <p class="text-xs text-[#B8B4AC] mt-1 font-serif tracking-widest uppercase">
                ⚔️ Authenticate to enter the command realm ⚔️
            </p>
        </div>

        <!-- RPG Login Panel -->
        <div class="rpg-panel rpg-corner p-8 rounded-2xl border border-[#D6AC55]/40 shadow-2xl">
            
            @if(session('success'))
                <div class="mb-5 p-3 rounded-lg bg-emerald-950/80 border border-emerald-500/50 text-emerald-200 text-xs flex items-center gap-2">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-5 p-3 rounded-lg bg-red-950/80 border border-red-500/50 text-red-200 text-xs space-y-1">
                    <div class="font-bold flex items-center gap-1.5">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Gate Access Denied:</span>
                    </div>
                    <ul class="list-disc list-inside pl-1 text-[11px]">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email / Account Field -->
                <div>
                    <label for="email" class="rpg-label flex items-center gap-2">
                        <i class="fa-solid fa-envelope text-xs"></i>
                        <span>Guild Email (Admin Account)</span>
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus
                           placeholder="admin@cvgisaldapa.com"
                           class="rpg-input">
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="rpg-label flex items-center gap-2">
                        <i class="fa-solid fa-key text-xs"></i>
                        <span>Secret Passphrase</span>
                    </label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           required 
                           placeholder="••••••••"
                           class="rpg-input">
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 cursor-pointer text-[#B8B4AC] hover:text-white">
                        <input type="checkbox" name="remember" class="rounded bg-[#10131D] border-[#D6AC55]/40 text-[#D6AC55] focus:ring-0 focus:ring-offset-0">
                        <span>Preserve Session Rune</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full btn-gold !py-3 justify-center text-sm shadow-xl">
                    <i class="fa-solid fa-lock-open mr-2"></i>
                    <span>Unlock Command Deck</span>
                </button>
            </form>

            <div class="mt-6 pt-4 border-t border-[#D6AC55]/15 text-center">
                <a href="{{ route('home') }}" class="text-xs text-[#54D5E8] hover:text-[#D6AC55] transition-colors inline-flex items-center gap-1.5">
                    <i class="fa-solid fa-arrow-left text-[10px]"></i>
                    <span>Return to Public Kingdom</span>
                </a>
            </div>

        </div>

        <!-- Footer Notice -->
        <p class="text-center text-[11px] text-[#B8B4AC]/50 mt-6 font-mono">
            &copy; {{ date('Y') }} RPG CV Guild Management • Laravel 12 Session Guard
        </p>
    </div>

</body>
</html>
