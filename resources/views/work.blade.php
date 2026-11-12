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
            'tags' => ['SaaS', 'Scheduling', 'Invoicing'],
            'types' => ['web-app'],
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
    {{-- ============ HERO SECTION ============ --}}
    <section class="relative pt-12 sm:pt-20 lg:pt-24 pb-0 overflow-hidden font-electrolize bg-white">
        {{-- Subtle modular 48px grid texture --}}
        <div class="hero-grid-bg absolute inset-0 pointer-events-none" aria-hidden="true"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
                {{-- Left Column: Headline, Accent Line, Copy, Buttons --}}
                <div class="lg:col-span-6 xl:col-span-6">
                    <p class="text-[11px] leading-tight tracking-[0.15em] uppercase text-black/80 mb-4">
                        Work <span class="text-eccentric-blue mx-1">/</span> Portfolio <span class="text-eccentric-blue mx-1">/</span> 2026
                    </p>

                    <span class="block w-18 h-1 bg-eccentric-blue mb-6"></span>

                    <h1 class="text-4xl sm:text-5xl lg:text-[56px] font-normal leading-[1.1] tracking-tight text-black mb-6">
                        Selected work,<br><span class="text-eccentric-blue">compiled.</span>
                    </h1>

                    <p class="text-base sm:text-lg text-black/75 max-w-lg leading-relaxed mb-8">
                        {{ count($projects) }} builds across law, healthcare, hospitality, education and industry. Every deliverable engineered, not guessed.
                    </p>

                    <div class="flex flex-wrap items-center gap-4">
                        <a
                            href="#work-filters"
                            class="inline-flex items-center justify-center gap-2.5 px-6 py-3.5 bg-eccentric-blue text-white text-sm font-normal tracking-wide border-2 border-eccentric-blue hover:bg-black hover:border-black transition-all duration-200 cursor-pointer"
                        >
                            <span>Explore the Work</span>
                            <svg class="size-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true">
                                <path d="M6 18 18 6M8 6h10v10"/>
                            </svg>
                        </a>

                        <a
                            href="/contact"
                            class="inline-flex items-center justify-center px-6 py-3.5 bg-transparent text-black text-sm font-normal tracking-wide border-2 border-black hover:bg-black hover:text-white transition-all duration-200 cursor-pointer"
                        >
                            Talk to Us
                        </a>
                    </div>
                </div>

                {{-- Right Column: Dark Terminal Box (cl build --portfolio) --}}
                <div class="lg:col-span-6 xl:col-span-6">
                    <div class="bg-black text-white border border-black border-t-4 border-t-eccentric-blue shadow-xl relative font-electrolize" role="img" aria-label="Build log showing 11 projects compiled with zero errors">
                        {{-- Terminal Window Bar --}}
                        <div class="flex items-center gap-3 px-4 sm:px-5 py-3 border-b border-white/20">
                            <span class="inline-flex items-center justify-center size-6 bg-white text-black font-bold text-[11px] tracking-tight shrink-0">
                                CL
                            </span>
                            <span class="text-xs uppercase tracking-[0.15em] opacity-80 mr-auto font-mono">
                                BUILD.LOG
                            </span>
                            <div class="flex items-center gap-1.5 opacity-60">
                                <span class="size-2.5 border border-white/60"></span>
                                <span class="size-2.5 border border-white/60"></span>
                                <span class="size-2.5 border border-white/60"></span>
                            </div>
                        </div>

                        {{-- Terminal Content --}}
                        <div class="p-5 sm:p-6 text-sm leading-relaxed font-mono">
                            <p class="flex items-baseline flex-wrap gap-2.5 mb-2.5">
                                <span class="bg-white text-black px-2 py-0.5 text-xs font-bold font-mono">$</span>
                                <span>cl build --portfolio</span>
                            </p>

                            <p class="flex items-baseline flex-wrap gap-2.5 mb-2.5">
                                <span class="opacity-60">resolving projects</span>
                                <span class="flex-1 border-b border-dotted border-white/35 min-w-[20px] -translate-y-1"></span>
                                <span class="bg-white text-black px-2 py-0.5 text-xs tracking-wider font-semibold">{{ count($projects) }}</span>
                            </p>

                            <p class="flex items-baseline flex-wrap gap-2.5 mb-2.5">
                                <span class="opacity-60">linking industries</span>
                                <span class="flex-1 border-b border-dotted border-white/35 min-w-[20px] -translate-y-1"></span>
                                <span class="bg-white text-black px-2 py-0.5 text-xs tracking-wider font-semibold">8</span>
                            </p>

                            <p class="flex items-baseline flex-wrap gap-2.5 mb-2.5">
                                <span class="opacity-60">checking design system</span>
                                <span class="flex-1 border-b border-dotted border-white/35 min-w-[20px] -translate-y-1"></span>
                                <span class="bg-white text-black px-2 py-0.5 text-xs tracking-wider font-semibold">PASS</span>
                            </p>

                            <p class="flex items-baseline flex-wrap gap-2.5 mb-2.5">
                                <span class="opacity-60">verifying uptime support</span>
                                <span class="flex-1 border-b border-dotted border-white/35 min-w-[20px] -translate-y-1"></span>
                                <span class="bg-white text-black px-2 py-0.5 text-xs tracking-wider font-semibold">24/7</span>
                            </p>

                            <div class="mt-4 pt-4 border-t border-white/20">
                                <p class="flex items-center gap-2 mb-0">
                                    <span class="bg-white text-black px-2 py-0.5 text-xs font-bold font-mono">&gt;</span>
                                    <span>compiled with 0 errors</span>
                                    <span class="cursor-blink"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats Row: 4 Modular Cells with Blue Corner Accents --}}
            <div class="mt-14 sm:mt-18 border-t border-black border-l border-black/15 bg-white grid grid-cols-2 lg:grid-cols-4">
                <div class="stat-accent p-6 border-r border-b border-black/15">
                    <span class="block text-3xl sm:text-4xl leading-tight mb-1.5 text-black">{{ count($projects) }}</span>
                    <span class="text-[11px] leading-tight tracking-[0.15em] uppercase text-grey">Featured builds</span>
                </div>
                <div class="stat-accent p-6 border-r border-b border-black/15">
                    <span class="block text-3xl sm:text-4xl leading-tight mb-1.5 text-black">8</span>
                    <span class="text-[11px] leading-tight tracking-[0.15em] uppercase text-grey">Industries served</span>
                </div>
                <div class="stat-accent p-6 border-r border-b border-black/15">
                    <span class="block text-3xl sm:text-4xl leading-tight mb-1.5 text-black">24/7</span>
                    <span class="text-[11px] leading-tight tracking-[0.15em] uppercase text-grey">Support promise</span>
                </div>
                <div class="stat-accent p-6 border-r border-b border-black/15">
                    <span class="block text-3xl sm:text-4xl leading-tight mb-1.5 text-black">Global</span>
                    <span class="text-[11px] leading-tight tracking-[0.15em] uppercase text-grey">Every timezone</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ FILTER SECTION (RETAINED FROM IMAGE 1) ============ --}}
    <section id="work-filters" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 sm:pt-16 font-electrolize" aria-labelledby="filter-heading">
        <h2 id="filter-heading" class="sr-only">Filter Projects</h2>

        <div class="flex flex-col gap-6" data-project-filters>
            @foreach ($filterGroups as $group)
                <div role="group" aria-labelledby="filter-{{ $group['key'] }}-label">
                    <p id="filter-{{ $group['key'] }}-label" class="text-sm leading-4 text-grey xl:text-[length:clamp(12px,0.9375vw,18px)]">{{ $group['label'] }}</p>

                    <div class="mt-3 flex flex-wrap gap-2 xl:mt-[min(25px,1.302vw)] {{ $group['gap'] }}">
                        @foreach (['all' => 'All'] + $group['options'] as $value => $label)
                            <button
                                type="button"
                                class="h-7 rounded-full bg-[#f2f2f2] px-3 text-sm leading-none whitespace-nowrap text-grey aria-pressed:text-eccentric-blue hover:text-black xl:h-[clamp(12px,0.781vw,15px)] xl:px-[clamp(10px,0.833vw,16px)] xl:text-[length:clamp(12px,0.9375vw,18px)] cursor-pointer transition-colors"
                                aria-pressed="{{ $value === 'all' ? 'true' : 'false' }}"
                                data-filter-group="{{ $group['key'] }}"
                                data-filter-value="{{ $value }}"
                            >
                                {{ $label }}
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ============ WORK GRID (DESIGNED FROM STANDALONE HTML) ============ --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 font-electrolize">
        {{-- Section Heading --}}
        <div class="mb-10 flex flex-col sm:flex-row sm:items-end justify-between gap-6" data-reveal>
            <div>
                <span class="block w-18 h-1 bg-eccentric-blue mb-4"></span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl text-black font-normal">Case studies, built to run 24/7.</h2>
            </div>
            <p class="text-sm sm:text-base text-grey max-w-sm">Real projects, real screens. Open a case study for the full story.</p>
        </div>

        {{-- 3-Column Portfolio Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="projects-grid">
            @foreach ($projects as $project)
                <article
                    data-reveal
                    data-project
                    data-types="{{ implode(' ', $project['types']) }}" data-industries="{{ implode(' ', $project['industries']) }}"
                    class="group bg-white border border-black/15 hover:border-black flex flex-col relative transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_40px_rgba(0,0,0,0.10)]"
                >
                    {{-- Media container with 2.1:1 aspect ratio --}}
                    <div class="relative aspect-[2.1/1] overflow-hidden bg-neutral-100 border-b border-black">
                        <img
                            src="{{ $project['image_url'] }}"
                            alt="{{ $project['name'] }}"
                            class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105"
                            loading="lazy"
                            width="800"
                            height="380"
                        >

                        {{-- Blue progress line on card hover --}}
                        <span class="absolute left-0 bottom-0 h-1 w-0 bg-eccentric-blue transition-all duration-500 group-hover:w-full z-10"></span>

                        {{-- Project Index Tag Top-Left --}}
                        <span class="absolute left-0 top-0 bg-white text-black text-xs tracking-wider px-3 py-1.5 border-r border-b border-black z-10">
                            {{ $project['index'] }}
                        </span>

                        {{-- Modal Arrow Trigger Top-Right --}}
                        @if ($project['has_case_study'])
                            <button
                                type="button"
                                class="absolute right-0 top-0 size-9 grid place-items-center bg-white text-black border-l border-b border-black transition-colors duration-300 group-hover:bg-black group-hover:text-white z-10 cursor-pointer"
                                data-case-study-trigger
                                data-project-name="{{ $project['name'] }}"
                                data-pdf-url="{{ $project['pdf_url'] }}"
                                aria-label="Open case study for {{ $project['name'] }}"
                            >
                                <svg class="size-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square">
                                    <path d="M6 18 18 6M8 6h10v10"/>
                                </svg>
                            </button>
                        @endif
                    </div>

                    {{-- Card Body --}}
                    <div class="p-6 flex flex-col flex-1">
                        <p class="text-[11px] leading-tight tracking-[0.15em] uppercase text-black/70 mb-2.5">
                            Case Study <span class="text-eccentric-blue mx-1">/</span> {{ $project['category'] }}
                        </p>

                        <h3 class="text-lg leading-snug text-black mb-2.5 font-normal">
                            {{ $project['name'] }}
                        </h3>

                        <p class="text-sm leading-relaxed text-black/75 mb-5">
                            {!! $highlight($project['description']) !!}
                        </p>

                        {{-- Tag List --}}
                        <ul class="flex flex-wrap gap-1.5 mb-6 mt-auto">
                            @foreach ($project['tags'] as $tag)
                                <li class="text-xs tracking-wide border border-black/15 bg-white px-2.5 py-1 text-black">
                                    {{ $tag }}
                                </li>
                            @endforeach
                        </ul>

                        {{-- View Case Study Button --}}
                        @if ($project['has_case_study'])
                            <button
                                type="button"
                                class="w-full py-3 px-5 text-sm font-normal tracking-wide bg-white text-black border border-black hover:bg-eccentric-blue hover:text-white hover:border-eccentric-blue transition-colors duration-200 inline-flex items-center justify-center gap-2.5 cursor-pointer"
                                data-case-study-trigger
                                data-project-name="{{ $project['name'] }}"
                                data-pdf-url="{{ $project['pdf_url'] }}"
                                aria-label="Read Case Study (PDF) for {{ $project['name'] }}"
                            >
                                <span>View Case Study</span>
                                <span class="sr-only">Read Case Study (PDF)</span>
                                <svg class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square">
                                    <path d="M6 18 18 6M8 6h10v10"/>
                                </svg>
                            </button>
                        @else
                            <span class="w-full py-3 px-5 text-sm tracking-wide text-black/50 border border-dashed border-black/30 inline-flex items-center justify-center">
                                Case study coming soon
                            </span>
                        @endif
                    </div>
                </article>
            @endforeach

            {{-- 12th Tile: Next Build CTA Card --}}
            <article
                data-reveal
                data-project
                data-types="ai-agents web-app mobile-app cloud-devops qa design"
                data-industries="healthcare real-estate hospitality education fintech-banking retail-ecommerce"
                class="cta-grid-bg bg-white border border-black p-8 flex flex-col justify-start relative overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_40px_rgba(0,0,0,0.10)]"
            >
                <div class="relative z-10 flex flex-col h-full">
                    <p class="text-[11px] leading-tight tracking-[0.15em] uppercase text-black/70 mb-5">
                        Next build <span class="text-eccentric-blue mx-1">/</span> {{ count($projects) + 1 }}
                    </p>

                    <h3 class="text-3xl sm:text-4xl leading-tight text-black mb-4 font-normal">
                        Your product<br>goes here.
                    </h3>

                    <p class="text-sm leading-relaxed text-black/80 max-w-xs mb-8">
                        Tell us the friction you want gone. We will engineer the system that removes it.
                    </p>

                    <a
                        href="/contact"
                        class="mt-auto self-start inline-flex items-center justify-center gap-2.5 py-3 px-6 text-sm font-normal tracking-wide bg-eccentric-blue text-white border-2 border-eccentric-blue hover:bg-black hover:border-black transition-colors duration-200"
                    >
                        <span>Start a Project</span>
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square">
                            <path d="M6 18 18 6M8 6h10v10"/>
                        </svg>
                    </a>
                </div>
            </article>

            {{-- Empty Message --}}
            <p class="hidden col-span-full py-16 text-center text-lg text-grey" data-projects-empty>
                No projects match these filters yet.
            </p>
        </div>
    </section>

    {{-- Interactive Case Study PDF Viewer Modal --}}
    <x-case-study-modal />

    {{-- ============ PROCESS BAND (FROM STANDALONE HTML) ============ --}}
    <x-work-testimonials />

    <section class="bg-black text-white py-20 sm:py-24 font-electrolize">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="block w-18 h-1 bg-eccentric-blue mb-6"></span>
            <h2 class="text-3xl sm:text-4xl text-white font-normal mb-14" data-reveal>
                Every build ships the same way.
            </h2>

            {{-- 4-Step Process Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 border-t border-l border-white/20">
                {{-- Step 01 --}}
                <div class="p-8 border-r border-b border-white/20 relative transition-colors duration-300 hover:bg-white/10" data-reveal>
                    <span class="text-[11px] uppercase tracking-[0.15em] opacity-55 absolute right-5 top-5">01</span>
                    <div class="size-12 border-2 border-white grid place-items-center mb-7">
                        <svg class="size-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2v7M12 15v7M2 12h7M15 12h7"/>
                            <rect x="9" y="9" width="6" height="6"/>
                        </svg>
                    </div>
                    <h3 class="text-lg text-white font-normal mb-2.5">Discover</h3>
                    <p class="text-sm text-white/85 leading-relaxed m-0">
                        We map the friction: the manual steps, the outdated systems, the hours lost.
                    </p>
                </div>

                {{-- Step 02 --}}
                <div class="p-8 border-r border-b border-white/20 relative transition-colors duration-300 hover:bg-white/10" data-reveal>
                    <span class="text-[11px] uppercase tracking-[0.15em] opacity-55 absolute right-5 top-5">02</span>
                    <div class="size-12 border-2 border-white grid place-items-center mb-7">
                        <svg class="size-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18"/>
                            <path d="M3 9h18M9 9v12"/>
                        </svg>
                    </div>
                    <h3 class="text-lg text-white font-normal mb-2.5">Design</h3>
                    <p class="text-sm text-white/85 leading-relaxed m-0">
                        Clear, modular interfaces that feel premium without enterprise friction.
                    </p>
                </div>

                {{-- Step 03 --}}
                <div class="p-8 border-r border-b border-white/20 relative transition-colors duration-300 hover:bg-white/10" data-reveal>
                    <span class="text-[11px] uppercase tracking-[0.15em] opacity-55 absolute right-5 top-5">03</span>
                    <div class="size-12 border-2 border-white grid place-items-center mb-7">
                        <svg class="size-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M8 7 3 12l5 5M16 7l5 5-5 5"/>
                        </svg>
                    </div>
                    <h3 class="text-lg text-white font-normal mb-2.5">Build</h3>
                    <p class="text-sm text-white/85 leading-relaxed m-0">
                        Clean, tested code and automation, from AI agents to full platforms.
                    </p>
                </div>

                {{-- Step 04 --}}
                <div class="p-8 border-r border-b border-white/20 relative transition-colors duration-300 hover:bg-white/10" data-reveal>
                    <span class="text-[11px] uppercase tracking-[0.15em] opacity-55 absolute right-5 top-5">04</span>
                    <div class="size-12 border-2 border-white grid place-items-center mb-7">
                        <svg class="size-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18"/>
                            <path d="M12 7v5l4 3"/>
                        </svg>
                    </div>
                    <h3 class="text-lg text-white font-normal mb-2.5">Support</h3>
                    <p class="text-sm text-white/85 leading-relaxed m-0">
                        24/7 is a promise, not a marketing line. We stay after launch.
                    </p>
                </div>
            </div>

            {{-- Industry Marquee Ticker --}}
            <div class="overflow-hidden border-t border-white/20 mt-18 pt-7 whitespace-nowrap" aria-hidden="true">
                <div class="marquee-track">
                    <span class="text-4xl text-white font-normal">Healthcare</span>
                    <span class="text-4xl marquee-stroke font-normal">Hospitality</span>
                    <span class="text-4xl text-white font-normal">Real Estate</span>
                    <span class="text-4xl marquee-stroke font-normal">Legal</span>
                    <span class="text-4xl text-white font-normal">Education</span>
                    <span class="text-4xl marquee-stroke font-normal">Marketplaces</span>
                    <span class="text-4xl text-white font-normal">SaaS</span>
                    <span class="text-4xl marquee-stroke font-normal">Industrial</span>

                    {{-- Repeat for seamless loop --}}
                    <span class="text-4xl text-white font-normal">Healthcare</span>
                    <span class="text-4xl marquee-stroke font-normal">Hospitality</span>
                    <span class="text-4xl text-white font-normal">Real Estate</span>
                    <span class="text-4xl marquee-stroke font-normal">Legal</span>
                    <span class="text-4xl text-white font-normal">Education</span>
                    <span class="text-4xl marquee-stroke font-normal">Marketplaces</span>
                    <span class="text-4xl text-white font-normal">SaaS</span>
                    <span class="text-4xl marquee-stroke font-normal">Industrial</span>
                </div>
            </div>
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
