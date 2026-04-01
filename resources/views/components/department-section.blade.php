@php
    $divisions = [
        [
            'id' => 1,
            'name' => "Membership & Internal Relations",
            'image' => "divisi/membership.svg",
            'desc' => "Responsible for managing membership databases and fostering internal cohesion. This department oversees recruitment processes, monitors member engagement, and builds a solid, inclusive organizational environment through capacity-building programs.",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>'
        ],
        [
            'id' => 2,
            'name' => "Public Relations & Partnership",
            'image' => "divisi/pr.svg",
            'desc' => "Serves as the primary liaison for external affairs, establishing strategic collaborations with academic institutions and professional partners. Focuses on strengthening the institutional image and maintaining formal communication channels.",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>'
        ],
        [
            'id' => 3,
            'name' => "Secretariat",
            'image' => "divisi/secretariat.svg",
            'desc' => "Oversees the organization's administrative backbone, including correspondence, archival management, and reporting. Ensures procedural efficiency, documentation accuracy, and organizational accountability.",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>'
        ],
        [
            'id' => 4,
            'name' => "Information & Creative Media",
            'image' => "divisi/creative.svg",
            'desc' => "Spearheads visual branding and information dissemination. Manages digital media channels, produces creative content, and documents activities to enhance public engagement and organizational credibility.",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19 7-7 3 3-7 7-3-3z"/><path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="m2 2 7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>'
        ],
        [
            'id' => 5,
            'name' => "Business Affairs",
            'image' => "divisi/business.svg",
            'desc' => "Directs financial strategy and fundraising initiatives. Manages budgets, secures sponsorships, and oversees entrepreneurial ventures to ensure the organization's long-term economic sustainability and operational feasibility.",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>'
        ],
        [
            'id' => 6,
            'name' => "Education",
            'image' => "divisi/education.svg",
            'desc' => "Facilitates academic and professional development through technical workshops, seminars, and research initiatives. Dedicated to fostering a culture of innovation and enhancing members' technical competencies.",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>'
        ]
    ];
@endphp

<style>
    @keyframes shootingLineDept {
        0% {
            top: -20%;
        }

        100% {
            top: 120%;
        }
    }

    .animate-shooting-dept {
        animation: shootingLineDept 10s linear infinite;
    }
</style>

