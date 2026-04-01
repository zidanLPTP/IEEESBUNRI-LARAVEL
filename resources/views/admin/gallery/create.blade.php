<x-layouts.admin>
    <x-slot:title>Upload Gallery | IEEE Admin</x-slot:title>

    <div x-data="galleryFormManager()" class="relative w-full pb-20">
        <form @submit="isSubmitting = true" action="{{ route('admin.gallery.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div
                class="sticky top-0 z-30 bg-[#0C101C]/90 backdrop-blur-md border-b border-white/5 px-4 md:px-8 py-5 flex justify-between items-center shadow-md gap-4 -mx-4 md:-mx-10 px-4 md:px-10 mb-8">
                <div class="flex items-center gap-4">
                    <button type="button" @click="isSidebarOpen = true"
                        class="md:hidden p-2 bg-[#151b2b] rounded-lg text-[#E7B95A] border border-white/10 hover:bg-white/5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="4" x2="20" y1="12" y2="12" />
                            <line x1="4" x2="20" y1="6" y2="6" />
                            <line x1="4" x2="20" y1="18" y2="18" />
                        </svg>
                    </button>
                    <div>
                        <h1 class="font-bold text-xl md:text-2xl text-white">Upload Moment</h1>
                        <p class="text-xs text-gray-400 mt-1 hidden md:block">Add photos to public gallery</p>
                    </div>
                </div>

                <button type="submit" :disabled="isSubmitting"
                    class="px-4 md:px-6 py-2.5 rounded-xl text-sm font-bold text-[#0C101C] flex items-center gap-2 bg-[#E7B95A] hover:bg-[#F4D03F] transition-colors shadow-lg disabled:opacity-50 disabled:cursor-not-allowed whitespace-nowrap">
                    <span x-show="!isSubmitting" class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                            <path d="M12 12v9" />
                            <path d="m16 16-4-4-4 4" />
                        </svg>
                        <span class="hidden md:inline">Upload Now</span><span class="md:hidden">Upload</span>
                    </span>
                    <span x-show="isSubmitting" class="flex items-center gap-2" x-cloak>
                        <svg class="animate-spin h-4 w-4 text-[#0C101C]" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Uploading...
                    </span>
                </button>
            </div>

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

                <div class="lg:col-span-7 space-y-6">
                    <div class="bg-[#151b2b] border border-white/5 rounded-3xl p-6 md:p-8 space-y-8 shadow-lg">

                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase mb-3 block">Photo File <span
                                    class="text-red-500">*</span></label>

                            <div
                                class="relative aspect-video bg-[#0C101C] border-2 border-dashed border-white/10 rounded-xl hover:border-white/30 transition-colors flex flex-col items-center justify-center cursor-pointer group overflow-hidden">

                                <template x-if="imagePreview">
                                    <img :src="imagePreview" alt="Upload"
                                        class="absolute inset-0 w-full h-full object-cover">
                                </template>

                                <template x-if="!imagePreview">
                                    <div class="text-center p-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="text-gray-700 mb-4 mx-auto group-hover:text-white transition-colors">
                                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                                            <circle cx="9" cy="9" r="2" />
                                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                        </svg>
                                        <p class="text-sm text-gray-400 font-bold mb-1">Click to upload photo</p>
                                        <span class="text-[10px] text-gray-600">JPG, PNG, WEBP (Max 5MB)</span>
                                    </div>
                                </template>

                                <input type="hidden" name="image" :value="uploadedFileUrl">
                                <input type="file" accept="image/*" required @change="handleImageUpload"
                                    class="absolute inset-0 opacity-0 cursor-pointer">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Caption <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="caption" x-model="formData.caption" required
                                    placeholder="Ex: Documentation of Monthly Meeting..."
                                    class="w-full bg-[#0C101C] border border-white/10 rounded-xl p-4 text-white focus:border-[#E7B95A] outline-none placeholder:text-gray-700 transition-colors">
                            </div>

                            <div class="md:col-span-2">
                                <label class="text-xs font-bold text-gray-500 uppercase mb-2 block">Category Tag</label>
                                <div class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                                        <line x1="4" x2="20" y1="9" y2="9" />
                                        <line x1="4" x2="20" y1="15" y2="15" />
                                        <line x1="10" x2="8" y1="3" y2="21" />
                                        <line x1="16" x2="14" y1="3" y2="21" />
                                    </svg>
                                    <select name="tag" x-model="formData.tag"
                                        class="w-full bg-[#0C101C] border border-white/10 rounded-xl py-4 pl-12 pr-4 text-white focus:border-[#E7B95A] outline-none appearance-none cursor-pointer">
                                        <option value="Activity">Activity</option>
                                        <option value="Competition">Competition</option>
                                        <option value="Documentation">Documentation</option>
                                        <option value="Award">Award</option>
                                        <option value="Social">Social</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="lg:col-span-5 sticky top-28 hidden lg:block">
                    <div class="flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="text-[#E7B95A]">
                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Live Preview</span>
                    </div>

                    <div
                        class="bg-[#151b2b] border border-white/5 rounded-[2rem] overflow-hidden shadow-2xl group relative">

                        <div class="relative aspect-video bg-[#0C101C]">
                            <template x-if="imagePreview">
                                <img :src="imagePreview" alt="Preview"
                                    class="absolute inset-0 w-full h-full object-cover">
                            </template>

                            <template x-if="!imagePreview">
                                <div
                                    class="w-full h-full flex flex-col items-center justify-center text-gray-600 bg-[#0C101C]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="mb-2 opacity-50">
                                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                                        <circle cx="9" cy="9" r="2" />
                                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                    </svg>
                                    <span class="text-xs uppercase tracking-widest">No Image Selected</span>
                                </div>
                            </template>

                            <div class="absolute top-4 left-4 px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-black/60 backdrop-blur text-white border border-white/10"
                                x-text="formData.tag"></div>
                        </div>

                        <div class="p-8 relative z-10">
                            <h3 class="text-xl font-bold text-white mb-4 leading-tight"
                                x-text="formData.caption || 'Your caption will appear here...'"></h3>

                            <div
                                class="pt-6 border-t border-white/5 flex items-center justify-between text-xs text-gray-400">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-6 h-6 rounded-full bg-[#E7B95A] text-[#0C101C] flex items-center justify-center font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>
                                    </div>
                                    <span class="font-bold text-white" x-text="userName"></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                    <span x-text="currentDate"></span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="absolute top-0 right-0 w-64 h-64 bg-[#E7B95A]/5 rounded-full blur-[80px] pointer-events-none z-0">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('galleryFormManager', () => ({
                isSubmitting: false,
                imagePreview: null,
                uploadedFileUrl: null,

                userName: '{{ auth()->check() ? auth()->user()->name : "Admin Zidan" }}',
                currentDate: new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }),

                formData: {
                    caption: '',
                    tag: 'Activity'
                },

                async handleImageUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        if (file.size > 5 * 1024 * 1024) {
                            alert('File terlalu besar! Maksimal 5MB.');
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
                }
            }));
        });
    </script>
</x-layouts.admin>