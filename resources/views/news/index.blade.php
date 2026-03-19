<x-layouts.app>
    <x-slot:title>News & Updates | IEEE SB UNRI</x-slot:title>

    <x-navbar />

    <main class="min-h-screen bg-[#0C101C] text-white selection:bg-[#E7B95A] selection:text-[#0C101C]">
        
        <x-firefly-background />

        <section class="pt-40 pb-16 px-6 container mx-auto relative">
            <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-[#E7B95A]/5 rounded-full blur-[150px] pointer-events-none" aria-hidden="true"></div>
            <div class="text-center max-w-3xl mx-auto relative z-10">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 tracking-tight"> 
                    News <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#7AABC3] to-[#E7B95A]">& Updates</span>
                </h1>
                <p class="text-gray-400 text-lg">Stay informed about our activities, achievements, and announcements.</p>
            </div>
        </section>

        <section x-data="{ selectedArticle: null }" class="pb-20 px-6 container mx-auto min-h-[500px] relative z-10">
            
            @if($articles->isEmpty())
                <div class="w-full rounded-3xl border border-dashed border-white/10 bg-[#151b2b]/20 flex flex-col items-center justify-center text-center p-12 md:p-24 relative overflow-hidden animate-[fadeInUp_0.8s_ease-out]">
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#3386B7]/5 to-transparent opacity-50 pointer-events-none" aria-hidden="true"></div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-24 h-24 rounded-full bg-[#151b2b] border border-white/10 flex items-center justify-center mb-8 shadow-2xl relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#E7B95A]"><path d="m12 19 7-7 3 3-7 7-3-3z"/><path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="m2 2 7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-3">Our Editors are Typing...</h3>
                        <p class="text-gray-400 max-w-md">We are currently curating the best stories for you. Please check back later.</p>
                    </div>
                </div>
            @else
                <div class="max-w-5xl mx-auto">
                    <div class="grid gap-8">
                        @foreach($articles as $index => $article)
                            <article 
                                @click="selectedArticle = {{ json_encode($article) }}"
                                class="flex flex-col md:flex-row gap-6 bg-[#151b2b] border border-white/5 p-6 rounded-3xl hover:border-[#3386B7]/30 transition-all group cursor-pointer animate-[fadeInUp_0.8s_ease-out]"
                                style="animation-fill-mode: both; animation-delay: {{ $index * 100 }}ms;"
                            >
                                <div class="w-full md:w-64 h-48 bg-gray-800 rounded-2xl overflow-hidden relative shrink-0">
                                    @if($article->image)
                                        <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}" class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105" />
                                    @else
                                        <div class="absolute inset-0 flex items-center justify-center text-gray-600 bg-[#0C101C]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-20 text-[#7AABC3]"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex flex-col justify-center flex-grow">
                                    <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                                        <span class="flex items-center gap-1 text-[#E7B95A] font-bold uppercase">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                            <time>{{ \Carbon\Carbon::parse($article->date)->format('d M Y') }}</time>
                                        </span>
                                        <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                                        <span class="flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                            {{ $article->author_name ?? 'Admin' }}
                                        </span>
                                    </div>
                                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-[#3386B7] transition-colors line-clamp-2">{{ $article->title }}</h3>
                                    <p class="text-gray-400 text-sm line-clamp-3 mb-4 leading-relaxed">{{ $article->excerpt }}</p>
                                    <button class="text-[#7AABC3] text-sm font-bold flex items-center gap-2 hover:text-white transition-colors self-start mt-auto">Quick Read <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg></button>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="mt-16 border-t border-white/5 pt-8">
                        {{ $articles->links() }}
                    </div>
                </div>
            @endif

            <template x-if="selectedArticle">
                <div x-cloak class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md flex items-center justify-center p-4" @click="selectedArticle = null">
                    <div @click.stop class="bg-[#151b2b] w-full max-w-3xl h-[90vh] md:h-auto md:max-h-[90vh] rounded-3xl border border-white/10 overflow-hidden relative shadow-2xl flex flex-col">
                        <button @click="selectedArticle = null" class="absolute top-4 right-4 p-2 rounded-full bg-black/50 text-white hover:bg-[#E7B95A] hover:text-black transition-colors z-20"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
                        <div class="relative h-64 md:h-80 w-full shrink-0">
                            <img :src="selectedArticle.image ? '/storage/' + selectedArticle.image : 'https://placehold.co/800x400/151b2b/7AABC3?text=IEEE+News'" class="object-cover w-full h-full" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#151b2b] to-transparent"></div>
                            <div class="absolute bottom-6 left-6 z-10">
                                <span class="px-3 py-1 rounded-full bg-[#E7B95A] text-[#0C101C] text-xs font-bold uppercase mb-3 inline-block" x-text="selectedArticle.category"></span>
                                <h2 class="text-2xl md:text-4xl font-bold text-white leading-tight" x-text="selectedArticle.title"></h2>
                            </div>
                        </div>
                        <div class="p-6 md:p-10 overflow-y-auto custom-scrollbar">
                            <div class="prose prose-invert prose-lg max-w-none text-gray-300 space-y-4" x-html="selectedArticle.content"></div>
                            <div class="mt-10 pt-6 border-t border-white/5 text-center">
                                <a :href="'/news/' + selectedArticle.slug" class="inline-flex items-center gap-2 px-8 py-3 rounded-full bg-[#3386B7] text-white font-bold transition-all hover:bg-[#7AABC3]">Read Full Article <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </section>
    </main>
    <x-footer />
</x-layouts.app>