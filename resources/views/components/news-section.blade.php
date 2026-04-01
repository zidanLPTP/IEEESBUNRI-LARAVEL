<style>
    @keyframes shootingLineNews {
        0% {
            top: -20%;
        }

        100% {
            top: 120%;
        }
    }

    .animate-shooting-news {
        animation: shootingLineNews 3s linear infinite;
    }
</style>

<section id="news" class="py-32 bg-[#0C101C] text-white overflow-hidden relative">

    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1px] h-full bg-[#3386B7]/10 z-0 overflow-hidden"
        aria-hidden="true">
        <div
            class="absolute top-0 left-0 w-full h-[150px] bg-gradient-to-b from-transparent via-white to-transparent opacity-50 animate-shooting-news">
        </div>
    </div>

    <x-firefly-background />

    <div class="container mx-auto px-6 relative z-10">

        <div x-data="{ shown: false }"
            x-init="const observer = new IntersectionObserver(entries => { if (entries[0].isIntersecting) { shown = true; observer.disconnect(); } }, { rootMargin: '0px 0px -50px 0px' }); observer.observe($el);"
            class="relative flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div class="max-w-2xl">
                <span :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="text-[#E7B95A] font-bold tracking-[0.2em] uppercase text-sm block mb-3 transform transition-all duration-700 ease-out">
                    Insight & Updates
                </span>
                <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="text-4xl md:text-5xl font-bold leading-tight transform transition-all duration-700 delay-100 ease-out">
                    Latest <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-[#7AABC3] to-[#3386B7]">News</span>
                </h2>
            </div>

            <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-8'"
                class="transform transition-all duration-700 delay-200 ease-out">
                <a href="{{ url('/news') }}"
                    class="group flex items-center gap-2 text-sm font-bold text-[#7AABC3] hover:text-[#E7B95A] transition-colors">
                    View All Articles
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="transform group-hover:translate-x-1 transition-transform">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <div x-data="{ shown: false }"
            x-init="const observer = new IntersectionObserver(entries => { if (entries[0].isIntersecting) { shown = true; observer.disconnect(); } }, { rootMargin: '0px 0px -100px 0px' }); observer.observe($el);"
            class="grid lg:grid-cols-3 gap-6 h-auto lg:h-[600px]">

            <article :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-[0.95]'"
                class="lg:col-span-2 h-full relative group rounded-3xl overflow-hidden border border-white/5 bg-[#151b2b] flex flex-col justify-end z-20 transform transition-all duration-700 ease-out">
                @if(isset($news[0]))
                    <a href="{{ url('/news/' . $news[0]->slug) }}" class="absolute inset-0 z-30"
                        aria-label="Read article: {{ $news[0]->title }}"></a>

                    <img src="{{ $news[0]->image ? (str_starts_with($news[0]->image, 'http') ? $news[0]->image : asset('storage/' . $news[0]->image)) : 'https://placehold.co/800x600/151b2b/7AABC3?text=IEEE+News' }}"
                        alt="{{ $news[0]->title }}" loading="lazy"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />

                    <div class="absolute inset-0 bg-gradient-to-t from-[#0C101C] via-[#0C101C]/40 to-transparent pointer-events-none"
                        aria-hidden="true"></div>

                    <div class="relative p-8 md:p-12 z-20 pointer-events-none">
                        <span
                            class="inline-block px-3 py-1 mb-4 rounded-lg bg-[#E7B95A] text-[#0C101C] text-xs font-bold uppercase shadow-lg">
                            {{ $news[0]->category }}
                        </span>
                        <h3
                            class="text-3xl md:text-5xl font-bold mb-4 leading-tight group-hover:text-[#7AABC3] transition-colors line-clamp-3">
                            {{ $news[0]->title }}
                        </h3>
                        <div class="flex items-center gap-4 text-sm text-gray-300">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                {{ $news[0]->author_name ?? 'Admin' }}
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full bg-gray-500"></span>
                            <span>{{ $news[0]->date ? \Carbon\Carbon::parse($news[0]->date)->format('d M Y') : $news[0]->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                @else
                    <div class="absolute inset-0 flex flex-col items-center justify-center p-8 text-center bg-[#151b2b]">
                        <p class="text-gray-500">No headline news available yet.</p>
                    </div>
                @endif
            </article>

            <div class="lg:col-span-1 flex flex-col gap-6 h-full z-20">

                @foreach($news->skip(1) as $item)
                    <article :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-12'"
                        class="flex-1 rounded-3xl border border-white/5 bg-[#151b2b] relative overflow-hidden group hover:border-[#3386B7]/30 transition-all duration-700 p-6 flex flex-col justify-center">
                        <a href="{{ url('/news/' . $item->slug) }}" class="absolute inset-0 z-30"
                            aria-label="Read article: {{ $item->title }}"></a>
                        <div class="flex items-center gap-2 text-[#7AABC3] text-xs font-bold uppercase mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                            </svg>
                            {{ $item->category }}
                        </div>
                        <h4 class="text-xl font-bold mb-2 group-hover:text-[#E7B95A] transition-colors line-clamp-2">
                            {{ $item->title }}
                        </h4>
                        <p class="text-sm text-gray-500 line-clamp-2">
                            {{ $item->excerpt }}
                        </p>
                    </article>
                @endforeach

                <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-12'"
                    class="h-24 rounded-3xl bg-gradient-to-r from-[#214664] to-[#151b2b] p-6 flex items-center justify-between border border-white/10 transition-all duration-700 delay-300">
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-bold tracking-wider">Active Writers</p>
                        <p class="text-2xl font-bold text-white">
                            {{ $writersCount }}
                            <span class="text-sm text-gray-500 font-normal ml-2">Contributors</span>
                        </p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="text-[#7AABC3]">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>