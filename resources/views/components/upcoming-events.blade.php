@props(['eventsList'])

@php
    // Definisi warna tetap di sini agar mudah diatur sesuai kategori
    $divisionColors = [
        "Education" => "#00E5FF",
        "PR" => "#D500F9",
        "Creative" => "#FF4081",
        "Business" => "#00E676",
        "Membership" => "#FFAB00",
        "Secretariat" => "#2979FF",
    ];
@endphp

<section id="events" class="relative py-32 bg-[#0C101C] text-white overflow-hidden" x-data="{
        today: new Date(),
        currentMonth: new Date().getMonth(),
        currentYear: new Date().getFullYear(),
        selectedEvent: null,
        events: {{ json_encode($eventsList) }},
        divisionColors: {{ json_encode($divisionColors) }},
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        
        get blankDays() {
            let days = [];
            let firstDayOfMonth = new Date(this.currentYear, this.currentMonth, 1).getDay();
            for (let i = 0; i < firstDayOfMonth; i++) days.push(i);
            return days;
        },
        get daysInMonth() {
            return new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
        },
        nextMonth() {
            if (this.currentMonth === 11) {
                this.currentMonth = 0;
                this.currentYear++;
            } else {
                this.currentMonth++;
            }
            this.selectedEvent = null;
        },
        prevMonth() {
            if (this.currentMonth === 0) {
                this.currentMonth = 11;
                this.currentYear--;
            } else {
                this.currentMonth--;
            }
            this.selectedEvent = null;
        },
        goToToday() {
            this.currentMonth = this.today.getMonth();
            this.currentYear = this.today.getFullYear();
            this.selectedEvent = null;
        },
        isToday(date) {
            return date === this.today.getDate() && this.currentMonth === this.today.getMonth() && this.currentYear === this.today.getFullYear();
        },
        getEvent(date) {
            return this.events.find(e => e.date === date && e.monthIndex === this.currentMonth && e.year === this.currentYear);
        },
        selectEvent(date) {
            const ev = this.getEvent(date);
            if (ev) this.selectedEvent = ev;
        },
        getDayStyle(date) {
            const ev = this.getEvent(date);
            const isSelected = this.selectedEvent && this.selectedEvent.date === date && this.selectedEvent.monthIndex === this.currentMonth;
            const isToday = this.isToday(date);
            
            if (ev) {
                const color = this.divisionColors[ev.division] || '#3386B7';
                return `background-color: ${color}; box-shadow: ${isSelected ? '0 0 20px ' + color : 'none'}; border: ${isSelected ? '2px solid white' : 'none'};`;
            }
            if (isToday) return `background-color: rgba(255, 255, 255, 0.1); border: 1px solid white;`;
            return '';
        },
        getDayClass(date) {
            const ev = this.getEvent(date);
            const isToday = this.isToday(date);
            let cls = 'aspect-square flex flex-col items-center justify-center rounded-lg text-sm relative transition-all duration-300 ';
            if (ev) cls += 'cursor-pointer font-bold text-[#0C101C] hover:scale-110 z-10 ';
            else cls += 'text-gray-500 cursor-default ';
            if (isToday && !ev) cls += 'text-white font-bold ';
            return cls;
        }
    }">
    <x-firefly-background />

    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1px] h-full bg-[#3386B7]/10 z-0 overflow-hidden"
        aria-hidden="true">
        <div
            class="absolute top-0 left-0 w-full h-[150px] bg-gradient-to-b from-transparent via-white to-transparent opacity-50 animate-[shootingLineDept_8s_linear_infinite]">
        </div>
    </div>

    <div class="container mx-auto px-6 relative z-10">

        <div x-data="{ shown: false }"
            x-init="const observer = new IntersectionObserver(entries => { if (entries[0].isIntersecting) { shown = true; observer.disconnect(); } }, { rootMargin: '0px 0px -50px 0px' }); observer.observe($el);"
            class="relative flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-8'"
                class="transition-all duration-700 ease-out">
                <h2 class="text-4xl md:text-5xl font-bold mb-2">
                    Event <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-[#7AABC3] to-[#3386B7]">Calendar</span>
                </h2>
                <p class="text-gray-400">Explore our agenda and activities.</p>
            </div>

            <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-8'"
                class="flex items-center gap-3 transition-all duration-700 ease-out delay-200">
                <button x-show="currentMonth !== today.getMonth() || currentYear !== today.getFullYear()" x-transition
                    @click="goToToday"
                    class="text-xs font-bold text-white bg-white/10 px-3 py-2 rounded-full hover:bg-white/20 transition-colors border border-white/20">
                    Go to Today
                </button>

                <div class="flex items-center gap-4 bg-[#151b2b] p-2 rounded-full border border-white/10 shadow-lg">
                    <button @click="prevMonth" class="p-2 rounded-full hover:bg-white/10 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                    </button>
                    <span class="font-bold min-w-[140px] text-center"
                        x-text="monthNames[currentMonth] + ' ' + currentYear"></span>
                    <button @click="nextMonth" class="p-2 rounded-full hover:bg-white/10 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-12 gap-12 items-stretch min-h-[500px]">

            <div class="lg:col-span-5 relative z-20">
                <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-8 shadow-2xl h-full flex flex-col">
                    <div class="grid grid-cols-7 gap-3 mb-4 text-center border-b border-white/5 pb-4">
                        @foreach(['S', 'M', 'T', 'W', 'T', 'F', 'S'] as $day)
                            <div class="text-xs font-bold text-gray-500 uppercase tracking-widest">{{ $day }}</div>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-7 gap-3 text-center flex-grow content-start">
                        <template x-for="blank in blankDays">
                            <div></div>
                        </template>
                        <template x-for="date in daysInMonth" :key="date">
                            <div @click="selectEvent(date)" :class="getDayClass(date)" :style="getDayStyle(date)">
                                <span x-text="date"></span>
                                <template x-if="isToday(date) && !getEvent(date)">
                                    <div class="absolute bottom-1 w-1 h-1 bg-white rounded-full"></div>
                                </template>
                            </div>
                        </template>
                    </div>

                    <div class="mt-auto pt-6 border-t border-white/5">
                        <p class="text-xs text-gray-500 mb-3 uppercase tracking-wider font-bold">Category Color Code</p>
                        <div class="flex flex-wrap gap-3">
                            <template x-for="(color, name) in divisionColors" :key="name">
                                <div class="flex items-center gap-1.5">
                                    <div class="w-2 h-2 rounded-full" :style="'background: ' + color"></div>
                                    <span class="text-[10px] text-gray-400" x-text="name"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 relative z-20">
                <div x-show="selectedEvent" x-transition class="h-full flex flex-col relative group w-full" x-cloak>
                    <div
                        class="relative h-64 md:h-80 w-full rounded-3xl overflow-hidden mb-6 border border-white/10 group-hover:border-[#3386B7]/30 transition-colors shadow-lg">
                        <img :src="selectedEvent && selectedEvent.image ? selectedEvent.image : 'https://placehold.co/800x400/151b2b/7AABC3?text=IEEE+Event'"
                            class="object-cover w-full h-full" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0C101C] via-[#0C101C]/50 to-transparent">
                        </div>
                        <div class="absolute bottom-6 left-6 right-6">
                            <span
                                class="px-3 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider text-[#0C101C] mb-3 inline-block"
                                :style="'background-color: ' + (selectedEvent ? divisionColors[selectedEvent.division] : '#fff')"
                                x-text="selectedEvent ? selectedEvent.realDivisionName : ''"></span>
                            <h3 class="text-3xl font-bold text-white group-hover:text-[#E7B95A] transition-colors"
                                x-text="selectedEvent ? selectedEvent.title : ''"></h3>
                        </div>
                    </div>

                    <div class="bg-[#151b2b] p-6 rounded-2xl border border-white/5 flex-grow shadow-lg">
                        <p class="text-gray-300 mb-6 leading-relaxed whitespace-pre-wrap text-sm"
                            x-text="selectedEvent ? selectedEvent.desc : ''"></p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-[#214664]/30 rounded-full flex items-center justify-center text-[#7AABC3] border border-[#7AABC3]/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] uppercase text-gray-500 font-bold">Location</p>
                                    <p class="text-sm font-bold" x-text="selectedEvent ? selectedEvent.speaker : ''">
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-[#214664]/30 rounded-full flex items-center justify-center text-[#7AABC3] border border-[#7AABC3]/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                        <line x1="16" x2="16" y1="2" y2="6" />
                                        <line x1="8" x2="8" y1="2" y2="6" />
                                        <line x1="3" x2="21" y1="10" y2="10" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] uppercase text-gray-500 font-bold">Full Date</p>
                                    <p class="text-sm font-bold"
                                        x-text="selectedEvent ? selectedEvent.date + ' ' + monthNames[currentMonth] + ' ' + currentYear : ''">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="!selectedEvent"
                    class="h-full w-full flex flex-col items-center justify-center border border-dashed border-white/10 rounded-3xl bg-[#151b2b] p-10 text-center relative overflow-hidden">
                    <div class="relative mb-6">
                        <div class="absolute inset-0 bg-[#3386B7] blur-[40px] opacity-20 rounded-full"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="text-[#3386B7] relative z-10 opacity-80">
                            <path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5" />
                            <path d="M16 2v4" />
                            <path d="M8 2v4" />
                            <path d="M3 10h5" />
                            <path d="M17.5 17.5 16 16.3V14" />
                            <circle cx="16" cy="16" r="6" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">No Event Selected</h3>
                    <p class="text-gray-400 text-sm max-w-sm leading-relaxed">
                        Select a highlighted date on the calendar to see details.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>