@extends('layouts.site')

@section('title', 'Work — Compiling Logics')
@section('description', 'Live builds by Compiling Logics, from legal directories to SaaS platforms. Browse 14 projects, open each case study or visit the live website.')

@php
    $deliverableTypes = [
        'ai-agents' => 'AI AGENTS',
        'web-app' => 'WEB APP',
        'mobile-app' => 'MOBILE APP',
        'cloud-devops' => 'CLOUD / DEVOPS',
        'qa' => 'QA',
        'design' => 'DESIGN',
    ];

    $industries = [
        'healthcare' => 'HEALTHCARE',
        'real-estate' => 'REAL ESTATE',
        'hospitality' => 'HOSPITALITY',
        'education' => 'EDUCATION',
        'fintech-banking' => 'FINTECH & BANKING',
        'retail-ecommerce' => 'RETAIL & ECOMMERCE',
    ];

    $projects = [
        [
            'name' => 'Best Local Law',
            'category' => 'Legal',
            'index' => '01',
            'image' => 'best-local-law.webp',
            'pdf' => 'best-local-law.pdf',
            'url' => 'https://bestlocallaw.com',
            'tags' => ['Directory', 'Legal', 'Search'],
            'types' => ['web-app', 'ai-agents'],
            'industries' => ['real-estate'],
            'description' => [
                'text' => 'A nationwide legal directory that matches clients with top-rated local attorneys through an intelligent search and attorney-client portal.',
                'highlight' => 'intelligent search',
            ],
        ],
        [
            'name' => 'JollyWitMe',
            'category' => 'SaaS',
            'index' => '02',
            'image' => 'jollywitme.webp',
            'pdf' => 'jollywitme.pdf',
            'url' => 'https://jollywitme.com',
            'tags' => ['SaaS', 'Events', 'Ticketing'],
            'types' => ['web-app', 'cloud-devops'],
            'industries' => ['fintech-banking', 'retail-ecommerce'],
            'description' => [
                'text' => 'A cloud-based event ticketing and registration SaaS platform built for organisers who need fast setup and real-time attendee management.',
                'highlight' => 'real-time attendee management',
            ],
        ],
        [
            'name' => 'Expat Car Buyers',
            'category' => 'Marketplace',
            'index' => '03',
            'image' => 'expat-car-buyers.webp',
            'pdf' => 'expat-car-buyers.pdf',
            'url' => 'https://expatcarbuyers.com',
            'tags' => ['Marketplace', 'Automotive', 'UAE'],
            'types' => ['web-app', 'mobile-app'],
            'industries' => ['retail-ecommerce'],
            'description' => [
                'text' => 'A high-speed UAE car valuation and buying platform purpose-built for expats, delivering step-by-step offers with sub-50ms page transitions.',
                'highlight' => 'sub-50ms page transitions',
            ],
        ],
        [
            'name' => 'Certus 3D',
            'category' => 'Industrial',
            'index' => '04',
            'image' => 'certus-3d.webp',
            'pdf' => 'certus-3d.pdf',
            'url' => 'https://certus3d.com',
            'tags' => ['Industrial', '3D Printing', 'Catalogue'],
            'types' => ['web-app', 'design'],
            'industries' => ['retail-ecommerce'],
            'description' => [
                'text' => 'An industrial additive manufacturing showcase and equipment catalogue platform for a leading 3D printing solutions provider.',
                'highlight' => 'additive manufacturing',
            ],
        ],
        [
            'name' => 'PDF Tools',
            'category' => 'SaaS',
            'index' => '05',
            'image' => 'pdf-tools.webp',
            'pdf' => 'pdf-tools.pdf',
            'url' => 'https://www.pdftools.net',
            'tags' => ['Browser Tools', 'PDF', 'WASM'],
            'types' => ['web-app', 'qa'],
            'industries' => ['education', 'fintech-banking'],
            'description' => [
                'text' => 'A suite of browser-based PDF conversion, compression and editing tools that handle thousands of daily document operations without a backend upload.',
                'highlight' => 'browser-based PDF',
            ],
        ],
        [
            'name' => 'Fluencyi',
            'category' => 'Education',
            'index' => '06',
            'image' => 'fluencyi.webp',
            'pdf' => 'fluencyi.pdf',
            'url' => 'https://fluencyi.com',
            'tags' => ['Education', 'EdTech', 'Tutoring'],
            'types' => ['web-app', 'mobile-app'],
            'industries' => ['education'],
            'description' => [
                'text' => 'A language-learning marketplace connecting students with verified native-speaker tutors, featuring live session scheduling and progress tracking.',
                'highlight' => 'live session scheduling',
            ],
        ],
        [
            'name' => 'Otelogia',
            'category' => 'Hospitality',
            'index' => '07',
            'image' => 'otelogia.webp',
            'pdf' => 'otelogia.pdf',
            'url' => 'https://ottelogia.com',
            'tags' => ['Hospitality', 'Real Estate', 'Booking'],
            'types' => ['web-app'],
            'industries' => ['hospitality', 'real-estate'],
            'description' => [
                'text' => 'A hospitality and short-term rental discovery platform blending hotel listings with curated real-estate investment opportunities in one searchable portal.',
                'highlight' => 'curated real-estate',
            ],
        ],
        [
            'name' => 'Busy SPR',
            'category' => 'Education',
            'index' => '08',
            'image' => 'busy-spr.webp',
            'pdf' => 'busy-spr.pdf',
            'url' => 'https://busyspr.com',
            'tags' => ['EdTech', 'Productivity', 'SaaS'],
            'types' => ['web-app'],
            'industries' => ['education'],
            'description' => [
                'text' => 'A student productivity and scheduling platform that automates revision timetables and tracks academic milestones across multiple subjects.',
                'highlight' => 'automates revision timetables',
            ],
        ],
        [
            'name' => 'Go Get Notary',
            'category' => 'Legal',
            'index' => '09',
            'image' => 'go-get-notary.webp',
            'pdf' => 'go-get-notary.pdf',
            'url' => 'https://gogetnotary.com',
            'tags' => ['Legal', 'On-Demand', 'Booking'],
            'types' => ['web-app'],
            'industries' => ['real-estate'],
            'description' => [
                'text' => 'An on-demand notary booking platform that connects clients with certified notaries for in-person or remote document verification within minutes.',
                'highlight' => 'remote document verification',
            ],
        ],
        [
            'name' => 'Kids Health Club',
            'category' => 'Healthcare',
            'index' => '10',
            'image' => 'kids-health-club.webp',
            'pdf' => 'kids-health-club.pdf',
            'url' => 'https://kidshealthhub.com.au',
            'tags' => ['Healthcare', 'Paediatrics', 'Directory'],
            'types' => ['web-app'],
            'industries' => ['healthcare'],
            'description' => [
                'text' => 'An Australian paediatric healthcare directory with live Google Maps integration, helping parents find and book specialists, GPs and telehealth providers.',
                'highlight' => 'live Google Maps integration',
            ],
        ],
        [
            'name' => 'Tutor Hub',
            'category' => 'Education',
            'index' => '11',
            'image' => 'tutor-hub.webp',
            'pdf' => 'tutor-hub.pdf',
            'url' => 'https://tutorhub.pk',
            'tags' => ['Marketplace', 'Tutoring', 'Reviews'],
            'types' => ['web-app', 'qa'],
            'industries' => ['education'],
            'description' => [
                'text' => 'A tutor marketplace where students find, vet and book subject-specific tutors, with built-in session management and transparent review scores.',
                'highlight' => 'transparent review scores',
            ],
        ],
        [
            'name' => 'DropPR.ai',
            'category' => 'SaaS',
            'index' => '12',
            'image' => 'droppr-ai.webp',
            'pdf' => 'droppr-ai.pdf',
            'url' => 'https://droppr.ai',
            'tags' => ['AI', 'PR Automation', 'Media'],
            'types' => ['ai-agents', 'web-app'],
            'industries' => [],
            'description' => [
                'text' => 'An AI-powered PR automation platform that turns a video, voice note or photo into a publication-ready, SEO-optimized press release, then distributes it to 1,500+ sites.',
                'highlight' => 'AI-powered PR automation',
            ],
        ],
        [
            'name' => 'ForCoach',
            'category' => 'SaaS',
            'index' => '13',
            'image' => 'forcoach.webp',
            'pdf' => 'forcoach.pdf',
            'url' => 'https://forcoach.io',
            'tags' => ['SaaS', 'Scheduling', 'Invoicing'],
            'types' => ['web-app', 'mobile-app'],
            'industries' => [],
            'description' => [
                'text' => 'An operating system for instructors teaching across multiple studios: it tracks classes at every studio, calculates earnings automatically and generates professional invoices.',
                'highlight' => 'calculates earnings automatically',
            ],
        ],
        [
            'name' => 'Novartis Tech Café',
            'category' => 'Event SaaS',
            'index' => '14',
            'image' => 'novartis-tech-cafe.webp',
            'pdf' => 'novartis-tech-cafe.pdf',
            'tags' => ['Events', 'QR Check-in', 'Laravel'],
            'types' => ['web-app', 'design'],
            'industries' => ['healthcare'],
            'description' => [
                'text' => 'A real-time event management platform for high-traffic live events, with QR check-ins, role-based dashboards for admins and moderators, and instant activity tracking.',
                'highlight' => 'QR check-ins',
            ],
        ],
    ];

    $versionedAsset = fn (string $path): string => asset($path).'?v='.(is_file(public_path($path)) ? filemtime(public_path($path)) : 0);

    $projects = array_map(
        fn (array $project): array => [
            ...$project,
            'has_case_study' => is_file(public_path('case-studies/'.$project['pdf'])),
            'image_url' => $versionedAsset('images/work/'.$project['image']),
            'pdf_url' => $versionedAsset('case-studies/'.$project['pdf']),
        ],
        $projects,
    );

    $highlight = fn (array $description): string => str_replace(
        e($description['highlight']),
        '<span class="text-eccentric-blue">'.e($description['highlight']).'</span>',
        e($description['text']),
    );
