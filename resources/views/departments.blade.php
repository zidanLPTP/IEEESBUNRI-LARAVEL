<x-layouts.app>
    <x-slot:title>Organizational Directory | IEEE SB UNRI</x-slot:title>

    <x-navbar />

    <main class="min-h-screen bg-[#0C101C] text-white selection:bg-[#E7B95A] selection:text-[#0C101C] relative overflow-hidden font-sans">
        
        <x-firefly-background />

        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1px] h-full bg-[#3386B7]/5 z-0 hidden md:block" aria-hidden="true">
             <div class="absolute top-0 left-0 w-full h-[300px] bg-gradient-to-b from-transparent via-[#3386B7]/30 to-transparent blur-[1px] animate-[shootingLineDept_8s_linear_infinite]"></div>
        </div>

        @php
            // STATIC DIVISIONS (Kategori Navigasi)
            $divisions = [
                ['id' => 1, 'name' => "Membership & Internal Relations", 'slug' => 'Membership', 'desc' => "Responsible for managing membership databases and fostering internal cohesion."],
                ['id' => 2, 'name' => "Public Relations & Partnership", 'slug' => 'PR', 'desc' => "Serves as the primary liaison for external affairs, establishing strategic collaborations."],
                ['id' => 3, 'name' => "Secretariat", 'slug' => 'Secretariat', 'desc' => "Oversees the organization's administrative backbone, including correspondence and archival."],
                ['id' => 4, 'name' => "Information & Creative Media", 'slug' => 'Creative', 'desc' => "Spearheads visual branding and information dissemination. Manages digital media channels."],
                ['id' => 5, 'name' => "Business Affairs", 'slug' => 'Business', 'desc' => "Directs financial strategy and fundraising initiatives. Manages budgets and sponsorships."],
                ['id' => 6, 'name' => "Education", 'slug' => 'Education', 'desc' => "Facilitates academic and professional development through technical workshops and research."]
            ];
        @endphp

        <div 
            x-data="{ 
                activeTab: new URLSearchParams(window.location.search).get('tab') ? parseInt(new URLSearchParams(window.location.search).get('tab')) : 1,
                isMobileNavOpen: false
            }" 
            class="container mx-auto px-4 md:px-8 pt-28 pb-20 relative z-10"
        >
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 border-b border-white/10 pb-6">
               <div>
                  <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-white">
                     Organizational <span class="text-[#7AABC3]">Directory</span>
                  </h1>
               </div>
               
               <div class="md:hidden relative z-50">
                  <button 
                    @click="isMobileNavOpen = !isMobileNavOpen"
                    @click.away="isMobileNavOpen = false"
                    class="w-full flex items-center justify-between bg-[#151b2b] border border-white/10 px-4 py-3 rounded-lg text-sm font-bold text-white shadow-lg active:scale-95 transition-transform"
                  >
                    <div class="flex items-center gap-2 truncate">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#E7B95A]"><path d="m6 14 1.5-2.9A2 2 0 0 1 9.24 10H20a2 2 0 0 1 1.94 2.5l-1.5 6a2 2 0 0 1-1.94 1.5H4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h3.93a2 2 0 0 1 1.66.9l.82 1.2a2 2 0 0 0 1.66.9H18a2 2 0 0 1 2 2v2"/></svg>
                       @foreach($divisions as $div)
                           <span x-show="activeTab === {{ $div['id'] }}" x-cloak class="truncate">{{ $div['name'] }}</span>
                       @endforeach
                    </div>
                    <svg :class="isMobileNavOpen ? 'rotate-180' : ''" class="transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                  </button>
                  
                  <div x-show="isMobileNavOpen" x-cloak x-transition class="absolute top-full left-0 right-0 mt-2 bg-[#0C101C] border border-white/10 rounded-xl shadow-2xl overflow-hidden max-h-[300px] overflow-y-auto z-[60]">
                     @foreach($divisions as $div)
                        <button @click="activeTab = {{ $div['id'] }}; isMobileNavOpen = false" class="w-full text-left px-4 py-3 text-xs font-mono border-b border-white/5 last:border-0 hover:bg-white/5 transition-colors flex items-center gap-3" :class="activeTab === {{ $div['id'] }} ? 'text-[#E7B95A] bg-white/5' : 'text-gray-400'">
                           {{ $div['name'] }}
                        </button>
                     @endforeach
                  </div>
               </div>
            </div>

            <div class="grid md:grid-cols-[260px_1fr] lg:grid-cols-[300px_1fr] gap-8 items-start min-h-[600px]">

                <aside class="hidden md:flex flex-col gap-1 sticky top-28">
                    <div class="flex items-center justify-between px-3 py-2 text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                        <span>System Folders</span>
                    </div>
                    @foreach($divisions as $div)
                        <button @click="activeTab = {{ $div['id'] }}" class="group flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all duration-200 w-full text-left font-medium" :class="activeTab === {{ $div['id'] }} ? 'bg-[#3386B7]/10 text-[#E7B95A] shadow-[inset_2px_0_0_0_#E7B95A]' : 'text-gray-400 hover:bg-white/5 hover:text-white'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 transition-colors" :class="activeTab === {{ $div['id'] }} ? 'text-[#E7B95A]' : 'text-gray-600 group-hover:text-gray-400'"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"/></svg>
                            <span class="truncate">{{ $div['name'] }}</span>
                        </button>
                    @endforeach
                </aside>

                <div class="relative group perspective-1000">
                    <div class="absolute -inset-[1px] rounded-2xl bg-gradient-to-r from-[#7AABC3] via-[#3386B7] to-[#E7B95A] opacity-0 group-hover:opacity-100 blur-[2px] transition-opacity duration-500"></div>

                    <div class="relative bg-[#151b2b] border border-white/5 rounded-2xl p-6 md:p-10 shadow-2xl overflow-hidden min-h-[600px]">
                        @foreach($divisions as $div)
                            @php
                                // Filter Data dari Database berdasarkan kolom sub_role yang berisi nama divisi
                                $coordinatorData = $allOfficers->where('sub_role', $div['name'])->where('position', 'Head of Division')->first();
                                $membersData = $allOfficers->where('sub_role', $div['name'])->where('position', 'Staff');
                            @endphp

                            <div x-show="activeTab === {{ $div['id'] }}" x-cloak x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" class="w-full h-full">
                                
                                <div class="border-b border-white/5 pb-10 mb-10">
                                    <div class="flex flex-col md:flex-row gap-10 items-start">
                                        <div class="shrink-0 mx-auto md:mx-0 relative z-10">
                                            <div class="w-56 aspect-[3/4] bg-[#1a2133] rounded-lg p-1.5 shadow-2xl relative">
                                                <div class="absolute top-4 -left-3 w-1 h-12 bg-[#E7B95A] rounded-l-md shadow-[0_0_10px_#E7B95A]"></div>
                                                <div class="relative w-full h-full bg-[#0C101C] rounded overflow-hidden">
                                                    @if($coordinatorData && $coordinatorData->image)
                                                        <img src="{{ asset('storage/' . $coordinatorData->image) }}" class="object-cover w-full h-full" />
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center opacity-20 text-[#E7B95A]"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
                                                    @endif
                                                </div>
                                                <div class="absolute -top-[1px] -left-[1px] w-4 h-4 border-t-2 border-l-2 border-[#E7B95A]"></div>
                                            </div>
                                        </div>

                                        <div class="flex-1 text-center md:text-left pt-2">
                                            <div class="px-2 py-1 bg-[#E7B95A]/10 border border-[#E7B95A]/20 rounded text-[#E7B95A] text-[10px] font-bold tracking-widest uppercase inline-block mb-4">Head of Division</div>
                                            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">{{ $div['name'] }}</h2>
                                            <p class="text-gray-400 text-sm md:text-base leading-relaxed max-w-2xl font-light">{{ $div['desc'] }}</p>
                                            <div class="mt-8">
                                                <span class="text-[10px] text-[#7AABC3] font-bold uppercase tracking-[0.2em]">Coordinator</span>
                                                <div class="text-xl text-white font-medium">{{ $coordinatorData ? $coordinatorData->name : "VACANT POSITION" }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-500 mb-8 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> Division Personnel</h3>
                                    
                                    @if($membersData->count() > 0)
                                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                                            @foreach($membersData as $idx => $member)
                                                <div class="flex flex-col items-center group/card animate-fade-in-up">
                                                    <div class="aspect-[3/4] w-full bg-[#0C101C] rounded border border-white/10 p-1.5 shadow-sm relative overflow-hidden transition-all duration-300 group-hover/card:border-[#E7B95A]/30">
                                                        <div class="relative w-full h-full bg-[#1a2133] rounded-[2px] overflow-hidden">
                                                            @if($member->image)
                                                                <img src="{{ asset('storage/' . $member->image) }}" class="object-cover w-full h-full transition-all duration-500 group-hover/card:scale-110" />
                                                            @else
                                                                <div class="w-full h-full flex items-center justify-center opacity-30 text-gray-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <h4 class="mt-3 text-xs font-bold text-gray-400 truncate group-hover/card:text-[#E7B95A] transition-colors">{{ $member->name }}</h4>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="py-16 flex flex-col items-center justify-center border border-dashed border-white/5 rounded-xl bg-white/[0.01]">
                                            <p class="text-gray-600 font-mono text-xs uppercase tracking-widest">Vacant Position wait for photo</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-footer />
</x-layouts.app>