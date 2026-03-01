@php
    // Konfigurasi Navigasi
    $navLinks = [
        ['name' => 'Home', 'href' => '/'],
        ['name' => 'About Us', 'href' => '/about'],
        ['name' => 'Event', 'href' => '/events'],
        ['name' => 'News', 'href' => '/news'],
        ['name' => 'Gallery', 'href' => '/gallery'],
        ['name' => 'Contact Us', 'href' => '#Contact'], // Diubah agar fokus ke ID internal
    ];

    // FIX: Helper Function agar Contact tidak ikut menyala saat di Home
    $isActive = function($href) {
        if ($href === '/') {
            return request()->is('/') && !str_contains(request()->fullUrl(), '#Contact');
        }
        if ($href === '#Contact') {
            return false; // Contact Us tidak pernah punya status 'active' permanen karena hanya anchor
        }
        return request()->is(trim($href, '/') . '*');
    };
@endphp

<div 
    x-data="{ 
        isVisible: true, 
        lastPos: 0, 
        mobileMenu: false,
        // Fungsi Scroll Halus dengan Animasi Spesial
        scrollToContact() {
            const target = document.getElementById('Contact');
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
                // Animasi Spesial: Memberi efek 'Highlight' sementara pada section Contact
                target.classList.add('ring-4', 'ring-[#E7B95A]/50', 'transition-all', 'duration-1000');
                setTimeout(() => {
                    target.classList.remove('ring-4', 'ring-[#E7B95A]/50');
                }, 2000);
            }
        },
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
            <div class="absolute -inset-[1.5px] rounded-full bg-gradient-to-r from-ieee-snowflake via-ieee-ice via-ieee-wind to-ieee-miracle opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

            <div class="relative bg-ieee-night/90 backdrop-blur-xl border border-white/10 rounded-full px-6 py-3 shadow-2xl flex items-center justify-between transition-all duration-300 group-hover:border-transparent">
            
                <a href="/" class="flex items-center gap-2 shrink-0 pl-2">
                    <div class="w-28 h-auto">
                        <img src="{{ asset('images/ieeeunri.jpg') }}" alt="IEEE UNRI Logo" class="object-contain w-full h-auto" loading="eager" />
                    </div>
                </a>

                <ul class="hidden md:flex items-center gap-1 ml-auto">
                    @foreach($navLinks as $link)
                        @php $active = $isActive($link['href']); @endphp
                        <li class="relative">
                            <a 
                                href="{{ $link['href'] === '#Contact' ? 'javascript:void(0)' : url($link['href']) }}"
                                @if($link['href'] === '#Contact') @click="scrollToContact" @endif
                                class="relative z-10 block px-5 py-2 text-sm font-medium transition-colors duration-300 {{ $active ? 'text-ieee-miracle' : 'text-ieee-snowflake hover:text-white' }}"
                            >
                                {{ $link['name'] }}
                            </a>

                            @if($active)
                                <div class="absolute inset-0 rounded-full bg-ieee-miracle/10 border border-ieee-miracle/20 shadow-[0_0_15px_rgba(231,185,90,0.2)]"></div>
                            @endif
                        </li>
                    @endforeach
                </ul>

                <button @click="mobileMenu = !mobileMenu" class="md:hidden text-ieee-snowflake hover:text-ieee-miracle transition-colors ml-4 p-2 focus:outline-none">
                    <svg x-show="!mobileMenu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    <svg x-show="mobileMenu" x-cloak xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>
    </nav>

    <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" x-transition class="fixed top-28 left-4 right-4 z-40 md:hidden">
        <div class="relative p-[1px] rounded-3xl overflow-hidden bg-gradient-to-r from-ieee-snowflake via-ieee-ice via-ieee-wind to-ieee-miracle shadow-2xl">
            <div class="relative bg-ieee-night rounded-3xl p-6 overflow-hidden">
                <ul class="flex flex-col gap-2 relative z-10">
                    @foreach($navLinks as $link)
                        @php $active = $isActive($link['href']); @endphp
                        <li>
                            <a
                                href="{{ $link['href'] === '#Contact' ? 'javascript:void(0)' : url($link['href']) }}"
                                @click="if('{{ $link['href'] }}' === '#Contact') { scrollToContact(); mobileMenu = false; } else { mobileMenu = false; }"
                                class="flex items-center justify-between px-4 py-4 rounded-2xl transition-all duration-300 border {{ $active ? 'bg-ieee-miracle/10 border-ieee-miracle/30 text-ieee-miracle' : 'border-transparent text-ieee-snowflake hover:bg-white/5 hover:text-white' }}"
                            >
                                <span class="font-medium text-lg tracking-wide">{{ $link['name'] }}</span>
                                @if($active) <div class="w-2 h-2 rounded-full bg-ieee-miracle shadow-[0_0_8px_#E7B95A]"></div> @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>