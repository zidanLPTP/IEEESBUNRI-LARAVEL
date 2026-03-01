<x-layouts.app>
    <x-slot:title>About Us | IEEE SB UNRI</x-slot:title>

    <x-navbar />

    @php
        // Static Content (Teks Statis)
        $organization = [
            'description' => 'A passionate community of tech enthusiasts dedicated to fostering innovation, research, and continuous learning in University of Riau.',
            'tagline' => 'Synergy Collaboration for Sustainable Technology'
        ];
        
        $visionMission = [
            'vision' => 'To strengthen IEEE SB UNRI as a professional, inclusive, and impactful organization.',
            'missions' => [
                'Enhance internal performance through structured management.',
                'Foster active involvement by creating meaningful programs.',
                'Strengthen internal and external partnerships.',
                'Support the growth of technical and leadership skills.',
                'Ensure sustainable and well-managed programs.'
            ]
        ];

        // LOGIKA PROTEKSI VACANT: Jika database kosong, buat objek dummy agar desain tidak hancur
        if($counselors->isEmpty()) {
            $counselors = collect([
                (object)['name' => 'Vacant Position', 'position' => 'Counselor 1', 'sub_role' => 'Wait for Photo', 'image' => null],
                (object)['name' => 'Vacant Position', 'position' => 'Counselor 2', 'sub_role' => 'Wait for Photo', 'image' => null]
            ]);
        }
        if(!$director) {
            $director = (object)['name' => 'Vacant Position', 'position' => 'Director', 'sub_role' => 'Wait for Photo', 'image' => null];
        }
        if($viceDirectors->isEmpty()) {
            $viceDirectors = collect([
                (object)['name' => 'Vacant Position', 'position' => 'Vice Director I', 'sub_role' => 'Wait for Photo', 'image' => null],
                (object)['name' => 'Vacant Position', 'position' => 'Vice Director II', 'sub_role' => 'Wait for Photo', 'image' => null]
            ]);
        }

        $divisions = [
            ['id' => 1, 'name' => 'Membership & Internal Relations', 'desc' => 'Managing membership databases and internal cohesion.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>'],
            ['id' => 2, 'name' => 'Public Relations & Partnership', 'desc' => 'Primary liaison for external affairs and collaborations.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/></svg>'],
            ['id' => 3, 'name' => 'Secretariat', 'desc' => 'Administrative backbone, archival, and reporting.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>'],
            ['id' => 4, 'name' => 'Information & Creative Media', 'desc' => 'Visual branding and information dissemination.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19 7-7 3 3-7 7-3-3z"/><path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="m2 2 7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>'],
            ['id' => 5, 'name' => 'Business Affairs', 'desc' => 'Financial strategy and fundraising initiatives.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>'],
            ['id' => 6, 'name' => 'Education', 'desc' => 'Academic and professional technical development.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>'],
        ];
    @endphp

    <style>
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-up { animation: fadeInUp 0.8s ease-out forwards; opacity: 0; }
    </style>

    <main class="min-h-screen bg-[#0C101C] text-white overflow-hidden selection:bg-[#E7B95A] selection:text-[#0C101C] relative">
      
        <x-firefly-background />

        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1px] h-full bg-[#3386B7]/10 z-0 hidden md:block">
            <div class="absolute top-0 left-0 w-full h-[200px] bg-gradient-to-b from-transparent via-white/40 to-transparent blur-[1px] animate-[shootingLineDept_8s_linear_infinite]"></div>
        </div>

        <section class="relative h-[80vh] flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0C101C] via-[#0C101C]/70 to-transparent z-10"></div>
                <img src="{{ asset('images/hero-bg.png') }}" onerror="this.src='https://placehold.co/1920x1080/0C101C/7AABC3?text=IEEE+UNRI+Team'" class="object-cover w-full h-full opacity-60" />
            </div>

            <div class="container mx-auto px-6 relative z-20 text-center mt-20 animate-fade-up" style="animation-delay: 200ms;">
                <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-[#E7B95A] text-xs font-bold tracking-widest uppercase mb-6 backdrop-blur-md">Who We Are</span>
                <h1 class="text-4xl md:text-7xl font-extrabold mb-6 leading-tight">Driving <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#7AABC3] to-[#E7B95A]">Innovation,</span> <br /> Empowering Students.</h1>
                <p class="text-gray-300 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">{{ $organization['description'] }}</p>
            </div>
        </section>

        <section class="py-20 px-6 container mx-auto relative z-10">
            <div class="grid lg:grid-cols-12 gap-8">
                <div x-data="{ text: '{{ addslashes($visionMission['vision']) }}', displayedText: '', i: 0, typewriter() { if (this.i < this.text.length) { this.displayedText += this.text.charAt(this.i); this.i++; setTimeout(() => this.typewriter(), 30); } } }" x-init="const observer = new IntersectionObserver(e => { if(e[0].isIntersecting) { typewriter(); observer.disconnect(); } }); observer.observe($el);" class="lg:col-span-7 bg-[#151b2b]/80 backdrop-blur-sm border border-white/5 p-10 rounded-[2.5rem] relative group hover:border-[#3386B7]/30 transition-all shadow-2xl animate-fade-up">
                    <h2 class="text-3xl font-bold mb-6 flex items-center gap-3"><span class="w-2 h-8 bg-[#E7B95A] rounded-full"></span> Our Vision</h2>
                    <div class="text-xl md:text-2xl text-gray-200 leading-relaxed font-light italic h-[80px] md:h-auto">"<span x-text="displayedText"></span><span class="animate-pulse text-[#3386B7]">|</span>"</div>
                </div>

                <div class="lg:col-span-5 bg-gradient-to-br from-[#E7B95A] to-[#F4D03F] p-10 rounded-[2.5rem] text-[#0C101C] flex flex-col justify-center relative shadow-2xl animate-fade-up" style="animation-delay: 200ms;">
                    <h3 class="text-lg font-bold uppercase tracking-widest opacity-70 mb-2">Tagline</h3>
                    <p class="text-3xl md:text-4xl font-extrabold leading-tight">{{ $organization['tagline'] }}</p>
                </div>

                <div class="lg:col-span-12 bg-[#151b2b]/80 backdrop-blur-sm border border-white/5 p-10 md:p-14 rounded-[2.5rem] mt-4 animate-fade-up" style="animation-delay: 300ms;">
                    <h2 class="text-3xl font-bold mb-8 flex items-center gap-3">
                        <span class="w-2 h-8 bg-[#3386B7] rounded-full"></span> Our Missions
                    </h2>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($visionMission['missions'] as $idx => $mission)
                            <div class="flex gap-4 items-start">
                                <div class="w-8 h-8 rounded-full bg-[#3386B7]/20 flex items-center justify-center text-[#3386B7] font-bold text-sm shrink-0 mt-1 border border-[#3386B7]/10">
                                    {{ $idx + 1 }}
                                </div>
                                <p class="text-gray-300 leading-relaxed">{{ $mission }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 px-6 relative">
            <div class="container mx-auto relative z-10">
                <div class="text-center mb-20 animate-fade-up">
                    <span class="text-[#3386B7] font-bold tracking-widest uppercase text-xs mb-3 block">Organizational Structure</span>
                    <h2 class="text-4xl md:text-5xl font-bold">The Executives</h2>
                </div>

                <div class="flex flex-col gap-12 items-center">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 w-full max-w-7xl">
                        @foreach($counselors as $idx => $leader)
                            <x-leader-card :item="$leader" :delay="$idx * 100" />
                        @endforeach
                    </div>
                    <div class="hidden md:block w-px h-12 bg-gradient-to-b from-[#3386B7]/50 to-[#E7B95A]/50 -my-6 relative z-0"></div>
                    <div class="w-full max-w-[400px]">
                        <x-leader-card :item="$director" :delay="200" />
                    </div>
                    <div class="hidden md:block w-px h-12 bg-gradient-to-b from-[#E7B95A]/50 to-[#3386B7]/50 -my-6 relative z-0"></div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full max-w-6xl">
                        @foreach($viceDirectors as $idx => $leader)
                            <x-leader-card :item="$leader" :delay="300 + ($idx * 100)" />
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 px-6 container mx-auto pb-32 relative z-10">
            <div class="text-center mb-16 animate-fade-up">
                <span class="text-[#E7B95A] font-bold tracking-widest uppercase text-xs">Our Departments</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-2">Divisions & Teams</h2>
                <p class="text-gray-400 mt-4 max-w-lg mx-auto">Explore the specialized units that drive our organization forward.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($divisions as $idx => $div)
                    <a href="{{ url('/departments?tab=' . $div['id']) }}" class="block h-full group outline-none animate-fade-up" style="animation-delay: {{ $idx * 100 }}ms;">
                        <div class="group relative h-full rounded-[2.5rem]">
                            <div class="absolute -inset-[2px] rounded-[2.5rem] bg-gradient-to-r from-[#7AABC3] via-[#3386B7] via-[#214664] to-[#E7B95A] opacity-0 group-hover:opacity-100 blur-[3px] transition-opacity duration-500"></div>

                            <div class="relative h-full rounded-[2.5rem] bg-[#151b2b] border border-white/5 group-hover:border-transparent transition-all duration-300 flex flex-col overflow-hidden shadow-xl">
                                <div class="absolute -bottom-4 -right-4 text-white/5 group-hover:text-[#3386B7]/10 transition-colors rotate-[-10deg] scale-150 pointer-events-none w-24 h-24">
                                    {!! $div['icon'] !!}
                                </div>

                                <div class="p-8 pb-4 flex justify-between items-start relative z-10">
                                    <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-[#E7B95A] group-hover:bg-[#E7B95A] group-hover:text-black transition-colors shadow-lg">
                                        <div class="w-6 h-6">{!! $div['icon'] !!}</div>
                                    </div>
                                    <div class="p-2 rounded-full border border-white/10 group-hover:bg-white group-hover:text-black transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:rotate-45 transition-transform duration-300"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                                    </div>
                                </div>

                                <div class="px-8 mb-6 relative z-10">
                                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-[#3386B7] transition-colors">{{ $div['name'] }}</h3>
                                    <p class="text-gray-400 leading-relaxed text-sm border-t border-white/5 pt-4 group-hover:text-gray-300 transition-colors">{{ $div['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <x-footer />
    </main>
</x-layouts.app>