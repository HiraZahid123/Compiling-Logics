@php
    /*
     * Replace these placeholders with real client testimonials. For a video, set 'video'
     * to a YouTube/Vimeo embed URL (https://www.youtube.com/embed/...) or an .mp4 path,
     * and optionally 'poster' to an image path. Remove 'placeholder' once real.
     */
    $testimonials = [
        ['type' => 'video', 'featured' => true, 'name' => 'Client Name', 'role' => 'Role, Company', 'initials' => 'CN', 'project' => 'Project name', 'video' => '', 'poster' => null, 'duration' => '02:14', 'placeholder' => true],
        ['type' => 'written', 'featured' => true, 'quote' => 'Replace this with your client’s own words. One or two sentences about the result they got, in their voice, work best.', 'name' => 'Client Name', 'role' => 'Role, Company', 'initials' => 'CN', 'project' => 'Project name', 'placeholder' => true],
        ['type' => 'written', 'featured' => false, 'quote' => 'Replace this with your client’s own words. One or two sentences about the result they got, in their voice, work best.', 'name' => 'Client Name', 'role' => 'Role, Company', 'initials' => 'CN', 'project' => 'Project name', 'placeholder' => true],
        ['type' => 'video', 'featured' => false, 'name' => 'Client Name', 'role' => 'Role, Company', 'initials' => 'CN', 'project' => 'Project name', 'video' => '', 'poster' => null, 'duration' => '01:32', 'placeholder' => true],
        ['type' => 'written', 'featured' => false, 'quote' => 'Replace this with your client’s own words. One or two sentences about the result they got, in their voice, work best.', 'name' => 'Client Name', 'role' => 'Role, Company', 'initials' => 'CN', 'project' => 'Project name', 'placeholder' => true],
    ];

    $arrowIcon = '<svg class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M6 18 18 6M8 6h10v10"/></svg>';
    $placeholderTag = 'pointer-events-none absolute top-3 z-30 border border-dashed border-black/45 bg-white px-2 py-0.5 text-[10px] tracking-[0.15em] uppercase';
@endphp

