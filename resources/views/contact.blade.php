@extends('layouts.site')

@section('title', 'Contact — Compiling Logics')
@section('description', 'Have a project in mind? Send Compiling Logics a message or book a call. We reply within one business day, in any timezone.')

@php
    $pillars = ['AI Agents & Automation', 'Software Development', 'Cloud & DevOps', 'Quality Assurance', 'Design', 'IT Consultation'];

    $steps = [
        ['stage' => 'Step 01 // Brief', 'title' => 'Send your brief', 'text' => 'Tell us what friction you want gone, using the form or a booked call.'],
        ['stage' => 'Step 02 // Reply', 'title' => 'We get back to you', 'text' => 'Reply within one business day, in any timezone.'],
        ['stage' => 'Step 03 // Call', 'title' => 'Discovery call', 'text' => 'We work through how your business actually runs, and pull the closest match from our work.'],
        ['stage' => 'Step 04 // Scope', 'title' => 'Clear scope', 'text' => 'Clear scope and timeline before any commitment.'],
    ];

    $faqs = [
        ['question' => 'How quickly will you reply?', 'answer' => 'Within one business day, in any timezone. Our AI chatbot handles the first response the moment the team isn\'t at a keyboard.'],
        ['question' => 'What can you help with?', 'answer' => 'Six pillars: AI Agents & Automation, Software Development, Cloud & DevOps, Quality Assurance, Design and IT Consultation. Use one on its own or combine them.'],
        ['question' => 'Can I see work from my industry?', 'answer' => 'Yes. Ask on the call and we\'ll pull the closest match and walk you through how it was built. You can also browse our case studies on the Work page.'],
        ['question' => 'What happens after launch?', 'answer' => 'No disappearing after launch: the relationship continues. We work embedded inside your business, not by handing over a tool and leaving.'],
    ];

    $channels = [
        ['label' => 'Project inquiries & consultation', 'value' => 'info@compilinglogics.com', 'url' => 'mailto:info@compilinglogics.com'],
        ['label' => 'LinkedIn', 'value' => 'Compiling Logics', 'url' => 'https://www.linkedin.com/company/compiling-logics/'],
        ['label' => 'Facebook', 'value' => 'compiling.logics', 'url' => 'https://www.facebook.com/compiling.logics'],
    ];

    $label = 'text-[11px] leading-4 tracking-[0.12em] uppercase';
    $muted = 'text-[#808080]';
    $field = 'mt-1.5 block w-full border border-[#808080] bg-white px-3.5 py-2.5 text-sm normal-case tracking-normal text-black transition-colors placeholder:text-[#808080]/60 focus:border-eccentric-blue focus:outline-1 focus:outline-eccentric-blue';
    $svg = fn (string $path, string $classes = 'size-[18px]'): string => '<svg class="'.$classes.' shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="'.$path.'"/></svg>';
    $outwardPath = 'M6 18 18 6M8 6h10v10';
@endphp

