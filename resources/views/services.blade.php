@extends('layouts.site')

@section('title', 'Services — Compiling Logics')

@php
    $pillars = [
        [
            'id' => 'ai-agents-automation',
            'title' => 'AI Agents & Automation',
            'description' => 'Chatbots, AI/ML integrations and workflow automation that replace manual back-and-forth with something that runs on its own.',
            'includes' => ['Chatbots', 'AI/ML integrations', 'Workflow automation'],
            'pairs' => [2, 3],
            'icon' => 'M4 7h16v13H4zM12 3v4M9 12h1M14 12h1M9 16h6',
        ],
        [
            'id' => 'software-development',
            'title' => 'Software Development',
            'description' => 'Web, mobile, enterprise mobility, MVP and SaaS. The full range of what gets shipped, not just one slice of it.',
            'includes' => ['Web apps', 'Mobile apps', 'Enterprise mobility', 'MVP', 'SaaS'],
            'pairs' => [4, 5],
            'icon' => 'M8 7 3 12l5 5M16 7l5 5-5 5M14 5l-4 14',
        ],
        [
            'id' => 'cloud-devops',
            'title' => 'Cloud & DevOps',
            'description' => 'Infrastructure and deployment work that keeps everything above the line actually running.',
            'includes' => ['Infrastructure', 'Deployment', 'Reliability'],
            'pairs' => [2, 4],
            'icon' => 'M3 3h18v7H3zM3 14h18v7H3zM7 6.5h1M7 17.5h1',
        ],
        [
            'id' => 'quality-assurance',
            'title' => 'Quality Assurance',
            'description' => 'Software testing that catches what manual review misses, before a client does.',
            'includes' => ['Software testing', 'Pre-release checks', 'Manual review gaps'],
            'pairs' => [2, 3],
            'icon' => 'M3 3h18v18H3zM7 12l3.5 3.5L17 8.5',
        ],
        [
            'id' => 'design',
            'title' => 'Design',
            'description' => 'Product design, UX/UI, graphic design and brand identity: the part of the stack a visitor actually sees and judges first.',
            'includes' => ['Product design', 'UX/UI', 'Graphic design', 'Brand identity'],
            'pairs' => [2, 6],
            'icon' => 'M4 20l1-5L16 4l4 4L9 19l-5 1zM13 7l4 4',
        ],
        [
            'id' => 'it-consultation',
            'title' => 'IT Consultation',
            'description' => 'Advisory work before the build starts, so the six pillars get used in the right order.',
            'includes' => ['Advisory', 'Scoping', 'Sequencing'],
            'pairs' => [5, 2],
            'icon' => 'M3 4h18v13H10l-5 4v-4H3z',
        ],
    ];

    $buildOrder = [6, 5, 2, 4, 3, 1];

    $number = fn (int $index): string => sprintf('%02d', $index);
    $pillar = fn (int $index): array => $pillars[$index - 1];

    $arrowIcon = '<svg class="size-[18px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M6 18 18 6M8 6h10v10"/></svg>';
    $overlineClasses = 'text-[11px] leading-[1.3] tracking-[0.15em] uppercase';
    $blueButtonClasses = 'group/button inline-flex items-center justify-center gap-2.5 border-2 border-eccentric-blue bg-eccentric-blue px-[22px] py-3 tracking-[0.02em] text-white transition-colors hover:border-black hover:bg-black';
@endphp

