<div 
    x-data="{ 
        scroll: 0, 
        emailCopied: false, 
        copyEmail() { 
            navigator.clipboard.writeText('ieee.sb@unri.ac.id')
                .then(() => {
                    this.emailCopied = true;
                    setTimeout(() => this.emailCopied = false, 2000);
                })
                .catch(err => console.error('Copy failed', err));
        } 
    }" 
    @scroll.window="scroll = window.pageYOffset"
    class="min-h-screen bg-[#0C101C] text-white font-sans selection:bg-[#E7B95A] selection:text-[#0C101C] relative overflow-hidden flex items-center justify-center"
>
    
    <div class="absolute inset-0 z-0" aria-hidden="true">
        <img
            src="{{ asset('images/bg-hero-banner.png') }}"
            alt="Background Gedung Universitas Riau"
            class="object-cover w-full h-full grayscale opacity-50 md:opacity-100"
            loading="eager"
        />
        <div class="absolute inset-0 bg-[#214664]/90 mix-blend-multiply"></div> 
        <div class="absolute inset-0 bg-gradient-to-b from-[#0C101C]/60 via-transparent to-[#0C101C]/90"></div>
    </div>

    <div class="absolute -top-[10%] -left-[20%] w-[300px] h-[300px] md:top-[-30%] md:left-[-15%] md:w-[600px] md:h-[600px] bg-[#FFE6A7] rounded-full blur-[80px] md:blur-[150px] opacity-20 z-0 animate-pulse"></div>
    <div class="absolute -bottom-[10%] -right-[20%] w-[300px] h-[300px] md:bottom-[-20%] md:right-[-10%] md:w-[600px] md:h-[600px] bg-[#214664] rounded-full blur-[80px] md:blur-[150px] opacity-30 z-0"></div>

    <div class="absolute left-6 md:left-12 top-1/2 -translate-y-1/2 z-20 hidden md:flex flex-col gap-8 items-center">
        <div class="w-[1px] h-12 bg-gradient-to-b from-transparent to-[#7AABC3]/50"></div>
        
        <a href="https://www.linkedin.com/company/ieee-student-branch-universitas-riau" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn IEEE SB UNRI" class="group relative flex items-center justify-center text-[#7AABC3] hover:text-[#E7B95A] transition-all duration-300">
            <div class="group-hover:-translate-y-1 group-hover:scale-110 transition-transform duration-300 drop-shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
            </div>
            <span class="absolute left-full ml-4 px-2 py-1 bg-[#E7B95A] text-[#0C101C] text-xs font-bold rounded opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300 pointer-events-none whitespace-nowrap">
                LinkedIn
                <span class="absolute top-1/2 -left-1 -translate-y-1/2 border-t-[4px] border-b-[4px] border-r-[4px] border-t-transparent border-b-transparent border-r-[#E7B95A]"></span>
            </span>
        </a>

        <a href="https://www.instagram.com/ieee.sb.unri" target="_blank" rel="noopener noreferrer" aria-label="Instagram IEEE SB UNRI" class="group relative flex items-center justify-center text-[#7AABC3] hover:text-[#E7B95A] transition-all duration-300">
            <div class="group-hover:-translate-y-1 group-hover:scale-110 transition-transform duration-300 drop-shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
            </div>
            <span class="absolute left-full ml-4 px-2 py-1 bg-[#E7B95A] text-[#0C101C] text-xs font-bold rounded opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300 pointer-events-none whitespace-nowrap">
                Instagram
                <span class="absolute top-1/2 -left-1 -translate-y-1/2 border-t-[4px] border-b-[4px] border-r-[4px] border-t-transparent border-b-transparent border-r-[#E7B95A]"></span>
            </span>
        </a>

        <button @click.prevent="copyEmail()" aria-label="Copy Email" class="group relative flex items-center justify-center text-[#7AABC3] hover:text-[#E7B95A] transition-all duration-300">
            <div class="group-hover:-translate-y-1 group-hover:scale-110 transition-transform duration-300 drop-shadow-md">
                <svg x-show="!emailCopied" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                
                <svg x-show="emailCopied" x-cloak xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-green-400"><polyline points="20 6 9 17 4 12"/></svg>
            </div>

            <span 
                :class="emailCopied ? 'bg-green-400 opacity-100 translate-x-0' : 'bg-[#E7B95A] opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0'"
                class="absolute left-full ml-4 px-2 py-1 text-[#0C101C] text-xs font-bold rounded transition-all duration-300 pointer-events-none whitespace-nowrap"
            >
                <span x-text="emailCopied ? 'Email Copied!' : 'Email'"></span>
                <span 
                    :class="emailCopied ? 'border-r-green-400' : 'border-r-[#E7B95A]'"
                    class="absolute top-1/2 -left-1 -translate-y-1/2 border-t-[4px] border-b-[4px] border-r-[4px] border-t-transparent border-b-transparent"
                ></span>
            </span>
        </button>

        <a href="https://wa.me/+6283185116094" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp IEEE SB UNRI" class="group relative flex items-center justify-center text-[#7AABC3] hover:text-[#E7B95A] transition-all duration-300">
            <div class="group-hover:-translate-y-1 group-hover:scale-110 transition-transform duration-300 drop-shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </div>
            <span class="absolute left-full ml-4 px-2 py-1 bg-[#E7B95A] text-[#0C101C] text-xs font-bold rounded opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300 pointer-events-none whitespace-nowrap">
                WhatsApp
                <span class="absolute top-1/2 -left-1 -translate-y-1/2 border-t-[4px] border-b-[4px] border-r-[4px] border-t-transparent border-b-transparent border-r-[#E7B95A]"></span>
            </span>
        </a>

        <div class="w-[1px] h-12 bg-gradient-to-b from-[#7AABC3]/50 to-transparent"></div>
    </div>

    <main class="container mx-auto px-6 z-10 flex flex-col items-center text-center pt-10">
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold leading-tight text-white drop-shadow-2xl mb-6 tracking-tight">
            IEEE <br class="md:hidden" />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#7AABC3] via-white to-[#A9D6E5]">
                SB UNRI
            </span>
        </h1>
        
        <h2 class="text-xl md:text-2xl text-[#7AABC3] font-light max-w-2xl mx-auto mb-4 drop-shadow-md">
            Institute of Electrical and Electronics Engineers <br />
            <span class="text-white font-medium">University of Riau Student Branch</span>
        </h2>

        <p class="text-lg italic text-gray-400 font-serif mb-10">
            "Synergy Collaboration for Sustainable Technology"
        </p>
    </main>

    <div 
        :style="`opacity: ${Math.max(0, 1 - scroll / 300)}`"
        class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-2 text-[#7AABC3] transition-opacity duration-75"
    >
        <span class="text-[10px] tracking-widest uppercase font-bold opacity-70">Scroll Down</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="animate-bounce"><path d="m6 9 6 6 6-6"/></svg>
    </div>

</div>