@section('content')
    <div class="font-space text-black">
        {{-- ============ META STRIP ============ --}}
        <div class="border-b border-black/10 bg-[#f5f5f7]">
            <div class="{{ $label }} {{ $muted }} mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-4 py-3 sm:px-6 lg:px-12">
                <div class="flex items-center gap-3">
                    <span class="inline-block size-2 bg-eccentric-blue"></span>
                    <span class="font-medium text-black">Contact // Direct access</span>
                </div>
                <span class="text-eccentric-blue">Team reachable across time zones</span>
            </div>
        </div>

        {{-- ============ HERO ============ --}}
        <section class="mx-auto max-w-7xl border-b border-black/10 px-4 pt-12 pb-10 sm:px-6 lg:px-12" aria-labelledby="contact-heading">
            <div class="flex flex-col justify-between gap-8 lg:flex-row lg:items-end">
                <div class="max-w-3xl">
                    <p class="{{ $label }} mb-3 flex items-center gap-2 text-eccentric-blue"><span class="size-1.5 bg-eccentric-blue"></span>Get in touch</p>
                    <h1 id="contact-heading" class="mb-4 text-4xl leading-none tracking-tight uppercase sm:text-5xl lg:text-[64px]">Let's Build Something Great Together</h1>
                    <p class="max-w-2xl text-lg text-[#5f5f64]">Have a project in mind or just want to say hello? We'd love to hear from you.</p>
                </div>

                <div class="flex items-start gap-6 border-l border-black/10 pl-6 lg:flex-col lg:items-end lg:border-l-0 lg:pl-0">
                    <div class="lg:text-right">
                        <p class="{{ $label }} {{ $muted }}">Reply time</p>
                        <p class="flex items-baseline gap-1 text-3xl tracking-tight lg:justify-end">1 <span class="{{ $label }} text-eccentric-blue">business day</span></p>
                    </div>
                    <div class="lg:text-right">
                        <p class="{{ $label }} {{ $muted }}">Our promise</p>
                        <p class="{{ $label }} border border-black/10 bg-[#f5f5f7] px-2.5 py-1">Scope before commitment</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============ FORM & CHANNELS ============ --}}
        <section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-12">
            <div class="grid grid-cols-1 items-start gap-8 lg:grid-cols-12">
                <div class="relative border border-black bg-white p-6 sm:p-8 lg:col-span-7">
                    <div class="mb-8 flex flex-wrap items-center justify-between gap-3 border-b border-black/10 pb-4">
                        <div>
                            <span class="{{ $label }} block text-eccentric-blue">Send a message</span>
                            <h2 class="text-2xl tracking-wide uppercase">Tell us about your project</h2>
                        </div>
                        <span class="{{ $label }} flex items-center gap-2"><span class="size-2 animate-pulse bg-eccentric-blue"></span>We read every message</span>
                    </div>

                    <form id="contact-form" method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="contact-name" class="{{ $label }} flex items-center justify-between"><span>01. Name</span><span class="text-eccentric-blue">*Required</span></label>
                                <input id="contact-name" name="name" type="text" value="{{ old('name') }}" placeholder="Your name" autocomplete="name" required maxlength="255" class="{{ $field }}">
                            </div>
                            <div>
                                <label for="contact-email" class="{{ $label }} flex items-center justify-between"><span>02. Email</span><span class="text-eccentric-blue">*Required</span></label>
                                <input id="contact-email" name="email" type="email" value="{{ old('email') }}" placeholder="you@company.com" autocomplete="email" required maxlength="255" class="{{ $field }}">
                            </div>
                        </div>

                        <fieldset>
                            <legend class="{{ $label }} mb-2 flex w-full items-center justify-between"><span>03. What do you need help with?</span><span class="{{ $muted }}">Optional</span></legend>
                            <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                                @foreach ($pillars as $pillar)
                                    <label class="group cursor-pointer border border-black/20 bg-white p-3 transition-all hover:border-black hover:bg-[#f5f5f7] has-checked:border-black has-checked:bg-black has-checked:text-white has-focus-visible:outline-2 has-focus-visible:outline-offset-2 has-focus-visible:outline-eccentric-blue">
                                        <input type="checkbox" name="pillars[]" value="{{ $pillar }}" class="sr-only" @checked(in_array($pillar, old('pillars', []), true))>
                                        <span class="{{ $label }} {{ $muted }} mb-1 block group-has-checked:text-eccentric-blue">03{{ chr(64 + $loop->iteration) }}</span>
                                        <span class="block text-sm font-medium tracking-tight uppercase">{{ $pillar }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>

                        <div>
                            <label for="contact-message" class="{{ $label }} flex items-center justify-between"><span>04. Message</span><span class="text-eccentric-blue">*Required</span></label>
                            <textarea id="contact-message" name="message" rows="5" placeholder="What friction do you want gone? Share the goal and the problem you're solving." required maxlength="5000" class="{{ $field }} resize-y">{{ old('message') }}</textarea>
                        </div>

                        <x-recaptcha />

                        <div class="flex flex-col items-stretch justify-between gap-4 border-t border-black/10 pt-4 sm:flex-row sm:items-center">
                            <button type="submit" class="group inline-flex cursor-pointer items-center justify-center gap-3 border-2 border-eccentric-blue bg-eccentric-blue px-8 py-3.5 text-xs tracking-[0.08em] text-white uppercase transition-colors hover:bg-white hover:text-eccentric-blue">
                                <span>Send Message</span><span class="transition-transform group-hover:translate-x-1">{!! $svg('M4 12h16M14 6l6 6-6 6') !!}</span>
                            </button>
                            <span class="{{ $label }} {{ $muted }} flex items-center gap-2"><span class="text-black">{!! $svg('M5 11h14v10H5zM8 11V7a4 4 0 0 1 8 0v4', 'size-4') !!}</span>Goes straight to our team</span>
                        </div>

                        <div role="status">
                            @if (session('status') === 'contact-message-sent')
                                <p class="border border-eccentric-blue bg-[#f5f5f7] p-4 text-sm">Thanks — your message is on its way. We'll get back to you soon.</p>
                            @elseif ($errors->any())
                                <ul class="border-l-4 border-[#d33] bg-[#fdf2f2] px-3.5 py-3 text-sm text-[#a11]">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </form>
                </div>

                <div class="space-y-6 lg:col-span-5">
                    <div class="border border-black bg-black p-6 text-white">
                        <div class="mb-4 flex items-center justify-between border-b border-white/20 pb-3">
                            <span class="{{ $label }} text-eccentric-blue">Prefer to talk?</span>
                            <span class="{{ $label }} flex items-center gap-1.5"><span class="inline-block size-2 animate-ping bg-eccentric-blue"></span>Live calendar</span>
                        </div>
                        <p class="{{ $label }} {{ $muted }}">Book a call</p>
                        <p class="mt-1 text-2xl leading-snug">Pick a time that suits you.</p>
                        <p class="mt-2 text-sm text-white/70">Start with a call. We'll scope it from there.</p>
                        <a href="#booking" class="mt-5 inline-flex items-center gap-2 bg-eccentric-blue px-5 py-3 text-xs tracking-[0.08em] uppercase transition-colors hover:bg-white hover:text-black">See available times {!! $svg('M12 4v16M6 14l6 6 6-6') !!}</a>
                    </div>

                    <div class="border border-black bg-white p-6">
                        <div class="mb-4 flex items-center justify-between border-b border-black/10 pb-3">
                            <h2 class="text-lg tracking-wide uppercase">Direct channels</h2>
                            <span class="{{ $label }} {{ $muted }}">Direct line</span>
                        </div>
                        <ul class="space-y-4">
                            @foreach ($channels as $channel)
                                <li class="border border-black/10 bg-[#f5f5f7] p-3 transition-colors hover:border-eccentric-blue">
                                    <p class="{{ $label }} {{ $muted }}">{{ $channel['label'] }}</p>
                                    <a href="{{ $channel['url'] }}" @unless (str_starts_with($channel['url'], 'mailto:')) target="_blank" rel="noopener" @endunless class="mt-1 flex items-center justify-between gap-3 text-lg font-medium break-all transition-colors hover:text-eccentric-blue">
                                        <span>{{ $channel['value'] }}</span>{!! $svg($outwardPath) !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="border border-black bg-[#f5f5f7] p-6">
                        <div class="flex items-start gap-4">
                            <span class="flex size-10 shrink-0 items-center justify-center bg-black text-white">{!! $svg('M4 7h16v13H4zM12 3v4M9 12h1M14 12h1M9 16h6', 'size-5') !!}</span>
                            <div>
                                <p class="{{ $label }} font-semibold">Always-on first response</p>
                                <p class="mt-1 text-lg tracking-tight">AI chatbot + live team</p>
                                <p class="mt-1 text-sm text-[#5f5f64]">Our AI chatbot handles the first response the moment the team isn't at a keyboard. Open it from the button in the corner.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============ BOOKING (CALENDLY) ============ --}}
        <section id="booking" class="scroll-mt-6 border-t border-black/10 bg-[#f5f5f7] py-12 lg:py-16" aria-labelledby="booking-heading">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-12">
                <div class="mb-8 flex flex-wrap items-end justify-between gap-4 border-b border-black/10 pb-4">
                    <div>
                        <span class="{{ $label }} text-eccentric-blue">Schedule // Live calendar</span>
                        <h2 id="booking-heading" class="mt-2 text-3xl uppercase sm:text-4xl">Book a call</h2>
                    </div>
                    <p class="max-w-sm text-sm {{ $muted }} sm:text-right">Choose a slot and it lands straight in our calendar.</p>
                </div>

                @if ($calendlyUrl)
                    <div class="border border-black bg-white">
                        <div class="min-h-[700px] w-full" data-calendly-url="{{ $calendlyUrl }}">
                            <noscript>
                                <a href="{{ $calendlyUrl }}" class="font-lato text-lg text-eccentric-blue underline">Book a call on Calendly</a>
                            </noscript>
                        </div>
                    </div>
                @else
                    <x-booking-widget :categories="$categories" />
                @endif
            </div>
        </section>

        {{-- ============ PROCESS ============ --}}
        <section class="bg-black py-12 text-white" aria-label="What happens next">
            <ol class="mx-auto grid max-w-7xl grid-cols-1 gap-6 px-4 sm:px-6 md:grid-cols-4 lg:px-12">
                @foreach ($steps as $step)
                    <li @class(['border-l-2 py-1 pl-4', 'border-eccentric-blue' => $loop->first, 'border-white/20' => ! $loop->first])>
                        <span @class([$label, 'mb-1 block', 'text-eccentric-blue' => $loop->first, $muted => ! $loop->first])>{{ $step['stage'] }}</span>
                        <h3 class="text-lg uppercase">{{ $step['title'] }}</h3>
                        <p class="mt-1 text-sm leading-relaxed {{ $muted }}">{{ $step['text'] }}</p>
                    </li>
                @endforeach
            </ol>
        </section>

        {{-- ============ FAQ ============ --}}
        <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-12" aria-labelledby="faq-heading">
            <div class="flex flex-col items-start justify-between gap-12 lg:flex-row">
                <div class="max-w-md">
                    <span class="{{ $label }} mb-2 block text-eccentric-blue">Questions // FAQ</span>
                    <h2 id="faq-heading" class="mb-4 text-4xl leading-none tracking-tight uppercase sm:text-5xl lg:text-[64px]">Direct Answers.</h2>
                    <p class="mb-6 leading-relaxed text-[#5f5f64]">The questions we hear most before a first call.</p>
                    <div class="border border-black bg-[#f5f5f7] p-4">
                        <p class="{{ $label }} font-semibold">Something else on your mind?</p>
                        <p class="mt-1 text-sm text-[#5f5f64]">Email <a href="mailto:info@compilinglogics.com" class="text-eccentric-blue underline underline-offset-4">info@compilinglogics.com</a> or ask it on the call.</p>
                    </div>
                </div>

                <div class="w-full flex-1 space-y-4">
                    @foreach ($faqs as $faq)
                        <details class="group border border-black bg-white">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 p-6 text-lg tracking-tight uppercase transition-colors hover:text-eccentric-blue [&::-webkit-details-marker]:hidden">
                                {{ $faq['question'] }}
                                <span class="text-2xl leading-none group-open:text-eccentric-blue" aria-hidden="true"><span class="group-open:hidden">+</span><span class="hidden group-open:inline">−</span></span>
                            </summary>
                            <p class="border-t border-black/10 px-6 pt-2 pb-6 leading-relaxed text-[#5f5f64]">{{ $faq['answer'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
