<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
        content="{{ $metaDescription ?? 'Website resmi Institute of Electrical and Electronics Engineers (IEEE) Student Branch Universitas Riau.' }}">
    <meta name="robots" content="index, follow">

    <title>{{ $title ?? 'IEEE SB UNRI | Synergy Collaboration for Sustainable Technology' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/favicons.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicons.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicons.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script async src="https://www.instagram.com/embed.js"></script>
</head>

<body
    class="antialiased bg-ieee-night text-white selection:bg-ieee-miracle selection:text-ieee-night min-h-screen flex flex-col overflow-x-hidden relative">

    {{ $slot }}

</body>

</html>