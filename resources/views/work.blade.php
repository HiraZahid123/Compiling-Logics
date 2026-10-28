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

    $projects = [
        [
            'name' => 'Best Local Law',
            'image' => 'best-local-law.jpg',
            'pdf' => 'best-local-law.pdf',
            'types' => ['web-app'],
            'industries' => [],
            'description' => ['text' => 'A nationwide legal directory that matches clients with top-rated local attorneys through an intelligent search and attorney-client portal.', 'highlight' => 'intelligent search'],
        ],
        [
            'name' => 'JollyWitMe',
            'image' => 'jollywitme.jpg',
            'pdf' => 'jollywitme.pdf',
            'types' => ['web-app'],
            'industries' => [],
            'description' => ['text' => 'A cloud-based event ticketing and registration SaaS platform built for organisers who need fast setup and real-time attendee management.', 'highlight' => 'real-time attendee management'],
        ],
        [
            'name' => 'Expat Car Buyers',
            'image' => 'expat-car-buyers.jpg',
            'pdf' => 'expat-car-buyers.pdf',
            'types' => ['web-app'],
            'industries' => ['retail-ecommerce'],
            'description' => ['text' => 'A high-speed UAE car valuation and buying platform purpose-built for expats, delivering step-by-step offers with sub-50ms page transitions.', 'highlight' => 'sub-50ms page transitions'],
        ],
        [
            'name' => 'Certus 3D',
            'image' => 'certus-3d.jpg',
            'pdf' => 'certus-3d.pdf',
            'types' => ['web-app'],
            'industries' => [],
            'description' => ['text' => 'An industrial additive manufacturing showcase and equipment catalogue platform for a leading 3D printing solutions provider.', 'highlight' => 'additive manufacturing'],
        ],
        [
            'name' => 'PDF Tools',
            'image' => 'pdf-tools.jpg',
            'pdf' => 'pdf-tools.pdf',
            'types' => ['web-app'],
            'industries' => [],
            'description' => ['text' => 'A suite of browser-based PDF conversion, compression and editing tools that handle thousands of daily document operations without a backend upload.', 'highlight' => 'browser-based PDF'],
        ],
        [
            'name' => 'Fluencyi',
            'image' => 'fluencyi.jpg',
            'pdf' => 'fluencyi.pdf',
            'types' => ['web-app'],
            'industries' => ['education'],
            'description' => ['text' => 'A language-learning marketplace connecting students with verified native-speaker tutors, featuring live session scheduling and progress tracking.', 'highlight' => 'live session scheduling'],
        ],
        [
            'name' => 'Otelogia',
            'image' => 'otelogia.jpg',
            'pdf' => 'otelogia.pdf',
            'types' => ['web-app'],
            'industries' => ['hospitality', 'real-estate'],
            'description' => ['text' => 'A hospitality and short-term rental discovery platform blending hotel listings with curated real-estate investment opportunities in one searchable portal.', 'highlight' => 'curated real-estate'],
        ],
        [
            'name' => 'Busy SPR',
            'image' => 'busy-spr.jpg',
            'pdf' => 'busy-spr.pdf',
            'types' => ['web-app'],
            'industries' => ['education'],
            'description' => ['text' => 'A student productivity and scheduling platform that automates revision timetables and tracks academic milestones across multiple subjects.', 'highlight' => 'automates revision timetables'],
        ],
        [
            'name' => 'Go Get Notary',
            'image' => 'go-get-notary.jpg',
            'pdf' => 'go-get-notary.pdf',
            'types' => ['web-app'],
            'industries' => [],
            'description' => ['text' => 'An on-demand notary booking platform that connects clients with certified notaries for in-person or remote document verification within minutes.', 'highlight' => 'remote document verification'],
        ],
        [
            'name' => 'Kids Health Club',
            'image' => 'kids-health-club.jpg',
            'pdf' => 'kids-health-club.pdf',
            'types' => ['web-app'],
            'industries' => ['healthcare'],
            'description' => ['text' => 'An Australian paediatric healthcare directory with live Google Maps integration, helping parents find and book specialists, GPs and telehealth providers.', 'highlight' => 'live Google Maps integration'],
        ],
        [
            'name' => 'Tutor Hub',
            'image' => 'tutor-hub.jpg',
            'pdf' => 'tutor-hub.pdf',
            'types' => ['web-app'],
            'industries' => ['education'],
            'description' => ['text' => 'A tutor marketplace where students find, vet and book subject-specific tutors, with built-in session management and transparent review scores.', 'highlight' => 'transparent review scores'],
        ],
    ];

    $filterGroups = [
        ['key' => 'type', 'label' => 'DELIVERABLE TYPE', 'options' => $deliverableTypes, 'gap' => 'xl:gap-[clamp(6px,0.521vw,10px)]'],
        ['key' => 'industry', 'label' => 'INDUSTRY', 'options' => $industries, 'gap' => 'xl:gap-[clamp(8px,0.677vw,13px)]'],
    ];

    $highlight = fn (array $description): string => str_replace(
        e($description['highlight']),
        '<span class="text-eccentric-blue">'.e($description['highlight']).'</span>',
        e($description['text']),
    );
