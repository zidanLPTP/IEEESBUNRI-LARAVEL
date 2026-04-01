<footer id="Contact"
    class="bg-[#05080f] text-gray-400 border-t border-white/5 relative z-10 pt-20 pb-10 overflow-hidden">

    <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-ieee-ice/50 to-transparent"
        aria-hidden="true"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-ieee-ice/5 rounded-full blur-[120px] pointer-events-none"
        aria-hidden="true"></div>

    <div class="container mx-auto px-6">

        <div class="grid lg:grid-cols-3 gap-12 mb-16 items-start">

            <div class="space-y-6 order-2 lg:order-1">
                <h3 class="text-white font-bold text-lg">Visit Our Secretariat</h3>
                <div
                    class="w-full h-56 rounded-2xl overflow-hidden border border-white/10 relative group shadow-lg hover:border-ieee-miracle/50 transition-colors">
                    <div class="absolute inset-0 bg-ieee-night/20 pointer-events-none z-10 group-hover:bg-transparent transition-colors duration-500"
                        aria-hidden="true"></div>

                    <iframe title="Peta Lokasi IEEE SB UNRI Secretariat"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d952.1692281297348!2d101.37660066407183!3d0.4830806454601319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a9150d5cd463%3A0x69fb9da29539951d!2sDekanat%20Fakultas%20Teknik%20Universitas%20Riau!5e1!3m2!1sid!2sid!4v1768318989709!5m2!1sid!2sid"
                        width="100%" height="100%" style="border: 0; filter: grayscale(100%) invert(92%) contrast(83%);"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="group-hover:filter-none transition-all duration-500"></iframe>
                </div>
            </div>

            <div class="space-y-6 order-1 lg:order-2">
                <div class="flex flex-col items-start gap-3">

                    <!-- Logo -->
                    <img src="{{ asset('images/adhikaryas.png') }}" alt="IEEE SB UNRI Logo" class="h-13 w-auto" />

                    <!-- Title -->
                    <h2 class="text-2xl font-bold text-white tracking-tighter">
                        Synergy Collaboration for <span class="text-ieee-ice">Sustainable Technology</span>
                    </h2>

                </div>
                <p class="text-sm leading-relaxed text-gray-400">
                    Official Student Branch of IEEE at University of Riau.
                    Dedicated to advancing technology for humanity through research, innovation, and professional
                    networking.
                </p>

                <div class="flex gap-4 pt-4" x-data="{ emailCopied: false }">

                    <a href="https://www.linkedin.com/company/ieee-student-branch-universitas-riau" target="_blank"
                        rel="noopener noreferrer" aria-label="Kunjungi LinkedIn IEEE SB UNRI"
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-ieee-miracle hover:text-ieee-night hover:scale-110 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                            <rect width="4" height="12" x="2" y="9" />
                            <circle cx="4" cy="4" r="2" />
                        </svg>
                    </a>

                    <a href="https://www.instagram.com/ieee.sb.unri" target="_blank" rel="noopener noreferrer"
                        aria-label="Kunjungi Instagram IEEE SB UNRI"
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-ieee-miracle hover:text-ieee-night hover:scale-110 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                        </svg>
                    </a>

                    <button @click.prevent="
                            navigator.clipboard.writeText('ieee.sb@unri.ac.id')
                            .then(() => {
                                emailCopied = true;
                                setTimeout(() => emailCopied = false, 2000);
                            })
                        " aria-label="Salin alamat email"
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-ieee-miracle hover:text-ieee-night hover:scale-110 transition-all duration-300 relative group">
                        <svg x-show="!emailCopied" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>

                        <svg x-show="emailCopied" x-cloak xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                            stroke-linecap="round" stroke-linejoin="round" class="text-green-600 font-bold">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>

                        <span x-show="emailCopied" x-cloak x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="absolute -top-8 left-1/2 -translate-x-1/2 text-[10px] bg-green-500 text-white px-2 py-0.5 rounded font-bold whitespace-nowrap shadow-lg">
                            Copied!
                        </span>
                    </button>

                    <a href="https://wa.me/6283185116094" target="_blank" rel="noopener noreferrer"
                        aria-label="Hubungi via WhatsApp"
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-ieee-miracle hover:text-ieee-night hover:scale-110 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="space-y-6 order-3">
                <h3 class="text-white font-bold text-lg">Contact Information</h3>

                <address class="not-italic">
                    <ul class="space-y-5 text-sm">
                        <li class="flex items-start gap-4 group cursor-pointer">
                            <div
                                class="w-8 h-8 rounded-full bg-ieee-ice/10 flex items-center justify-center text-ieee-ice group-hover:bg-ieee-miracle group-hover:text-ieee-night transition-colors shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <span class="group-hover:text-white transition-colors">
                                <strong>Secretariat:</strong><br />
                                3nd Floor, Dean's Office Faculty of Engineering,<br />
                                Building of Prof. Dr. Eng. Ir. Azridjal Aziz, S.T., M.T., IPU., Asean Eng.<br />
                                Universitas Riau, Bina Widya's Campus Sector<br />
                                Simpang Baru, Panam, Pekanbaru.
                            </span>
                        </li>
                        <li class="flex items-center gap-4 group cursor-pointer">
                            <div
                                class="w-8 h-8 rounded-full bg-ieee-ice/10 flex items-center justify-center text-ieee-ice group-hover:bg-ieee-miracle group-hover:text-ieee-night transition-colors shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect width="20" height="16" x="2" y="4" rx="2" />
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                </svg>
                            </div>
                            <span class="group-hover:text-white transition-colors">ieee.sb@unri.ac.id</span>
                        </li>
                        <li class="flex items-center gap-4 group cursor-pointer">
                            <div
                                class="w-8 h-8 rounded-full bg-ieee-ice/10 flex items-center justify-center text-ieee-ice group-hover:bg-ieee-miracle group-hover:text-ieee-night transition-colors shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            </div>
                            <span class="group-hover:text-white transition-colors text-gray-600 italic">+62
                                831-8511-6094</span>
                        </li>
                    </ul>
                </address>
            </div>

        </div>

        <div class="border-t border-white/5 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">

            <p class="text-xs text-gray-600 text-center md:text-left">
                &copy; {{ date('Y') }} IEEE Student Branch University of Riau. All rights reserved.
            </p>

            <div class="flex items-center gap-6">
                <a href="{{ url('/login') }}" class="text-gray-800 hover:text-ieee-miracle transition-colors p-2"
                    title="Member Area Login" aria-label="Akses Halaman Member">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                </a>
            </div>

        </div>
    </div>
</footer>