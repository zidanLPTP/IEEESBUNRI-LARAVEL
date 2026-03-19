<style>
    @keyframes shootingLine {
        0% { top: -20%; }
        100% { top: 120%; }
    }
    .animate-shooting {
        animation: shootingLine 4s linear infinite;
    }
    /* CSS Static Particles: Menggantikan 40+ div JS yang berat menjadi 1 layer background */
    .bg-particles {
        background-image: 
            radial-gradient(2px 2px at 10% 20%, rgba(231,185,90,0.8), transparent),
            radial-gradient(3px 3px at 30% 60%, rgba(122,171,195,0.8), transparent),
            radial-gradient(2px 2px at 80% 40%, rgba(255,255,255,0.8), transparent),
            radial-gradient(2.5px 2.5px at 60% 80%, rgba(231,185,90,0.6), transparent),
            radial-gradient(2px 2px at 90% 10%, rgba(122,171,195,0.6), transparent);
        background-repeat: repeat;
        background-size: 300px 300px;
        opacity: 0.6;
    }
</style>

<section id="about" class="relative py-32 bg-[#0C101C] text-white overflow-hidden">
      
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1px] h-full bg-[#3386B7]/10 z-0 overflow-hidden" aria-hidden="true">
        <div class="absolute top-0 left-0 w-full h-[150px] bg-gradient-to-b from-transparent via-[#E7B95A] to-transparent opacity-50 animate-shooting"></div>
    </div>

    <x-firefly-background />

    <div class="absolute -top-[10%] -right-[20%] w-[300px] h-[300px] md:top-[-25%] md:right-[-15%] md:w-[600px] md:h-[600px] z-0 pointer-events-none" aria-hidden="true">
        <div class="absolute inset-0 rounded-full mix-blend-screen pointer-events-none blur-[60px] animate-moonLight" style="background: radial-gradient(circle at 35% 35%, rgba(242,200,115,0.9) 0%, rgba(242,200,115,0.35) 25%, rgba(242,200,115,0.12) 50%, transparent 70%)"></div>
        <div class="relative w-full h-full rounded-full animate-moon" style="background: radial-gradient(circle at 30% 30%, rgba(242,200,115,0.6), rgba(242,200,115,0.3) 60%, transparent 75%)">
            <span class="absolute w-[90px] h-[90px] rounded-full top-[35%] left-[30%] opacity-40 blur-sm" style="background: radial-gradient(circle, rgba(255,255,255,0.35), rgba(0,0,0,0.2))"></span>
            <span class="absolute w-[60px] h-[60px] rounded-full top-[55%] left-[50%] opacity-35 blur-sm" style="background: radial-gradient(circle, rgba(255,255,255,0.3), rgba(0,0,0,0.25))"></span>
            <span class="absolute w-[40px] h-[40px] rounded-full top-[42%] left-[62%] opacity-30 blur-sm" style="background: radial-gradient(circle, rgba(255,255,255,0.25), rgba(0,0,0,0.25))"></span>
            <span class="absolute w-[70px] h-[70px] rounded-full top-[28%] left-[52%] opacity-35 blur-sm" style="background: radial-gradient(circle, rgba(255,255,255,0.28), rgba(0,0,0,0.2))"></span>
        </div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
    
        <div x-data="{ shown: false }" x-init="const observer = new IntersectionObserver(entries => { if (entries[0].isIntersecting) { shown = true; observer.disconnect(); } }, { rootMargin: '0px 0px -100px 0px' }); observer.observe($el);" class="text-center max-w-3xl mx-auto mb-20">
            <span :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'" class="text-[#E7B95A] font-bold tracking-[0.2em] uppercase text-sm block transform transition-all duration-1000 ease-out">Who We Are</span>
            <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'" class="text-4xl md:text-5xl font-extrabold mt-4 mb-6 leading-tight transform transition-all duration-1000 ease-out delay-[200ms]">
                Part of <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#7AABC3] to-[#3386B7]">IEEE Indonesia Section</span> 
            </h2>
            <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'" class="text-gray-400 text-lg leading-relaxed transform transition-all duration-1000 ease-out delay-[400ms]">
                We empower students to build the future through technology, research, and professional networking.
            </p>
        </div>

        <div x-data="{ shown: false }" x-init="const observer = new IntersectionObserver(entries => { if (entries[0].isIntersecting) { shown = true; observer.disconnect(); } }, { rootMargin: '0px 0px -50px 0px' }); observer.observe($el);" class="grid md:grid-cols-3 gap-8">
          
            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'" class="md:col-span-2 group relative rounded-3xl transform transition-all duration-1000 ease-out delay-[200ms]">
                <div class="absolute -inset-[1.5px] rounded-3xl bg-gradient-to-r from-[#7AABC3] via-[#3386B7] via-[#214664] to-[#E7B95A] opacity-0 group-hover:opacity-100 transition-opacity duration-500 blur-[1px]"></div>
                <div class="relative h-full bg-[#151b2b] border border-white/5 rounded-3xl p-10 overflow-hidden transition-colors group-hover:border-transparent">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#3386B7] blur-[80px] opacity-20 pointer-events-none" aria-hidden="true"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-[#3386B7]/20 rounded-2xl flex items-center justify-center text-[#7AABC3] mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-white">Global Network</h3>
                        <p class="text-gray-400 leading-relaxed text-base">IEEE Student Branch University of Riau acts as a bridge connecting UNRI students to the global technology community. We facilitate active participation in international standard research and scientific publications.</p>
                    </div>
                </div>
            </div>

            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'" class="row-span-2 group relative rounded-3xl h-[400px] md:h-auto transform transition-all duration-1000 ease-out delay-[400ms]">
                <div class="absolute -inset-[1.5px] rounded-3xl bg-gradient-to-r from-[#7AABC3] via-[#3386B7] via-[#214664] to-[#E7B95A] opacity-0 group-hover:opacity-100 transition-opacity duration-500 blur-[1px]"></div>
                <div class="relative h-full w-full bg-gray-900 rounded-3xl overflow-hidden border border-white/5 group-hover:border-transparent">
                    <img src="{{ asset('images/bento-ieeeunri.png') }}" alt="Aktivitas Mahasiswa IEEE UNRI" class="object-cover w-full h-full" loading="lazy" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0C101C] via-[#0C101C]/20 to-transparent pointer-events-none" aria-hidden="true"></div>
                    <div class="absolute bottom-8 left-8 right-8">
                        <div class="flex items-center gap-2 text-[#E7B95A] text-sm font-bold mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            University of Riau, Indonesia
                        </div>
                        <p class="text-white font-medium text-lg leading-snug">Empowering students through real-world technical experience.</p>
                    </div>
                </div>
            </div>

            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'" class="group relative rounded-3xl transform transition-all duration-1000 ease-out delay-[500ms]">
                <div class="absolute -inset-[1.5px] rounded-3xl bg-gradient-to-r from-[#7AABC3] via-[#3386B7] via-[#214664] to-[#E7B95A] opacity-0 group-hover:opacity-100 transition-opacity duration-500 blur-[1px]"></div>
                <div class="relative h-full bg-[#151b2b] border border-white/5 rounded-3xl p-10 transition-colors group-hover:border-transparent">
                    <div class="w-14 h-14 bg-[#E7B95A]/10 rounded-2xl flex items-center justify-center text-[#E7B95A] mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-white">Empowerment</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">Optimizing Soft Skills & Hard Skills through managed scientific activities and workshops.</p>
                </div>
            </div>

            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'" class="group relative rounded-3xl transform transition-all duration-1000 ease-out delay-[600ms]">
                <div class="absolute -inset-[1.5px] rounded-3xl bg-gradient-to-r from-[#7AABC3] via-[#3386B7] via-[#214664] to-[#E7B95A] opacity-0 group-hover:opacity-100 transition-opacity duration-500 blur-[1px]"></div>
                <div class="relative h-full bg-[#151b2b] border border-white/5 rounded-3xl p-10 transition-colors group-hover:border-transparent">
                    <div class="w-14 h-14 bg-[#7AABC3]/10 rounded-2xl flex items-center justify-center text-[#7AABC3] mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-white">Research</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">Developing research culture and scientific publication in technology sectors.</p>
                </div>
            </div>

        </div>
    </div>
</section>