@php
    $missions = [
        [
            'id' => 1,
            'title' => "Organizational Excellence",
            'desc' => "Enhance internal performance through structured management and transparent coordination.",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>'
        ],
        [
            'id' => 2,
            'title' => "Member Engagement",
            'desc' => "Foster active involvement by creating meaningful, collaborative, and student-centered programs.",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>'
        ],
        [
            'id' => 3,
            'title' => "Strategic Collaboration",
            'desc' => "Strengthen internal and external partnerships with academic and industrial communities.",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-4.24 4.24a1 1 0 1 0 1.41 1.41L11 13"/><path d="m13 11 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-4.24 4.24a1 1 0 1 0 1.41 1.41L11 13"/><path d="m11 11-1.41-1.41a3 3 0 0 0-4.24 0L1.1 13.84a1 1 0 0 0 1.41 1.41L6.76 11"/><path d="M5.36 15.36 8 18"/></svg>'
        ],
        [
            'id' => 4,
            'title' => "Skill Development",
            'desc' => "Support the growth of technical, leadership, and professional skills among all members.",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>'
        ],
        [
            'id' => 5,
            'title' => "Sustainability",
            'desc' => "Ensure sustainable and well-managed programs aligned with IEEE global values.",
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2-1 4-2 7-2 2.5 0 4.5 1 6.5 2a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>'
        ]
    ];
@endphp

<style>
    @keyframes shootingLineVision {
        0% {
            top: -20%;
        }

        100% {
            top: 120%;
        }
    }

    .animate-shooting-vision {
        animation: shootingLineVision 3s linear infinite;
    }

    .duration-3000 {
        animation-duration: 3s;
    }
</style>

