@php
    $projects = [
        ['image' => 'healthsync-patient-management.png', 'alt' => 'HealthSync — Patient Management Platform', 'url' => '#'],
        ['image' => 'ai-healthcare-platform.png', 'alt' => 'AI-Powered Healthcare Platform', 'url' => '#'],
        ['image' => 'healthsync-patient-management.png', 'alt' => 'HealthSync — Patient Management Platform', 'url' => '#'],
    ];
@endphp

<section class="px-4 pb-16 font-electrolize sm:px-8 xl:px-[70px] xl:pb-[min(147px,7.656vw)]" aria-labelledby="latest-work-heading">
    <h2 id="latest-work-heading" class="text-[32px] leading-[normal] text-black sm:text-[40px] xl:text-[48px]">Latest Work</h2>

    <div data-reveal-stagger class="mt-6 grid grid-cols-1 gap-5 sm:mt-10 sm:grid-cols-2 sm:gap-8 xl:mt-[69px] xl:grid-cols-3 xl:gap-x-[50px]">
        @foreach ($projects as $project)
            <div data-reveal>
                <a href="{{ $project['url'] }}" class="image-hover image-hover-lift block aspect-[560/535]">
                    <img src="{{ asset('images/projects/'.$project['image']) }}" alt="{{ $project['alt'] }}" class="size-full object-cover" loading="lazy" width="560" height="535">
                </a>
            </div>
        @endforeach
    </div>

    <div class="mt-8 flex flex-col items-start gap-6 xl:mt-[min(23px,1.198vw)] xl:flex-row xl:items-center xl:justify-between">
        <p class="text-xl leading-[normal] text-black sm:text-[28px] xl:text-[length:min(36px,1.875vw)]">
            Have a system that's broken, or a build that needs to happen?<br class="hidden xl:block">
            Book a call, send a message, or chat with us — we're set up for all three.
        </p>

        <x-book-call-button size="large" class="shrink-0" />
    </div>
</section>
