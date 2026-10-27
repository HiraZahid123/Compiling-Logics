@extends('layouts.site')

@section('title', 'Contact — Compiling Logics')

@php
    $fieldClasses = 'block w-full rounded-md border border-[#1c3561] bg-[#000b18] px-4 py-3 text-base text-on-brand placeholder:text-[#7492b8] focus:border-eccentric-blue focus:outline-none md:absolute md:left-[10.417%] md:w-[35.26%] md:rounded-none md:border-0 md:py-0 md:pr-0 md:pl-[min(3.5px,0.182vw)] md:text-[length:min(19px,0.99vw)]';
@endphp

@section('content')
    <section class="relative font-electrolize" aria-labelledby="contact-heading">
        <h1 id="contact-heading" class="sr-only">Let's Build Something Great Together</h1>

        <div class="relative aspect-[960/430] overflow-hidden md:aspect-[1920/1025]">
            <img src="{{ asset('images/contact/contact-banner.png') }}" alt="Get in touch. Have a project in mind or just want to say hello? We'd love to hear from you." class="absolute top-0 left-0 h-[238.37%] w-auto max-w-none md:h-full md:w-full" width="1920" height="1025">
        </div>

        <form id="contact-form" method="POST" action="{{ route('contact.store') }}" class="flex flex-col gap-4 bg-[#030a17] px-4 py-8 sm:px-8 md:absolute md:inset-0 md:block md:bg-transparent md:p-0">
            @csrf

            <label for="contact-name" class="sr-only">Name</label>
            <input id="contact-name" name="name" type="text" value="{{ old('name') }}" placeholder="Name" autocomplete="name" required maxlength="255" class="{{ $fieldClasses }} md:top-[45.17%] md:h-[5.46%]">

            <label for="contact-email" class="sr-only">Email</label>
            <input id="contact-email" name="email" type="email" value="{{ old('email') }}" placeholder="Email" autocomplete="email" required maxlength="255" class="{{ $fieldClasses }} md:top-[53.9%] md:h-[5.46%]">

            <label for="contact-message" class="sr-only">Message</label>
            <textarea id="contact-message" name="message" rows="5" placeholder="Message" required maxlength="5000" class="{{ $fieldClasses }} resize-none md:top-[62.93%] md:h-[12.88%] md:pt-[min(19.5px,1.016vw)]">{{ old('message') }}</textarea>

            <button type="submit" class="flex h-12 w-36 cursor-pointer items-center justify-center gap-3 rounded-md bg-eccentric-blue text-lg text-on-brand md:absolute md:top-[79.9%] md:left-[5.94%] md:h-[7.12%] md:w-[11.61%] md:rounded-lg md:bg-transparent">
                <span class="md:sr-only">Send</span>
                <span aria-hidden="true" class="md:hidden">&rarr;</span>
            </button>

            <div class="text-sm text-on-brand md:absolute md:top-[79.9%] md:left-[18.75%] md:flex md:h-[7.12%] md:w-[27%] md:items-center md:text-[length:min(18px,0.9375vw)]" role="status">
                @if (session('status') === 'contact-message-sent')
                    <p>Thanks — your message is on its way. We'll get back to you soon.</p>
                @elseif ($errors->any())
                    <ul class="text-[#ff8a8a]">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </form>
    </section>

    <section class="px-4 pt-8 pb-16 sm:px-8 xl:px-[min(102px,5.313vw)] xl:pt-[min(10px,0.521vw)] xl:pb-[min(104px,5.417vw)]" aria-labelledby="booking-heading">
        <h2 id="booking-heading" class="sr-only">Book a call</h2>

        @if ($calendlyUrl)
            <div class="min-h-[700px] w-full" data-calendly-url="{{ $calendlyUrl }}">
                <noscript>
                    <a href="{{ $calendlyUrl }}" class="font-lato text-lg text-eccentric-blue underline">Book a call on Calendly</a>
                </noscript>
            </div>
        @else
            <x-booking-widget :categories="$categories" />
        @endif
    </section>
@endsection