<section class="relative py-32 bg-[#0C101C] text-white overflow-hidden">

    <x-firefly-background />

    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1px] h-full bg-[#3386B7]/10 z-0 overflow-hidden"
        aria-hidden="true">
        <div
            class="absolute left-0 w-full h-[150px] bg-gradient-to-b from-transparent via-white to-transparent opacity-50 animate-shooting-vision">
        </div>
    </div>

    <div class="container mx-auto px-6 relative z-10">

        <div class="text-center max-w-4xl mx-auto mb-20">
            <div class="inline-flex items-center gap-2 mb-6">
                <svg class="text-[#E7B95A] rotate-180" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                    <path
                        d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.99c1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                </svg>
                <span class="text-[#E7B95A] font-bold tracking-[0.3em] text-sm uppercase">Our Vision</span>
                <svg class="text-[#E7B95A] rotate-180" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                    <path
                        d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.99c1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                </svg>
            </div>

            <h2 class="text-3xl md:text-5xl font-medium leading-relaxed font-serif italic text-gray-200">
                "To strengthen IEEE SB UNRI as a <span
                    class="text-white font-bold not-italic decoration-[#3386B7] underline decoration-4 underline-offset-4">professional,
                    inclusive, and impactful</span> organization."
            </h2>
        </div>

        <div x-data="{ 
                active: 0, 
                total: {{ count($missions) }},
                paused: false,
                next() { this.active = (this.active + 1) % this.total; },
                prev() { this.active = (this.active - 1 + this.total) % this.total; },
                startTimer() {
                    setInterval(() => {
                        if (!this.paused) this.next();
                    }, 5000);
                }
            }" x-init="startTimer()" @mouseenter="paused = true" @mouseleave="paused = false"
            class="relative max-w-7xl mx-auto">

            <div class="relative min-h-[450px] flex items-center justify-center">

                <div class="hidden md:flex justify-center items-center gap-6 w-full" style="perspective: 1000px;">

                    @foreach($missions as $index => $item)
                        <div class="absolute w-1/3 min-w-[350px] h-[400px] transition-all duration-700 ease-out" :class="{
                                    'scale-100 opacity-100 z-10 translate-x-0 blur-[0px]': active === {{ $index }},
                                    'scale-85 opacity-50 z-0 blur-[2px] -translate-x-full': (active - 1 + total) % total === {{ $index }},
                                    'scale-85 opacity-50 z-0 blur-[2px] translate-x-full': (active + 1) % total === {{ $index }},
                                    'scale-50 opacity-0 -z-10 translate-x-0 invisible': active !== {{ $index }} && (active - 1 + total) % total !== {{ $index }} && (active + 1) % total !== {{ $index }}
                                }">
                            <div x-show="active === {{ $index }}" x-transition.opacity.duration.300ms
                                class="absolute -inset-[2px] rounded-3xl bg-gradient-to-r from-[#7AABC3] via-[#3386B7] via-[#214664] to-[#E7B95A] blur-[4px] -z-10 animate-pulse duration-3000">
                            </div>

                            <div class="relative w-full h-full p-10 rounded-3xl border transition-all duration-500 flex flex-col justify-center backdrop-blur-md"
                                :class="active === {{ $index }} ? 'bg-[#151b2b]/90 border-transparent shadow-2xl' : 'bg-[#0C101C]/80 border-white/5'">

                                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-8 transition-colors duration-300 shrink-0"
                                    :class="active === {{ $index }} ? 'bg-[#E7B95A] text-[#0C101C] shadow-[0_0_20px_rgba(231,185,90,0.3)]' : 'bg-[#3386B7]/10 text-[#3386B7]'">
                                    {!! $item['icon'] !!}
                                </div>

                                <h3 class="text-2xl font-bold mb-4 transition-colors"
                                    :class="active === {{ $index }} ? 'text-white' : 'text-gray-500'">
                                    {{ $item['title'] }}
                                </h3>

                                <p class="text-sm leading-relaxed transition-colors"
                                    :class="active === {{ $index }} ? 'text-gray-300' : 'text-gray-600'">
                                    {{ $item['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="md:hidden relative w-full px-4 h-[350px]">
                    @foreach($missions as $index => $item)
                        <div x-show="active === {{ $index }}" x-transition:enter="transition ease-out duration-400"
                            x-transition:enter-start="opacity-0 translate-y-[30px]"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-300 absolute inset-x-4 top-0"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-[30px]"
                            class="relative p-[1.5px] rounded-3xl overflow-hidden w-full h-full max-w-sm mx-auto">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-[#7AABC3] via-[#214664] to-[#E7B95A] animate-pulse">
                            </div>

                            <div class="relative bg-[#151b2b] p-8 rounded-3xl h-full flex flex-col justify-center">
                                <div
                                    class="w-14 h-14 bg-[#E7B95A] rounded-xl flex items-center justify-center text-[#0C101C] mb-6 shrink-0 shadow-lg">
                                    <div class="scale-90">{!! $item['icon'] !!}</div>
                                </div>
                                <h3 class="text-xl font-bold mb-3 text-white">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-gray-400 text-sm leading-relaxed">
                                    {{ $item['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <button @click="prev()" aria-label="Previous Mission"
                class="absolute top-1/2 -left-4 md:-left-16 -translate-y-1/2 p-4 bg-[#0C101C]/50 border border-white/10 hover:border-[#E7B95A] text-gray-400 hover:text-[#E7B95A] rounded-full backdrop-blur-xl transition-all z-20 hover:scale-110 focus:outline-none">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </button>
            <button @click="next()" aria-label="Next Mission"
                class="absolute top-1/2 -right-4 md:-right-16 -translate-y-1/2 p-4 bg-[#0C101C]/50 border border-white/10 hover:border-[#E7B95A] text-gray-400 hover:text-[#E7B95A] rounded-full backdrop-blur-xl transition-all z-20 hover:scale-110 focus:outline-none">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </button>

            <div class="flex justify-center gap-3 mt-12 relative z-20">
                @foreach($missions as $index => $item)
                    <button @click="active = {{ $index }}" aria-label="Go to mission {{ $index + 1 }}"
                        class="h-1.5 rounded-full transition-all duration-500 focus:outline-none"
                        :class="active === {{ $index }} ? 'w-12 bg-gradient-to-r from-[#3386B7] to-[#E7B95A]' : 'w-2 bg-gray-800 hover:bg-gray-600'"></button>
                @endforeach
            </div>

        </div>

    </div>
</section>