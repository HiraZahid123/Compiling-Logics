@extends('layouts.site')

@section('title', 'Services — Compiling Logics')

@php
    $pillars = [
        [
            'id' => 'ai-agents-automation',
            'title' => 'AI Agents & Automation',
            'description' => 'Chatbots, AI/ML integrations, and workflow automation that replace manual back-and-forth with something that runs on its own.',
            'video' => 'ai-agents-automation.mp4',
        ],
        [
            'id' => 'software-development',
            'title' => 'Software Development',
            'description' => 'Web, mobile, enterprise mobility, MVP, SaaS. The full range of what gets shipped, not just one slice of it.',
            'video' => 'software-development.mp4',
        ],
        [
            'id' => 'cloud-devops',
            'title' => 'Cloud & DevOps',
            'description' => 'Infrastructure and deployment work that keeps everything above this line actually running.',
            'video' => 'cloud-devops.mp4',
        ],
        [
            'id' => 'quality-assurance',
            'title' => 'Quality Assurance',
            'description' => 'Software testing that catches what manual review misses, before a client does.',
            'video' => 'quality-assurance.mp4',
        ],
        [
            'id' => 'design',
            'title' => 'Design',
            'description' => 'Product design, UX/UI, graphic design and brand identity; the part of the stem a visitor actually sees and judges first.',
            'video' => 'design.mp4',
        ],
        [
            'id' => 'it-consultation',
            'title' => 'IT Consultation',
            'description' => 'Advisory work before the build starts; so the six pillars above get used in the right order.',
            'video' => 'it-consultation.mp4',
        ],
    ];
@endphp

@section('content')
    <section class="px-4 pt-10 font-electrolize sm:px-8 sm:pt-14 xl:px-[min(100px,5.208vw)] xl:pt-[min(52px,2.708vw)]" aria-labelledby="services-heading">
        <h1 id="services-heading" class="text-[32px] leading-[normal] text-black sm:text-[40px] xl:text-[length:min(48px,2.5vw)]">Six pillars. Every build we take on.</h1>
        <p class="mt-3 text-base leading-[normal] text-grey sm:text-lg xl:mt-[min(15px,0.781vw)] xl:text-[length:min(24px,1.25vw)]">
            Consolidated from the full service list so the menu stays usable. Each pillar below is shown with the flagship industries it's most often built for.
        </p>

        <div class="mt-12 flex flex-col gap-14 sm:gap-20 xl:mt-[min(102px,5.313vw)] xl:gap-[min(87px,4.531vw)]">
            @foreach ($pillars as $pillar)
                <article id="{{ $pillar['id'] }}" class="scroll-mt-24" data-reveal aria-labelledby="{{ $pillar['id'] }}-title">
                    <p class="text-base leading-[normal] text-eccentric-blue xl:text-[length:min(24px,1.25vw)]">{{ sprintf('%02d / %02d', $loop->iteration, $loop->count) }}</p>
                    <h2 id="{{ $pillar['id'] }}-title" class="mt-2 text-[28px] leading-[normal] text-black sm:text-4xl xl:mt-[min(15px,0.781vw)] xl:text-[length:min(48px,2.5vw)]">{{ $pillar['title'] }}</h2>
                    <p class="mt-2 text-base leading-[normal] text-grey sm:text-lg xl:mt-[min(15px,0.781vw)] xl:text-[length:min(24px,1.25vw)]">{{ $pillar['description'] }}</p>

                    <div class="image-hover image-hover-subtle mt-6 aspect-video bg-black md:aspect-[1720/500] xl:mt-[min(52px,2.708vw)]">
                        <x-lazy-video :src="asset('videos/services/'.$pillar['video'])" />
                    </div>
                </article>
            @endforeach
        </div>

        <p class="mx-auto mt-14 max-w-[554px] text-center text-[22px] leading-[normal] text-black sm:text-[28px] xl:mt-[min(57px,2.969vw)] xl:max-w-[min(554px,28.854vw)] xl:text-[length:min(36px,1.875vw)]">
            Not sure which pillar fits? Start with a call. We'll scope it from there.
        </p>

        <div class="mt-10 flex justify-center pb-16 xl:mt-[min(52px,2.708vw)] xl:pb-[min(295px,15.365vw)]">
            <x-book-call-button size="large" href="/contact" />
        </div>
    </section>
@endsection
