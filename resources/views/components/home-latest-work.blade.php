@php
    $projects = [
        ['image' => 'forcoach.jpg', 'name' => 'ForCoach', 'category' => 'SaaS', 'url' => 'https://forcoach.io'],
        ['image' => 'jollywitme.jpg', 'name' => 'JollyWitMe', 'category' => 'Events SaaS', 'url' => 'https://jollywitme.com'],
        ['image' => 'droppr-ai.jpg', 'name' => 'DropPR.ai', 'category' => 'AI SaaS', 'url' => 'https://droppr.ai'],
    ];
@endphp

<section class="px-4 pb-16 font-electrolize sm:px-8 xl:px-[70px] xl:pb-[min(147px,7.656vw)]" aria-labelledby="latest-work-heading">
    <h2 id="latest-work-heading" class="text-[32px] leading-[normal] text-black sm:text-[40px] xl:text-[48px]">Latest Work</h2>

    <div data-reveal-stagger class="mt-6 grid grid-cols-1 gap-5 sm:mt-10 sm:grid-cols-2 sm:gap-8 xl:mt-[69px] xl:grid-cols-3 xl:gap-x-[50px]">
        @foreach ($projects as $project)
            <div data-reveal>
                <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="image-hover image-hover-lift group relative block aspect-[560/535] border border-black/15 bg-white">
                    <img src="{{ asset('images/projects/'.$project['image']) }}?v={{ filemtime(public_path('images/projects/'.$project['image'])) }}" alt="{{ $project['name'] }} website" class="size-full object-cover object-top" loading="lazy" width="560" height="535">
                    <span class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-4 border-t border-black bg-black px-5 py-4 text-white">
                        <span>
                            <span class="block text-[11px] tracking-[0.15em] uppercase opacity-80">Case Study <span class="mx-1 text-eccentric-blue">/</span> {{ $project['category'] }}</span>
                            <span class="mt-1 block text-2xl leading-tight">{{ $project['name'] }}</span>
                        </span>
                        <span class="grid size-10 shrink-0 place-items-center bg-eccentric-blue transition-colors group-hover:bg-white group-hover:text-black" aria-hidden="true">
                            <svg class="size-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square"><path d="M6 18 18 6M8 6h10v10"/></svg>
                        </span>
                    </span>
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
