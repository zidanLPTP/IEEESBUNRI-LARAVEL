<x-layouts.admin>
    <x-slot:title>Add Personnel | IEEE Admin</x-slot:title>

    @php
        // Konstanta Data Form
        $operationalDivisions = [
            "Secretariat",
            "Information & Creative Media",
            "Business Affairs",
            "Education",
            "Membership & Internal Relations",
            "Public Relations & Partnership",
        ];

        $positions = [
            ['label' => 'Staff', 'value' => 'Staff'],
            ['label' => 'Head of Division', 'value' => 'Head of Division'],
            ['label' => 'Web Master', 'value' => 'Web Master'],
            ['label' => 'Director', 'value' => 'Director'],
            ['label' => 'Vice Director I', 'value' => 'Vice Director I'],
            ['label' => 'Vice Director II', 'value' => 'Vice Director II'],
            ['label' => 'Vice Director III', 'value' => 'Vice Director III'],
            ['label' => 'Counselor 1', 'value' => 'Counselor 1'],
            ['label' => 'Counselor 2', 'value' => 'Counselor 2'],
            ['label' => 'Counselor 3', 'value' => 'Counselor 3'],
            ['label' => 'Counselor 4', 'value' => 'Counselor 4'],
        ];
    @endphp

    <div 
        x-data="officerFormManager(@js($operationalDivisions), 'ADMIN')" 
        class="relative w-full h-full pb-20"
    >
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
                    <a href="{{ url('/admin/pengurus') }}" class="px-6 py-3 rounded-xl border border-white/10 text-gray-300 hover:bg-white/5 font-bold text-sm transition-all">
                        Go Back
                    </a>
                </div>
            </div>
        </template>

        <template x-if="!accessDenied">
             <form @submit="isSubmitting = true" action="{{ route('admin.pengurus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="sticky top-0 z-30 bg-[#0C101C]/80 backdrop-blur-md border-b border-white/5 px-4 md:px-8 py-5 flex justify-between items-center shadow-md gap-4 -mx-4 md:-mx-10 px-4 md:px-10 mb-8">
                    <div class="flex items-center gap-4">
                        <button type="button" @click="isSidebarOpen = true" class="md:hidden p-2 bg-[#151b2b] rounded-lg text-[#E7B95A] border border-white/10 hover:bg-white/5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                        </button>
                        <div class="p-2 rounded-full bg-white/5 text-[#E7B95A] hidden md:block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                        </div>
                        <div>
                            <h1 class="font-bold text-lg md:text-xl text-white">Add New Personnel</h1>
                            <p class="text-[10px] text-gray-500 uppercase tracking-wide hidden md:block">Register Member & Assign Roles</p>
                        </div>
                    </div>
                    
                    <button 
                        type="submit"
                        :disabled="isSubmitting"
                        class="px-4 md:px-6 py-2.5 rounded-xl text-sm font-bold text-[#0C101C] flex items-center gap-2 bg-[#E7B95A] hover:bg-[#F4D03F] transition-colors shadow-lg disabled:opacity-50 disabled:cursor-not-allowed whitespace-nowrap"
                    >
                        <span x-show="!isSubmitting" class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                            <span class="hidden md:inline">Save Data</span><span class="md:hidden">Save</span>
                        </span>
                        <span x-show="isSubmitting" class="flex items-center gap-2" x-cloak>
                            <svg class="animate-spin h-4 w-4 text-[#0C101C]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Saving...
                        </span>
                    </button>
                </div>

                @if ($errors->any())
                    <div class="mb-8 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400">
                        <div class="flex items-center gap-2 mb-2 font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                            Oops! Gagal menyimpan data:
                        </div>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 mx-4 md:mx-0 p-4 bg-red-500/10 border border-red-500/50 rounded-xl text-red-500 text-sm">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <div class="lg:col-span-4 space-y-6">
                        <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-6 md:p-8 text-center shadow-lg">
                            
                            <div class="mb-6 relative mx-auto w-40 h-40">
                                <div class="relative w-full h-full bg-[#0C101C] border-2 border-dashed border-white/10 rounded-full hover:border-[#E7B95A] transition-colors flex flex-col items-center justify-center cursor-pointer group overflow-hidden shadow-inner">
                                    <template x-if="imagePreview">
                                        <img :src="imagePreview" alt="Profile" class="absolute inset-0 w-full h-full object-cover">
                                    </template>
                                    <template x-if="!imagePreview">
                                        <div class="flex flex-col items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600 mb-2 group-hover:text-[#E7B95A] transition-colors"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                            <span class="text-[10px] text-gray-500 uppercase font-bold">Upload Photo</span>
                                        </div>
                                    </template>
                                    <input type="hidden" name="image" :value="uploadedFileUrl">
                                    <input type="file" accept="image/*" @change="handleImageUpload" class="absolute inset-0 opacity-0 cursor-pointer">
                                </div>
                            </div>

                            <div class="space-y-4 text-left">
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">IEEE Member ID <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"><line x1="4" x2="20" y1="9" y2="9"/><line x1="4" x2="20" y1="15" y2="15"/><line x1="10" x2="8" y1="3" y2="21"/><line x1="16" x2="14" y1="3" y2="21"/></svg>
                                        <input 
                                            type="text" 
                                            name="member_id" 
                                            x-model="formData.memberId" 
                                            required
                                            placeholder="10200..." 
                                            class="w-full bg-[#0C101C] border border-white/10 rounded-xl py-3 pl-10 pr-4 text-white focus:border-[#E7B95A] outline-none font-mono text-center tracking-wider font-bold transition-colors" 
                                        />
                                    </div>
                                </div>

                                <input type="hidden" name="access_role" :value="formData.accessRole">
                                <div 
                                    class="p-4 rounded-xl border mt-4 transition-colors"
                                    :class="{
                                        'bg-red-500/10 text-red-400 border-red-500/20': formData.accessRole === 'ADMIN',
                                        'bg-purple-500/10 text-purple-400 border-purple-500/20': formData.accessRole === 'CORE',
                                        'bg-blue-500/10 text-blue-400 border-blue-500/20': formData.accessRole === 'HEAD',
                                        'bg-yellow-500/10 text-yellow-400 border-yellow-500/20': formData.accessRole === 'COUNSELOR',
                                        'bg-emerald-500/10 text-emerald-400 border-emerald-500/20': formData.accessRole === 'STAFF'
                                    }"
                                >
                                    <div class="flex items-center gap-2 mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                                        <span class="text-[10px] font-bold uppercase">System Access Level</span>
                                    </div>
                                    <p class="text-lg font-bold tracking-tight" x-text="formData.accessRole"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-8 space-y-6">
                        <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-6 md:p-8 shadow-lg">
                            <h2 class="font-bold text-lg mb-6 flex items-center gap-2">
                                <span class="w-1 h-6 rounded bg-[#E7B95A]"></span> Personal & Structure
                            </h2>
                            
                            <div class="space-y-6">
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Full Name <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                        <input 
                                            type="text" 
                                            name="name" 
                                            x-model="formData.name" 
                                            required
                                            placeholder="Ex: Muhammad Fathin"
                                            class="w-full bg-[#0C101C] border border-white/10 rounded-xl py-4 pl-12 pr-4 text-white focus:border-[#E7B95A] outline-none text-lg font-bold placeholder:text-gray-700 transition-colors"
                                        />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Position</label>
                                        <div class="relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                                            <select 
                                                name="position" 
                                                x-model="formData.position" 
                                                class="w-full bg-[#0C101C] border border-white/10 rounded-xl py-4 pl-12 pr-4 text-white focus:border-[#E7B95A] outline-none appearance-none cursor-pointer transition-colors"
                                            >
                                                @foreach($positions as $pos)
                                                    <option value="{{ $pos['value'] }}">{{ $pos['label'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Department</label>
                                        
                                        <template x-if="showDivisionDropdown">
                                            <select 
                                                name="division"
                                                x-model="formData.division" 
                                                class="w-full bg-[#0C101C] border border-white/10 rounded-xl py-4 px-4 text-white focus:border-[#E7B95A] outline-none appearance-none cursor-pointer transition-colors"
                                            >
                                                <template x-for="div in operationalDivisions" :key="div">
                                                    <option :value="div" x-text="div"></option>
                                                </template>
                                            </select>
                                        </template>

                                        <template x-if="!showDivisionDropdown">
                                            <div class="w-full bg-white/5 border border-white/10 rounded-xl py-4 px-4 text-gray-400 italic cursor-not-allowed select-none flex items-center gap-2">
                                                <input type="hidden" name="division" :value="formData.division">
                                                <span x-text="formData.division"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
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
            Alpine.data('officerFormManager', (opDivisions, initialRole) => ({
                operationalDivisions: opDivisions,
                userRole: initialRole,
                isSubmitting: false,
                imagePreview: null,
                uploadedFileUrl: null,
                showDivisionDropdown: true,
                
                formData: {
                    name: '',
                    memberId: '',
                    position: 'Staff',
                    division: opDivisions[0],
                    accessRole: 'STAFF'
                },

                get accessDenied() {
                    return !['ADMIN', 'CORE', 'HEAD'].includes(this.userRole);
                },

                async handleImageUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        if(file.size > 5 * 1024 * 1024) {
                            alert('File too large! Max 5MB.');
                            event.target.value = '';
                            this.imagePreview = null;
                            this.uploadedFileUrl = null;
                            return;
                        }
                        this.imagePreview = URL.createObjectURL(file);
                        
                        this.isSubmitting = true;
                        const formData = new FormData();
                        formData.append('file', file);
                        formData.append('upload_preset', '{{ env("NEXT_PUBLIC_CLOUDINARY_UPLOAD_PRESET") }}');
                        
                        try {
                            const cloudName = '{{ env("NEXT_PUBLIC_CLOUDINARY_CLOUD_NAME") }}';
                            const res = await fetch(`https://api.cloudinary.com/v1_1/${cloudName}/image/upload`, {
                                method: 'POST',
                                body: formData
                            });
                            const data = await res.json();
                            if (data.secure_url) {
                                this.uploadedFileUrl = data.secure_url;
                            }
                        } catch (err) {
                            alert('Upload image failed!');
                        } finally {
                            this.isSubmitting = false;
                        }
                    } else {
                        this.imagePreview = null;
                        this.uploadedFileUrl = null;
                    }
                },

                updateRoleAndDivision() {
                    let role = "STAFF";
                    let div = this.formData.division;
                    let showDiv = true;

                    if (this.formData.position === "Web Master") {
                        role = "ADMIN";
                        div = "Information & Creative Media";
                        showDiv = false;
                    }
                    else if (this.formData.position.startsWith("Counselor")) {
                        role = "COUNSELOR";
                        div = "Advisory Board";
                        showDiv = false;
                    }
                    else if (["Director", "Vice Director I", "Vice Director II", "Vice Director III"].includes(this.formData.position)) {
                        role = "CORE";
                        div = "Executive Board";
                        showDiv = false;
                    }
                    else if (this.formData.position === "Head of Division") {
                        role = "HEAD";
                        showDiv = true;
                    }
                    else {
                        if (!this.operationalDivisions.includes(div)) {
                            div = this.operationalDivisions[0];
                        }
                        showDiv = true;
                    }

                    this.formData.accessRole = role;
                    this.formData.division = div;
                    this.showDivisionDropdown = showDiv;
                },

                init() {
                    this.$watch('formData.position', () => {
                        this.updateRoleAndDivision();
                    });
                    this.updateRoleAndDivision();
                }
            }));
        });
    </script>
</x-layouts.admin>