@endphp

@section('content')
    @php
        $categories = collect($projects)->countBy('category')->all();
        $caseStudyCount = count(array_filter($projects, fn (array $project): bool => $project['has_case_study']));
        $domain = fn (array $project): string => isset($project['url']) ? preg_replace('/^www\./', '', parse_url($project['url'], PHP_URL_HOST)) : \Illuminate\Support\Str::slug($project['name']).'.com';

        $label = 'text-[11px] leading-4 tracking-[0.12em] uppercase';
        $muted = 'text-[#808080]';
        $chip = 'border border-black/10 bg-[#f5f5f7] px-2 py-1 text-[11px] tracking-[0.12em] uppercase';
        $filterButton = 'cursor-pointer border-2 border-black/20 bg-white px-4 py-2 text-xs tracking-[0.08em] uppercase transition-colors hover:border-black aria-pressed:border-eccentric-blue aria-pressed:bg-eccentric-blue aria-pressed:text-white';
        $field = 'mt-1.5 block w-full border border-black/20 bg-[#f5f5f7] px-4 py-3 text-sm normal-case tracking-normal text-black transition-colors placeholder:text-[#9a9aa0] focus:border-eccentric-blue focus:bg-white focus:outline-none';
        $svg = fn (string $path, string $classes = 'size-[18px]'): string => '<svg class="'.$classes.' shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="'.$path.'"/></svg>';
        $arrowPath = 'M4 12h16M14 6l6 6-6 6';
        $externalPath = 'M6 18 18 6M8 6h10v10';
    @endphp

    <div class="font-space text-black">
        {{-- ============ META STRIP ============ --}}
        <div class="border-b border-black/10 bg-[#f5f5f7]">
            <div class="{{ $label }} {{ $muted }} mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-4 py-3 sm:px-6 lg:px-12">
                <div class="flex items-center gap-3">
                    <span class="inline-block size-2 bg-eccentric-blue"></span>
                    <span class="font-semibold text-black">Work // Production records</span>
                    <span class="hidden text-black/20 sm:inline">|</span>
                    <span class="hidden sm:inline">Live builds only</span>
                </div>
                <span class="text-black">{{ count($projects) }} projects // {{ $caseStudyCount }} case studies</span>
            </div>
        </div>

        {{-- ============ HERO & FILTERS ============ --}}
        <section class="border-b border-black/10 bg-white" aria-labelledby="work-heading">
            <div class="mx-auto max-w-7xl px-4 pt-16 pb-14 sm:px-6 lg:px-12">
                <div class="grid grid-cols-1 items-end gap-8 lg:grid-cols-12">
                    <div class="flex flex-col gap-4 lg:col-span-8">
                        <span class="{{ $label }} inline-flex items-center gap-2 self-start border border-black/10 bg-[#f5f5f7] px-2.5 py-1 text-eccentric-blue">
                            {!! $svg('M3 5h18v14H3zM7 10l2.5 2L7 14M12 14h5', 'size-3.5') !!} Work // Case studies
                        </span>
                        <h1 id="work-heading" class="text-4xl leading-tight font-bold tracking-tight uppercase sm:text-5xl lg:text-[64px]">
                            Pick a project.<br>
                            <span class="text-eccentric-blue">See how it was built.</span>
                        </h1>
                        <p class="max-w-2xl text-lg leading-relaxed {{ $muted }}">{{ count($projects) }} live builds in one place. Filter by category, open the case study, or visit the live website.</p>
                    </div>

                    <div class="flex flex-col gap-3 lg:col-span-4 lg:items-end">
                        <div class="w-full border border-black/10 bg-[#f5f5f7] p-4 lg:max-w-xs">
                            <div class="{{ $label }} {{ $muted }} mb-2 flex items-center justify-between">
                                <span>Portfolio stats</span>
                                <span class="text-eccentric-blue">Live</span>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-3xl font-bold">{{ count($projects) }}</p>
                                    <p class="{{ $label }} {{ $muted }}">Live builds</p>
                                </div>
                                <div>
                                    <p class="text-3xl font-bold text-eccentric-blue">{{ $caseStudyCount }}</p>
                                    <p class="{{ $label }} {{ $muted }}">Case studies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 flex flex-wrap items-center justify-between gap-4 border-t border-black/10 pt-6">
                    <div class="flex flex-wrap items-center gap-2" role="group" aria-label="Filter projects by category">
                        <button type="button" class="{{ $filterButton }}" aria-pressed="true" data-work-filter="all">All work [{{ sprintf('%02d', count($projects)) }}]</button>
                        @foreach ($categories as $category => $total)
                            <button type="button" class="{{ $filterButton }}" aria-pressed="false" data-work-filter="{{ $category }}">{{ $category }} [{{ sprintf('%02d', $total) }}]</button>
                        @endforeach
                    </div>
                    <span class="{{ $label }} {{ $muted }} hidden items-center gap-2 md:flex">
                        {!! $svg('M3 5h18l-7 8v6l-4 2v-8z', 'size-3.5') !!} Filter by category
                    </span>
                </div>
            </div>
        </section>

        {{-- ============ CASE STUDIES ============ --}}
        <section id="showroom" class="scroll-mt-6 bg-white py-14" aria-label="Projects">
            <div class="mx-auto flex max-w-7xl flex-col gap-16 px-4 sm:px-6 lg:px-12">
                @foreach ($projects as $project)
                    @php $isBlue = $loop->odd; @endphp
                    <article class="border-2 border-black bg-white" aria-labelledby="project-{{ $project['index'] }}-title" data-work-category="{{ $project['category'] }}">
                        <div class="flex flex-wrap items-center justify-between gap-4 border-b-2 border-black bg-[#f5f5f7] px-4 py-4 sm:px-6">
                            <div class="flex flex-wrap items-center gap-3">
                                <span @class([$label, 'px-2 py-0.5 font-semibold text-white', 'bg-eccentric-blue' => $isBlue, 'bg-black' => ! $isBlue])>Project {{ $project['index'] }}</span>
                                <h2 id="project-{{ $project['index'] }}-title" class="text-sm font-semibold tracking-[0.06em] uppercase">{{ $project['name'] }}: {{ $project['category'] }}</h2>
                            </div>
                            <div class="{{ $label }} {{ $muted }} flex items-center gap-4">
                                <span>{{ $domain($project) }}</span>
                                <span class="size-1.5 bg-black"></span>
                                <span class="text-eccentric-blue">{{ $project['has_case_study'] ? 'Case study available' : 'Case study coming soon' }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-10 p-5 sm:p-6 lg:grid-cols-12 lg:p-10">
                            {{-- Details --}}
                            <div @class(['flex flex-col justify-between gap-8 lg:col-span-7', 'lg:order-1' => $loop->odd, 'lg:order-2' => $loop->even])>
                                <div class="flex flex-col gap-6">
                                    <div class="border-l-2 border-black pl-4">
                                        <span class="{{ $label }} {{ $muted }} mb-1 block">Project overview</span>
                                        <p class="leading-relaxed">{!! $highlight($project['description']) !!}</p>
                                    </div>

                                    <div class="border-l-2 border-eccentric-blue pl-4">
                                        <span class="{{ $label }} mb-1 block text-eccentric-blue">What we delivered</span>
                                        <p class="text-sm leading-relaxed tracking-[0.08em] uppercase">{{ implode(' · ', array_map(fn (string $type): string => $deliverableTypes[$type], $project['types'])) }}@if ($project['industries'] !== []) <span class="{{ $muted }}">// {{ implode(', ', array_map(fn (string $industry): string => $industries[$industry], $project['industries'])) }}</span>@endif</p>
                                    </div>

                                    <div class="border border-black/20 bg-[#f5f5f7] p-5">
                                        <div class="{{ $label }} mb-4 flex items-center justify-between gap-3 border-b border-black/10 pb-2">
                                            <span class="{{ $muted }}">Build specification // {{ $project['name'] }}</span>
                                            <span class="text-eccentric-blue">{{ $project['category'] }}</span>
                                        </div>
                                        <div class="{{ $label }} grid grid-cols-1 items-center gap-2 text-center sm:grid-cols-[1fr_auto_1fr_auto_1fr]">
                                            @foreach ($project['tags'] as $tag)
                                                @php $isCore = $loop->iteration === 2; @endphp
                                                <div @class(['bg-white p-2', 'border-2 border-eccentric-blue' => $isCore, 'border border-black/30' => ! $isCore])>
                                                    <span @class(['block text-[10px]', 'text-eccentric-blue' => $isCore, $muted => ! $isCore])>Layer {{ sprintf('%02d', $loop->iteration) }}</span>
                                                    <span class="font-semibold">{{ $tag }}</span>
                                                </div>
                                                @unless ($loop->last)
                                                    <span class="hidden font-bold text-eccentric-blue sm:inline" aria-hidden="true">---&gt;</span>
                                                @endunless
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <ul class="flex flex-wrap items-center gap-3 border-t border-black/10 pt-4">
                                    @foreach ($project['types'] as $type)
                                        <li class="{{ $chip }}">{{ $deliverableTypes[$type] }}</li>
                                    @endforeach
                                    @foreach ($project['tags'] as $tag)
                                        <li class="{{ $chip }}">{{ $tag }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Preview & actions --}}
                            <div @class(['order-first flex flex-col gap-6 lg:col-span-5', 'lg:order-2' => $loop->odd, 'lg:order-1' => $loop->even])>
                                <div class="image-hover image-hover-subtle relative overflow-hidden border border-black/20 bg-black">
                                    <img src="{{ $project['image_url'] }}" alt="{{ $project['name'] }} website preview" width="1200" height="571" @unless ($loop->first) loading="lazy" @endunless decoding="async" class="block aspect-[2.1/1] w-full object-cover object-top">
                                    <span class="{{ $label }} absolute bottom-3 left-3 border border-black bg-white/95 px-3 py-1">{{ $domain($project) }}</span>
                                </div>

                                <dl class="grid grid-cols-[1.7fr_1fr_1fr] gap-2 sm:gap-3">
                                    @foreach ([
                                        ['Category', $project['category'], true],
                                        ['Case study', $project['has_case_study'] ? 'PDF' : 'Soon', false],
                                        ['Website', isset($project['url']) ? 'Live' : 'Private', false],
                                    ] as [$term, $value, $isBlueValue])
                                        <div class="flex min-w-0 flex-col-reverse border border-black bg-white p-3 sm:p-4">
                                            <dt class="{{ $label }} {{ $muted }} mt-1">{{ $term }}</dt>
                                            <dd @class(['text-sm font-bold uppercase [overflow-wrap:anywhere] sm:text-lg lg:text-base xl:text-lg', 'text-eccentric-blue' => $isBlueValue])>{{ $value }}</dd>
                                        </div>
                                    @endforeach
                                </dl>

                                <div class="flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row">
                                    <button type="button" class="flex flex-1 cursor-pointer items-center justify-center gap-2 bg-black py-3 text-xs tracking-[0.08em] text-white uppercase transition-colors hover:bg-eccentric-blue disabled:cursor-default disabled:bg-black/20" data-case-study-trigger data-project-name="{{ $project['name'] }}" data-pdf-url="{{ $project['has_case_study'] ? $project['pdf_url'] : '' }}" @disabled(! $project['has_case_study'])>
                                        <span>{{ $project['has_case_study'] ? 'View Case Study' : 'Case study coming soon' }}</span>{!! $svg($arrowPath) !!}
                                    </button>
                                    @isset($project['url'])
                                        <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="flex flex-1 items-center justify-center gap-2 border-2 border-black bg-white py-2.5 text-xs tracking-[0.08em] uppercase transition-colors hover:bg-black hover:text-white">
                                            Visit Web {!! $svg($externalPath) !!}
                                        </a>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <x-case-study-modal />

        <x-work-testimonials />

        {{-- ============ INDUSTRY CTA ============ --}}
        <section class="border-b border-black/10 bg-white py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-12">
                <div class="flex flex-col items-center justify-between gap-8 border-2 border-black bg-white p-6 sm:p-8 lg:flex-row lg:p-12" data-reveal>
                    <div class="flex max-w-2xl flex-col gap-3">
                        <span class="{{ $label }} inline-flex items-center gap-2 text-eccentric-blue"><span class="size-2 bg-eccentric-blue"></span>Industry-matched work</span>
                        <h2 class="text-3xl leading-tight font-bold uppercase sm:text-4xl">Want to see work in your industry?</h2>
                        <p class="{{ $muted }}">Ask on the call. We’ll pull the closest match and walk you through how it was built.</p>
                    </div>
                    <div class="flex w-full shrink-0 flex-col items-stretch gap-4 sm:flex-row sm:items-center lg:w-auto">
                        <a href="#contact" class="border-2 border-eccentric-blue bg-eccentric-blue px-6 py-4 text-center text-xs tracking-[0.08em] text-white uppercase transition-colors hover:bg-white hover:text-eccentric-blue">Book a Call</a>
                        <a href="{{ route('services') }}" class="border-2 border-black bg-white px-6 py-4 text-center text-xs tracking-[0.08em] uppercase transition-colors hover:bg-black hover:text-white">Explore Services</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============ CONTACT ============ --}}
        <section id="contact" class="scroll-mt-6 bg-[#f5f5f7] py-20" aria-labelledby="work-contact-heading">
            <div class="mx-auto grid max-w-7xl grid-cols-1 items-start gap-12 px-4 sm:px-6 lg:grid-cols-12 lg:gap-16 lg:px-12">
                <div class="lg:col-span-5" data-reveal>
                    <span class="{{ $label }} mb-3 block text-eccentric-blue">Project intake // Contact</span>
                    <h2 id="work-contact-heading" class="mb-5 text-3xl leading-tight font-bold uppercase sm:text-4xl">Let’s discuss your needs.</h2>
                    <p class="mb-8 max-w-md leading-relaxed {{ $muted }}">Want to see work in your industry specifically? Ask on the call. We’ll pull the closest match.</p>

                    <ul class="space-y-3">
                        @foreach (['Reply within one business day, in any timezone', 'Industry-matched case studies shared on the call', 'Clear scope and timeline before any commitment'] as $promise)
                            <li class="flex items-center gap-3 border border-black/10 bg-white p-4 text-sm">
                                <span class="text-eccentric-blue">{!! $svg('M4 12l6 6L20 6') !!}</span>{{ $promise }}
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-8">
                        <x-book-call-button size="large" href="/contact" />
                    </div>
                </div>

                <div class="border-2 border-black bg-white p-6 sm:p-10 lg:col-span-7" data-reveal>
                    <h3 class="mb-1 text-2xl uppercase">Tell us about your project</h3>
                    <p class="mb-6 text-sm {{ $muted }}">We’ll take it from there.</p>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="return_to" value="work">

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="{{ $label }} {{ $muted }} block">Full name *
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Your name" required maxlength="255" autocomplete="name" class="{{ $field }}">
                            </label>
                            <label class="{{ $label }} {{ $muted }} block">Email address *
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="you@company.com" required maxlength="255" autocomplete="email" class="{{ $field }}">
                            </label>
                        </div>

                        <label class="{{ $label }} {{ $muted }} block">Industry
                            <select name="industry" class="{{ $field }}">
                                <option value="">Choose your industry</option>
                                @foreach (\App\Http\Requests\StoreContactMessageRequest::INDUSTRIES as $value => $industryLabel)
                                    <option value="{{ $value }}" @selected(old('industry') === $value)>{{ $industryLabel }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="{{ $label }} {{ $muted }} block">Project brief *
                            <textarea name="message" rows="4" placeholder="What friction do you want gone? Share the goal and the problem you’re solving." required maxlength="5000" class="{{ $field }} resize-y">{{ old('message') }}</textarea>
                        </label>

                        <div class="flex items-center gap-2 pt-1">
                            <input type="checkbox" id="work-terms" required class="size-4 shrink-0 accent-eccentric-blue">
                            <label for="work-terms" class="text-xs text-black/80">I understand and agree to the terms &amp; conditions.</label>
                        </div>

                        <x-recaptcha />

                        <button type="submit" class="flex w-full cursor-pointer items-center justify-center gap-2 bg-eccentric-blue py-4 text-xs tracking-[0.08em] text-white uppercase transition-colors hover:bg-black">
                            <span>Submit Now</span>{!! $svg($externalPath) !!}
                        </button>

                        @if (session('status') === 'contact-message-sent')
                            <p class="border-l-4 border-black bg-eccentric-blue px-3.5 py-3 text-sm text-white" role="status">Thank you. Your project details are in. We'll be in touch shortly.</p>
                        @elseif ($errors->any())
                            <ul class="border-l-4 border-[#d33] bg-[#fdf2f2] px-3.5 py-3 text-sm text-[#a11]" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
