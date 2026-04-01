<x-layouts.admin>
    <x-slot:title>Dashboard | IEEE Admin</x-slot:title>


    <header class="flex justify-between items-center mb-10 gap-4">
        <div class="flex items-center gap-4">
            <button @click="isSidebarOpen = true"
                class="md:hidden p-2 bg-[#151b2b] rounded-lg text-[#E7B95A] border border-white/10 hover:bg-white/5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" x2="20" y1="12" y2="12" />
                    <line x1="4" x2="20" y1="6" y2="6" />
                    <line x1="4" x2="20" y1="18" y2="18" />
                </svg>
            </button>
            <div>
                <h2 class="text-2xl md:text-3xl font-bold">Dashboard</h2>
                <p class="text-gray-400 text-xs md:text-sm mt-1">Welcome back,
                    <b>{{ auth()->user()->name ?? 'Guest' }}</b>.
                </p>
            </div>
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-6 flex items-start justify-between shadow-lg">
            <div>
                <p class="text-gray-400 text-sm font-medium mb-1">Total Personnel</p>
                <h3 class="text-3xl font-extrabold text-white mb-1">{{ $stats['totalMembers'] }}</h3>
                <p class="text-[10px] text-gray-500">Registered Members</p>
            </div>
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-blue-500/10 text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
        </div>
        <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-6 flex items-start justify-between shadow-lg">
            <div>
                <p class="text-gray-400 text-sm font-medium mb-1">Departments</p>
                <h3 class="text-3xl font-extrabold text-white mb-1">{{ $stats['totalDivisions'] }}</h3>
                <p class="text-[10px] text-gray-500">Operational divisions</p>
            </div>
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-purple-500/10 text-purple-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="7" height="9" x="3" y="3" rx="1" />
                    <rect width="7" height="5" x="14" y="3" rx="1" />
                    <rect width="7" height="9" x="14" y="12" rx="1" />
                    <rect width="7" height="5" x="3" y="16" rx="1" />
                </svg>
            </div>
        </div>
        <a href="#"
            class="bg-[#151b2b] border border-[#E7B95A]/50 rounded-3xl p-6 flex items-start justify-between hover:bg-[#151b2b]/80 transition-all shadow-lg group cursor-pointer">
            <div>
                <p class="text-gray-400 text-sm font-medium mb-1 group-hover:text-[#E7B95A] transition-colors">Daily
                    Absents</p>
                <h3 class="text-3xl font-extrabold text-white mb-1">Cek Absen!</h3>
                <p class="text-[10px] text-gray-500">Manage meeting attendances</p>
            </div>
            <div
                class="w-12 h-12 rounded-2xl flex items-center justify-center bg-[#E7B95A] text-[#0C101C] group-hover:scale-110 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                    <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                    <path d="M10 9H8" />
                    <path d="M16 13H8" />
                    <path d="M16 17H8" />
                </svg>
            </div>
        </a>
    </div>

    <div x-data="dashboardManager()"
        class="bg-[#151b2b] border border-white/5 rounded-3xl overflow-hidden flex flex-col min-h-[500px]">
        <div class="flex border-b border-white/5 px-4 md:px-6 pt-6 gap-2 overflow-x-auto custom-scrollbar">
            <button @click="setActiveTab('events')"
                :class="activeTab === 'events' ? 'text-[#E7B95A] border-[#E7B95A]' : 'text-gray-500 border-transparent hover:text-white'"
                class="pb-4 px-6 text-sm font-bold border-b-2 transition-all flex items-center gap-2 whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                    <line x1="16" x2="16" y1="2" y2="6" />
                    <line x1="8" x2="8" y1="2" y2="6" />
                    <line x1="3" x2="21" y1="10" y2="10" />
                </svg> Events
                <span x-show="events.length > 0" x-text="events.length"
                    :class="activeTab === 'events' ? 'bg-[#E7B95A] text-[#0C101C]' : 'bg-white/10 text-gray-400'"
                    class="ml-2 px-1.5 py-0.5 rounded-full text-[10px]"></span>
            </button>
            <button @click="setActiveTab('news')"
                :class="activeTab === 'news' ? 'text-[#E7B95A] border-[#E7B95A]' : 'text-gray-500 border-transparent hover:text-white'"
                class="pb-4 px-6 text-sm font-bold border-b-2 transition-all flex items-center gap-2 whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                    <path d="M18 14h-8" />
                    <path d="M15 18h-5" />
                    <path d="M10 6h8v4h-8V6Z" />
                </svg> News
                <span x-show="news.length > 0" x-text="news.length"
                    :class="activeTab === 'news' ? 'bg-[#E7B95A] text-[#0C101C]' : 'bg-white/10 text-gray-400'"
                    class="ml-2 px-1.5 py-0.5 rounded-full text-[10px]"></span>
            </button>
            <button @click="setActiveTab('gallery')"
                :class="activeTab === 'gallery' ? 'text-[#E7B95A] border-[#E7B95A]' : 'text-gray-500 border-transparent hover:text-white'"
                class="pb-4 px-6 text-sm font-bold border-b-2 transition-all flex items-center gap-2 whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                    <circle cx="9" cy="9" r="2" />
                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                </svg> Gallery
                <span x-show="gallery.length > 0" x-text="gallery.length"
                    :class="activeTab === 'gallery' ? 'bg-[#E7B95A] text-[#0C101C]' : 'bg-white/10 text-gray-400'"
                    class="ml-2 px-1.5 py-0.5 rounded-full text-[10px]"></span>
            </button>
        </div>

        <div class="p-4 md:p-6 flex flex-col md:flex-row gap-4 justify-between items-center bg-[#0C101C]/30">
            <div class="relative w-full md:w-64">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
                <input type="text" x-model="searchQuery" :placeholder="`Search ${activeTab}...`"
                    class="w-full bg-[#151b2b] border border-white/10 rounded-lg py-2 pl-9 pr-4 text-xs text-white focus:border-[#E7B95A] outline-none">
            </div>
            <a :href="`/admin/${activeTab}/create`"
                class="w-full md:w-auto justify-center bg-[#E7B95A] text-[#0C101C] px-4 py-2 rounded-lg text-xs font-bold hover:bg-[#F4D03F] transition-colors flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="m12 5 7 7-7 7" />
                </svg> Add New
            </a>
        </div>

        <div class="flex-1 p-4 md:p-6 overflow-x-auto">

            <template x-if="paginatedData().length === 0">
                <div
                    class="h-full flex flex-col items-center justify-center text-center py-12 border-2 border-dashed border-white/5 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="text-gray-600 mb-4">
                        <path
                            d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z" />
                        <line x1="12" x2="12" y1="10" y2="16" />
                        <line x1="9" x2="15" y1="13" y2="13" />
                    </svg>
                    <h3 class="text-white font-bold mb-1">No items found</h3>
                    <p class="text-gray-500 text-xs">This folder is currently empty or no search results.</p>
                </div>
            </template>

            <template x-if="paginatedData().length > 0">
                <div class="space-y-2 min-w-[600px] md:min-w-0">
                    <div
                        class="grid grid-cols-12 gap-4 px-4 py-2 text-[10px] font-bold text-gray-500 uppercase tracking-wider">
                        <div class="col-span-6 md:col-span-5">Title / Caption</div>
                        <div class="col-span-3">Date</div>
                        <div class="col-span-3">Author / Tag</div>
                        <div class="col-span-1 text-right">Action</div>
                    </div>

                    <template x-for="item in paginatedData()" :key="item.id">
                        <div
                            class="grid grid-cols-12 gap-4 px-4 py-4 bg-[#0C101C] border border-white/5 rounded-xl items-center hover:border-[#E7B95A]/30 transition-all group">
                            <div class="col-span-6 md:col-span-5 flex items-center gap-3">
                                <div :class="activeTab === 'events' ? 'bg-blue-500/10 text-blue-400' : (activeTab === 'news' ? 'bg-purple-500/10 text-purple-400' : 'bg-green-500/10 text-green-400')"
                                    class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0">
                                    <template x-if="activeTab === 'events'"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                            <line x1="16" x2="16" y1="2" y2="6" />
                                            <line x1="8" x2="8" y1="2" y2="6" />
                                            <line x1="3" x2="21" y1="10" y2="10" />
                                        </svg></template>
                                    <template x-if="activeTab === 'news'"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                            <path d="M18 14h-8" />
                                            <path d="M15 18h-5" />
                                            <path d="M10 6h8v4h-8V6Z" />
                                        </svg></template>
                                    <template x-if="activeTab === 'gallery'"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                                            <circle cx="9" cy="9" r="2" />
                                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                        </svg></template>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-white line-clamp-1"
                                        x-text="item.title || item.caption || 'Untitled'"></h4>
                                    <span
                                        class="text-[10px] text-gray-500 px-1.5 py-0.5 rounded bg-white/5 border border-white/5"
                                        x-text="item.category || item.tag || 'General'"></span>
                                </div>
                            </div>
                            <div class="col-span-3 text-xs text-gray-400" x-text="item.date"></div>
                            <div class="col-span-3 text-xs text-gray-400" x-text="item.author || 'Admin'"></div>
                            <div class="col-span-1 text-right">
                                <button @click="deleteItem(item.id)"
                                    class="p-2 text-gray-600 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-all"
                                    title="Delete Item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M3 6h18" />
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        <line x1="10" x2="10" y1="11" y2="17" />
                                        <line x1="14" x2="14" y1="11" y2="17" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div>

        <div x-show="currentFilteredData().length > 0"
            class="p-4 border-t border-white/5 flex justify-between items-center bg-[#0C101C]/30">
            <p class="text-xs text-gray-500">
                Showing <b x-text="((currentPage - 1) * itemsPerPage) + 1"></b> - <b
                    x-text="Math.min(currentPage * itemsPerPage, currentFilteredData().length)"></b> of <b
                    x-text="currentFilteredData().length"></b>
            </p>
            <div class="flex gap-2">
                <button @click="prevPage()" :disabled="currentPage === 1"
                    :class="currentPage === 1 ? 'text-gray-700 cursor-not-allowed' : 'text-white hover:bg-white/10'"
                    class="p-2 rounded-lg border border-white/10 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6" />
                    </svg>
                </button>
                <button @click="nextPage()" :disabled="currentPage >= totalPages()"
                    :class="currentPage >= totalPages() ? 'text-gray-700 cursor-not-allowed' : 'text-white hover:bg-white/10'"
                    class="p-2 rounded-lg border border-white/10 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboardManager', () => ({
                activeTab: 'events',
                searchQuery: '',
                currentPage: 1,
                itemsPerPage: 5,

                // Menerima data dari Controller PHP (saat ini menggunakan MOCK dari Blade atas)
                events: @json($events),
                news: @json($news),
                gallery: @json($gallery),

                setActiveTab(tab) {
                    this.activeTab = tab;
                    this.currentPage = 1; // Reset halaman saat ganti tab
                    this.searchQuery = ''; // Reset pencarian
                },

                currentFilteredData() {
                    let sourceData = [];
                    if (this.activeTab === 'events') sourceData = this.events;
                    else if (this.activeTab === 'news') sourceData = this.news;
                    else sourceData = this.gallery;

                    if (this.searchQuery.trim() === '') return sourceData;

                    const query = this.searchQuery.toLowerCase();
                    return sourceData.filter(item => {
                        const title = (item.title || item.caption || '').toLowerCase();
                        const cat = (item.category || item.tag || '').toLowerCase();
                        return title.includes(query) || cat.includes(query);
                    });
                },

                totalPages() {
                    return Math.ceil(this.currentFilteredData().length / this.itemsPerPage) || 1;
                },

                paginatedData() {
                    const start = (this.currentPage - 1) * this.itemsPerPage;
                    return this.currentFilteredData().slice(start, start + this.itemsPerPage);
                },

                nextPage() {
                    if (this.currentPage < this.totalPages()) this.currentPage++;
                },

                prevPage() {
                    if (this.currentPage > 1) this.currentPage--;
                },

                async deleteItem(id) {
                    if (confirm("Apakah Anda yakin ingin menghapus item ini permanen? File gambar juga akan terhapus otomatis di Cloudinary!")) {
                        let endpoint = '';
                        if (this.activeTab === 'events') endpoint = `/admin/events/${id}`;
                        else if (this.activeTab === 'news') endpoint = `/admin/news/${id}`;
                        else if (this.activeTab === 'gallery') endpoint = `/admin/gallery/${id}`;

                        try {
                            const res = await fetch(endpoint, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                }
                            });

                            if (res.ok) {
                                if (this.activeTab === 'events') this.events = this.events.filter(i => i.id !== id);
                                else if (this.activeTab === 'news') this.news = this.news.filter(i => i.id !== id);
                                else this.gallery = this.gallery.filter(i => i.id !== id);
                            } else {
                                alert("Failed to delete item from server.");
                            }
                        } catch (err) {
                            console.error(err);
                            alert("Server error while deleting.");
                        }
                    }
                }
            }));
        });
    </script>
</x-layouts.admin>