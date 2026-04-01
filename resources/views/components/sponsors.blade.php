@php
    $sponsors = [
        [
            'id' => 1,
            'name' => "Pertamina Hulu Rokan",
            'logo' => "images/sponsors/phr.png",
            'url' => "https://phr.pertamina.com/",
            'color' => "#ED2939"
        ],
        [
            'id' => 2,
            'name' => "PT Riau Andalan Pulp and Paper (RAPP)",
            'logo' => "images/sponsors/rapp.png",
            'url' => "https://www.aprilasia.com",
            'color' => "#005EB8"
        ],
        [
            'id' => 3,
            'name' => "Rohde & Schwarz Indonesia",
            'logo' => "images/sponsors/rs.png",
            'url' => "https://www.rohde-schwarz.com",
            'color' => "#0096D6"
        ],
    ];
@endphp

<style>
    @keyframes shootingLineSponsor {
        0% {
            top: -20%;
        }

        100% {
            top: 120%;
        }
    }

    .animate-shooting-sponsor {
        animation: shootingLineSponsor 3s linear infinite;
    }
</style>

<section id="sponsors" class="relative py-24 bg-[#0C101C] text-white overflow-hidden">

    <x-firefly-background />

    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1px] h-full bg-[#3386B7]/10 z-0 overflow-hidden"
        aria-hidden="true">
        <div
            class="absolute top-0 left-0 w-full h-[150px] bg-gradient-to-b from-transparent via-white to-transparent opacity-50 animate-shooting-sponsor">
        </div>
    </div>

    <div class="container mx-auto px-6 relative z-10">

        <div x-data="{ shown: false }"
            x-init="const observer = new IntersectionObserver(entries => { if (entries[0].isIntersecting) { shown = true; observer.disconnect(); } }, { rootMargin: '0px 0px -50px 0px' }); observer.observe($el);"
            class="text-center max-w-3xl mx-auto mb-16">
            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="inline-flex items-center gap-2 mb-4 justify-center transform transition-all duration-700 ease-out">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="text-[#E7B95A]">
                    <path d="m11 17 2 2a1 1 0 1 0 3-3" />
                    <path
                        d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-4.24 4.24a1 1 0 1 0 1.41 1.41L11 13" />
                    <path
                        d="m13 11 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-4.24 4.24a1 1 0 1 0 1.41 1.41L11 13" />
                    <path d="m11 11-1.41-1.41a3 3 0 0 0-4.24 0L1.1 13.84a1 1 0 0 0 1.41 1.41L6.76 11" />
                    <path d="M5.36 15.36 8 18" />
                </svg>
                <span class="text-[#E7B95A] font-bold tracking-[0.2em] uppercase text-sm">
                    Our Strategic Partners
                </span>
            </div>

            <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="text-3xl md:text-5xl font-bold leading-tight transform transition-all duration-700 delay-200 ease-out">
                Powered by <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-[#7AABC3] to-[#3386B7]">Industry
                    Leaders</span>
            </h2>
        </div>

        <div x-data="{ shown: false }"
            x-init="const observer = new IntersectionObserver(entries => { if (entries[0].isIntersecting) { shown = true; observer.disconnect(); } }, { rootMargin: '0px 0px -50px 0px' }); observer.observe($el);"
            class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 items-stretch">
            @foreach($sponsors as $idx => $sponsor)
                <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'"
                    class="transform transition-all duration-700 ease-out" style="transition-delay: {{ $idx * 150 }}ms;">
                    <a href="{{ $sponsor['url'] }}" target="_blank" rel="noopener noreferrer"
                        class="relative block h-48 md:h-64 rounded-[24px] overflow-hidden p-[2px] group focus:outline-none transition-transform duration-300 hover:-translate-y-2 shadow-2xl">

                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[250%] aspect-square animate-[spin_6s_linear_infinite] opacity-60 group-hover:opacity-100 transition-opacity duration-300"
                            style="background: conic-gradient(from 0deg, transparent, {{ $sponsor['color'] }}, transparent, {{ $sponsor['color'] }}, transparent);"
                            aria-hidden="true"></div>

                        <div
                            class="relative h-full w-full bg-[#0C101C] rounded-[22px] flex items-center justify-center overflow-hidden z-10">

                            <div class="absolute inset-0 opacity-20 group-hover:opacity-40 transition-opacity duration-500"
                                style="background: radial-gradient(circle at center, {{ $sponsor['color'] }}, transparent 80%);"
                                aria-hidden="true"></div>

                            <div class="relative w-full h-full p-6 flex items-center justify-center">
                                <img src="{{ asset($sponsor['logo']) }}" alt="Logo Mitra Strategis {{ $sponsor['name'] }}"
                                    loading="lazy"
                                    class="object-contain max-h-[80%] max-w-[80%] drop-shadow-2xl transition-transform duration-500 ease-out group-hover:scale-110" />
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</section>