<section class="relative py-32 bg-[#0C101C] text-white overflow-hidden">

    <x-firefly-background />

    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1px] h-full bg-[#3386B7]/10 z-0 overflow-hidden"
        aria-hidden="true">
        <div
            class="absolute top-0 left-0 w-full h-[150px] bg-gradient-to-b from-transparent via-white to-transparent opacity-40 animate-shooting-dept">
        </div>
    </div>

    <div class="container mx-auto px-6 relative z-10">

        <div class="text-center mb-32 relative" x-data="{ shown: false }"
            x-init="const observer = new IntersectionObserver(entries => { if (entries[0].isIntersecting) { shown = true; observer.disconnect(); } }, { rootMargin: '0px 0px -50px 0px' }); observer.observe($el);">
            <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="text-4xl md:text-6xl font-bold mb-4 transform transition-all duration-700 ease-out">
                Our <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-[#7AABC3] to-[#3386B7]">Departments</span>
            </h2>
        </div>

        <div class="flex flex-col gap-32">
            @foreach($divisions as $index => $div)
                @php $isEven = $index % 2 === 0; @endphp

                <div x-data="{ shown: false }"
                    x-init="const observer = new IntersectionObserver(entries => { if (entries[0].isIntersecting) { shown = true; observer.disconnect(); } }, { rootMargin: '0px 0px -100px 0px' }); observer.observe($el);"
                    class="flex flex-col md:flex-row items-center gap-10 md:gap-24 {{ $isEven ? 'md:flex-row' : 'md:flex-row-reverse' }}">

                    <div class="w-full md:w-1/2 relative group perspective-1000">

                        <div class="absolute -inset-[2px] rounded-3xl bg-gradient-to-r from-[#7AABC3] via-[#3386B7] via-[#214664] to-[#E7B95A] opacity-0 group-hover:opacity-100 transition-opacity duration-500 blur-[3px]"
                            aria-hidden="true"></div>

                        <div class="hidden md:block absolute top-1/2 h-[1px] bg-[#3386B7]/30 transition-all duration-500 delay-300 ease-out {{ $isEven ? '-right-10 origin-left' : '-left-10 origin-right' }}"
                            :class="shown ? 'w-[40px] opacity-100' : 'w-0 opacity-0'"></div>

                        <div class="hidden md:block absolute top-1/2 -translate-y-1/2 w-2 h-2 bg-[#E7B95A] rounded-full shadow-[0_0_10px_#E7B95A] transition-all duration-500 delay-500 ease-out {{ $isEven ? '-right-11' : '-left-11' }}"
                            :class="shown ? 'scale-100 opacity-100' : 'scale-0 opacity-0'"></div>

                        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'"
                            class="relative aspect-[16/10] w-full rounded-3xl overflow-hidden border border-white/10 group-hover:border-transparent transition-all duration-700 ease-out shadow-2xl bg-[#151b2b]">

                            <div class="absolute inset-0 bg-[#151b2b] animate-pulse z-0" aria-hidden="true"></div>

                            <img src="{{ asset('images/' . $div['image']) }}"
                                alt="Ilustrasi Divisi {{ $div['name'] }} IEEE SB UNRI" loading="lazy"
                                class="absolute inset-0 z-10 w-full h-full object-contain p-6 md:p-8 transition-transform duration-1000 ease-out group-hover:scale-105" />

                            <div
                                class="absolute bottom-3 right-4 text-[10px] text-white/50 bg-black/30 px-2 py-1 rounded-full backdrop-blur z-30">
                                Illustration by Storyset
                            </div>

                            <div class="absolute inset-0 bg-gradient-to-t from-[#0C101C] via-transparent to-transparent opacity-80 z-20"
                                aria-hidden="true"></div>

                            <div class="absolute top-0 -left-[100%] w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent group-hover:left-[100%] transition-all duration-1000 ease-in-out transform -skew-x-12 z-40"
                                aria-hidden="true"></div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 {{ $isEven ? 'text-left' : 'text-left md:text-right' }}">

                        <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-90'"
                            class="inline-flex items-center justify-center p-4 rounded-2xl bg-[#3386B7]/5 border border-[#3386B7]/20 text-[#3386B7] mb-6 backdrop-blur-sm shadow-lg transform transition-all duration-500 delay-200 ease-out {{ !$isEven ? 'md:ml-auto' : '' }}">
                            {!! $div['icon'] !!}
                        </div>

                        <h3 :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 {{ $isEven ? '-translate-x-8' : 'translate-x-8' }}'"
                            class="text-3xl md:text-4xl font-bold text-white mb-6 hover:text-[#E7B95A] transition-all duration-500 delay-300">
                            {{ $div['name'] }}
                        </h3>

                        <p :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 {{ $isEven ? '-translate-x-8' : 'translate-x-8' }}'"
                            class="text-gray-400 text-lg leading-relaxed mb-8 font-light tracking-wide transition-all duration-500 delay-400">
                            {{ $div['desc'] }}
                        </p>

                        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                            class="inline-block group/btn transition-all duration-500 delay-500">
                            <a href="{{ url('/departments?tab=' . $div['id']) }}" class="relative block">
                                <div class="absolute -inset-[1.5px] rounded-full bg-gradient-to-r from-[#7AABC3] via-[#3386B7] via-[#214664] to-[#E7B95A] opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300 blur-[2px]"
                                    aria-hidden="true"></div>
                                <button
                                    class="relative flex items-center gap-2 px-8 py-3 rounded-full border border-white/20 bg-[#0C101C] text-white group-hover/btn:border-transparent group-hover/btn:text-[#E7B95A] transform transition-all hover:scale-105 active:scale-95 font-semibold tracking-wide {{ !$isEven ? 'md:ml-auto' : '' }}">
                                    Explore Department
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m12 5 7 7-7 7" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>