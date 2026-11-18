<section class="relative aspect-[4/3] w-full overflow-hidden bg-black md:aspect-video" aria-labelledby="home-hero-heading">
    <h1 id="home-hero-heading" class="sr-only">
        Compiling Logics — Software, AI &amp; Design. We don't sell you an AI agent. We solve the specific problem it's there to fix.
    </h1>

    <img src="{{ asset('images/home-hero-poster.webp') }}" alt="" class="absolute inset-0 size-full object-cover" width="1920" height="1080" fetchpriority="high" decoding="async">

    {{-- The video starts downloading only after the page has loaded, so it never delays first paint. --}}
    <video class="absolute inset-0 size-full object-cover opacity-0 transition-opacity duration-500" muted loop playsinline preload="none" aria-hidden="true"
        data-hero-video data-src="{{ asset('videos/home-hero.mp4') }}" data-src-mobile="{{ asset('videos/home-hero-mobile.mp4') }}"></video>
</section>
