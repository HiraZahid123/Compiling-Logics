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

    $placeholderDescription = [
        'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and",
        'highlights' => ['typesetting', 'designers at Letraset and'],
    ];

    $projects = [
        ['name' => 'Best Local Law', 'image' => 'best-local-law.jpg', 'types' => ['web-app'], 'industries' => []],
        ['name' => 'JollyWitMe', 'image' => 'jollywitme.jpg', 'types' => ['web-app'], 'industries' => []],
        ['name' => 'Expat Car Buyers', 'image' => 'expat-car-buyers.jpg', 'types' => ['web-app'], 'industries' => ['retail-ecommerce']],
        ['name' => 'Certus 3D', 'image' => 'certus-3d.jpg', 'types' => ['web-app'], 'industries' => []],
        ['name' => 'PDF Tools', 'image' => 'pdf-tools.jpg', 'types' => ['web-app'], 'industries' => []],
        ['name' => 'Fluencyi', 'image' => 'fluencyi.jpg', 'types' => ['web-app'], 'industries' => ['education']],
        ['name' => 'Otelogia', 'image' => 'otelogia.jpg', 'types' => ['web-app'], 'industries' => ['hospitality', 'real-estate']],
        ['name' => 'Busy SPR', 'image' => 'busy-spr.jpg', 'types' => ['web-app'], 'industries' => ['education']],
        ['name' => 'Go Get Notary', 'image' => 'go-get-notary.jpg', 'types' => ['web-app'], 'industries' => []],
        ['name' => 'Kids Health Club', 'image' => 'kids-health-club.jpg', 'types' => ['web-app'], 'industries' => ['healthcare']],
        ['name' => 'Tutor Hub', 'image' => 'tutor-hub.jpg', 'types' => ['web-app'], 'industries' => ['education']],
    ];

    $filterGroups = [
        ['key' => 'type', 'label' => 'DELIVERABLE TYPE', 'options' => $deliverableTypes, 'gap' => 'xl:gap-[clamp(6px,0.521vw,10px)]'],
        ['key' => 'industry', 'label' => 'INDUSTRY', 'options' => $industries, 'gap' => 'xl:gap-[clamp(8px,0.677vw,13px)]'],
    ];

    $highlight = fn (array $description): string => str_replace(
        array_map('e', $description['highlights']),
        array_map(fn (string $phrase): string => '<span class="text-eccentric-blue">'.e($phrase).'</span>', $description['highlights']),
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
                    <div class="image-hover image-hover-subtle">
                        <img src="{{ asset('images/work/'.$project['image']) }}" alt="{{ $project['name'] }}" class="block aspect-[1720/540] w-full object-cover" width="1720" height="540" @if (! $loop->first) loading="lazy" @endif>
                    </div>
                    <p class="mt-4 text-sm leading-[normal] text-black sm:text-base xl:mt-[min(39px,2.031vw)] xl:truncate xl:text-[length:min(20px,1.042vw)]">{!! $highlight($placeholderDescription) !!}</p>
                </article>
            @endforeach

            <p class="hidden text-center text-lg text-grey xl:text-[length:min(24px,1.25vw)]" data-projects-empty>No projects match these filters yet.</p>
        </div>

        <p class="mx-auto mt-14 max-w-[1015px] pb-16 text-center text-[22px] leading-[normal] text-black sm:text-[28px] xl:mt-[min(186px,9.688vw)] xl:max-w-[min(1015px,52.865vw)] xl:pb-[min(354px,18.438vw)] xl:text-[length:min(36px,1.875vw)]">
            Want to see work in your industry specifically? Ask on the call; we'll pull the closest match.
        </p>
    </section>
@endsection
