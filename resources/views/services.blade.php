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

    $contactChecks = [
        ['title' => 'Pick one pillar or several', 'text' => 'We\'ll sort the order.', 'icon' => 'M3 3h7v7H3zM14 3h7v7h-7zM14 14h7v7h-7zM3 14h7v7H3z'],
        ['title' => 'Reply within one business day', 'text' => 'In any timezone.', 'icon' => 'M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18zM12 7v5l3 2'],
        ['title' => 'Clear scope and timeline', 'text' => 'Before any commitment.', 'icon' => 'M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6zM8.5 12l2.5 2.5 4.5-5'],
    ];

    $number = fn (int $index): string => sprintf('%02d', $index);
    $pillar = fn (int $index): array => $pillars[$index - 1];

    $label = 'text-[11px] leading-4 tracking-[0.12em] uppercase';
    $muted = 'text-[#808080]';
    $body = 'text-sm leading-relaxed text-[#5f5f64]';
    $sectionHeading = 'text-3xl leading-tight uppercase sm:text-4xl';
    $field = 'mt-1.5 block w-full bg-[#f5f5f7] px-4 py-3 text-sm text-black normal-case tracking-normal transition-colors placeholder:text-[#9a9aa0] focus:bg-[#e9e9ee] focus:outline-2 focus:outline-eccentric-blue';
    $svg = fn (string $path, string $classes = 'size-5'): string => '<svg class="'.$classes.' shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="'.$path.'"/></svg>';
    $arrowPath = 'M4 12h16M14 6l6 6-6 6';
@endphp

