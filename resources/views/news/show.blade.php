<x-layouts.app>
    <x-slot:title>Reading Article | IEEE SB UNRI</x-slot:title>

    @php
        // MOCK DATA: Menyimulasikan query database berdasarkan $slug dari Route
        // Di masa depan: $news = News::where('slug', $slug)->firstOrFail();
        $news = [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'author' => 'Fathin Ahmad',
            'category' => 'Featured',
            'date' => '24 Februari 2026',
            'image' => null, // Simulasi tanpa gambar untuk melihat fallback
            'content' => '
                <p>Our delegates recently participated in the prestigious Global Tech Summit 2026. This monumental event gathered tech enthusiasts from over 50 countries to discuss the future of AI and renewable energy.</p>
                <h2>The Role of AI in Sustainability</h2>
                <p>During the opening keynote, the emphasis was placed on how machine learning models can optimize energy grids. As IEEE students, we took notes on practical applications that can be implemented in Riau.</p>
                <blockquote>"Innovation connects us. Keep building, keep learning." - Keynote Speaker</blockquote>
                <p>We plan to host a follow-up seminar next month to share the knowledge we acquired. Stay tuned on our social media channels.</p>
            '
        ];
    @endphp

    <div 
        x-data="{ 
            scrollProgress: 0,
            calculateProgress() {
                let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                this.scrollProgress = (winScroll / height) * 100;
            }
        }"
        @scroll.window="calculateProgress()"
        class="min-h-screen bg-[#0C101C] text-white relative font-sans selection:bg-[#E7B95A] selection:text-[#0C101C]"
    >
        
        <x-navbar />

        <div 
            class="fixed top-0 left-0 h-1 bg-[#E7B95A] z-[60] transition-all duration-75 ease-out"
            :style="`width: ${scrollProgress}%`"
        ></div>

        <div class="fixed inset-0 z-0 bg-[#0C101C]" aria-hidden="true"></div>

        <article class="relative z-10 pt-32 md:pt-40 pb-20 container mx-auto px-6">
            
            <div class="grid lg:grid-cols-12 gap-8 lg:gap-16 items-start mb-16 border-b border-white/5 pb-12">
                
                <div class="lg:col-span-7 order-2 lg:order-1 flex flex-col">
                    
                    <div class="flex items-center gap-4 mb-6 text-xs font-medium text-gray-500 animate-[fadeInUp_0.6s_ease-out]">
                        <a href="{{ url('/news') }}" class="hover:text-[#E7B95A] transition-colors flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                            NEWS
                        </a>
                        <span class="w-1 h-1 rounded-full bg-gray-700"></span>
                        <span class="uppercase tracking-wider">{{ $news['category'] }}</span>
                        <span class="w-1 h-1 rounded-full bg-gray-700"></span>
                        <span>{{ $news['date'] }}</span>
                    </div>

                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold leading-[1.1] mb-6 text-white font-serif tracking-tight animate-[fadeInUp_0.8s_ease-out]">
                        {{ $news['title'] }}
                    </h1>

                    <div class="flex items-center gap-3 mt-4 animate-[fadeInUp_1s_ease-out]">
                        <div class="w-10 h-10 rounded-full bg-gray-800 overflow-hidden relative border border-white/10">
                            <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-[#151b2b] to-[#0C101C] text-gray-400 font-serif">
                                {{ substr($news['author'], 0, 1) }}
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm font-medium text-white">{{ $news['author'] }}</span>
                            <span class="text-[10px] text-gray-500 uppercase tracking-widest">Editor & Contributor</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 order-1 lg:order-2 animate-[fadeInUp_0.8s_ease-out]">
                    <div class="relative w-full aspect-video lg:aspect-[16/9] rounded-xl overflow-hidden bg-[#151b2b] border border-white/5 shadow-2xl group">
                        @if($news['image'])
                            <img src="{{ asset($news['image']) }}" alt="{{ $news['title'] }}" class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105" />
                        @else
                            <div class="absolute inset-0 flex items-center justify-center bg-[#0C101C]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-gray-700 opacity-50"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                            </div>
                        @endif
                    </div>
                    <p class="mt-2 text-[10px] text-right text-gray-600 uppercase tracking-widest">
                        Fig 1.0 — Documentation
                    </p>
                </div>

            </div>

            <div class="grid lg:grid-cols-12 gap-12">
                <div class="lg:col-span-8 lg:col-start-4">
                    
                    <div class="
                        max-w-none 
                        [&>p:first-of-type]:text-xl [&>p:first-of-type]:leading-loose [&>p:first-of-type]:text-gray-300 [&>p:first-of-type]:font-serif [&>p:first-of-type]:mb-8
                        [&>p:first-of-type]:first-letter:text-4xl [&>p:first-of-type]:first-letter:font-bold [&>p:first-of-type]:first-letter:text-[#E7B95A] [&>p:first-of-type]:first-letter:mr-2 [&>p:first-of-type]:first-letter:float-left
                        [&>blockquote]:border-l-2 [&>blockquote]:border-[#E7B95A] [&>blockquote]:pl-6 [&>blockquote]:py-1 [&>blockquote]:my-10 [&>blockquote]:italic [&>blockquote]:text-xl [&>blockquote]:text-gray-200 [&>blockquote]:font-serif
                        [&>h2]:text-2xl [&>h2]:font-bold [&>h2]:text-white [&>h2]:mt-12 [&>h2]:mb-4
                        [&>h3]:text-xl [&>h3]:font-semibold [&>h3]:text-gray-200 [&>h3]:mt-8 [&>h3]:mb-3
                        [&>p>a]:text-[#3386B7] [&>p>a]:underline [&>p>a]:decoration-1 [&>p>a]:underline-offset-4 hover:[&>p>a]:text-[#E7B95A] hover:[&>p>a]:no-underline
                        [&>ul]:list-disc [&>ul]:pl-5 [&>ul]:text-gray-400 [&>ul]:mb-4
                        [&>ol]:list-decimal [&>ol]:pl-5 [&>ol]:text-gray-400 [&>ol]:mb-4
                        text-gray-400 leading-8 font-light space-y-6 animate-[fadeInUp_1.2s_ease-out]
                    ">
                        {!! $news['content'] !!}
                    </div>

                    <div class="mt-16 pt-8 border-t border-white/5 flex flex-col md:flex-row items-center gap-6 justify-center text-center md:text-left">
                        <svg class="text-[#3386B7] shrink-0 rotate-180 opacity-50" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.99c1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/></svg>
                        <p class="text-gray-500 italic text-sm font-serif max-w-lg">
                            "Innovation connects us. Keep building, keep learning."
                        </p>
                    </div>
                    
                </div>
            </div>

        </article>

        <x-footer />
    </div>
</x-layouts.app>

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>