@endphp

@section('content')
    <section class="px-4 pt-10 font-electrolize sm:px-8 sm:pt-14 xl:px-[min(100px,5.208vw)] xl:pt-[min(53px,2.76vw)]" aria-labelledby="work-heading">
        <h1 id="work-heading" class="sr-only">Our Work</h1>

        <div class="flex flex-col gap-6 xl:ml-[min(17px,0.885vw)] xl:gap-[min(39px,2.031vw)]" data-project-filters>
            @foreach ($filterGroups as $group)
                <div role="group" aria-labelledby="filter-{{ $group['key'] }}-label">
                    <p id="filter-{{ $group['key'] }}-label" class="text-sm leading-4 text-grey xl:text-[length:clamp(12px,0.9375vw,18px)]">{{ $group['label'] }}</p>

                    <div class="mt-3 flex flex-wrap gap-2 xl:mt-[min(25px,1.302vw)] {{ $group['gap'] }}">
                        @foreach (['all' => 'All'] + $group['options'] as $value => $label)
                            <button type="button" class="h-7 rounded-full bg-[#f2f2f2] px-3 text-sm leading-none whitespace-nowrap text-grey aria-pressed:text-eccentric-blue xl:h-[clamp(12px,0.781vw,15px)] xl:px-[clamp(10px,0.833vw,16px)] xl:text-[length:clamp(12px,0.9375vw,18px)]" aria-pressed="{{ $value === 'all' ? 'true' : 'false' }}" data-filter-group="{{ $group['key'] }}" data-filter-value="{{ $value }}">{{ $label }}</button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 flex flex-col gap-12 sm:gap-16 xl:mt-[min(43px,2.24vw)] xl:gap-[min(129px,6.719vw)]">
            @foreach ($projects as $project)
                <article data-reveal data-project data-types="{{ implode(' ', $project['types']) }}" data-industries="{{ implode(' ', $project['industries']) }}">
                    <button
                        type="button"
                        class="group relative block w-full text-left cursor-pointer focus:outline-hidden focus-visible:ring-2 focus-visible:ring-eccentric-blue rounded-xs"
                        data-case-study-trigger
                        data-project-name="{{ $project['name'] }}"
                        data-pdf-url="{{ asset('case-studies/'.$project['pdf']) }}"
                        aria-label="Open case study for {{ $project['name'] }}"
                    >
                        <div class="image-hover image-hover-subtle relative overflow-hidden">
                            <img src="{{ asset('images/work/'.$project['image']) }}" alt="{{ $project['name'] }}" class="block aspect-[1720/540] w-full object-cover" width="1720" height="540" @if (! $loop->first) loading="lazy" @endif>

                            <div class="absolute bottom-3 right-3 sm:bottom-5 sm:right-5 flex items-center gap-2 bg-black/85 hover:bg-black text-white px-3.5 py-2 rounded-full text-xs sm:text-sm font-semibold tracking-wide backdrop-blur-xs shadow-lg opacity-90 sm:opacity-0 group-hover:opacity-100 group-focus-visible:opacity-100 transition-all duration-300 transform sm:translate-y-2 group-hover:translate-y-0 group-focus-visible:translate-y-0">
                                <svg class="size-4 text-eccentric-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>Read Case Study (PDF)</span>
                            </div>
                        </div>
                    </button>

                    <div class="mt-4 flex flex-col sm:flex-row sm:items-baseline sm:justify-between gap-2 xl:mt-[min(39px,2.031vw)]">
                        <p class="text-sm leading-[normal] text-black sm:text-base xl:truncate xl:text-[length:min(20px,1.042vw)]">{!! $highlight($project['description']) !!}</p>
                        <button
                            type="button"
                            class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-eccentric-blue hover:underline whitespace-nowrap cursor-pointer shrink-0 self-start sm:self-auto"
                            data-case-study-trigger
                            data-project-name="{{ $project['name'] }}"
                            data-pdf-url="{{ asset('case-studies/'.$project['pdf']) }}"
                        >
                            <span>Case study (PDF)</span>
                            <span aria-hidden="true">&rarr;</span>
                        </button>
                    </div>
                </article>
            @endforeach

            <p class="hidden text-center text-lg text-grey xl:text-[length:min(24px,1.25vw)]" data-projects-empty>No projects match these filters yet.</p>
        </div>

        <x-case-study-modal />

        <p class="mx-auto mt-14 max-w-[1015px] pb-16 text-center text-[22px] leading-[normal] text-black sm:text-[28px] xl:mt-[min(186px,9.688vw)] xl:max-w-[min(1015px,52.865vw)] xl:pb-[min(354px,18.438vw)] xl:text-[length:min(36px,1.875vw)]">
            Want to see work in your industry specifically? Ask on the call; we'll pull the closest match.
        </p>
    </section>
@endsection
