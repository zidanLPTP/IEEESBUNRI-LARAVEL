<x-layouts.app>
    <x-slot:title>Multimedia Gallery | IEEE SB UNRI</x-slot:title>

    <x-navbar />

    <main class="min-h-screen bg-[#0C101C] text-white selection:bg-[#E7B95A] selection:text-[#0C101C]">

        <x-firefly-background />

        @php
            // LOGIKA BENTO GRID DINAMIS (ASLI)
            $getBentoClass = function ($index, $page) {
                $pattern = $page % 3;
                if ($pattern === 1) {
                    if ($index === 0)
                        return 'md:col-span-2 md:row-span-2';
                    if ($index === 3)
                        return 'md:col-span-2';
                } elseif ($pattern === 2) {
                    if ($index === 2)
                        return 'md:col-span-2 md:row-span-2';
                    if ($index === 5)
                        return 'md:col-span-2';
                } else {
                    if ($index === 6)
                        return 'md:col-span-2 md:row-span-2';
                    if ($index === 1)
                        return 'md:col-span-2';
                }
                return 'col-span-1 row-span-1';
            };
        @endphp

        <section class="pt-40 pb-16 px-6 container mx-auto relative z-10">
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-[#3386B7]/5 rounded-full blur-[150px] pointer-events-none"
                aria-hidden="true"></div>

            <div class="text-center max-w-3xl mx-auto relative">
                <span
                    class="text-[#E7B95A] font-bold tracking-[0.2em] uppercase text-sm block mb-3 animate-[fadeInUp_0.6s_ease-out]">Documentation</span>
                <h1
                    class="text-5xl md:text-7xl font-bold text-white mb-6 tracking-tight animate-[fadeInUp_0.8s_ease-out]">
                    Moment <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-[#7AABC3] to-[#E7B95A]">Captures</span>
                </h1>
                <p class="text-gray-400 text-lg animate-[fadeInUp_1s_ease-out]">Visual records of our journey,
                    achievements, and the vibrant community of IEEE SB UNRI.</p>
            </div>
        </section>

        <section x-data="{ selectedImage: null, isAnimating: false }"
            class="pb-20 px-4 md:px-8 container mx-auto min-h-[500px] relative z-10">
            @if($galleries->isEmpty())
                <div
                    class="w-full h-[400px] rounded-3xl border border-dashed border-white/10 flex flex-col items-center justify-center text-center">
                    <h3 class="text-2xl font-bold text-white mb-2">No Moments Captured Yet</h3>
                    <p class="text-gray-400">Our gallery is currently empty. Check back after our next big event!</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 auto-rows-[250px] gap-4 max-w-7xl mx-auto">
                    @foreach($galleries as $index => $item)
                        @php $gridClass = $getBentoClass($index, $currentPage); @endphp

                        <article
                            @click="selectedImage = {{ json_encode($item) }}; isAnimating = true; setTimeout(() => isAnimating = false, 300)"
                            class="{{ $gridClass }} relative group overflow-hidden rounded-3xl bg-[#151b2b] border border-white/5 cursor-pointer shadow-lg hover:border-[#3386B7]/40 transition-all duration-500 animate-[fadeInUp_0.8s_ease-out]"
                            style="animation-fill-mode: both; animation-delay: {{ $index * 100 }}ms;">
                            <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('storage/' . $item->image) }}"
                                alt="{{ $item->title }}" loading="lazy"
                                onerror="this.src='https://placehold.co/800x800/151b2b/7AABC3?text=IEEE+Gallery'"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#0C101C]/90 via-[#0C101C]/20 to-transparent opacity-80">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 z-20 transform translate-y-2 group-hover:translate-y-0 transition-all duration-500">
                                <span
                                    class="inline-block px-2 py-1 mb-2 rounded bg-[#E7B95A] text-[#0C101C] text-[10px] font-bold uppercase">{{ $item->category }}</span>
                                <h2 class="text-lg md:text-xl font-bold text-white leading-tight mb-1">{{ $item->title }}</h2>
                                <p class="text-xs text-gray-300 font-medium">
                                    {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="flex justify-center items-center mt-16 gap-6">
                    <a href="?page={{ max(1, $currentPage - 1) }}"
                        class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:border-[#E7B95A] transition-colors {{ $currentPage <= 1 ? 'opacity-30 pointer-events-none' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                    </a>
                    <span class="text-gray-500 text-sm font-mono">PAGE {{ $currentPage }} / {{ $totalPages }}</span>
                    <a href="?page={{ min($totalPages, $currentPage + 1) }}"
                        class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:border-[#E7B95A] transition-colors {{ $currentPage >= $totalPages ? 'opacity-30 pointer-events-none' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </a>
                </div>
            @endif

            <template x-if="selectedImage">
                <div x-cloak
                    class="fixed inset-0 z-[100] bg-black/95 backdrop-blur-xl flex items-center justify-center p-4"
                    @click="selectedImage = null">
                    <div class="relative w-full max-w-6xl flex flex-col items-center justify-center z-10" @click.stop>
                        <button @click="selectedImage = null"
                            class="absolute -top-12 right-0 p-3 text-gray-400 hover:text-white transition-all"><svg
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg></button>
                        <img :src="'/storage/' + selectedImage.image"
                            class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-2xl" />
                        <div class="mt-6 text-center">
                            <span class="text-[#E7B95A] text-xs font-bold uppercase tracking-widest"
                                x-text="selectedImage.category"></span>
                            <h3 class="text-2xl font-bold text-white mt-1" x-text="selectedImage.title"></h3>
                        </div>
                    </div>
                </div>
            </template>
        </section>
    </main>
    <x-footer />
</x-layouts.app>