@section('content')
    <div class="services-progress" data-scroll-progress aria-hidden="true"></div>

    <div class="font-electrolize text-black">
        {{-- Hero with pillar map --}}
        <section class="services-hero relative overflow-hidden py-16 md:pt-20 md:pb-[88px]" aria-labelledby="services-heading">
            <div class="relative mx-auto grid max-w-[1320px] items-center gap-12 px-4 sm:px-6 lg:grid-cols-2">
                <div>
                    <p class="{{ $overlineClasses }} mb-7">Services <span class="mx-1 text-eccentric-blue">/</span> 06 pillars</p>
                    <span class="mb-6 block h-1 w-[72px] bg-eccentric-blue"></span>
                    <h1 id="services-heading" class="mb-6 text-4xl leading-[1.1] sm:text-5xl">Six pillars.<br>Every build we take on.</h1>
                    <p class="mb-9 max-w-[500px] leading-[1.6]">Our full service list, consolidated into six pillars so it stays easy to navigate. Use one on its own or combine them. Select a pillar to jump straight to it.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#contact" class="{{ $blueButtonClasses }}">Book a Call {!! $arrowIcon !!}</a>
                        <a href="#{{ $pillars[0]['id'] }}" class="inline-flex items-center border-2 border-black bg-white px-[22px] py-3 tracking-[0.02em] transition-colors hover:bg-black hover:text-white">Explore the pillars</a>
                    </div>
                </div>

                <nav class="grid grid-cols-2 border-t border-l border-black bg-white" aria-label="The six pillars">
                    @foreach ($pillars as $item)
                        <a href="#{{ $item['id'] }}" class="services-pillar-cell group relative flex min-h-[158px] flex-col justify-between border-r border-b border-black px-[22px] py-5 transition-colors duration-200 hover:bg-black hover:text-white focus-visible:bg-black focus-visible:text-white">
                            <span class="flex items-start justify-between">
                                <span class="text-[13px] tracking-[0.12em]">{{ $number($loop->iteration) }}</span>
                                <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="{{ $item['icon'] }}"/></svg>
                            </span>
                            <span class="max-w-[80%] text-lg leading-[1.3]">{{ $item['title'] }}</span>
                            <span class="absolute right-4 bottom-4 -translate-x-1.5 translate-y-1.5 opacity-0 transition-all duration-200 group-hover:translate-0 group-hover:opacity-100 group-focus-visible:translate-0 group-focus-visible:opacity-100">{!! $arrowIcon !!}</span>
                        </a>
                    @endforeach
                </nav>
            </div>
        </section>

        {{-- Sticky pillar navigation --}}
        <div class="sticky top-0 z-30 border-t border-b border-t-black/14 border-b-black bg-white">
            <nav class="mx-auto flex max-w-[1320px] overflow-x-auto px-4 [scrollbar-width:none] sm:px-6" aria-label="Jump to pillar" data-pillar-nav>
                @foreach ($pillars as $item)
                    <a href="#{{ $item['id'] }}" class="services-chip relative flex flex-[1_0_auto] items-center gap-2.5 border-r border-black/14 px-[22px] py-4 text-[13px] tracking-[0.06em] whitespace-nowrap first:border-l hover:bg-[#f6f6f6] data-[active]:bg-[#f6f6f6]" data-pillar-chip="{{ $item['id'] }}">
                        <span class="text-[11px] opacity-50">{{ $number($loop->iteration) }}</span>{{ $item['title'] }}
                    </a>
                @endforeach
            </nav>
        </div>

        {{-- Pillars --}}
        @foreach ($pillars as $item)
            <section id="{{ $item['id'] }}" class="scroll-mt-16 border-b border-black/14 py-12 md:py-[72px]" aria-labelledby="{{ $item['id'] }}-title" data-pillar-section>
                <div class="mx-auto grid max-w-[1320px] items-center gap-12 px-4 sm:px-6 lg:grid-cols-12">
                    <div @class(['lg:col-span-5', 'lg:order-2' => $loop->even]) data-reveal>
                        <div class="services-big-number mb-3 text-[88px] leading-none tracking-[-0.02em] sm:text-[120px]" aria-hidden="true">{{ $number($loop->iteration) }}</div>
                        <p class="{{ $overlineClasses }}">Pillar {{ $number($loop->iteration) }} <span class="mx-1 text-eccentric-blue">/</span> {{ $number($loop->count) }}</p>
                        <h2 id="{{ $item['id'] }}-title" class="mt-3 mb-4 text-[28px] leading-[1.2] sm:text-4xl">{{ $item['title'] }}</h2>
                        <p class="max-w-[460px] leading-[1.6]">{{ $item['description'] }}</p>
                        <a href="#contact" class="{{ $blueButtonClasses }} mt-6" data-pick-pillar="{{ $item['title'] }}">Talk about this pillar {!! $arrowIcon !!}</a>
                    </div>

                    <div @class(['lg:col-span-7', 'lg:order-1' => $loop->even]) data-reveal>
                        <figure class="relative m-0 pr-3.5 pb-3.5">
                            <span class="absolute inset-[14px_0_0_14px] border border-black" aria-hidden="true"></span>
                            <div class="services-shot relative z-10 aspect-[2.4/1] overflow-hidden border border-black bg-black">
                                <x-lazy-video :src="asset('videos/services/'.$item['id'].'.mp4')" :poster="asset('images/services/posters/'.$item['id'].'.jpg')" />
                                <span class="absolute top-0 left-0 border-r border-b border-black bg-white px-3 py-1.5 text-xs tracking-[0.1em]">{{ $number($loop->iteration) }}</span>
                            </div>
                        </figure>

                        <div class="mt-7 grid border border-black/14 sm:grid-cols-2">
                            <div class="px-[22px] py-5">
                                <p class="{{ $overlineClasses }} mb-3.5 opacity-70">Includes</p>
                                <ul class="flex flex-wrap gap-1.5">
                                    @foreach ($item['includes'] as $include)
                                        <li class="border border-black/14 bg-white px-2.5 py-1 text-xs tracking-[0.05em]">{{ $include }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="border-t border-black/14 px-[22px] py-5 sm:border-t-0 sm:border-l">
                                <p class="{{ $overlineClasses }} mb-3.5 opacity-70">Pairs with</p>
                                <div class="flex flex-col gap-1.5">
                                    @foreach ($item['pairs'] as $pairIndex)
                                        <a href="#{{ $pillar($pairIndex)['id'] }}" class="flex items-center gap-2.5 border border-black/14 px-2.5 py-1.5 text-[13px] transition-colors hover:border-black hover:bg-black hover:text-white">
                                            <span class="text-[11px] opacity-50">{{ $number($pairIndex) }}</span>{{ $pillar($pairIndex)['title'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach

        {{-- Build order --}}
        <section class="bg-black py-16 text-white md:py-24" aria-labelledby="services-order-heading">
            <div class="mx-auto max-w-[1320px] px-4 sm:px-6">
                <span class="mb-6 block h-1 w-[72px] bg-eccentric-blue"></span>
                <h2 id="services-order-heading" class="mb-4 max-w-[560px] text-[28px] leading-[1.2] sm:text-4xl" data-reveal>Used in the right order.</h2>
                <p class="mb-14 max-w-[520px] leading-[1.6] opacity-85" data-reveal>Advisory work comes first, so the six pillars get used in the right order. A typical build runs like this.</p>

                <div class="relative pl-3 lg:pl-0">
                <span class="absolute top-0 bottom-0 left-[19px] w-0.5 bg-white/25 lg:top-[11px] lg:right-0 lg:bottom-auto lg:left-0 lg:h-0.5 lg:w-auto" aria-hidden="true"></span>
                <ol class="relative grid lg:grid-cols-6">
                    @foreach ($buildOrder as $pillarIndex)
                        <li class="group relative pb-8 pl-11 lg:pt-[38px] lg:pb-0 lg:pl-0" data-reveal>
                            <span class="absolute top-0.5 left-0 size-4 border-2 border-white bg-black transition-colors group-hover:border-eccentric-blue group-hover:bg-eccentric-blue lg:top-1" aria-hidden="true"></span>
                            <a href="#{{ $pillar($pillarIndex)['id'] }}" class="flex h-full flex-col gap-2.5 pr-5">
                                <span class="{{ $overlineClasses }} opacity-60">Step {{ $number($loop->iteration) }}</span>
                                <span class="text-xl leading-[1.3]">{{ $pillar($pillarIndex)['title'] }}</span>
                                <span class="text-xs tracking-[0.08em] opacity-60">Pillar {{ $number($pillarIndex) }}</span>
                                <span class="-translate-x-1.5 translate-y-1.5 opacity-0 transition-all duration-200 group-hover:translate-0 group-hover:opacity-100">{!! $arrowIcon !!}</span>
                            </a>
                        </li>
                    @endforeach
                </ol>
                </div>
            </div>
        </section>

        {{-- Contact --}}
        <section id="contact" class="scroll-mt-16 py-16 md:py-24" aria-labelledby="services-contact-heading">
            <div class="mx-auto grid max-w-[1320px] items-center gap-12 px-4 sm:px-6 lg:grid-cols-12">
                <div class="lg:col-span-5" data-reveal>
                    <span class="mb-6 block h-1 w-[72px] bg-eccentric-blue"></span>
                    <h2 id="services-contact-heading" class="mb-5 text-[28px] leading-[1.2] sm:text-4xl">Not sure which pillar fits?</h2>
                    <p class="max-w-[440px] leading-[1.6]">Start with a call. We'll scope it from there.</p>
                    <ul class="mt-8">
                        @foreach (['Pick one pillar or several, we\'ll sort the order', 'Reply within one business day, in any timezone', 'Clear scope and timeline before any commitment'] as $check)
                            <li class="flex gap-3.5 border-t border-black/14 py-3.5 text-sm last:border-b">
                                <svg class="mt-0.5 size-[18px] shrink-0 text-eccentric-blue" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M4 12l6 6L20 6"/></svg>{{ $check }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <form method="POST" action="{{ route('contact.store') }}" class="border border-t-4 border-black border-t-eccentric-blue bg-white p-6 sm:p-9 lg:col-span-7" data-reveal>
                    @csrf
                    <input type="hidden" name="return_to" value="services">

                    <h3 class="mb-1 text-2xl leading-[1.3]">Tell us what you need</h3>
                    <p class="mb-6 text-sm text-black/70">Select the pillars that apply. Leave blank if you're unsure.</p>

                    <fieldset class="mb-6 grid gap-2 sm:grid-cols-2">
                        <legend class="sr-only">Pillars of interest</legend>
                        @foreach ($pillars as $item)
                            <label class="group flex cursor-pointer items-center gap-2.5 border border-black bg-white px-3.5 py-[11px] text-[13px] tracking-[0.03em] transition-colors hover:bg-[#f6f6f6] has-checked:bg-black has-checked:text-white has-focus-visible:outline-2 has-focus-visible:outline-offset-2 has-focus-visible:outline-eccentric-blue">
                                <input type="checkbox" name="pillars[]" value="{{ $item['title'] }}" class="sr-only" @checked(in_array($item['title'], old('pillars', []), true)) data-pillar-pick>
                                <span class="text-[11px] opacity-50">{{ $number($loop->iteration) }}</span>{{ $item['title'] }}
                                <span class="ml-auto size-2.5 bg-eccentric-blue opacity-0 group-has-checked:opacity-100" aria-hidden="true"></span>
                            </label>
                        @endforeach
                    </fieldset>

                    <div class="grid gap-4 md:grid-cols-2">
                        <label class="block text-xs tracking-[0.05em]">Full name *
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Your name" required maxlength="255" autocomplete="name" class="mt-2 block w-full border border-black/30 bg-[#fafafa] px-3.5 py-3 text-sm focus:border-eccentric-blue focus:bg-white focus:shadow-[0_0_0_3px_rgba(0,73,253,0.18)] focus:outline-none">
                        </label>
                        <label class="block text-xs tracking-[0.05em]">Email address *
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="you@company.com" required maxlength="255" autocomplete="email" class="mt-2 block w-full border border-black/30 bg-[#fafafa] px-3.5 py-3 text-sm focus:border-eccentric-blue focus:bg-white focus:shadow-[0_0_0_3px_rgba(0,73,253,0.18)] focus:outline-none">
                        </label>
                        <label class="block text-xs tracking-[0.05em] md:col-span-2">Project brief *
                            <textarea name="message" rows="3" placeholder="What friction do you want gone?" required maxlength="5000" class="mt-2 block w-full border border-black/30 bg-[#fafafa] px-3.5 py-3 text-sm focus:border-eccentric-blue focus:bg-white focus:shadow-[0_0_0_3px_rgba(0,73,253,0.18)] focus:outline-none">{{ old('message') }}</textarea>
                        </label>
                        <div class="md:col-span-2">
                            <button type="submit" class="{{ $blueButtonClasses }} cursor-pointer">Book a Call {!! $arrowIcon !!}</button>
                        </div>
                    </div>

                    @if (session('status') === 'contact-message-sent')
                        <p class="mt-4 border-l-4 border-eccentric-blue bg-[#f6f6f6] px-3.5 py-3 text-sm" role="status">Thank you. Your request is in. We'll be in touch shortly.</p>
                    @elseif ($errors->any())
                        <ul class="mt-4 border-l-4 border-[#d33] bg-[#fdf2f2] px-3.5 py-3 text-sm text-[#a11]" role="alert">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </form>
            </div>
        </section>
    </div>
@endsection
