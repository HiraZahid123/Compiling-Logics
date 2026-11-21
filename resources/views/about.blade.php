@extends('layouts.site')

@section('title', 'About — Compiling Logics')
@section('description', 'Compiling Logics builds digital solutions that last: trust, quality and timely delivery, from a team that actually answers across time zones.')

@php
    $values = [
        ['title' => 'Trust', 'text' => 'No disappearing after launch — the relationship continues.', 'footer' => 'Long-term relationships', 'icon' => 'M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6zM8.5 12l2.5 2.5 4.5-5'],
        ['title' => 'Quality', 'text' => 'Engineered, not guessed — every deliverable has a reason behind it.', 'footer' => 'Engineered, not guessed', 'icon' => 'M12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM12 2v3M12 19v3M4.9 4.9l2.1 2.1M17 17l2.1 2.1M2 12h3M19 12h3M4.9 19.1 7 17M17 7l2.1-2.1'],
        ['title' => 'Timely Delivery', 'text' => 'Dates that get kept, not revised after the fact.', 'footer' => 'Dates that get kept', 'icon' => 'M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18zM12 7v5l3 2'],
    ];

    $culture = [
        ['tag' => 'Culture // A', 'title' => 'Live Team', 'text' => 'Reachable across time zones, not just business hours.', 'footer' => 'Human response'],
        ['tag' => 'Culture // B', 'title' => 'AI Chatbot', 'text' => 'Handles the first response the moment the team isn\'t at a keyboard.', 'footer' => 'Always-on first response'],
    ];

    $label = 'text-[11px] leading-4 tracking-[0.12em] uppercase';
    $muted = 'text-[#808080]';
    $sectionHeading = 'text-3xl leading-tight uppercase sm:text-4xl';
    $sectionRule = 'flex flex-wrap items-center justify-between gap-3 border-b pb-4';
    $svg = fn (string $path, string $classes = 'size-6'): string => '<svg class="'.$classes.' shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="'.$path.'"/></svg>';
@endphp

