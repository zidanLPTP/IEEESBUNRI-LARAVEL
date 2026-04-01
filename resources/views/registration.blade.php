<x-layouts.app>
    <x-slot:title>IEEE Membership Registration | IEEE SB UNRI</x-slot:title>

    <x-navbar />

    <style>
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-up {
            animation: fadeUp .8s ease-out forwards;
            opacity: 0;
        }

        @keyframes slowZoom {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.08);
            }
        }

        .animate-zoom {
            animation: slowZoom 20s ease-in-out infinite alternate;
        }

        @keyframes float {
            0% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-20px)
            }

            100% {
                transform: translateY(0)
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
    </style>

    <main class="min-h-screen bg-[#0C101C] text-white overflow-hidden relative">

        <x-firefly-background />

        <!-- ================= HERO ================= -->
        <section class="relative h-[80vh] flex items-center justify-center overflow-hidden">

            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0C101C] via-[#0C101C]/70 to-transparent z-10">
                </div>

                <img src="{{ asset('images/ini-bg-regis.jpeg') }}" class="object-cover w-full h-full opacity-60" />
            </div>

            <!-- floating glow -->
            <div class="absolute top-32 left-20 w-72 h-72 bg-[#3386B7]/20 blur-[120px] rounded-full animate-float">
            </div>
            <div class="absolute bottom-20 right-20 w-72 h-72 bg-[#E7B95A]/20 blur-[120px] rounded-full animate-float">
            </div>

            <div class="container mx-auto px-6 relative z-20 text-center mt-20">

                <span class="inline-block py-1 px-3 rounded-full 
bg-white/10 border border-white/20 
text-[#E7B95A] text-xs font-bold tracking-widest 
uppercase mb-6 backdrop-blur-md
animate-fade-up" style="animation-delay:200ms">
                    IEEE Membership
                </span>

                <h1 class="text-4xl md:text-7xl font-extrabold mb-6 leading-tight animate-fade-up"
                    style="animation-delay:400ms">

                    Join IEEE,<br>

                    <span class="text-transparent bg-clip-text 
bg-gradient-to-r 
from-[#7AABC3] via-[#3386B7] to-[#E7B95A]">
                        Expand Your Network
                    </span>

                </h1>

                <p class="text-gray-300 text-lg md:text-xl 
max-w-2xl mx-auto leading-relaxed
animate-fade-up" style="animation-delay:600ms">

                    Become part of IEEE and connect with professionals,
                    researchers, and students worldwide.

                </p>

            </div>
        </section>


        <!-- ================= CARD SECTION ================= -->
        <section class="py-24 px-6 container mx-auto relative z-10">

            <div class="grid md:grid-cols-2 gap-10 max-w-6xl mx-auto">

                <!-- ================= PROFESSIONAL ================= -->
                <div class="group relative rounded-2xl animate-fade-up" style="animation-delay:200ms">

                    <!-- gradient frame -->
                    <div class="absolute -inset-[1.5px] rounded-2xl 
bg-gradient-to-r 
from-[#7AABC3] via-[#3386B7] to-[#E7B95A]
opacity-0 group-hover:opacity-100 
blur-[3px] transition duration-500">
                    </div>

                    <div class="relative bg-[#151b2b] rounded-2xl 
shadow-xl overflow-hidden 
transition duration-500 
group-hover:-translate-y-1">

                        <!-- IMAGE -->
                        <div class="relative h-72 overflow-hidden">

                            <img src="{{ asset('images/stikerjmk.jpeg') }}" class="w-full h-full object-cover
transition duration-700 
group-hover:scale-110">

                            <!-- vignette bottom -->
                            <div class="absolute inset-0 
bg-gradient-to-t 
from-[#151b2b] via-transparent to-transparent
opacity-90">
                            </div>

                            <!-- vignette top -->
                            <div class="absolute inset-0 
bg-gradient-to-b 
from-black/40 via-transparent to-transparent">
                            </div>

                        </div>

                        <!-- CONTENT -->
                        <div class="p-8">

                            <div class="flex justify-between items-center mb-3">
                                <h2 class="text-2xl font-bold">
                                    Professional Membership
                                </h2>

                                <span class="text-xs bg-[#3386B7] px-3 py-1 rounded-full">
                                    IEEE
                                </span>
                            </div>

                            <p class="text-gray-400 mb-6">
                                Join IEEE as a professional member and enhance your
                                career, networking, and global collaboration.
                            </p>

                            <a href="https://www.ieee.org/membership-application/public/join.html" target="_blank"
                                class="inline-block px-6 py-3 
bg-[#E7B95A] text-black font-semibold
rounded-lg 
transition duration-300
hover:scale-105
hover:shadow-[0_0_25px_#E7B95A]">
                                AS PROFESSIONAL
                            </a>

                        </div>
                    </div>
                </div>



                <!-- ================= STUDENT ================= -->
                <div class="group relative rounded-2xl animate-fade-up" style="animation-delay:400ms">

                    <div class="absolute -inset-[1.5px] rounded-2xl 
bg-gradient-to-r 
from-[#7AABC3] via-[#3386B7] to-[#E7B95A]
opacity-0 group-hover:opacity-100 
blur-[3px] transition duration-500">
                    </div>

                    <div class="relative bg-[#151b2b] rounded-2xl 
shadow-xl overflow-hidden 
transition duration-500 
group-hover:-translate-y-1">

                        <div class="relative h-72 overflow-hidden">

                            <img src="{{ asset('images/inistudent.jpeg') }}" class="w-full h-full object-cover
transition duration-700 
group-hover:scale-110">

                            <div class="absolute inset-0 
bg-gradient-to-t 
from-[#151b2b] via-transparent to-transparent
opacity-90">
                            </div>

                            <div class="absolute inset-0 
bg-gradient-to-b 
from-black/40 via-transparent to-transparent">
                            </div>

                        </div>

                        <div class="p-8">

                            <div class="flex justify-between items-center mb-3">
                                <h2 class="text-2xl font-bold">
                                    Student Membership
                                </h2>

                                <span class="text-xs bg-[#3386B7] px-3 py-1 rounded-full">
                                    IEEE
                                </span>
                            </div>

                            <p class="text-gray-400 mb-6">
                                Join IEEE as a student and gain access to
                                scholarships, research resources, and events.
                            </p>

                            <a href="https://www.ieee.org/membership-application/public/join.html?grade=Student"
                                target="_blank" class="inline-block px-6 py-3 
bg-[#E7B95A] text-black font-semibold
rounded-lg 
transition duration-300
hover:scale-105
hover:shadow-[0_0_25px_#E7B95A]">
                                AS STUDENT
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </section>

        <x-footer />

    </main>
</x-layouts.app>