<x-layouts.admin>
    <x-slot:title>News Publisher | IEEE Admin</x-slot:title>

    <div 
        x-data="newsFormManager()" 
        class="relative w-full pb-20"
    >
        <form @submit="isSubmitting = true" action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="sticky top-0 z-30 bg-[#0C101C]/80 backdrop-blur-md border-b border-white/5 px-4 md:px-8 py-5 flex justify-between items-center shadow-md gap-4 -mx-4 md:-mx-10 px-4 md:px-10 mb-8">
                <div class="flex items-center gap-4">
                    <button type="button" @click="isSidebarOpen = true" class="md:hidden p-2 bg-[#151b2b] rounded-lg text-[#E7B95A] border border-white/10 hover:bg-white/5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </button>
                    <div>
                        <h1 class="font-bold text-xl md:text-2xl text-white">News Publisher</h1>
                        <p class="text-xs text-gray-400 mt-1 hidden md:block">Share achievements & updates</p>
                    </div>
                </div>
                
                <div class="flex gap-3">
                    <button 
                        type="submit"
                        :disabled="isSubmitting"
                        class="px-4 md:px-6 py-2.5 rounded-xl text-sm font-bold text-[#0C101C] flex items-center gap-2 bg-[#E7B95A] hover:bg-[#F4D03F] transition-colors shadow-lg disabled:opacity-50 disabled:cursor-not-allowed whitespace-nowrap"
                    >
                        <span x-show="!isSubmitting" class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span class="hidden md:inline">Publish Now</span><span class="md:hidden">Publish</span>
                        </span>
                        <span x-show="isSubmitting" class="flex items-center gap-2" x-cloak>
                            <svg class="animate-spin h-4 w-4 text-[#0C101C]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Publishing...
                        </span>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <div class="lg:col-span-7 space-y-6">
                    
                    <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-6 md:p-8 shadow-lg">
                        <h2 class="font-bold text-lg mb-6 flex items-center gap-2">
                            <span class="w-1 h-6 rounded bg-[#E7B95A]"></span> Media & Cover
                        </h2>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Upload Image <span class="text-red-500">*</span></label>
                            <div class="relative aspect-video bg-[#0C101C] border-2 border-dashed border-white/10 rounded-xl hover:border-white/30 transition-colors flex flex-col items-center justify-center cursor-pointer group overflow-hidden">
                                
                                <template x-if="coverPreview">
                                    <img :src="coverPreview" alt="Cover" class="absolute inset-0 w-full h-full object-cover">
                                </template>
                                
                                <template x-if="!coverPreview">
                                    <div class="text-center p-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-700 mb-4 mx-auto group-hover:text-white transition-colors"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                        <p class="text-sm text-gray-400 font-bold mb-1">Click to upload documentation</p>
                                        <span class="text-xs text-gray-600">Recommended: Landscape 16:9</span>
                                    </div>
                                </template>
                                
                                <input type="file" name="image" accept="image/*" required @change="handleImageUpload" class="absolute inset-0 opacity-0 cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-6 md:p-8 shadow-lg">
                        <h2 class="font-bold text-lg mb-6 flex items-center gap-2">
                            <span class="w-1 h-6 rounded bg-[#E7B95A]"></span> Article Content
                        </h2>
                        <div class="space-y-6">
                            
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">News Category <span class="text-red-500">*</span></label>
                                <select name="category" x-model="formData.category" class="w-full bg-[#0C101C] border border-white/10 rounded-xl p-4 text-white focus:border-[#E7B95A] outline-none transition-colors appearance-none cursor-pointer">
                                    <option value="Featured">Featured News</option>
                                    <option value="Update">General Update</option>
                                    <option value="Community">Community Event</option>
                                    <option value="Achievement">Achievement</option>
                                </select>
                            </div>

                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Headline Title <span class="text-red-500">*</span></label>
                                <input 
                                    type="text" 
                                    name="title" 
                                    x-model="formData.title" 
                                    required
                                    placeholder="Ex: Team IEEE UNRI Wins 1st Place at Gemastik 2026"
                                    class="w-full bg-[#0C101C] border border-white/10 rounded-xl p-4 text-white focus:border-[#E7B95A] outline-none text-xl font-bold placeholder:text-gray-700 transition-colors"
                                >
                            </div>
                            
                            <div>
                                <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Main Story <span class="text-red-500">*</span></label>
                                <textarea 
                                    name="content" 
                                    x-model="formData.content" 
                                    required 
                                    rows="12"
                                    placeholder="Write the full story, achievement details, or announcement here..."
                                    class="w-full bg-[#0C101C] border border-white/10 rounded-xl p-4 text-white focus:border-[#E7B95A] outline-none text-base leading-relaxed placeholder:text-gray-700 custom-scrollbar transition-colors" 
                                ></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-6 flex items-center justify-between opacity-80 shadow-lg">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-[#E7B95A]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-bold">Posting As</p>
                                <p class="font-bold text-white" x-text="userName"></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 text-right">
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-bold">Publish Date</p>
                                <p class="font-bold text-white font-mono" x-text="currentDateShort"></p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-[#E7B95A]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 lg:sticky lg:top-28 hidden lg:block">
                    <div class="flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#E7B95A]"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Live Preview</span>
                    </div>

                    <div class="bg-[#151b2b] border border-white/5 rounded-[2rem] overflow-hidden shadow-2xl group relative">
                        
                        <div class="relative aspect-video bg-[#0C101C]">
                            <template x-if="coverPreview">
                                <img :src="coverPreview" alt="Preview" class="absolute inset-0 w-full h-full object-cover">
                            </template>
                            <template x-if="!coverPreview">
                                <div class="w-full h-full flex flex-col items-center justify-center text-gray-600 bg-[#0C101C]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mb-2 opacity-50"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                    <span class="text-xs uppercase tracking-widest">No Cover Image</span>
                                </div>
                            </template>
                            <div class="absolute top-4 left-4 px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-[#E7B95A] text-[#0C101C] shadow-lg" x-text="formData.category"></div>
                        </div>

                        <div class="p-8 relative z-10">
                            <div class="flex items-center gap-3 text-xs text-gray-500 mb-4">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> 
                                    <span x-text="currentDateLong"></span>
                                </span>
                                <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                                <span class="flex items-center gap-1 text-[#E7B95A] font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> 
                                    <span x-text="userName"></span>
                                </span>
                            </div>
                            
                            <h3 class="text-2xl font-bold text-white mb-4 leading-tight break-words" x-text="formData.title || 'Your News Headline Will Appear Here...'"></h3>
                            
                            <div class="text-gray-400 text-sm line-clamp-4 leading-relaxed mb-6 whitespace-pre-wrap break-words" x-text="formData.content || 'The content description will be shown here. Make sure to write a compelling first paragraph to attract readers.'"></div>

                            <div class="pt-6 border-t border-white/5 flex justify-between items-center">
                                <span class="text-xs font-bold text-gray-500">Read Full Story</span>
                                <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center text-white group-hover:bg-[#E7B95A] group-hover:text-[#0C101C] transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="rotate-180 group-hover:rotate-0 transition-transform"><path d="m15 18-6-6 6-6"/></svg>
                                </div>
                            </div>
                        </div>

                        <div class="absolute top-0 right-0 w-64 h-64 bg-[#E7B95A]/5 rounded-full blur-[80px] pointer-events-none z-0"></div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('newsFormManager', () => ({
                isSubmitting: false,
                coverPreview: null,
                
                // Variabel Auto-Tracking
                userName: '{{ auth()->check() ? auth()->user()->name : "Admin Zidan" }}',
                
                // Format Tanggal
                currentDateShort: new Date().toLocaleDateString('id-ID'),
                currentDateLong: new Date().toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' }),
                
                formData: {
                    title: '',
                    content: '',
                    category: 'Featured' // Default value ditambahkan agar preview tidak kosong
                },

                handleImageUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        // Validasi ukuran instan (Opsional)
                        if(file.size > 5 * 1024 * 1024) {
                            alert('File terlalu besar! Maksimal 5MB.');
                            event.target.value = '';
                            this.coverPreview = null;
                            return;
                        }
                        this.coverPreview = URL.createObjectURL(file);
                    } else {
                        this.coverPreview = null;
                    }
                }
            }));
        });
    </script>
</x-layouts.admin>