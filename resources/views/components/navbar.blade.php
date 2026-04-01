@php
    $navLinks = [
        ['name' => 'Home', 'href' => '/'],
        ['name' => 'About Us', 'href' => '/about'],
        ['name' => 'Event', 'href' => '/events'],
        ['name' => 'News', 'href' => '/news'],
        ['name' => 'Gallery', 'href' => '/gallery'],
        ['name' => 'Registration', 'href' => '/registration'],
    ];

    $isActive = function($href) {
        if ($href === '/') return request()->is('/');
        if ($href === '#Contact') return false;
        return request()->is(trim($href, '/') . '*');
    };
@endphp

<div 
    x-data="{ 
        isVisible: true, 
        lastPos: 0, 
        mobileMenu: false,
        handleScroll() {
            const currentPos = window.pageYOffset;
            this.isVisible = currentPos < this.lastPos || currentPos < 100;
            this.lastPos = currentPos;
        }
    }" 
    @scroll.window="handleScroll"
    class="relative z-50"
>
    <nav 
        :class="isVisible ? 'translate-y-0' : '-translate-y-32'"
        class="fixed top-6 left-0 right-0 flex justify-center px-4 transition-transform duration-500 ease-out z-50"
    >
        <div class="group relative w-full max-w-6xl">
            <div class="absolute -inset-[1.5px] rounded-full bg-gradient-to-r from-ieee-snowflake via-ieee-ice via-ieee-wind to-ieee-miracle opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-gradient-fast"></div>

            <div class="relative bg-ieee-night/40 backdrop-blur-2xl border border-white/20 rounded-full px-6 py-3 shadow-[0_8px_32px_rgba(0,0,0,0.3)] flex items-center justify-between transition-all duration-500 hover:bg-ieee-night/60 hover:border-white/30">
            
                <a href="/" class="flex items-center gap-2 shrink-0 pl-2">
                    <img src="{{ asset('images/ieeeunripth.png') }}" alt="IEEE UNRI" class="h-10 w-auto object-contain">
                </a>

                <ul class="hidden md:flex items-center gap-1 ml-auto">
                    @foreach($navLinks as $link)
                        @php $active = $isActive($link['href']); @endphp
                        <li class="relative px-1">
                            <a href="{{ url($link['href']) }}"
                                class="relative z-10 block px-5 py-2 text-sm font-bold transition-colors duration-300 {{ $active ? 'text-ieee-miracle' : 'text-ieee-snowflake hover:text-white' }}"
                            >
                                {{ $link['name'] }}
                            </a>
                            
                            @if($active)
                                <div class="absolute inset-0 rounded-full bg-ieee-miracle/10 border border-ieee-miracle/20 shadow-[0_0_15px_rgba(231,185,90,0.3)]"></div>
                            @endif
                        </li>
                    @endforeach
                </ul>

                <button @click="mobileMenu = !mobileMenu" class="md:hidden text-ieee-snowflake hover:text-ieee-miracle transition-colors ml-4 p-2">
                    <template x-if="!mobileMenu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </template>
                    <template x-if="mobileMenu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </template>
                </button>
            </div>
        </div>
    </nav>

    <div 
        x-show="mobileMenu" 
        x-cloak 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 -translate-y-5"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 -translate-y-5"
        class="fixed top-28 left-4 right-4 z-40 md:hidden"
    >
        <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-white/20 bg-ieee-night/40 backdrop-blur-2xl">
            <div class="absolute inset-0 bg-gradient-to-r from-ieee-snowflake/10 via-ieee-ice/10 via-ieee-wind/10 to-ieee-miracle/10 animate-gradient-fast pointer-events-none"></div>
            <div class="relative rounded-[22px] p-6 z-10">
                <ul class="flex flex-col gap-2">
                    @foreach($navLinks as $link)
                        @php $active = $isActive($link['href']); @endphp
                        <li>
                            <a href="{{ url($link['href']) }}" @click="mobileMenu = false"
                                class="flex items-center justify-between px-4 py-4 rounded-2xl transition-all duration-300 border {{ $active ? 'bg-ieee-miracle/10 border-ieee-miracle/30 text-ieee-miracle' : 'border-transparent text-ieee-snowflake hover:bg-white/5 hover:text-white' }}"
                            >
                                <span class="font-bold text-lg tracking-wide">{{ $link['name'] }}</span>
                                @if($active) 
                                    <div class="w-2.5 h-2.5 rounded-full bg-ieee-miracle shadow-[0_0_10px_#E7B95A]"></div> 
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>