@php
    /*
     * Client reviews shown in the Work page carousel. Add a review by appending
     * another entry; 'name' and 'country' appear under the quote.
     */
    $testimonials = [
        ['name' => 'Pawal', 'country' => 'Poland', 'quote' => 'It was a pleasure working with Hira on the first milestone of my project. She demonstrated professionalism, technical expertise, and a strong understanding of the project requirements. Communication was clear, and the collaboration went smoothly. I’m very satisfied with our cooperation and look forward to working with her on the next stages of the project. Highly recommended!'],
        ['name' => 'Salma', 'country' => 'Egypt', 'quote' => 'Hira is truly exceptional. This is not my first time working with her, and whenever I have a new project, she is always the first person I reach out to. She is reliable, responsive, accountable, and consistently delivers great work. It is always a pleasure working with her, and I highly recommend her!'],
        ['name' => 'Aya', 'country' => 'France', 'quote' => 'Excellent experience working with Hira and her team. They were professional, responsive, reliable, and easy to communicate with throughout the project. The quality of their work was excellent, and everything was handled with great attention to detail. I really appreciated their dedication and professionalism. Highly recommended, and I would be very happy to work with them again!'],
        ['name' => 'Libby', 'country' => 'USA', 'quote' => 'Hira is an outstanding Senior Full-Stack AI Developer with strong expertise in the MERN stack, Python, and AI technologies. She consistently delivered high-quality work across frontend, backend, and AI development, building intelligent and scalable solutions. She is highly skilled at solving complex problems, designing efficient systems, and implementing AI-driven features. Communication was always smooth, and she consistently went above and beyond expectations to deliver exceptional results. I highly recommend Hira to any organization looking for a talented Full-Stack AI Engineer who can transform ideas into outstanding, production-ready products.'],
        ['name' => 'Tolu', 'country' => 'UK', 'quote' => 'Hira is an excellent developer, who takes time and effort to understand and complete the work. Hira is committed to excellence to all aspects of the job. I thoroughly enjoyed working with Hira.'],
        ['name' => 'Eduardo', 'country' => 'USA', 'quote' => 'Hira is a top performer. Exceptional programmer with sharp problem-solving skills and clean, efficient code. A true asset to any dev team, highly recommended! She has great communication skills and solves issues promptly. Would definitely hire her again!'],
        ['name' => 'Lou', 'country' => 'USA', 'quote' => 'Hira is one of the strongest freelancers I’ve worked with. She moves quickly, understands the objective without over-explanation, and consistently delivers high-quality work. Communication is clear, timelines are met, and she steps up when things get complex. She also improves what you ask for, not just executes it. Most importantly, she’s reliable. When she commits to something, it gets done.'],
        ['name' => 'Amanda', 'country' => 'Australia', 'quote' => 'Hira and her team were wonderful to work with and the project was completed to my (fairly exacting!) standards on time with no issues whatsoever. I recommend Hira without reservation.'],
    ];
@endphp

<section id="testimonials" class="border-t border-black/14 bg-white py-16 font-electrolize text-black sm:py-24" aria-labelledby="testimonials-heading" data-testimonials>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 flex flex-wrap items-end justify-between gap-8" data-reveal>
            <div>
                <span class="mb-6 block h-1 w-[72px] bg-eccentric-blue"></span>
                <h2 id="testimonials-heading" class="text-[28px] leading-[1.2] sm:text-4xl">What clients say.</h2>
            </div>
            <div class="flex flex-col gap-4 md:items-end">
                <p class="max-w-[360px] text-sm md:text-right">Real words from clients across {{ collect($testimonials)->pluck('country')->unique()->count() }} countries.</p>
                <div class="flex gap-2">
                    @foreach (['prev' => ['Previous testimonials', 'M15 18l-6-6 6-6'], 'next' => ['Next testimonials', 'M9 18l6-6-6-6']] as $direction => [$label, $path])
                        <button type="button" class="grid size-10 cursor-pointer place-items-center border border-black bg-white transition-colors hover:bg-black hover:text-white disabled:cursor-default disabled:border-black/20 disabled:text-black/25 disabled:hover:bg-white" aria-label="{{ $label }}" data-testimonial-{{ $direction }}>
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="{{ $path }}"/></svg>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="-mx-1 flex snap-x snap-mandatory scroll-px-1 gap-6 overflow-x-auto scroll-smooth px-1 pt-2 pb-4 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden" role="region" aria-roledescription="carousel" aria-label="Client testimonials" tabindex="0" data-testimonial-track data-reveal>
            @foreach ($testimonials as $testimonial)
                <div class="testimonial-item w-[85%] shrink-0 snap-start sm:w-[calc(50%-12px)] lg:w-[calc((100%-48px)/3)]" aria-roledescription="slide" aria-label="{{ $loop->iteration }} of {{ $loop->count }}" data-testimonial-type="written">
                    <figure class="relative m-0 flex h-full flex-col border border-black/14 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:border-black hover:shadow-[0_20px_40px_rgba(0,0,0,0.10)] sm:p-9">
                        <div class="mb-6 flex items-center justify-between">
                            <svg class="h-[30px] w-11 shrink-0 fill-none stroke-black stroke-[1.6]" viewBox="0 0 48 32" aria-hidden="true"><path d="M2 2h18v14l-8 14H4l6-12H2zM28 2h18v14l-8 14h-8l6-12h-8z"/></svg>
                            <span class="flex gap-0.5 text-eccentric-blue" aria-label="5 out of 5 stars">
                                @for ($star = 0; $star < 5; $star++)
                                    <svg class="size-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2l3.1 6.3 6.9 1-5 4.9 1.2 6.8L12 17.8 5.8 21l1.2-6.8-5-4.9 6.9-1z"/></svg>
                                @endfor
                            </span>
                        </div>
                        <blockquote class="m-0 mb-8 text-base leading-[1.6]">“{{ $testimonial['quote'] }}”</blockquote>

                        <figcaption class="mt-auto flex items-center gap-3.5 border-t border-black/14 pt-5">
                            <span class="grid size-12 shrink-0 place-items-center border border-black text-[15px] tracking-[0.05em]" aria-hidden="true">{{ mb_substr($testimonial['name'], 0, 1) }}</span>
                            <span>
                                <span class="block text-base leading-[1.3]">{{ $testimonial['name'] }}</span>
                                <span class="text-xs tracking-[0.05em] opacity-70">{{ $testimonial['country'] }}</span>
                            </span>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
        </div>

        <div class="mt-6 h-1 bg-black/10" aria-hidden="true">
            <div class="h-full w-0 bg-eccentric-blue transition-[width] duration-300" data-testimonial-progress></div>
        </div>

        <div class="mt-14 flex flex-wrap items-center justify-between gap-6 border-t border-black pt-8" data-reveal>
            <p class="text-base">Want to hear it from a client directly? Ask on the call and we’ll connect you.</p>
            <a href="#contact" class="inline-flex items-center border-2 border-black bg-white px-[22px] py-3 tracking-[0.02em] transition-colors hover:bg-black hover:text-white">Book a Call</a>
        </div>
    </div>
</section>
