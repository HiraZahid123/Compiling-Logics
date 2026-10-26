@php
    $navigationLinks = [
        ['label' => 'SERVICES', 'url' => route('services'), 'route' => 'services', 'width' => 'w-[127px]'],
        ['label' => 'WORK', 'url' => route('work'), 'route' => 'work', 'width' => 'w-[83px]'],
        ['label' => 'ABOUT', 'url' => route('about'), 'route' => 'about', 'width' => 'w-[96px]'],
        ['label' => 'CONTACT', 'url' => route('contact'), 'route' => 'contact', 'width' => 'w-[124px]'],
    ];

    $isCurrent = fn (array $link): bool => $link['route'] !== null && request()->routeIs($link['route']);
@endphp

<header class="relative z-20 bg-header font-electrolize">
    <div class="relative flex h-[72px] items-center justify-between px-4 sm:px-8 xl:h-[100px] xl:items-start xl:pr-[71px] xl:pl-[100px]">
        <a href="{{ route('home') }}" class="relative block h-12 w-[196px] shrink-0 overflow-hidden xl:mt-[29px]" aria-label="Compiling Logics home">
            <img src="{{ asset('images/logo.png') }}" alt="Compiling Logics" class="absolute top-[-116px] left-[-100px] h-[197px] w-[350px] max-w-none">
        </a>

        <nav class="absolute top-[46px] left-1/2 hidden -translate-x-1/2 gap-[23px] xl:flex" aria-label="Main">
            @foreach ($navigationLinks as $link)
                <a href="{{ $link['url'] }}" @if ($isCurrent($link)) aria-current="page" @endif class="{{ $link['width'] }} relative text-[26px] leading-6 whitespace-nowrap text-grey aria-[current=page]:after:absolute aria-[current=page]:after:top-[23.5px] aria-[current=page]:after:right-[10.5px] aria-[current=page]:after:left-[2.5px] aria-[current=page]:after:h-0.5 aria-[current=page]:after:bg-eccentric-blue">{{ $link['label'] }}</a>
            @endforeach
        </nav>

        <x-book-call-button class="hidden xl:mt-[38px] xl:flex" />

        <button type="button" class="group flex size-10 items-center justify-center text-grey xl:hidden" aria-label="Toggle menu" aria-controls="mobile-menu" aria-expanded="false" data-menu-toggle>
            <svg class="size-7 group-aria-expanded:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg class="hidden size-7 group-aria-expanded:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M6 6l12 12M18 6L6 18" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="absolute inset-x-0 top-full hidden bg-header px-4 pb-6 shadow-md sm:px-8 xl:hidden" data-menu>
        <nav class="flex flex-col" aria-label="Mobile">
            @foreach ($navigationLinks as $link)
                <a href="{{ $link['url'] }}" @if ($isCurrent($link)) aria-current="page" @endif class="border-b border-grey/15 py-3 text-[22px] leading-6 text-grey aria-[current=page]:text-eccentric-blue">{{ $link['label'] }}</a>
            @endforeach
        </nav>

        <x-book-call-button class="mt-5" />
    </div>
</header>