@section('content')
    <div class="services-progress" data-scroll-progress aria-hidden="true"></div>

    <div class="font-space text-black">
        {{-- ============ HERO & PILLAR INDEX ============ --}}
        <section class="relative overflow-hidden bg-white px-4 py-16 sm:px-6 lg:px-12 lg:py-24" aria-labelledby="services-heading">
            <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(to_right,#ececf0_1px,transparent_1px),linear-gradient(to_bottom,#ececf0_1px,transparent_1px)] bg-[size:4rem_4rem] opacity-60" aria-hidden="true"></div>

            <div class="relative mx-auto grid max-w-7xl grid-cols-1 items-end gap-10 lg:grid-cols-12 lg:gap-12">
                <div class="flex flex-col gap-6 lg:col-span-7">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="size-2.5 bg-eccentric-blue"></span>
                        <span class="{{ $label }} bg-[#f5f5f7] px-3 py-1">Services // 06 pillars</span>
                    </div>

                    <h1 id="services-heading" class="text-4xl leading-[1.05] tracking-tight uppercase sm:text-5xl lg:text-[64px]">
                        Six pillars. <br class="hidden sm:block">
                        <span class="text-eccentric-blue">Every build we take on.</span>
                    </h1>

                    <p class="max-w-2xl text-lg leading-relaxed text-[#5f5f64]">Our full service list, consolidated into six pillars so it stays easy to navigate. Use one on its own or combine them. Select a pillar to jump straight to it.</p>

                    <div class="flex flex-wrap items-center gap-4 pt-4">
                        <a href="#contact" class="inline-flex items-center justify-center gap-2 bg-eccentric-blue px-8 py-4 text-xs tracking-[0.08em] text-white uppercase transition-colors hover:bg-black">
                            Book a Call {!! $svg($arrowPath, 'size-[18px]') !!}
                        </a>
                        <a href="#pillars" class="inline-flex items-center justify-center gap-2 bg-[#f5f5f7] px-8 py-4 text-xs tracking-[0.08em] uppercase transition-colors hover:bg-[#e4e4e9]">
                            Explore the pillars {!! $svg('M12 4v16M6 14l6 6 6-6', 'size-[18px]') !!}
                        </a>
                    </div>
                </div>

                <nav class="flex flex-col gap-4 bg-[#f5f5f7] p-6 shadow-sm lg:col-span-5" aria-label="The six pillars">
                    <div class="flex items-center justify-between gap-3 bg-[#e9e9ee] px-4 py-2">
                        <span class="{{ $label }}">Pillar index</span>
                        <span class="{{ $label }} inline-flex items-center gap-1.5 text-eccentric-blue"><span class="size-1.5 animate-pulse bg-eccentric-blue"></span>06 active</span>
                    </div>

                    <ul class="grid gap-2 sm:grid-cols-2">
                        @foreach ($pillars as $item)
                            <li>
                                <a href="#{{ $item['id'] }}" class="group flex h-full items-center gap-3 bg-white p-3.5 transition-colors hover:bg-black hover:text-white focus-visible:bg-black focus-visible:text-white">
                                    <span class="{{ $label }} {{ $muted }} group-hover:text-white/60">{{ $number($loop->iteration) }}</span>
                                    <span class="flex-1 text-sm leading-snug uppercase">{{ $item['title'] }}</span>
                                    <span class="text-eccentric-blue group-hover:text-white">{!! $svg($item['icon'], 'size-[18px]') !!}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </section>

        {{-- ============ STICKY PILLAR NAV ============ --}}
        <div class="sticky top-0 z-30 border-y border-black/10 bg-white/95 backdrop-blur">
            <nav class="mx-auto flex max-w-7xl overflow-x-auto px-4 [scrollbar-width:none] sm:px-6 lg:px-12" aria-label="Jump to pillar" data-pillar-nav>
                @foreach ($pillars as $item)
                    <a href="#{{ $item['id'] }}" class="{{ $label }} flex flex-[1_0_auto] items-center gap-2 px-5 py-4 whitespace-nowrap transition-colors hover:bg-[#f5f5f7] data-[active]:bg-[#f5f5f7] data-[active]:text-eccentric-blue data-[active]:shadow-[inset_0_-3px_0_var(--color-eccentric-blue)]" data-pillar-chip="{{ $item['id'] }}">
                        <span class="opacity-50">{{ $number($loop->iteration) }}</span>{{ $item['title'] }}
                    </a>
                @endforeach
            </nav>
        </div>

        {{-- ============ THE SIX PILLARS ============ --}}
        <section id="pillars" class="scroll-mt-16 bg-white px-4 py-16 sm:px-6 lg:px-12" aria-labelledby="pillars-heading">
            <div class="mx-auto flex max-w-7xl flex-col gap-12">
                <div class="flex flex-col justify-between gap-6 bg-[#fafafb] p-6 md:flex-row md:items-end">
                    <div>
                        <span class="{{ $label }} mb-2 block text-eccentric-blue">Service directory // 06 pillars</span>
                        <h2 id="pillars-heading" class="{{ $sectionHeading }}">The Six Pillars</h2>
                    </div>
                    <p class="{{ $label }} {{ $muted }}">Use one on its own or combine them</p>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    @foreach ($pillars as $item)
                        @php $isBlue = $loop->odd; @endphp
                        <article id="{{ $item['id'] }}" class="relative flex scroll-mt-20 flex-col bg-[#f5f5f7] transition-colors hover:bg-[#ececf0]" aria-labelledby="{{ $item['id'] }}-title" data-pillar-section data-reveal>
                            <span @class(['absolute top-0 left-0 z-10 h-1 w-full', 'bg-eccentric-blue' => $isBlue, 'bg-black' => ! $isBlue]) aria-hidden="true"></span>

                            <div class="image-hover image-hover-subtle relative aspect-[2.4/1] overflow-hidden bg-black">
                                <x-lazy-video :src="asset('videos/services/'.$item['id'].'.mp4')" :poster="asset('images/services/posters/'.$item['id'].'.webp')" />
                                <span @class([$label, 'absolute top-4 left-4 px-2.5 py-1 text-white', 'bg-eccentric-blue' => $isBlue, 'bg-black' => ! $isBlue])>Pillar {{ $number($loop->iteration) }} / {{ $number($loop->count) }}</span>
                            </div>

                            <div class="flex flex-1 flex-col justify-between gap-6 p-6 sm:p-8">
                                <div>
                                    <div class="mb-4 flex items-start justify-between gap-4">
                                        <h3 id="{{ $item['id'] }}-title" class="text-2xl leading-snug uppercase">{{ $item['title'] }}</h3>
                                        <span class="{{ $isBlue ? 'text-eccentric-blue' : 'text-black' }}">{!! $svg($item['icon'], 'size-6') !!}</span>
                                    </div>
                                    <p class="{{ $body }}">{{ $item['description'] }}</p>
                                </div>

                                <div class="grid gap-6 sm:grid-cols-2">
                                    <div>
                                        <p class="{{ $label }} {{ $muted }} mb-2">Includes</p>
                                        <ul class="space-y-1.5 text-sm">
                                            @foreach ($item['includes'] as $include)
                                                <li class="flex items-center gap-2"><span @class(['size-1.5 shrink-0', 'bg-eccentric-blue' => $isBlue, 'bg-black' => ! $isBlue])></span>{{ $include }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div>
                                        <p class="{{ $label }} {{ $muted }} mb-2">Pairs with</p>
                                        <div class="flex flex-col gap-1.5">
                                            @foreach ($item['pairs'] as $pairIndex)
                                                <a href="#{{ $pillar($pairIndex)['id'] }}" class="{{ $label }} flex items-center gap-2 bg-white px-2.5 py-1.5 transition-colors hover:bg-black hover:text-white">
                                                    <span class="opacity-50">{{ $number($pairIndex) }}</span>{{ $pillar($pairIndex)['title'] }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <a href="#contact" class="flex items-center justify-between gap-3 bg-white p-3 text-xs tracking-[0.08em] uppercase transition-colors hover:bg-eccentric-blue hover:text-white" data-pick-pillar="{{ $item['title'] }}">
                                    Talk about this pillar {!! $svg($arrowPath, 'size-[18px]') !!}
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============ BUILD ORDER ============ --}}
        <section class="bg-[#f5f5f7] px-4 py-20 sm:px-6 lg:px-12" aria-labelledby="services-order-heading">
            <div class="mx-auto flex max-w-7xl flex-col gap-12">
                <div class="flex flex-col gap-3">
                    <span class="{{ $label }} text-eccentric-blue">Build order // 06 steps</span>
                    <h2 id="services-order-heading" class="{{ $sectionHeading }}">Used in the right order.</h2>
                    <p class="max-w-2xl leading-relaxed text-[#5f5f64]">Advisory work comes first, so the six pillars get used in the right order. A typical build runs like this.</p>
                </div>

                <ol class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3" data-reveal-stagger>
                    @foreach ($buildOrder as $pillarIndex)
                        <li class="flex h-full flex-col justify-between bg-white p-6" data-reveal>
                            <div class="space-y-4">
                                <div class="{{ $label }} {{ $muted }} flex items-center justify-between gap-3">
                                    <span>Step // {{ $number($loop->iteration) }}</span>
                                    <span @class(['font-bold', 'text-eccentric-blue' => $loop->odd, 'text-black' => $loop->even])>Pillar {{ $number($pillarIndex) }}</span>
                                </div>
                                <h3 class="text-xl leading-snug uppercase">{{ $pillar($pillarIndex)['title'] }}</h3>
                                <p class="{{ $body }}">{{ $pillar($pillarIndex)['description'] }}</p>
                            </div>
                            <a href="#{{ $pillar($pillarIndex)['id'] }}" class="mt-6 flex items-center justify-between gap-3 bg-[#f5f5f7] p-3 text-xs tracking-[0.08em] uppercase transition-colors hover:bg-black hover:text-white">
                                View pillar {!! $svg($arrowPath, 'size-[18px]') !!}
                            </a>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>

        {{-- ============ CONTACT ============ --}}
        <section id="contact" class="scroll-mt-16 bg-black px-4 py-20 text-white sm:px-6 lg:px-12" aria-labelledby="services-contact-heading">
            <div class="mx-auto grid max-w-7xl grid-cols-1 gap-12 lg:grid-cols-12">
                <div class="flex flex-col justify-between gap-8 lg:col-span-5">
                    <div>
                        <div class="mb-6 inline-flex items-center gap-2 bg-[#1c1c1f] px-3 py-1">
                            <span class="relative flex size-2"><span class="absolute inset-0 animate-ping bg-eccentric-blue"></span><span class="relative size-2 bg-eccentric-blue"></span></span>
                            <span class="{{ $label }}">Book a call // Contact</span>
                        </div>
                        <h2 id="services-contact-heading" class="{{ $sectionHeading }} mb-6">Not sure which pillar fits?</h2>
                        <p class="mb-8 leading-relaxed {{ $muted }}">Start with a call. We'll scope it from there.</p>

                        <ul class="space-y-4">
                            @foreach ($contactChecks as $check)
                                <li class="flex items-center gap-4 bg-[#1c1c1f] p-4">
                                    <span class="text-eccentric-blue">{!! $svg($check['icon'], 'size-6') !!}</span>
                                    <div>
                                        <p class="{{ $label }}">{{ $check['title'] }}</p>
                                        <p class="text-sm {{ $muted }}">{{ $check['text'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <span class="{{ $label }} {{ $muted }} mb-1 block">Direct inquiries</span>
                        <a href="mailto:info@compilinglogics.com" class="text-sm font-bold tracking-[0.08em] text-eccentric-blue uppercase transition-colors hover:text-white">info@compilinglogics.com</a>
                    </div>
                </div>

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-6 bg-white p-6 text-black shadow-lg sm:p-8 lg:col-span-7 lg:p-10">
                    @csrf
                    <input type="hidden" name="return_to" value="services">

                    <div>
                        <h3 class="mb-1 text-2xl leading-snug uppercase">Tell us what you need</h3>
                        <p class="{{ $body }}">Select the pillars that apply. Leave blank if you're unsure.</p>
                    </div>

                    <fieldset class="grid gap-2 sm:grid-cols-2">
                        <legend class="sr-only">Pillars of interest</legend>
                        @foreach ($pillars as $item)
                            <label class="group {{ $label }} flex cursor-pointer items-center gap-2.5 bg-[#f5f5f7] px-3.5 py-3 transition-colors hover:bg-[#e9e9ee] has-checked:bg-black has-checked:text-white has-focus-visible:outline-2 has-focus-visible:outline-offset-2 has-focus-visible:outline-eccentric-blue">
                                <input type="checkbox" name="pillars[]" value="{{ $item['title'] }}" class="sr-only" @checked(in_array($item['title'], old('pillars', []), true)) data-pillar-pick>
                                <span class="opacity-50">{{ $number($loop->iteration) }}</span>{{ $item['title'] }}
                                <span class="ml-auto size-2.5 bg-eccentric-blue opacity-0 group-has-checked:opacity-100" aria-hidden="true"></span>
                            </label>
                        @endforeach
                    </fieldset>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <label class="{{ $label }} block {{ $muted }}">Full name *
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Your name" required maxlength="255" autocomplete="name" class="{{ $field }}">
                        </label>
                        <label class="{{ $label }} block {{ $muted }}">Email address *
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="you@company.com" required maxlength="255" autocomplete="email" class="{{ $field }}">
                        </label>
                    </div>

                    <label class="{{ $label }} block {{ $muted }}">Project brief *
                        <textarea name="message" rows="4" placeholder="What friction do you want gone?" required maxlength="5000" class="{{ $field }} resize-none">{{ old('message') }}</textarea>
                    </label>

                    <x-recaptcha />

                    <button type="submit" class="flex w-full cursor-pointer items-center justify-center gap-2 bg-eccentric-blue py-4 text-xs tracking-[0.08em] text-white uppercase transition-colors hover:bg-black">
                        <span>Book a Call</span>{!! $svg($arrowPath, 'size-[18px]') !!}
                    </button>

                    @if (session('status') === 'contact-message-sent')
                        <p class="border-l-4 border-black bg-eccentric-blue px-3.5 py-3 text-sm text-white" role="status">Thank you. Your request is in. We'll be in touch shortly.</p>
                    @elseif ($errors->any())
                        <ul class="border-l-4 border-[#d33] bg-[#fdf2f2] px-3.5 py-3 text-sm text-[#a11]" role="alert">
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
