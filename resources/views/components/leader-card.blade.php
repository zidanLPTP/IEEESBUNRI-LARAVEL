@props(['item', 'delay' => 0])

<div class="relative group animate-fade-up" style="animation-delay: {{ $delay }}ms;">
    <div
        class="relative aspect-[3/4] rounded-[2rem] overflow-hidden border border-white/5 bg-[#151b2b] mb-6 shadow-2xl transition-all duration-500 group-hover:border-[#E7B95A]/30">
        @if(isset($item->image) && $item->image)
            <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('storage/' . $item->image) }}"
                class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110"
                alt="{{ $item->name }}">
        @else
            <div
                class="flex items-center justify-center h-full bg-gradient-to-br from-[#151b2b] to-[#0C101C] text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                    class="opacity-20">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
            </div>
        @endif

        <div
            class="absolute inset-0 bg-gradient-to-t from-[#0C101C] via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
        </div>
    </div>

    <div class="text-center px-2">
        <h4 class="text-xl font-bold text-white group-hover:text-[#E7B95A] transition-colors duration-300">
            {{ $item->name ?? 'Vacant Position' }}
        </h4>
        <p class="text-[#3386B7] text-xs font-bold uppercase tracking-widest mt-1">
            {{ $item->position ?? 'To Be Announced' }}
        </p>
        <p class="text-gray-500 text-[10px] mt-2 italic">
            {{ $item->sub_role ?? 'Wait for Photo' }}
        </p>
    </div>
</div>