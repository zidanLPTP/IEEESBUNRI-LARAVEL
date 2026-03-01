<x-layouts.admin>
    <x-slot:title>Personnel Data | IEEE Admin</x-slot:title>

    <div x-data="personnelManager(@js($officers), 'ADMIN')" class="relative w-full h-full">

        <template x-if="accessDenied">
            <div class="h-[80vh] flex flex-col items-center justify-center p-8 text-center animate-[fadeInUp_0.3s_ease-out]">
                <button @click="isSidebarOpen = true" class="md:hidden absolute top-4 left-4 p-2 bg-[#151b2b] rounded-lg text-[#E7B95A] border border-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </button>
                <div class="w-24 h-24 bg-red-500/10 text-red-500 rounded-full flex items-center justify-center mb-6 shadow-[0_0_30px_rgba(239,68,68,0.2)]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                </div>
                <h2 class="text-3xl font-bold text-white mb-3">Access Restricted</h2>
                <p class="text-gray-400 max-w-md mb-8 leading-relaxed">
                   Sorry, you don't have permission to view this page.<br/>
                   <span class="text-white font-semibold">Only Head of Division and Core members can access this page.</span>
                </p>
                <div class="flex gap-4">
                    <a href="{{ url('/admin') }}" class="px-6 py-3 rounded-xl border border-white/10 text-gray-300 hover:bg-white/5 font-bold text-sm transition-all">
                        Go Back to Dashboard
                    </a>
                </div>
            </div>
        </template>

        <template x-if="!accessDenied">
            <div class="pb-20">
                <div class="sticky top-0 z-30 bg-[#0C101C]/80 backdrop-blur-md border-b border-white/5 px-4 md:px-8 py-5 flex flex-col md:flex-row justify-between items-center gap-4 shadow-md -mx-4 md:-mx-10 px-4 md:px-10 mb-8">
                    <div class="flex items-center gap-4 w-full md:w-auto">
                        <button @click="isSidebarOpen = true" class="md:hidden p-2 bg-[#151b2b] rounded-lg text-[#E7B95A] border border-white/10 hover:bg-white/5 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                        </button>
                        <div>
                            <h1 class="font-bold text-lg text-white">Personnel Data</h1>
                            <p class="text-[10px] text-gray-500 uppercase tracking-wide">Manage organization members</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <div class="relative w-full md:w-64">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                            <input 
                                type="text" 
                                placeholder="Search by name..." 
                                x-model.debounce.500ms="searchQuery"
                                class="w-full bg-[#151b2b] border border-white/10 rounded-xl py-2.5 pl-10 pr-4 text-sm text-white focus:border-[#E7B95A] outline-none transition-colors"
                            />
                        </div>
                        <a href="{{ url('/admin/pengurus/add') }}" class="bg-[#E7B95A] hover:bg-[#F4D03F] text-[#0C101C] px-4 py-2.5 rounded-xl text-xs font-bold transition-colors flex items-center gap-2 whitespace-nowrap shadow-lg shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                            Add New
                        </a>
                    </div>
                </div>

                @if (session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" class="mb-8 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-between animate-[fadeInDown_0.3s_ease-out]">
                        <div class="flex items-center gap-2 font-bold text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            {{ session('success') }}
                        </div>
                        <button @click="show = false" class="hover:text-emerald-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                        </button>
                    </div>
                @endif

                <div class="bg-[#151b2b] border border-white/5 rounded-3xl overflow-hidden shadow-xl">
                    <div class="overflow-x-auto custom-scrollbar">
                        <table class="w-full text-left border-collapse min-w-[800px] md:min-w-0">
                            <thead>
                                <tr class="bg-[#0C101C]/50 border-b border-white/5 text-gray-400 text-[10px] uppercase tracking-wider">
                                    <th class="p-5 font-bold">Member Profile</th>
                                    <th class="p-5 font-bold">Position</th>
                                    <th class="p-5 font-bold">Access Level</th>
                                    <th class="p-5 font-bold text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-sm">
                                
                                <template x-if="paginatedOfficers().length === 0">
                                    <tr>
                                        <td colspan="4" class="p-10 text-center text-gray-500">
                                            <span x-show="searchQuery !== ''">No member found with name "<span x-text="searchQuery" class="text-white"></span>"</span>
                                            <span x-show="searchQuery === ''">No personnel data available.</span>
                                        </td>
                                    </tr>
                                </template>

                                <template x-for="officer in paginatedOfficers()" :key="officer.id">
                                    <tr class="hover:bg-white/5 transition-colors group">
                                        <td class="p-5">
                                            <div class="flex items-center gap-4">
                                                <div class="relative w-10 h-10 rounded-lg overflow-hidden bg-gray-800 border border-white/10 shrink-0 flex items-center justify-center font-bold text-gray-500">
                                                    <template x-if="officer.image">
                                                        <img :src="`/storage/${officer.image}`" :alt="officer.name" class="object-cover w-full h-full" />
                                                    </template>
                                                    <template x-if="!officer.image">
                                                        <span x-text="officer.name.charAt(0)"></span>
                                                    </template>
                                                </div>
                                                <div>
                                                    <div class="font-bold text-white text-sm" x-text="officer.name"></div>
                                                    <div class="text-gray-500 text-[10px] font-mono mt-0.5">
                                                        ID: <span class="text-[#E7B95A]" x-text="officer.member_id || '-'"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-5">
                                            <div class="text-gray-200 font-medium" x-text="officer.position"></div>
                                            <div class="text-gray-500 text-[10px]" x-text="officer.sub_role"></div>
                                        </td>
                                        <td class="p-5">
                                            <span 
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase border"
                                                :class="{
                                                    'bg-red-500/10 text-red-400 border-red-500/20': officer.accessRole === 'ADMIN',
                                                    'bg-purple-500/10 text-purple-400 border-purple-500/20': officer.accessRole === 'CORE',
                                                    'bg-blue-500/10 text-blue-400 border-blue-500/20': officer.accessRole === 'HEAD',
                                                    'bg-emerald-500/10 text-emerald-400 border-emerald-500/20': officer.accessRole === 'STAFF' || !officer.accessRole
                                                }"
                                            >
                                                <template x-if="officer.accessRole === 'ADMIN'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                                                </template>
                                                <template x-if="officer.accessRole === 'CORE' || officer.accessRole === 'HEAD'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                                                </template>
                                                <span x-text="officer.accessRole"></span>
                                            </span>
                                        </td>
                                        <td class="p-5 text-right">
                                            <button 
                                                @click="deleteOfficer(officer.id, officer.name)"
                                                class="p-2 text-gray-500 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-all md:opacity-0 md:group-hover:opacity-100 opacity-100 focus:opacity-100"
                                                title="Delete Member"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div x-show="totalPages() > 1" class="flex items-center justify-between border-t border-white/5 pt-6 mt-2" x-cloak>
                    <p class="text-xs text-gray-500">
                        Showing page <span class="text-white font-bold" x-text="currentPage"></span> of <span x-text="totalPages()"></span>
                    </p>
                    <div class="flex gap-2">
                        <button 
                            @click="prevPage()" 
                            :disabled="currentPage === 1"
                            :class="currentPage === 1 ? 'text-gray-600 cursor-not-allowed' : 'text-white hover:bg-white/5'"
                            class="p-2 rounded-lg border border-white/10 transition-colors"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                        </button>
                        <button 
                            @click="nextPage()" 
                            :disabled="currentPage >= totalPages()"
                            :class="currentPage >= totalPages() ? 'text-gray-600 cursor-not-allowed' : 'text-white hover:bg-white/5'"
                            class="p-2 rounded-lg border border-white/10 transition-colors"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                        </button>
                    </div>
                </div>

            </div>
        </template>
        
        <div class="fixed bottom-6 right-6 z-50 bg-[#151b2b] p-3 rounded-xl border border-white/10 shadow-2xl flex items-center gap-3">
            <span class="text-[10px] text-gray-400 font-mono uppercase">Test Role:</span>
            <select x-model="userRole" class="bg-[#0C101C] text-xs text-white border border-white/10 rounded px-2 py-1 outline-none">
                <option value="ADMIN">ADMIN</option>
                <option value="STAFF">STAFF (Denied)</option>
            </select>
        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('personnelManager', (initialOfficers, initialRole) => ({
                officers: initialOfficers,
                userRole: initialRole,
                searchQuery: '',
                currentPage: 1,
                itemsPerPage: 10, // Dikembalikan ke 10 item per halaman
                
                get accessDenied() {
                    return !['ADMIN', 'CORE', 'HEAD'].includes(this.userRole);
                },

                get filteredOfficers() {
                    if (this.searchQuery.trim() === '') return this.officers;
                    return this.officers.filter(o => 
                        o.name.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                        (o.member_id && o.member_id.toLowerCase().includes(this.searchQuery.toLowerCase()))
                    );
                },

                totalPages() {
                    return Math.ceil(this.filteredOfficers.length / this.itemsPerPage) || 1;
                },

                paginatedOfficers() {
                    const start = (this.currentPage - 1) * this.itemsPerPage;
                    return this.filteredOfficers.slice(start, start + this.itemsPerPage);
                },

                nextPage() {
                    if (this.currentPage < this.totalPages()) this.currentPage++;
                },

                prevPage() {
                    if (this.currentPage > 1) this.currentPage--;
                },

                deleteOfficer(id, name) {
                    if (confirm(`Yakin ingin menghapus data personil: ${name}?`)) {
                        // Nanti akan dihubungkan ke form delete sungguhan
                        this.officers = this.officers.filter(o => o.id !== id);
                        
                        if (this.currentPage > this.totalPages()) {
                            this.currentPage = this.totalPages() || 1;
                        }
                    }
                },

                init() {
                    this.$watch('searchQuery', () => {
                        this.currentPage = 1;
                    });
                }
            }));
        });
    </script>
</x-layouts.admin>