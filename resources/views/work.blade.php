@extends('layouts.site')

@section('title', 'Work — Compiling Logics')

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
        'retail-ecommerce' => 'RETAIL & ECOMERCE',
    ];

    $filterGroups = [
        ['key' => 'type', 'label' => 'DELIVERABLE TYPE', 'options' => $deliverableTypes, 'gap' => 'xl:gap-[clamp(6px,0.521vw,10px)]'],
        ['key' => 'industry', 'label' => 'INDUSTRY', 'options' => $industries, 'gap' => 'xl:gap-[clamp(8px,0.677vw,13px)]'],
    ];

    $projects = [
        [
            'name' => 'Best Local Law',
            'category' => 'Legal',
            'index' => '01',
            'image' => 'best-local-law.jpg',
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
            'image' => 'jollywitme.jpg',
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
            'image' => 'expat-car-buyers.jpg',
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
            'image' => 'certus-3d.jpg',
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
            'image' => 'pdf-tools.jpg',
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
            'image' => 'fluencyi.jpg',
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
            'image' => 'otelogia.jpg',
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
            'image' => 'busy-spr.jpg',
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
            'image' => 'go-get-notary.jpg',
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
            'image' => 'kids-health-club.jpg',
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
            'image' => 'tutor-hub.jpg',
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
            'image' => 'droppr-ai.jpg',
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
            'image' => 'forcoach.jpg',
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
            'image' => 'novartis-tech-cafe.jpg',
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
        $showroom = array_map(fn (array $project): array => [
            'name' => $project['name'],
            'category' => $project['category'],
            'description' => $highlight($project['description']),
            'tags' => $project['tags'],
            'image' => $project['image_url'],
            'pdf' => $project['has_case_study'] ? $project['pdf_url'] : null,
            'url' => $project['url'] ?? null,
            'domain' => isset($project['url']) ? preg_replace('/^www\./', '', parse_url($project['url'], PHP_URL_HOST)) : \Illuminate\Support\Str::slug($project['name']).'.com',
        ], $projects);
        $first = $showroom[0];
        $arrowIcon = '<svg class="size-[18px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M6 18 18 6M8 6h10v10"/></svg>';
    @endphp

    {{-- ============ HERO ============ --}}
    <section class="relative overflow-hidden bg-white py-16 font-electrolize text-black md:pt-[72px] md:pb-14">
        <div class="services-hero absolute inset-0" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="mb-6 text-[11px] leading-[1.3] tracking-[0.15em] uppercase">Work <span class="mx-1 text-eccentric-blue">/</span> Showroom</p>
            <span class="mb-6 block h-1 w-[72px] bg-eccentric-blue"></span>
            <h1 class="mb-5 max-w-[760px] text-4xl leading-[1.1] sm:text-5xl">Pick a project.<br><span class="text-eccentric-blue">See how it was built.</span></h1>
            <p class="max-w-[520px] leading-[1.6]">{{ count($projects) }} live builds in one viewer. Choose from the list, or let the showroom play through them.</p>
        </div>
    </section>

    {{-- ============ SHOWROOM ============ --}}
    <section class="bg-white pb-16 font-electrolize text-black md:pb-24" aria-label="Project showroom">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid border border-black bg-white lg:grid-cols-[340px_1fr]" data-showroom data-reveal>
                <ul class="flex overflow-x-auto border-b border-black lg:block lg:overflow-visible lg:border-r lg:border-b-0" role="tablist" aria-label="Projects">
                    @foreach ($showroom as $index => $item)
                        <li class="shrink-0 lg:shrink">
                            <button type="button" role="tab" aria-selected="{{ $loop->first ? 'true' : 'false' }}" id="showroom-tab-{{ $index }}" aria-controls="showroom-stage"
                                class="group relative grid w-full min-w-[190px] cursor-pointer grid-cols-[40px_1fr] gap-x-1.5 border-r border-black/14 bg-white px-5 py-[11px] text-left transition-colors hover:bg-[#f6f6f6] aria-selected:bg-black aria-selected:text-white lg:min-w-0 lg:border-r-0 lg:border-b"
                                data-showroom-tab
                                data-name="{{ $item['name'] }}" data-category="{{ $item['category'] }}" data-description="{{ $item['description'] }}"
                                data-tags="{{ implode('|', $item['tags']) }}" data-image="{{ $item['image'] }}" data-domain="{{ $item['domain'] }}"
                                data-pdf="{{ $item['pdf'] }}" data-url="{{ $item['url'] }}">
                                <span class="absolute inset-y-0 left-0 w-1.5 bg-eccentric-blue opacity-0 group-aria-selected:opacity-100" aria-hidden="true"></span>
                                <span class="self-center text-xs tracking-[0.12em] opacity-50 group-aria-selected:opacity-80">{{ sprintf('%02d', $index + 1) }}</span>
                                <span class="text-lg leading-[1.2]">{{ $item['name'] }}</span>
                                <span class="col-start-2 text-[11px] tracking-[0.15em] uppercase opacity-60 group-aria-selected:opacity-80">{{ $item['category'] }}</span>
                                <span class="absolute bottom-0 left-0 h-[3px] w-0 bg-eccentric-blue" data-showroom-bar aria-hidden="true"></span>
                            </button>
                        </li>
                    @endforeach
                </ul>

                <div id="showroom-stage" role="tabpanel" class="showroom-stage relative flex flex-col justify-between gap-8 p-5 sm:p-10" data-showroom-stage>
                    <div class="border-2 border-black bg-white shadow-[6px_6px_0_#000] sm:shadow-[12px_12px_0_#000]">
                        <div class="flex h-8 items-center gap-2 border-b-2 border-black px-3">
                            <u class="block size-2.5 border-2 border-black"></u><u class="block size-2.5 border-2 border-black"></u><u class="block size-2.5 border-2 border-black"></u>
                            <span class="ml-auto text-[11px] tracking-[0.12em] uppercase" data-showroom-domain>{{ $first['domain'] }}</span>
                        </div>
                        <img src="{{ $first['image'] }}" alt="{{ $first['name'] }} website preview" class="block aspect-[2.1/1] w-full object-cover object-top transition-opacity duration-300" data-showroom-image width="1200" height="571">
                    </div>

                    <div class="grid items-end gap-6 lg:grid-cols-[1fr_auto]">
                        <div>
                            <p class="text-[11px] leading-[1.3] tracking-[0.15em] uppercase">Case Study <span class="mx-1 text-eccentric-blue">/</span> <span data-showroom-category>{{ $first['category'] }}</span></p>
                            <h2 class="mt-1.5 mb-2.5 text-[28px] leading-[1.2] sm:text-4xl" data-showroom-name>{{ $first['name'] }}</h2>
                            <p class="mb-3.5 max-w-[520px] text-[15px] leading-[1.6]" data-showroom-description>{!! $first['description'] !!}</p>
                            <ul class="flex flex-wrap gap-1.5" data-showroom-tags>
                                @foreach ($first['tags'] as $tag)
                                    <li class="border border-black/14 bg-white px-2.5 py-1 text-xs tracking-[0.05em]">{{ $tag }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <div class="flex flex-wrap gap-2">
                                <button type="button" class="inline-flex cursor-pointer items-center gap-2.5 border-2 border-eccentric-blue bg-eccentric-blue px-[22px] py-3 tracking-[0.02em] text-white transition-colors hover:border-black hover:bg-black disabled:cursor-default disabled:border-black/20 disabled:bg-black/20" data-showroom-case-study data-case-study-trigger data-project-name="{{ $first['name'] }}" data-pdf-url="{{ $first['pdf'] }}" @disabled(! $first['pdf'])>
                                    <span data-showroom-case-study-label>{{ $first['pdf'] ? 'View Case Study' : 'Case study coming soon' }}</span> {!! $arrowIcon !!}
                                </button>
                                <a href="{{ $first['url'] ?? '#' }}" target="_blank" rel="noopener" @class(['inline-flex items-center gap-2.5 border-2 border-black bg-white px-[22px] py-3 tracking-[0.02em] transition-colors hover:bg-black hover:text-white', 'hidden' => ! $first['url']]) data-showroom-visit>Visit Web {!! $arrowIcon !!}</a>
                            </div>
                            <div class="mt-4 flex gap-2">
                                @foreach (['prev' => ['Previous project', 'M15 5 8 12l7 7'], 'next' => ['Next project', 'M9 5l7 7-7 7']] as $direction => [$label, $path])
                                    <button type="button" class="grid size-11 cursor-pointer place-items-center border-2 border-black bg-white hover:bg-black hover:text-white" aria-label="{{ $label }}" data-showroom-{{ $direction }}>
                                        <svg class="size-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="{{ $path }}"/></svg>
                                    </button>
                                @endforeach
                                <button type="button" class="grid size-11 cursor-pointer place-items-center border-2 border-black bg-white hover:bg-black hover:text-white" aria-label="Pause autoplay" data-showroom-toggle>
                                    <svg class="size-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true" data-showroom-pause-icon><path d="M8 5v14M16 5v14"/></svg>
                                    <svg class="hidden size-[18px]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-showroom-play-icon><path d="M7 4l12 8-12 8z"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ NAME TICKER ============ --}}
    <div class="overflow-hidden border-y border-black bg-white py-[18px] font-electrolize whitespace-nowrap" aria-hidden="true">
        <div class="marquee-track text-2xl tracking-[0.04em]">
            @foreach ([1, 2] as $copy)
                @foreach ($projects as $project)
                    <span>{{ $project['name'] }}</span><span class="text-eccentric-blue">/</span>
                @endforeach
            @endforeach
        </div>
    </div>

    <x-case-study-modal />

    <x-work-testimonials />

    {{-- ============ CLOSING BAND ============ --}}
    <section class="bg-black py-16 font-electrolize text-white md:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-8 px-4 sm:px-6 lg:grid-cols-12 lg:px-8">
            <div class="lg:col-span-7" data-reveal>
                <span class="mb-6 block h-1 w-[72px] bg-eccentric-blue"></span>
                <h2 class="mb-4 max-w-[620px] text-[28px] leading-[1.2] sm:text-4xl">Want to see work in your industry?</h2>
                <p class="mb-8 max-w-[460px] leading-[1.6] opacity-85">Ask on the call. We’ll pull the closest match and walk you through how it was built.</p>
                <a href="#contact" class="inline-flex items-center gap-2.5 border-2 border-white bg-white px-[22px] py-3 tracking-[0.02em] text-black transition-colors hover:border-eccentric-blue hover:bg-eccentric-blue hover:text-white">Book a Call {!! $arrowIcon !!}</a>
            </div>
            <div class="showroom-big-count text-[clamp(100px,14vw,200px)] leading-[0.8] tracking-[-0.04em] lg:col-span-5 lg:text-right" aria-hidden="true">{{ count($projects) }}</div>
        </div>
    </section>
    {{-- ============ CONTACT SECTION (FROM STANDALONE HTML) ============ --}}
    <section class="py-20 sm:py-24 bg-white font-electrolize" id="contact">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                {{-- Left Column: Headline and Checkmarks --}}
                <div class="lg:col-span-5" data-reveal>
                    <span class="block w-18 h-1 bg-eccentric-blue mb-6"></span>
                    <h2 class="text-3xl sm:text-4xl text-black font-normal mb-5">
                        Let’s discuss your needs.
                    </h2>
                    <p class="text-base text-black/75 leading-relaxed max-w-md mb-8">
                        Want to see work in your industry specifically? Ask on the call. We’ll pull the closest match.
                    </p>

                    <ul class="space-y-0">
                        <li class="flex items-start gap-3.5 py-3.5 border-t border-black/15 text-sm text-black/85">
                            <svg class="size-4.5 text-eccentric-blue shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 12l6 6L20 6"/>
                            </svg>
                            <span>Reply within one business day, in any timezone</span>
                        </li>
                        <li class="flex items-start gap-3.5 py-3.5 border-t border-black/15 text-sm text-black/85">
                            <svg class="size-4.5 text-eccentric-blue shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 12l6 6L20 6"/>
                            </svg>
                            <span>Industry-matched case studies shared on the call</span>
                        </li>
                        <li class="flex items-start gap-3.5 py-3.5 border-t border-b border-black/15 text-sm text-black/85">
                            <svg class="size-4.5 text-eccentric-blue shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 12l6 6L20 6"/>
                            </svg>
                            <span>Clear scope and timeline before any commitment</span>
                        </li>
                    </ul>

                    <div class="mt-8">
                        <x-book-call-button size="large" href="/contact" />
                    </div>
                </div>

                {{-- Right Column: Form Card --}}
                <div class="lg:col-span-7" data-reveal>
                    <div class="border border-black border-t-4 border-t-eccentric-blue p-8 sm:p-10 bg-white">
                        <h3 class="text-2xl text-black font-normal mb-1">Tell us about your project</h3>
                        <p class="text-sm text-black/70 mb-6">We’ll take it from there.</p>

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="return_to" value="work">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-black/70 mb-1.5" for="fName">Full name *</label>
                                    <input
                                        type="text"
                                        id="fName"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="Your name"
                                        required
                                        maxlength="255"
                                        autocomplete="name"
                                        class="w-full px-3.5 py-2.5 text-sm bg-neutral-50 border border-black/30 rounded-none focus:outline-hidden focus:border-eccentric-blue focus:bg-white transition-colors"
                                    >
                                </div>
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-black/70 mb-1.5" for="fEmail">Email address *</label>
                                    <input
                                        type="email"
                                        id="fEmail"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="you@company.com"
                                        required
                                        maxlength="255"
                                        autocomplete="email"
                                        class="w-full px-3.5 py-2.5 text-sm bg-neutral-50 border border-black/30 rounded-none focus:outline-hidden focus:border-eccentric-blue focus:bg-white transition-colors"
                                    >
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs uppercase tracking-wider text-black/70 mb-1.5" for="fIndustry">Industry</label>
                                <select
                                    id="fIndustry"
                                    name="industry"
                                    class="w-full px-3.5 py-2.5 text-sm bg-neutral-50 border border-black/30 rounded-none focus:outline-hidden focus:border-eccentric-blue focus:bg-white transition-colors"
                                >
                                    <option value="">Choose your industry</option>
                                    @foreach (\App\Http\Requests\StoreContactMessageRequest::INDUSTRIES as $value => $label)
                                        <option value="{{ $value }}" @selected(old('industry') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs uppercase tracking-wider text-black/70 mb-1.5" for="fBrief">Project brief *</label>
                                <textarea
                                    id="fBrief"
                                    name="message"
                                    rows="4"
                                    placeholder="What friction do you want gone? Share the goal and the problem you’re solving."
                                    required
                                    maxlength="5000"
                                    class="w-full px-3.5 py-2.5 text-sm bg-neutral-50 border border-black/30 rounded-none focus:outline-hidden focus:border-eccentric-blue focus:bg-white transition-colors resize-y"
                                >{{ old('message') }}</textarea>
                            </div>

                            <div class="flex items-center gap-2 pt-1">
                                <input type="checkbox" id="fTerms" required class="size-4 rounded-none border-black text-eccentric-blue focus:ring-0">
                                <label for="fTerms" class="text-xs text-black/80">
                                    I understand and agree to the terms &amp; conditions.
                                </label>
                            </div>

                            <x-recaptcha />

                            <div class="pt-2">
                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center gap-2.5 px-6 py-3.5 bg-eccentric-blue text-white text-sm font-normal tracking-wide border-2 border-eccentric-blue hover:bg-black hover:border-black transition-colors duration-200 cursor-pointer"
                                >
                                    <span>Submit Now</span>
                                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square">
                                        <path d="M6 18 18 6M8 6h10v10"/>
                                    </svg>
                                </button>
                            </div>

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
            </div>
        </div>
    </section>
@endsection
