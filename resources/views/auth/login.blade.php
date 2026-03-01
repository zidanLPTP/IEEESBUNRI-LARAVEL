<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Access | IEEE Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } [x-cloak] { display: none !important; } </style>
</head>
<body class="bg-[#0C101C] min-h-screen flex items-center justify-center relative overflow-hidden px-4 selection:bg-[#E7B95A] selection:text-[#0C101C]">

    <div class="absolute top-[-10%] left-[-5%] w-[500px] h-[500px] bg-[#3386B7] opacity-10 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-[-10%] right-[-5%] w-[500px] h-[500px] bg-[#E7B95A] opacity-10 rounded-full blur-[120px]"></div>

    <div class="w-full max-w-md bg-[#151b2b] border border-white/5 rounded-3xl p-8 shadow-2xl relative z-10" 
         x-data="{ isLoading: false }">
        
        <div class="text-center mb-8">
            <div class="w-14 h-14 bg-[#E7B95A] rounded-2xl flex items-center justify-center mx-auto mb-4 text-[#0C101C] font-bold text-2xl shadow-lg shadow-yellow-500/20">
                I
            </div>
            <h1 class="text-2xl font-bold text-white uppercase tracking-tight">Member Access</h1>
            <p class="text-gray-500 text-sm mt-1">IEEE Student Branch University of Riau</p>
        </div>

        @if($errors->has('loginError'))
            <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-xs flex items-center gap-3 animate-pulse">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                <span>{{ $errors->first('loginError') }}</span>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" @submit="isLoading = true">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase mb-2 tracking-widest ml-1">Full Name</label>
                    <input type="text" name="name" required value="{{ old('name') }}"
                        class="w-full bg-[#0C101C] border border-white/10 rounded-xl py-4 px-4 text-white focus:border-[#E7B95A] outline-none transition-all placeholder:text-gray-700"
                        placeholder="Your registered name">
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-500 uppercase mb-2 tracking-widest ml-1">IEEE ID / Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-[#0C101C] border border-white/10 rounded-xl py-4 px-4 text-white focus:border-[#E7B95A] outline-none transition-all placeholder:text-gray-700"
                        placeholder="Your unique ID">
                </div>

                <button type="submit" :disabled="isLoading"
                        class="w-full bg-white text-[#0C101C] font-bold py-4 rounded-xl hover:bg-[#E7B95A] transition-all flex items-center justify-center shadow-lg disabled:opacity-50 disabled:cursor-not-allowed">
                    <span x-show="!isLoading">Verify & Sign In</span>
                    <span x-show="isLoading" class="flex items-center gap-2" x-cloak>
                        <svg class="animate-spin h-5 w-5 text-[#0C101C]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        Verifying...
                    </span>
                </button>
            </div>
        </form>

        <div class="mt-8 pt-6 border-t border-white/5 text-center">
            <a href="/" class="text-xs text-gray-500 hover:text-white transition-colors flex items-center justify-center gap-2">
                ← Back to Homepage
            </a>
        </div>
    </div>
</body>
</html>