<section id="testimonials" class="border-t border-black/14 bg-white py-16 font-electrolize text-black sm:py-24" aria-labelledby="testimonials-heading" data-testimonials>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 flex flex-wrap items-end justify-between gap-8" data-reveal>
            <div>
                <span class="mb-6 block h-1 w-[72px] bg-eccentric-blue"></span>
                <h2 id="testimonials-heading" class="text-[28px] leading-[1.2] sm:text-4xl">What clients say.</h2>
            </div>
            <div class="flex flex-col gap-4 md:items-end">
                <p class="max-w-[360px] text-sm md:text-right">Hear it in their own words, on camera or in writing.</p>
                <div class="flex gap-2" role="group" aria-label="Filter testimonials">
                    @foreach (['all' => 'All', 'video' => 'Video', 'written' => 'Written'] as $value => $label)
                        <button type="button" class="cursor-pointer border border-black bg-white px-[18px] py-[7px] text-[13px] tracking-[0.04em] transition-colors hover:bg-[#f4f4f4] aria-pressed:bg-black aria-pressed:text-white" aria-pressed="{{ $value === 'all' ? 'true' : 'false' }}" data-testimonial-filter="{{ $value }}">{{ $label }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-12">
            @foreach ($testimonials as $testimonial)
                <div @class([
                    'testimonial-item',
                    'lg:col-span-7' => $testimonial['featured'] && $testimonial['type'] === 'video',
                    'lg:col-span-5' => $testimonial['featured'] && $testimonial['type'] === 'written',
                    'lg:col-span-4' => ! $testimonial['featured'],
                    'md:col-span-2' => $testimonial['featured'] || $loop->last,
                ]) data-testimonial-type="{{ $testimonial['type'] }}" data-reveal>
                    <figure class="relative m-0 flex h-full flex-col border border-black/14 bg-white transition duration-300 hover:-translate-y-1 hover:border-black hover:shadow-[0_20px_40px_rgba(0,0,0,0.10)]">
                        @if ($testimonial['type'] === 'video')
                            <button type="button" class="testimonial-poster group relative block aspect-video w-full cursor-pointer overflow-hidden border-b border-black" data-testimonial-video="{{ $testimonial['video'] }}" data-testimonial-title="{{ $testimonial['name'] }}, {{ $testimonial['role'] }}" aria-label="Play video testimonial from {{ $testimonial['name'] }}">
                                @if ($testimonial['poster'])
                                    <img src="{{ asset($testimonial['poster']) }}" alt="" class="absolute inset-0 size-full object-cover" loading="lazy">
                                @else
                                    <img src="{{ asset('images/cl-mark.png') }}" alt="" class="absolute top-1/2 right-[8%] w-[22%] -translate-y-1/2 opacity-[0.14]">
                                @endif
                                <span class="absolute top-0 right-0 border-b border-l border-black bg-white px-3 py-1.5 text-xs tracking-[0.1em]">{{ $testimonial['duration'] }}</span>
                                <span @class(['absolute bottom-6 left-6 grid place-items-center bg-eccentric-blue text-white transition duration-200 group-hover:scale-105 group-hover:bg-black', 'size-24' => $testimonial['featured'], 'size-[72px]' => ! $testimonial['featured']])>
                                    <svg @class(['ml-1', 'size-[38px]' => $testimonial['featured'], 'size-7' => ! $testimonial['featured']]) viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5v14l11-7z" fill="currentColor"/></svg>
                                </span>
                            </button>
                        @else
                            <div class="flex flex-1 flex-col p-6 sm:p-9">
                                <svg class="mb-6 h-[30px] w-11 shrink-0 fill-none stroke-black stroke-[1.6]" viewBox="0 0 48 32" aria-hidden="true"><path d="M2 2h18v14l-8 14H4l6-12H2zM28 2h18v14l-8 14h-8l6-12h-8z"/></svg>
                                <blockquote @class(['m-0 mb-8', 'text-2xl leading-[1.45]' => $testimonial['featured'], 'text-lg leading-[1.55]' => ! $testimonial['featured']])>{{ $testimonial['quote'] }}</blockquote>
                        @endif

                        <figcaption @class(['mt-auto flex items-center gap-3.5', 'border-t border-black/14 pt-5' => $testimonial['type'] === 'written', 'px-6 pt-5 pb-7' => $testimonial['type'] === 'video'])>
                            <span class="grid size-12 shrink-0 place-items-center border border-black text-[15px] tracking-[0.05em]" aria-hidden="true">{{ $testimonial['initials'] }}</span>
                            <span>
                                <span class="block text-base leading-[1.3]">{{ $testimonial['name'] }}</span>
                                <span class="text-xs tracking-[0.05em] opacity-70">{{ $testimonial['role'] }}</span>
                            </span>
                            <a href="#projects-grid" class="ml-auto hidden items-center gap-1.5 border-b border-eccentric-blue pb-0.5 text-xs tracking-[0.05em] hover:text-eccentric-blue sm:inline-flex">{{ $testimonial['project'] }} {!! $arrowIcon !!}</a>
                        </figcaption>

                        @if ($testimonial['type'] === 'written')
                            </div>
                        @endif

                        @if ($testimonial['placeholder'] ?? false)
                            <span @class([$placeholderTag, 'right-3' => $testimonial['type'] === 'written', 'left-3' => $testimonial['type'] === 'video'])>Placeholder</span>
                        @endif
                    </figure>
                </div>
            @endforeach
        </div>

        <div class="mt-14 flex flex-wrap items-center justify-between gap-6 border-t border-black pt-8" data-reveal>
            <p class="text-base">Want to hear it from a client directly? Ask on the call and we’ll connect you.</p>
            <a href="#contact" class="inline-flex items-center border-2 border-black bg-white px-[22px] py-3 tracking-[0.02em] transition-colors hover:bg-black hover:text-white">Book a Call</a>
        </div>
    </div>

    <div class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 p-4" role="dialog" aria-modal="true" aria-labelledby="testimonial-modal-title" data-testimonial-modal>
        <div class="relative w-full max-w-5xl border-2 border-black bg-black">
            <button type="button" class="absolute top-3 right-3 z-10 grid size-10 cursor-pointer place-items-center border border-black bg-white text-black" aria-label="Close video" data-testimonial-close>
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
            </button>
            <div class="grid aspect-video place-items-center bg-black text-center text-sm leading-[1.6] text-white" data-testimonial-stage></div>
            <p id="testimonial-modal-title" class="m-0 border-t border-black bg-white px-5 py-3.5 text-[13px] tracking-[0.05em]" data-testimonial-caption></p>
        </div>
    </div>
</section>
