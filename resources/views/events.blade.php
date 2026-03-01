<x-layouts.app>
    <x-slot:title>Events & Activities | IEEE SB UNRI</x-slot:title>

    <x-navbar />

    @php
        // MAPPING WARNA DIVISI TETAP DI SINI UNTUK UI
        $divisionColors = [
            "education" => "#00E5FF",       
            "pr" => "#D500F9",              
            "creative" => "#FF4081",        
            "business" => "#00E676",        
            "membership" => "#FFAB00",      
            "secretariat" => "#2979FF",
            "general" => "#E7B95A"     
        ];
    @endphp

    <style>
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-spin-slow { animation: spin 8s linear infinite; }
    </style>

    <main class="min-h-screen bg-[#0C101C] text-white font-sans selection:bg-[#E7B95A] selection:text-[#0C101C]">
        
        <x-firefly-background />

        <section class="relative px-6 pt-32 mb-20 z-10">
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-[#3386B7]/10 rounded-full blur-[150px] -z-10 pointer-events-none" aria-hidden="true"></div>

            <div class="container mx-auto">
                <div class="flex flex-col lg:flex-row items-end justify-between gap-12">
                    
                    <div class="max-w-3xl">
                        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 animate-fade-in-up">
                            <br />Events
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#7AABC3] to-[#3386B7]"> & Activities</span>
                        </h1>
                        <p class="text-gray-400 text-lg max-w-xl leading-relaxed animate-fade-in-up" style="animation-delay: 100ms;">
                            Explore our schedule of upcoming seminars, workshops, and technical programs.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 w-full lg:w-auto min-w-[300px] animate-fade-in-up" style="animation-delay: 200ms;">
                        <div class="bg-[#151b2b] border border-white/5 p-6 rounded-2xl flex flex-col items-center justify-center text-center shadow-lg">
                            <h3 class="text-3xl font-bold text-white mb-1">{{ $upcomingEvents->count() }}</h3>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Upcoming Events</p>
                        </div>
                        <div class="bg-[#151b2b] border border-white/5 p-6 rounded-2xl flex flex-col items-center justify-center text-center shadow-lg">
                            <h3 class="text-3xl font-bold text-white mb-1">{{ $rawEvents->count() }}</h3>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Total Activities</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section 
            class="py-20 px-6 relative z-20 animate-fade-in-up" style="animation-delay: 300ms;"
            x-data="{
                today: new Date(),
                currentMonth: new Date().getMonth(),
                currentYear: new Date().getFullYear(),
                selectedEvent: null,
                events: {{ json_encode($alpineEvents) }},
                divisionColors: {{ json_encode($divisionColors) }},
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                get blankDays() {
                    let days = [];
                    let firstDayOfMonth = new Date(this.currentYear, this.currentMonth, 1).getDay();
                    for (let i = 0; i < firstDayOfMonth; i++) days.push(i);
                    return days;
                },
                get daysInMonth() { return new Date(this.currentYear, this.currentMonth + 1, 0).getDate(); },
                nextMonth() { if (this.currentMonth === 11) { this.currentMonth = 0; this.currentYear++; } else { this.currentMonth++; } this.selectedEvent = null; },
                prevMonth() { if (this.currentMonth === 0) { this.currentMonth = 11; this.currentYear--; } else { this.currentMonth--; } this.selectedEvent = null; },
                getEvent(date) { return this.events.find(e => e.date === date && e.monthIndex === this.currentMonth && e.year === this.currentYear); },
                selectEvent(date) { const ev = this.getEvent(date); if (ev) this.selectedEvent = ev; }
            }"
        >
            <div class="container mx-auto">
                <div class="bg-[#151b2b]/50 backdrop-blur-xl border border-white/10 rounded-[40px] p-8 md:p-12 shadow-2xl relative overflow-hidden">
                    <div class="grid lg:grid-cols-12 gap-12">
                        <div class="lg:col-span-5">
                            <div class="flex items-center justify-between mb-8">
                                <h2 class="text-2xl font-bold text-white"><span x-text="monthNames[currentMonth]"></span> <span x-text="currentYear"></span></h2>
                                <div class="flex gap-2">
                                    <button @click="prevMonth" class="p-2 hover:bg-white/10 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg></button>
                                    <button @click="nextMonth" class="p-2 hover:bg-white/10 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg></button>
                                </div>
                            </div>
                            <div class="grid grid-cols-7 gap-4 text-center mb-4">
                                @foreach(['S','M','T','W','T','F','S'] as $d) <div class="text-xs font-bold text-gray-500">{{ $d }}</div> @endforeach
                            </div>
                            <div class="grid grid-cols-7 gap-4 text-center">
                                <template x-for="blank in blankDays"><div></div></template>
                                <template x-for="date in daysInMonth" :key="date">
                                    <button @click="selectEvent(date)" class="w-10 h-10 rounded-xl flex items-center justify-center text-sm transition-all" :class="getEvent(date) ? 'text-[#0C101C] font-bold shadow-lg scale-110' : 'text-gray-600 hover:bg-white/5'" :style="getEvent(date) ? `background-color: ${divisionColors[getEvent(date).divisionId] || '#E7B95A'}` : ''">
                                        <span x-text="date"></span>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <div class="lg:col-span-7 border-l-0 lg:border-l border-white/5 pl-0 lg:pl-12 pt-8 lg:pt-0">
                            <div x-show="selectedEvent" x-cloak x-transition>
                                <div class="bg-[#0C101C]/50 rounded-3xl p-6 border border-white/10 shadow-xl">
                                    <img :src="selectedEvent && selectedEvent.poster ? selectedEvent.poster : 'https://placehold.co/800x400/151b2b/7AABC3?text=IEEE+Event'" class="w-full aspect-video object-cover rounded-xl mb-6" />
                                    <h3 class="text-2xl font-bold mb-3 text-white" x-text="selectedEvent ? selectedEvent.title : ''"></h3>
                                    <p class="text-gray-400 text-sm mb-6" x-text="selectedEvent ? selectedEvent.desc : ''"></p>
                                    <template x-if="selectedEvent && selectedEvent.regLink">
                                        <a :href="selectedEvent.regLink" target="_blank" class="flex items-center justify-center w-full py-3.5 rounded-xl bg-[#E7B95A] text-[#0C101C] font-bold hover:brightness-110 transition-all">
                                            Register Now
                                        </a>
                                    </template>
                                </div>
                            </div>
                            <div x-show="!selectedEvent" class="h-full flex flex-col items-center justify-center text-center p-8 border-2 border-dashed border-white/10 rounded-3xl">
                                <h3 class="text-xl font-bold text-white mb-2">No Event Selected</h3>
                                <p class="text-gray-400 text-sm">Select a colored date on the calendar to see event details.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 px-6 relative bg-[#05080f] border-t border-white/5 z-10">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-12 text-white">Past <span class="text-[#E7B95A]">Highlights</span></h2>
                
                @if($pastEvents->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($pastEvents as $idx => $event)
                            <article class="bg-[#151b2b] border border-white/5 rounded-2xl p-6 hover:border-[#E7B95A]/30 transition-all animate-fade-in-up" style="animation-delay: {{ $idx * 100 }}ms;">
                                <p class="text-xs text-[#E7B95A] mb-2 font-mono uppercase">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
                                <h4 class="text-xl font-bold text-white mb-2 line-clamp-2">{{ $event->title }}</h4>
                                <p class="text-gray-500 text-sm line-clamp-2">{{ $event->description }}</p>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="w-full h-[300px] rounded-3xl border border-dashed border-white/10 flex flex-col items-center justify-center text-center">
                        <h3 class="text-2xl font-bold text-white mb-2">History in the Making</h3>
                        <p class="text-gray-400 max-w-md">Our journey log is currently empty. Exciting events are coming soon!</p>
                    </div>
                @endif
            </div>
        </section>

        <x-footer />
    </main>
</x-layouts.app>