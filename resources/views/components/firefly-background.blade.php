@php
    $particleCount = 30;
    $colors = ['#E7B95A', '#7AABC3', '#FFFFFF'];
@endphp

<div class="absolute inset-0 z-0 pointer-events-none overflow-hidden" aria-hidden="true">
    
    @for ($i = 0; $i < $particleCount; $i++)
        @php
            $color = $colors[array_rand($colors)];
            $size = rand(1, 3) . 'px';
            $top = rand(0, 100) . '%';
            $left = rand(0, 100) . '%';
            $duration = rand(10, 20) . 's';
            $delay = rand(0, 5) . 's';
            $xOffset = rand(-30, 30) . 'px';
            $yOffset = rand(-50, 50) . 'px';
        @endphp

        <div class="absolute rounded-full opacity-0 animate-firefly"
             style="
                background-color: {{ $color }};
                width: {{ $size }};
                height: {{ $size }};
                top: {{ $top }};
                left: {{ $left }};
                box-shadow: 0 0 {{ (int)$size * 2 }}px {{ $color }};
                --x: {{ $xOffset }};
                --y: {{ $yOffset }};
                animation-duration: {{ $duration }};
                animation-delay: {{ $delay }};
             ">
        </div>
    @endfor

</div>

<style>
    @keyframes firefly-move {
        0%, 100% { opacity: 0; transform: translate(0, 0); }
        50% { opacity: 0.8; transform: translate(var(--x), var(--y)); }
    }
    .animate-firefly {
        animation: firefly-move infinite ease-in-out;
    }
</style>