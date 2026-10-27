@extends('layouts.site')

@section('title', 'About — Compiling Logics')

@section('content')
    <div class="relative font-electrolize">
        <section class="relative aspect-[1150/1176] overflow-hidden md:aspect-[1920/1176] xl:static xl:overflow-visible" aria-labelledby="about-heading">
            <img src="{{ asset('images/about/about-banner.jpg') }}" alt="" class="absolute top-0 left-0 h-[203.06%] w-auto max-w-none md:h-auto md:w-full" width="1920" height="2388">
            <h1 id="about-heading" class="sr-only">
                Building Digital Solutions That Last. We turn ideas into powerful digital products through innovation, precision and a commitment to long-term success. Trust: no disappearing after launch, the relationship continues. Quality: engineered, not guessed, every deliverable has a reason behind it. Timely Delivery: dates that get kept, not revised after the fact.
            </h1>
        </section>

        <section class="relative bg-linear-to-b from-[#727272] to-white px-4 pt-8 pb-12 sm:px-8 xl:bg-none xl:px-[min(100px,5.208vw)] xl:pt-0 xl:pb-0" aria-labelledby="team-heading">
            <h2 id="team-heading" class="text-[32px] leading-[normal] text-header sm:text-[40px] xl:text-[length:min(48px,2.5vw)]">Team that actually answers.</h2>
            <p class="mt-4 text-base leading-[normal] text-[#e4e4e5] sm:text-lg xl:mt-[min(27px,1.406vw)] xl:text-[length:min(24px,1.25vw)]">
                Compiling Logics exists to replace outdated, manual systems with ones that run themselves — across whichever industry needs it next.
            </p>

            <p class="mt-8 text-sm leading-[normal] text-grey xl:mt-[min(42px,2.188vw)] xl:text-[length:min(16px,0.833vw)]">MISSION</p>
            <p class="mt-4 text-base leading-[normal] text-grey sm:text-lg xl:mt-[min(27px,1.406vw)] xl:text-[length:min(24px,1.25vw)]">
                We don't sell you an AI agent. We solve the specific problem it's there to fix.<br class="hidden xl:block">
                That means going in embedded, inside how a business actually works, rather than handing over a tool and leaving.
            </p>

            <blockquote class="mt-10 border-l-2 border-eccentric-blue py-2 pl-6 text-base leading-[normal] text-grey sm:text-lg xl:mt-[min(52px,2.708vw)] xl:max-w-[min(600px,31.25vw)] xl:py-[min(7px,0.365vw)] xl:pl-[min(27px,1.406vw)] xl:text-[length:min(24px,1.25vw)]">
                "We work embedded inside your business" — the same approach used to shape how we work with every client, regardless of industry.
            </blockquote>
        </section>

        <section class="image-hover image-hover-subtle relative mt-4 xl:mt-[min(98px,5.104vw)]" aria-label="Our work culture" data-reveal>
            <img src="{{ asset('images/about/great-people.png') }}" alt="Our work culture — Great People. Better Solutions. We believe in a culture of trust, collaboration and innovation, because great work happens when people grow together. Live Team: reachable across time zones, not just business hours. AI Chatbot: handles the first response the moment the team isn't at a keyboard." class="block aspect-[1918/639] w-full object-cover" width="1918" height="639" loading="lazy">
        </section>

        <section class="relative flex flex-col items-start gap-6 px-4 pt-12 pb-16 sm:px-8 xl:flex-row xl:items-center xl:justify-between xl:px-[min(100px,5.208vw)] xl:pt-[min(47px,2.448vw)] xl:pb-[min(335px,17.448vw)]" aria-labelledby="about-cta-heading">
            <h2 id="about-cta-heading" class="text-[28px] leading-[normal] text-black sm:text-[40px] xl:text-[length:min(48px,2.5vw)]">Want the full story on a specific build?</h2>
            <x-book-call-button size="compact" class="shrink-0" />
        </section>
    </div>
@endsection
