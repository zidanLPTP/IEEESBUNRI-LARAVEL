<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel | IEEE SB UNRI' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('images/favicons.png') }}" sizes="any">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicons.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicons.png') }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap"
        rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-[#0C101C] text-white selection:bg-[#E7B95A] selection:text-[#0C101C]">

    <div x-data="{ isSidebarOpen: false }" class="min-h-screen flex relative">

        <div x-show="isSidebarOpen" @click="isSidebarOpen = false" x-transition.opacity
            class="fixed inset-0 bg-black/80 z-40 md:hidden" x-cloak></div>

        <x-admin.sidebar />

        <main class="flex-1 p-4 md:p-10 overflow-y-auto w-full h-screen custom-scrollbar">
            {{ $slot }}
        </main>

    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>