@section('content')
    <div class="font-space text-black">
        {{-- ============ HERO ============ --}}
        <section class="bg-white" aria-labelledby="about-heading">
            <div class="mx-auto max-w-7xl px-4 pt-16 pb-20 sm:px-6 lg:px-12 lg:pt-24 lg:pb-28">
                <div class="{{ $sectionRule }} mb-12 border-black/10">
                    <div class="flex items-center gap-3">
                        <span class="size-2.5 bg-eccentric-blue"></span>
                        <span class="{{ $label }}">About // Compiling Logics</span>
                    </div>
                    <span class="{{ $label }} {{ $muted }}">Where the logics never prank</span>
                </div>

                <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-12">
                    <div class="flex flex-col gap-6 lg:col-span-7">
                        <span class="{{ $label }} {{ $muted }} inline-flex flex-wrap items-center gap-2 self-start bg-[#f5f5f7] px-3 py-1">
                            <span>Trust</span><span class="text-eccentric-blue">■</span><span>Quality</span><span class="text-eccentric-blue">■</span><span>Timely delivery</span>
                        </span>
                        <h1 id="about-heading" class="text-4xl leading-none tracking-tight uppercase sm:text-5xl lg:text-[64px]">
                            Building Digital Solutions <br class="hidden sm:inline">
                            <span class="text-eccentric-blue">That Last.</span>
                        </h1>
                        <p class="max-w-2xl pt-2 text-lg leading-relaxed text-[#5f5f64]">We turn ideas into powerful digital products through innovation, precision and a commitment to long-term success.</p>
                        <div class="flex flex-wrap items-center gap-4 pt-6">
                            <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 bg-eccentric-blue px-8 py-3.5 text-xs tracking-[0.08em] text-white uppercase transition-colors hover:bg-black">
                                Book a Call {!! $svg('M4 12h16M14 6l6 6-6 6', 'size-4') !!}
                            </a>
                            <span class="inline-flex items-center gap-3 bg-[#f5f5f7] px-6 py-3.5 text-xs tracking-[0.08em] uppercase">
                                <span class="size-2 animate-pulse rounded-full bg-eccentric-blue"></span>Reachable across time zones
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-6 lg:col-span-5">
                        <div class="flex flex-col gap-3 bg-[#fafafb] p-6">
                            <div class="{{ $label }} {{ $muted }} flex items-center justify-between gap-3">
                                <span>Who we are</span>
                                <span class="text-eccentric-blue">Team online</span>
                            </div>
                            <h2 class="text-2xl leading-snug uppercase">Team that actually answers.</h2>
                            <p class="text-sm leading-relaxed {{ $muted }}">Compiling Logics exists to replace outdated, manual systems with ones that run themselves — across whichever industry needs it next.</p>
                        </div>

                        <div class="image-hover image-hover-subtle relative aspect-video w-full overflow-hidden bg-[#e9e9ee]">
                            <img src="{{ asset('images/about/workspace.webp') }}" alt="Laptop on a desk overlooking a city skyline" width="1200" height="674" class="size-full object-cover">
                            <span class="{{ $label }} absolute bottom-3 left-3 bg-black/90 px-2 py-1 text-white">Building what lasts</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============ MISSION & APPROACH ============ --}}
        <section class="bg-[#f5f5f7] py-20 lg:py-28" aria-label="Mission and approach">
            <div class="mx-auto flex max-w-7xl flex-col gap-12 px-4 sm:px-6 lg:px-12">
                <div class="{{ $sectionRule }} border-black/10">
                    <span class="{{ $label }} {{ $muted }}">How we work // Mission &amp; approach</span>
                    <span class="{{ $label }} text-eccentric-blue">Embedded, not handed over</span>
                </div>

                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-12" data-reveal-stagger>
                    <article class="flex flex-col justify-between bg-white p-8 shadow-sm transition-shadow hover:shadow-md lg:p-12" data-reveal>
                        <div class="flex flex-col gap-6">
                            <div class="{{ $label }} {{ $muted }} flex items-center justify-between">
                                <span>01 / Core purpose</span>
                                <span class="text-eccentric-blue">{!! $svg('M5 5h14v14H5zM9 9h6v6H9zM9 2v3M15 2v3M9 19v3M15 19v3M2 9h3M2 15h3M19 9h3M19 15h3') !!}</span>
                            </div>
                            <h2 class="{{ $sectionHeading }}">Mission</h2>
                            <p class="text-lg leading-relaxed">We don't sell you an AI agent. We solve the specific problem it's there to fix. That means going in embedded, inside how a business actually works, rather than handing over a tool and leaving.</p>
                        </div>
                        <div class="{{ $label }} {{ $muted }} mt-8 flex items-center justify-between gap-3 border-t border-black/10 pt-8">
                            <span>Focus</span>
                            <span class="text-right text-black">The problem, not the tool</span>
                        </div>
                    </article>

                    <article class="flex flex-col justify-between bg-white p-8 shadow-sm transition-shadow hover:shadow-md lg:p-12" data-reveal>
                        <div class="flex flex-col gap-6">
                            <div class="{{ $label }} {{ $muted }} flex items-center justify-between">
                                <span>02 / Our approach</span>
                                <span class="text-eccentric-blue">{!! $svg('M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18zM12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM12 12h.01') !!}</span>
                            </div>
                            <h2 class="{{ $sectionHeading }}">Embedded</h2>
                            <blockquote class="border-l-2 border-eccentric-blue pl-5 text-lg leading-relaxed">"We work embedded inside your business" — the same approach used to shape how we work with every client, regardless of industry.</blockquote>
                        </div>
                        <div class="{{ $label }} {{ $muted }} mt-8 flex items-center justify-between gap-3 border-t border-black/10 pt-8">
                            <span>Applies to</span>
                            <span class="text-right text-black">Every client · Every industry</span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        {{-- ============ VALUES ============ --}}
        <section class="bg-white py-20 lg:py-28" aria-labelledby="values-heading">
            <div class="mx-auto flex max-w-7xl flex-col gap-12 px-4 sm:px-6 lg:px-12">
                <div class="flex flex-col justify-between gap-4 border-b border-black/10 pb-6 sm:flex-row sm:items-end">
                    <div>
                        <span class="{{ $label }} text-eccentric-blue">Our values</span>
                        <h2 id="values-heading" class="{{ $sectionHeading }} mt-2">What We Stand For</h2>
                    </div>
                    <p class="max-w-xs text-sm {{ $muted }} sm:text-right">Three commitments behind every build we take on.</p>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-3" data-reveal-stagger>
                    @foreach ($values as $value)
                        <article class="group flex flex-col justify-between bg-[#f5f5f7] p-8 transition-colors hover:bg-black" data-reveal>
                            <div class="flex flex-col gap-4">
                                <div class="{{ $label }} {{ $muted }} flex items-center justify-between">
                                    <span>Value // {{ sprintf('%02d', $loop->iteration) }}</span>
                                    <span class="text-eccentric-blue">{!! $svg($value['icon']) !!}</span>
                                </div>
                                <h3 class="text-2xl uppercase transition-colors group-hover:text-white">{{ $value['title'] }}</h3>
                                <p class="leading-relaxed text-[#5f5f64] transition-colors group-hover:text-white/75">{{ $value['text'] }}</p>
                            </div>
                            <p class="{{ $label }} {{ $muted }} mt-6 border-t border-black/10 pt-6 group-hover:border-white/10">{{ $value['footer'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============ WORK CULTURE ============ --}}
        <section class="bg-black py-20 text-white lg:py-28" aria-labelledby="culture-heading">
            <div class="mx-auto flex max-w-7xl flex-col gap-12 px-4 sm:px-6 lg:px-12">
                <div class="{{ $sectionRule }} border-white/10">
                    <span class="{{ $label }} text-eccentric-blue">Our work culture</span>
                    <span class="{{ $label }} {{ $muted }}">Trust · Collaboration · Innovation</span>
                </div>

                <div class="grid grid-cols-1 items-end gap-8 lg:grid-cols-12">
                    <div class="lg:col-span-6">
                        <h2 id="culture-heading" class="{{ $sectionHeading }}">Great People. <span class="text-eccentric-blue">Better Solutions.</span></h2>
                    </div>
                    <p class="leading-relaxed text-white/70 lg:col-span-6">We believe in a culture of trust, collaboration and innovation — because great work happens when people grow together.</p>
                </div>

                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3" data-reveal-stagger>
                    <div class="image-hover image-hover-subtle relative min-h-64 overflow-hidden bg-[#1c1c1f]" data-reveal>
                        <img src="{{ asset('images/about/team.webp') }}" alt="The Compiling Logics team working together around a laptop" width="1200" height="443" loading="lazy" class="absolute inset-0 size-full object-cover">
                        <span class="{{ $label }} absolute bottom-3 left-3 bg-eccentric-blue px-2 py-1">Build · Create · Innovate</span>
                    </div>

                    @foreach ($culture as $item)
                        <article class="relative flex flex-col justify-between overflow-hidden bg-[#1c1c1f] p-8" data-reveal>
                            <span class="pointer-events-none absolute -right-2 -bottom-6 text-[96px] leading-none text-white/5 select-none" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <div class="relative flex flex-col gap-6">
                                <span class="{{ $label }} text-eccentric-blue">{{ $item['tag'] }}</span>
                                <h3 class="text-2xl leading-snug uppercase">{{ $item['title'] }}</h3>
                                <p class="leading-relaxed text-white/70">{{ $item['text'] }}</p>
                            </div>
                            <p class="{{ $label }} {{ $muted }} relative mt-8 flex items-center gap-2 border-t border-white/10 pt-4"><span class="text-eccentric-blue">•</span>{{ $item['footer'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============ CTA ============ --}}
        <section class="bg-[#f5f5f7] py-20 lg:py-28" aria-labelledby="about-cta-heading">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-12">
                <div class="flex flex-col items-start justify-between gap-10 bg-black p-8 text-white sm:p-10 lg:flex-row lg:items-center lg:p-16" data-reveal>
                    <div class="flex max-w-2xl flex-col gap-4">
                        <span class="{{ $label }} {{ $muted }} flex items-center gap-2"><span class="size-2 bg-eccentric-blue"></span>Book a call</span>
                        <h2 id="about-cta-heading" class="{{ $sectionHeading }}">Want the full story on a specific build?</h2>
                        <p class="leading-relaxed text-white/70">Ask on the call. We’ll pull the closest match and walk you through how it was built.</p>
                    </div>
                    <div class="flex w-full shrink-0 flex-col items-stretch gap-4 sm:flex-row sm:items-center lg:w-auto">
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center bg-eccentric-blue px-8 py-4 text-xs tracking-[0.08em] uppercase transition-colors hover:bg-white hover:text-black">Book a Call</a>
                        <a href="{{ route('work') }}" class="inline-flex items-center justify-center border border-white/20 px-8 py-4 text-xs tracking-[0.08em] uppercase transition-colors hover:bg-white/10">See Our Work</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
