<x-layouts.app>
    <x-slot:title>IEEE SB UNRI | Synergy Collaboration for Sustainable Technology</x-slot:title>
    <x-slot:metaDescription>
        Website resmi Institute of Electrical and Electronics Engineers (IEEE) Student Branch Universitas Riau.
        Menghadirkan kolaborasi sinergis untuk teknologi berkelanjutan.
    </x-slot:metaDescription>

    <x-navbar />

    <main class="bg-ieee-night min-h-screen flex flex-col relative w-full overflow-hidden">

        <x-hero />

        <x-about />

        <x-vision-mission />

        <x-department-section />

        <x-sponsors />

        <x-post-instagram />

        <x-news-section :news="$news" :writersCount="$writersCount" />

        <x-upcoming-events :eventsList="$eventsList" />

    </main>

    <x-footer />
</x-layouts.app>