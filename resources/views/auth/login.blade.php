<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Access | IEEE Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }
    </style>
    <link rel="icon" href="{{ asset('images/favicons.png') }}" sizes="any">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicons.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicons.png') }}">
</head>

<body
    class="bg-[#0C101C] min-h-screen relative overflow-hidden text-white selection:bg-[#E7B95A] selection:text-[#0C101C]">

    <!-- CSS Nebula Background (Zero Images) -->
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[600px] h-[600px] bg-[#3386B7] opacity-20 rounded-full blur-[120px] mix-blend-screen animate-pulse"
            style="animation-duration: 8s;"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[600px] h-[600px] bg-[#E7B95A] opacity-10 rounded-full blur-[150px] mix-blend-screen animate-pulse"
            style="animation-duration: 10s;"></div>
        <div class="absolute top-[40%] left-[60%] w-[400px] h-[400px] bg-indigo-500 opacity-10 rounded-full blur-[100px] mix-blend-screen animate-pulse"
            style="animation-duration: 12s;"></div>
    </div>

    <!-- Main Container -->
    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">

        <div class="w-full max-w-5xl bg-white/5 backdrop-blur-2xl border border-white/10 rounded-[2rem] shadow-[0_8px_32px_rgba(0,0,0,0.5)] overflow-hidden lg:grid lg:grid-cols-2"
            x-data="{ isLoading: false, hideEyes: false }">

            <!-- Left Column: Form -->
            <div class="p-8 md:p-12 lg:p-16 flex flex-col justify-center relative z-20">
                <div class="mb-10">
                    <div class="inline-flex items-center justify-center w-auto h-auto rounded-xl 
                        bg-gradient-to-br from-[#E7B95A] to-amber-600 
                        shadow-[0_0_20px_rgba(231,185,90,0.4)] mb-6 p-2">

                        <img src="{{ asset('images/3logo.png') }}" class="w-full h-full object-contain">
                    </div>
                    <h1
                        class="text-3xl md:text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-white to-gray-400 tracking-tight mb-2">
                        Member Access</h1>
                    <p class="text-gray-400 text-sm md:text-base font-medium">IEEE Student Branch University of Riau</p>
                </div>

                @if($errors->has('loginError'))
                    <div
                        class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-sm flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" x2="12" y1="8" y2="12" />
                            <line x1="12" x2="12.01" y1="16" y2="16" />
                        </svg>
                        <span>{{ $errors->first('loginError') }}</span>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST" @submit="isLoading = true">
                    @csrf

                    <div class="space-y-6">
                        <div>
                            <label
                                class="block text-xs font-bold text-[#E7B95A] uppercase tracking-wider mb-2 ml-1">Full
                                Name</label>
                            <div class="relative group">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-500 group-focus-within:text-[#3386B7] transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                </div>
                                <input type="text" name="name" required value="{{ old('name') }}"
                                    class="w-full bg-[#0C101C]/50 border border-white/10 rounded-xl py-4 pl-12 pr-4 text-white focus:border-[#3386B7] focus:ring-1 focus:ring-[#3386B7] outline-none transition-all placeholder:text-gray-600 shadow-inner"
                                    placeholder="Registered Name">
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-xs font-bold text-[#E7B95A] uppercase tracking-wider mb-2 ml-1">IEEE
                                ID / Password</label>
                            <div class="relative group">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-500 group-focus-within:text-[#3386B7] transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                </div>
                                <input type="password" name="password" required @focus="hideEyes = true"
                                    @blur="hideEyes = false"
                                    class="w-full bg-[#0C101C]/50 border border-white/10 rounded-xl py-4 pl-12 pr-4 text-white focus:border-[#3386B7] focus:ring-1 focus:ring-[#3386B7] outline-none transition-all placeholder:text-gray-600 shadow-inner"
                                    placeholder="Unique Access Key">
                            </div>
                        </div>

                        <button type="submit" :disabled="isLoading"
                            class="w-full mt-2 bg-gradient-to-r from-[#3386B7] to-[#1a5b82] text-white font-bold py-4 rounded-xl hover:shadow-[0_0_20px_rgba(51,134,183,0.4)] hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:translate-y-0 relative overflow-hidden group">

                            <!-- Button Shine Effect -->
                            <div
                                class="absolute inset-0 -translate-x-full group-hover:animate-[shimmer_1.5s_infinite] bg-gradient-to-r from-transparent via-white/20 to-transparent">
                            </div>

                            <span x-show="!isLoading" class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                                    <polyline points="10 17 15 12 10 7" />
                                    <line x1="15" y1="12" x2="3" y2="12" />
                                </svg>
                                Authenticate
                            </span>
                            <span x-show="isLoading" class="flex items-center gap-2" x-cloak>
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Verifying Protocol...
                            </span>
                        </button>
                    </div>
                </form>

                <div class="mt-8 pt-6 border-t border-white/5 text-center">
                    <a href="/"
                        class="text-xs text-gray-500 hover:text-white transition-colors flex items-center justify-center gap-2 group">
                        <span class="group-hover:-translate-x-1 transition-transform">←</span> Return to Base
                    </a>
                </div>
            </div>

            <!-- Right Column: IEEE Guard Bot Visual -->
            <div
                class="hidden lg:flex relative bg-gradient-to-br from-[#0C101C]/80 to-[#10192b]/90 border-l border-white/5 items-center justify-center flex-col p-12 overflow-hidden">
                <!-- Decorative grid background -->
                <div
                    class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+PGRlZnM+PHBhdHRlcm4gaWQ9ImciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTTAgNDBoNDBWMEgweiIgZmlsbD0ibm9uZSIvPjxwYXRoIGQ9Ik0wIDQwaDQwVjBIMHptMjAgMjB2MjBIMjBWMjB6IiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDMpIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2cpIi8+PC9zdmc+')] opacity-50">
                </div>

                <!-- Glowing bot shadow -->
                <div class="absolute w-72 h-72 bg-[#3386B7] blur-[120px] rounded-full opacity-30 animate-pulse"
                    style="animation-duration: 4s;"></div>

                <!-- IEEE Guard Bot SVG -->
                <div class="relative z-10 drop-shadow-[0_0_30px_rgba(51,134,183,0.3)] transition-transform duration-500"
                    :class="hideEyes ? 'scale-[1.02]' : 'scale-100 hover:scale-105 hover:-translate-y-2'">
                    <svg viewBox="0 0 200 200" class="w-64 h-64 lg:w-80 lg:h-80">
                        <defs>
                            <linearGradient id="bodyGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#fff" stop-opacity="0.1" />
                                <stop offset="100%" stop-color="#fff" stop-opacity="0.0" />
                            </linearGradient>
                            <linearGradient id="visorGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#0C101C" stop-opacity="0.9" />
                                <stop offset="100%" stop-color="#151b2b" stop-opacity="0.9" />
                            </linearGradient>
                            <filter id="glow" x="-20%" y="-20%" width="140%" height="140%">
                                <feGaussianBlur stdDeviation="4" result="blur" />
                                <feComposite in="SourceGraphic" in2="blur" operator="over" />
                            </filter>
                        </defs>

                        <!-- Floating Ring removed per request -->
                        <!-- Bot Head Shape (Shield) -->
                        <path d="M50 40 L150 40 L170 100 Q170 150 100 170 Q30 150 30 100 Z" fill="url(#bodyGrad)"
                            stroke="#3386B7" stroke-width="3" style="backdrop-filter: blur(10px);" />

                        <!-- Inner Head Plate -->
                        <path d="M60 50 L140 50 L155 95 Q155 140 100 155 Q45 140 45 95 Z" fill="rgba(51,134,183,0.1)"
                            stroke="rgba(255,255,255,0.1)" stroke-width="1" />

                        <!-- Main Visor Screen -->
                        <path d="M45 80 L155 80 L160 115 Q155 135 100 150 Q45 135 40 115 Z" fill="url(#visorGrad)"
                            stroke="rgba(255,255,255,0.1)" stroke-width="2" />

                        <!-- NEUTRAL STATE: Glowing Eyes -->
                        <g x-show="!hideEyes" x-transition.opacity.duration.300ms class="text-[#E7B95A] fill-current">
                            <!-- Left Eye -->
                            <rect x="75" y="95" width="12" height="12" rx="3" class="animate-pulse"
                                style="animation-duration: 2s;" filter="url(#glow)" />
                            <circle cx="81" cy="101" r="2" fill="#fff" />

                            <!-- Right Eye -->
                            <rect x="113" y="95" width="12" height="12" rx="3" class="animate-pulse"
                                style="animation-duration: 2.2s;" filter="url(#glow)" />
                            <circle cx="119" cy="101" r="2" fill="#fff" />

                            <!-- Scanner line -->
                            <line x1="50" y1="125" x2="150" y2="125" stroke="#3386B7" stroke-width="1"
                                stroke-dasharray="2 4" class="opacity-40 animate-pulse" />
                        </g>

                        <!-- PRIVACY STATE: Squinting Eyes & Locking Shield -->
                        <g x-show="hideEyes" x-cloak x-transition.opacity.duration.300ms
                            class="text-[#3386B7] fill-current">
                            <!-- Squint Left Eye -->
                            <rect x="70" y="100" width="22" height="3" rx="1.5" fill="#E7B95A" filter="url(#glow)" />
                            <!-- Squint Right Eye -->
                            <rect x="108" y="100" width="22" height="3" rx="1.5" fill="#E7B95A" filter="url(#glow)" />

                            <!-- Privacy Locking Shield moving up -->
                            <g class="transition-transform duration-500 ease-out translate-y-0 opacity-100"
                                x-transition:enter-start="translate-y-8 opacity-0">
                                <path d="M65 170 L65 120 Q100 110 135 120 L135 170 Z" fill="url(#bodyGrad)"
                                    stroke="#E7B95A" stroke-width="2" />
                                <!-- Crosshatch Pattern on Shield -->
                                <path d="M70 130 L130 130 M70 140 L130 140 M70 150 L130 150 M70 160 L130 160"
                                    stroke="#E7B95A" stroke-width="0.5" stroke-dasharray="2 2" class="opacity-30" />

                                <!-- Padlock Icon -->
                                <rect x="92" y="138" width="16" height="12" rx="2" fill="#E7B95A" />
                                <path d="M96 138 V133 A4 4 0 0 1 104 133 V138" fill="none" stroke="#E7B95A"
                                    stroke-width="2" stroke-linecap="round" />
                                <circle cx="100" cy="144" r="1.5" fill="#0C101C" />
                            </g>
                        </g>

                        <!-- Top Antenna -->
                        <line x1="100" y1="40" x2="100" y2="15" stroke="#3386B7" stroke-width="2" />
                        <circle cx="100" cy="15" r="5" fill="#E7B95A" filter="url(#glow)" class="animate-pulse"
                            style="animation-duration: 3s;" />
                        <circle cx="100" cy="15" r="2" fill="#fff" />

                    </svg>
                </div>
            </div>
        </div>

        <!-- Footer / Credits -->
        <div class="absolute bottom-6 w-full text-center pointer-events-none z-10">
            <p class="text-[10px] text-white/30 tracking-[0.2em] font-medium uppercase">Admin Zone || IEEE UNRI</p>
        </div>
    </div>

</body>

</html>