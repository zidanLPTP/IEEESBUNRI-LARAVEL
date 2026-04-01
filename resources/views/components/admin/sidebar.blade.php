<aside :class="isSidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-[#151b2b] border-r border-white/5 flex flex-col h-screen overflow-y-auto transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:sticky md:top-0">
    <div class="p-8 flex items-center justify-between gap-3">
        <div class="flex items-center gap-3">
            <div
                class="w-8 h-8 rounded bg-gradient-to-br from-[#E7B95A] to-[#F4D03F] flex items-center justify-center text-[#0C101C] font-bold">
                I
            </div>
            <div>
                <h1 class="font-bold text-lg leading-none">IEEE Admin</h1>
                <span class="text-[10px] text-gray-500 uppercase tracking-wider">Control Panel</span>
            </div>
        </div>
        <button @click="isSidebarOpen = false" class="md:hidden text-gray-400 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
            </svg>
        </button>
    </div>

    <nav class="flex-1 px-4 space-y-2">
        <a href="{{ url('/admin') }}"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->is('admin') ? 'bg-[#E7B95A] text-[#0C101C]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="7" height="9" x="3" y="3" rx="1" />
                <rect width="7" height="5" x="14" y="3" rx="1" />
                <rect width="7" height="9" x="14" y="12" rx="1" />
                <rect width="7" height="5" x="3" y="16" rx="1" />
            </svg>
            Overview
        </a>

        <div class="mt-6 mb-2 px-4 text-[10px] font-bold text-gray-500 uppercase tracking-wider">
            Personnel Management
        </div>
        <a href="{{ url('/admin/pengurus') }}"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->is('admin/pengurus') ? 'bg-[#E7B95A] text-[#0C101C]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            All Personnel
        </a>

        <div class="mt-6 mb-2 px-4 text-[10px] font-bold text-gray-500 uppercase tracking-wider">
            Content Management
        </div>
        <a href="{{ url('/admin/events/create') }}"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->is('admin/events/create') ? 'bg-[#E7B95A] text-[#0C101C]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                <line x1="16" x2="16" y1="2" y2="6" />
                <line x1="8" x2="8" y1="2" y2="6" />
                <line x1="3" x2="21" y1="10" y2="10" />
            </svg>
            Events
        </a>
        <a href="{{ url('/admin/news/create') }}"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->is('admin/news/create') ? 'bg-[#E7B95A] text-[#0C101C]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path
                    d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                <path d="M18 14h-8" />
                <path d="M15 18h-5" />
                <path d="M10 6h8v4h-8V6Z" />
            </svg>
            News
        </a>
        <a href="{{ url('/admin/gallery/create') }}"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ request()->is('admin/gallery/create') ? 'bg-[#E7B95A] text-[#0C101C]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                <circle cx="9" cy="9" r="2" />
                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
            </svg>
            Gallery
        </a>
    </nav>

    <div class="p-4 border-t border-white/5 mt-auto">
        <div class="flex items-center gap-3 mb-4 px-4">
            <div
                class="w-10 h-10 rounded-full bg-gray-700 overflow-hidden relative border border-white/10 flex items-center justify-center bg-[#E7B95A] text-[#0C101C] font-bold">
                {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
            </div>
            <div class="overflow-hidden">
                <p class="text-sm font-bold truncate w-32">{{ auth()->user()->name ?? 'Guest' }}</p>
                <p class="text-[10px] text-gray-500 truncate">{{ auth()->user()->accessRole ?? 'Role Placeholder' }}</p>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-4 py-3 text-sm font-bold text-red-400 hover:bg-red-500/10 rounded-xl transition-all group">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="group-hover:scale-110 transition-transform">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" x2="9" y1="12" y2="12" />
                </svg>
                Sign Out
            </button>
        </form>
    </div>
</aside>