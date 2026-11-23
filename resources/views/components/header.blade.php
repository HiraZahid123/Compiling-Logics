@php
    $navigationLinks = [
        ['label' => 'Home', 'url' => route('home'), 'route' => 'home'],
        ['label' => 'Services', 'url' => route('services'), 'route' => 'services'],
        ['label' => 'Work', 'url' => route('work'), 'route' => 'work'],
        ['label' => 'About', 'url' => route('about'), 'route' => 'about'],
        ['label' => 'Contact', 'url' => route('contact'), 'route' => 'contact'],
    ];

    $isCurrent = fn (array $link): bool => request()->routeIs($link['route']);
@endphp

<header class="relative z-40 border-b border-black/10 bg-white font-space text-black">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-6 px-4 sm:px-6 lg:h-20 lg:px-12">
        <div class="flex shrink-0 items-center gap-8">
            <a href="{{ route('home') }}" class="block shrink-0" aria-label="Compiling Logics home">
                <img src="{{ asset('images/logo-header.webp') }}" alt="Compiling Logics" class="block h-9 w-auto lg:h-11" width="196" height="48" fetchpriority="high">
            </a>
            <div class="hidden items-center gap-2 border border-black/10 bg-[#f5f5f7] px-3 py-1 xl:flex">
                <span class="relative flex size-2"><span class="absolute inline-flex size-full animate-ping bg-eccentric-blue opacity-75"></span><span class="relative inline-flex size-2 bg-eccentric-blue"></span></span>
                <span class="text-[10px] tracking-widest uppercase">Systems online · 24/7 accessible</span>
            </div>
        </div>

        <nav class="hidden h-full items-center gap-8 md:flex" aria-label="Main">
            @foreach ($navigationLinks as $link)
                <a href="{{ $link['url'] }}" @if ($isCurrent($link)) aria-current="page" @endif class="flex h-full items-center border-b-2 border-transparent text-xs tracking-[0.08em] text-[#808080] uppercase transition-colors hover:text-black aria-[current=page]:border-eccentric-blue aria-[current=page]:text-black">{{ $link['label'] }}</a>
            @endforeach
        </nav>

        <div class="flex shrink-0 items-center gap-3">
            <a href="{{ route('contact') }}" class="hidden items-center justify-center border-2 border-eccentric-blue bg-eccentric-blue px-5 py-2.5 text-xs tracking-[0.08em] text-white uppercase transition-colors hover:bg-white hover:text-eccentric-blue sm:inline-flex">Schedule Consultation</a>

            <button type="button" class="group flex size-10 items-center justify-center md:hidden" aria-label="Toggle menu" aria-controls="mobile-menu" aria-expanded="false" data-menu-toggle>
                <svg class="size-6 group-aria-expanded:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16" /></svg>
                <svg class="hidden size-6 group-aria-expanded:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18" /></svg>
            </button>
        </div>
    </div>

    <div class="hidden border-t border-black/10 bg-[#f5f5f7] sm:block">
        <div class="mx-auto flex h-9 max-w-7xl items-center justify-between px-6 text-[10px] tracking-widest text-[#808080] uppercase lg:px-12">
            <div>Infrastructure // Architectural runtime active</div>
            <div class="flex items-center gap-6">
                <span class="hidden md:inline">Zero-prank deterministic logic engine</span>
                <span class="text-black" data-latency>Latency: 0.04ms</span>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="absolute inset-x-0 top-full hidden border-b border-black bg-white px-4 pb-6 sm:px-6 md:hidden" data-menu>
        <nav class="flex flex-col" aria-label="Mobile">
            @foreach ($navigationLinks as $link)
                <a href="{{ $link['url'] }}" @if ($isCurrent($link)) aria-current="page" @endif class="border-b border-black/10 py-3 text-sm tracking-[0.08em] uppercase aria-[current=page]:text-eccentric-blue">{{ $link['label'] }}</a>
            @endforeach
        </nav>

        <a href="{{ route('contact') }}" class="mt-5 inline-flex items-center justify-center border-2 border-eccentric-blue bg-eccentric-blue px-5 py-3 text-xs tracking-[0.08em] text-white uppercase">Schedule Consultation</a>
    </div>
</header>
