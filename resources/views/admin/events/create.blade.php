<x-layouts.admin>
    <x-slot:title>Create Event | IEEE Admin</x-slot:title>

    @php
        // MOCK DATA DIVISI (Untuk mapping warna dan opsi form)
        // Di produksi: $divisions = Division::all();
        $divisions = [
            ['id' => 1, 'name' => 'Secretariat', 'theme' => 'from-blue-500 to-cyan-400'],
            ['id' => 2, 'name' => 'Information & Creative Media', 'theme' => 'from-purple-500 to-pink-500'],
            ['id' => 3, 'name' => 'Business Affairs', 'theme' => 'from-emerald-500 to-green-400'],
            ['id' => 4, 'name' => 'Education', 'theme' => 'from-orange-500 to-amber-400'],
            ['id' => 5, 'name' => 'Membership & Internal Relations', 'theme' => 'from-indigo-500 to-blue-600'],
            ['id' => 6, 'name' => 'Public Relations & Partnership', 'theme' => 'from-rose-500 to-red-400'],
        ];
    @endphp

    <div 
        x-data="eventFormManager(@js($divisions))" 
        class="relative w-full pb-20"
    >
        <form @submit="isSubmitting = true" action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="sticky top-0 z-30 bg-[#0C101C]/90 backdrop-blur-md border-b border-white/5 px-4 md:px-8 py-5 flex justify-between items-center shadow-md gap-4 -mx-4 md:-mx-10 px-4 md:px-10 mb-8">
                <div class="flex items-center gap-4">
                    <button type="button" @click="isSidebarOpen = true" class="md:hidden p-2 bg-[#151b2b] rounded-lg text-[#E7B95A] border border-white/10 hover:bg-white/5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </button>
                    <div>
                        <h1 class="font-bold text-xl md:text-2xl text-white">Event Publisher</h1>
                        <p class="text-xs text-gray-400 mt-1 hidden md:block">Create and schedule a new agenda for the organization.</p>
                    </div>
                </div>
                
                <button 
                    type="submit"
                    :disabled="isSubmitting"
                    :class="`bg-gradient-to-r ${currentTheme} hover:opacity-90 hover:scale-[1.02] active:scale-[0.98]`"
                    class="px-4 md:px-6 py-2.5 rounded-xl text-sm font-bold text-[#0C101C] flex items-center gap-2 transition-all shadow-lg disabled:opacity-50 disabled:cursor-not-allowed whitespace-nowrap"
                >
                    <span x-show="!isSubmitting" class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                        <span class="hidden md:inline">Publish Event</span><span class="md:hidden">Publish</span>
                    </span>
                    <span x-show="isSubmitting" class="flex items-center gap-2" x-cloak>
                        <svg class="animate-spin h-4 w-4 text-[#0C101C]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        Publishing...
                    </span>
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <div class="lg:col-span-7 space-y-8">
                    
                    <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-6 md:p-8 shadow-lg">
                        <h2 class="font-bold text-lg mb-6 flex items-center gap-2">
                            <span :class="`w-1 h-6 rounded bg-gradient-to-b ${currentTheme}`"></span> General Information
                        </h2>
                        <div class="space-y-6">
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Event Title <span class="text-red-500">*</span></label>
                                <input type="text" name="title" x-model="formData.title" required placeholder="Ex: Artificial Intelligence Workshop 2026" class="w-full bg-[#0C101C] border border-white/10 rounded-xl p-4 text-white focus:border-[#E7B95A] outline-none text-lg font-bold placeholder:font-normal placeholder:text-gray-700 transition-colors">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Hosted By (Division) <span class="text-red-500">*</span></label>
                                <input type="hidden" name="division_id" :value="formData.divisionId">
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                    <template x-for="div in divisions" :key="div.id">
                                        <button 
                                            type="button" 
                                            @click="formData.divisionId = div.id" 
                                            :class="formData.divisionId === div.id ? 'bg-white/10 border-white/20 text-white shadow-md' : 'bg-[#0C101C] border-white/5 text-gray-500 hover:bg-white/5'"
                                            class="px-3 py-2.5 rounded-lg text-xs font-bold border transition-all text-left truncate"
                                            x-text="div.name"
                                        ></button>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-6 md:p-8 shadow-lg">
                        <h2 class="font-bold text-lg mb-6 flex items-center gap-2">
                            <span :class="`w-1 h-6 rounded bg-gradient-to-b ${currentTheme}`"></span> Date & Venue
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Date <span class="text-red-500">*</span></label>
                                <input type="date" name="date" x-model="formData.date" required class="w-full bg-[#0C101C] border border-white/10 rounded-xl p-3 text-white focus:border-[#E7B95A] outline-none cursor-pointer [color-scheme:dark] transition-colors">
                            </div>
                            <div class="flex gap-3">
                                <div class="flex-1">
                                    <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Start <span class="text-red-500">*</span></label>
                                    <input type="time" name="time_start" x-model="formData.timeStart" required class="w-full bg-[#0C101C] border border-white/10 rounded-xl p-3 text-white focus:border-[#E7B95A] outline-none [color-scheme:dark] transition-colors">
                                </div>
                                <div class="flex-1">
                                    <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">End</label>
                                    <input type="time" name="time_end" x-model="formData.timeEnd" class="w-full bg-[#0C101C] border border-white/10 rounded-xl p-3 text-white focus:border-[#E7B95A] outline-none [color-scheme:dark] transition-colors">
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-[#0C101C] rounded-xl p-1.5 flex mb-6 border border-white/10 w-fit">
                            <input type="hidden" name="mode" :value="formData.mode">
                            <button type="button" @click="formData.mode = 'onsite'" :class="formData.mode === 'onsite' ? 'bg-[#151b2b] text-white shadow ring-1 ring-white/10' : 'text-gray-500 hover:text-white'" class="px-6 py-2.5 rounded-lg text-xs font-bold transition-all flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg> Onsite (Offline)
                            </button>
                            <button type="button" @click="formData.mode = 'online'" :class="formData.mode === 'online' ? 'bg-[#151b2b] text-white shadow ring-1 ring-white/10' : 'text-gray-500 hover:text-white'" class="px-6 py-2.5 rounded-lg text-xs font-bold transition-all flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 8-6 4 6 4V8Z"/><rect width="14" height="12" x="2" y="6" rx="2" ry="2"/></svg> Online (Virtual)
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">
                                    <span x-text="formData.mode === 'onsite' ? 'Building / Room Name' : 'Platform Name'"></span> <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="location_name" x-model="formData.locationName" required :placeholder="formData.mode === 'onsite' ? 'Ex: Gedung C, Lab RPL, UNRI' : 'Ex: Zoom Meeting / Google Meet'" class="w-full bg-[#0C101C] border border-white/10 rounded-xl p-3 text-white focus:border-[#E7B95A] outline-none placeholder:text-gray-700 transition-colors">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">
                                    <span x-text="formData.mode === 'onsite' ? 'Google Maps Link' : 'Meeting URL'"></span>
                                </label>
                                <input type="text" name="location_link" x-model="formData.locationLink" placeholder="Opsional: Link URL" class="w-full bg-[#0C101C] border border-white/10 rounded-xl p-3 text-white focus:border-[#E7B95A] outline-none text-sm font-mono placeholder:text-gray-700 transition-colors">
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-6 md:p-8 shadow-lg">
                        <h2 class="font-bold text-lg mb-6 flex items-center gap-2"><span :class="`w-1 h-6 rounded bg-gradient-to-b ${currentTheme}`"></span> Registration & Media</h2>
                        <div class="flex flex-col md:flex-row gap-8">
              
                            <div class="w-full md:w-1/3">
                                <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Event Poster</label>
                                <div class="relative aspect-[3/4] bg-[#0C101C] border-2 border-dashed border-white/10 rounded-xl hover:border-white/30 transition-colors flex flex-col items-center justify-center cursor-pointer group overflow-hidden">
                                    <template x-if="posterPreview">
                                        <img :src="posterPreview" alt="Preview" class="absolute inset-0 w-full h-full object-cover">
                                    </template>
                                    <template x-if="!posterPreview">
                                        <div class="flex flex-col items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500 mb-2 group-hover:text-white"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                            <span class="text-[10px] text-gray-500 text-center">Upload Poster <br>(Ratio 9:16)</span>
                                        </div>
                                    </template>
                                    <input type="file" name="poster" accept="image/*" @change="handleImageUpload" class="absolute inset-0 opacity-0 cursor-pointer">
                                </div>
                            </div>

                            <div class="flex-1 space-y-6">
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Registration Link</label>
                                    <div class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                        <input type="text" name="reg_link" x-model="formData.regLink" placeholder="https://bit.ly/..." class="w-full bg-[#0C101C] border border-white/10 rounded-xl py-3 pl-10 pr-4 text-white focus:border-[#E7B95A] outline-none font-mono text-sm placeholder:text-gray-700 transition-colors">
                                    </div>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Button CTA Text</label>
                                    <div class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"><path d="M12.5 13.5 21 3"/><path d="M16 19h6v-6"/><path d="M11 21A10 10 0 0 1 3 13C3 7.5 7.5 3 13 3a10 10 0 0 1 10 10"/></svg>
                                        <input type="text" name="reg_text" x-model="formData.regText" placeholder="Ex: Register Now" class="w-full bg-[#0C101C] border border-white/10 rounded-xl py-3 pl-10 pr-4 text-white focus:border-[#E7B95A] outline-none font-bold placeholder:text-gray-700 transition-colors">
                                    </div>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Description <span class="text-red-500">*</span></label>
                                    <textarea name="description" x-model="formData.desc" required rows="5" placeholder="Jelaskan detail acara..." class="w-full bg-[#0C101C] border border-white/10 rounded-xl p-3 text-white focus:border-[#E7B95A] outline-none text-sm leading-relaxed placeholder:text-gray-700 transition-colors custom-scrollbar"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 sticky top-28 hidden lg:block">
                    <div class="flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#E7B95A]"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Live Preview Card</span>
                    </div>
                    
                    <div class="bg-[#151b2b] border border-white/5 rounded-3xl overflow-hidden shadow-2xl group relative transition-all">
                        <div class="relative aspect-video bg-[#0C101C] overflow-hidden">
                            <template x-if="posterPreview">
                                <img :src="posterPreview" alt="Poster" class="absolute inset-0 w-full h-full object-cover">
                            </template>
                            <template x-if="!posterPreview">
                                <div class="w-full h-full flex flex-col items-center justify-center bg-white/5 gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-700"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                    <span class="text-[10px] text-gray-600 uppercase font-bold tracking-widest">No Poster</span>
                                </div>
                            </template>
                            
                            <div :class="`absolute top-4 left-4 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider text-[#0C101C] bg-gradient-to-r ${currentTheme} shadow-lg`" x-text="selectedDivName"></div>
                        </div>

                        <div class="p-6 md:p-8 relative">
                            <div :class="`absolute -top-20 -right-20 w-40 h-40 rounded-full blur-[60px] opacity-20 bg-gradient-to-br ${currentTheme} pointer-events-none`"></div>
                            
                            <h3 class="text-2xl font-bold text-white mb-4 leading-tight line-clamp-2" x-text="formData.title || 'Your Event Title'"></h3>
                            
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-white/5 flex items-center justify-center text-gray-400 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-[10px] text-gray-500 uppercase font-bold">Date</p>
                                        <p class="text-sm font-bold truncate" x-text="formData.date || '-'"></p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-white/5 flex items-center justify-center text-gray-400 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-[10px] text-gray-500 uppercase font-bold">Time</p>
                                        <p class="text-sm font-bold truncate" x-text="formData.timeStart ? `${formData.timeStart} - ${formData.timeEnd || 'End'}` : '-'"></p>
                                    </div>
                                </div>
                                <div class="col-span-2 flex items-center gap-3">
                                    <div :class="`w-10 h-10 rounded-lg flex items-center justify-center text-gray-400 shrink-0 ${formData.mode === 'onsite' ? 'bg-white/5' : 'bg-purple-500/10 text-purple-400'}`">
                                        <template x-if="formData.mode === 'onsite'">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                        </template>
                                        <template x-if="formData.mode === 'online'">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 8-6 4 6 4V8Z"/><rect width="14" height="12" x="2" y="6" rx="2" ry="2"/></svg>
                                        </template>
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-[10px] text-gray-500 uppercase font-bold" x-text="formData.mode === 'onsite' ? 'Location' : 'Platform'"></p>
                                        <p class="text-sm font-bold truncate" x-text="formData.locationName || '-'"></p>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="text-gray-400 text-sm leading-relaxed mb-6 line-clamp-3" x-text="formData.desc || 'Description preview...'"></p>
                            
                            <div :class="`block w-full py-4 rounded-xl text-center font-bold text-[#0C101C] bg-gradient-to-r ${currentTheme} shadow-lg opacity-90`" x-text="formData.regText || 'Register Now'"></div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('eventFormManager', (divisions) => ({
                divisions: divisions,
                isSubmitting: false,
                posterPreview: null,
                formData: {
                    title: '',
                    divisionId: 1, // Default ke divisi pertama
                    date: '',
                    timeStart: '',
                    timeEnd: '',
                    mode: 'onsite',
                    locationName: '',
                    locationLink: '',
                    desc: '',
                    regLink: '',
                    regText: 'Register Now'
                },

                // Logic Image Preview URL
                handleImageUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.posterPreview = URL.createObjectURL(file);
                    } else {
                        this.posterPreview = null;
                    }
                },

                // Computed Properties untuk Live Preview Theming
                get currentTheme() {
                    const div = this.divisions.find(d => d.id === this.formData.divisionId);
                    return div ? div.theme : 'from-gray-500 to-slate-400';
                },

                get selectedDivName() {
                    const div = this.divisions.find(d => d.id === this.formData.divisionId);
                    return div ? div.name : 'General';
                }
            }));
        });
    </script>
</x-layouts.admin>