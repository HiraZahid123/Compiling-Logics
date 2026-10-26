@props(['categories'])

@php
    $steps = [
        1 => ['label' => 'Service', 'icon' => 'M4 3h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Zm0 10h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2Zm2-7.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm0 10a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3ZM10 6v2h8V6h-8Zm0 10v2h8v-2h-8Z'],
        2 => ['label' => 'Date & Time', 'icon' => 'M7 2v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2V2h-2v2H9V2H7ZM5 9h14v11H5V9Zm2 2v2h2v-2H7Zm4 0v2h2v-2h-2Zm4 0v2h2v-2h-2Z'],
        3 => ['label' => 'Basic Details', 'icon' => 'M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Zm3 5v2h8V8H8Zm0 4v2h8v-2H8Zm0 4v2h5v-2H8Z'],
        4 => ['label' => 'Summary', 'icon' => 'M9 2h6a1 1 0 0 1 1 1v1h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2V3a1 1 0 0 1 1-1Zm1 2v2h4V4h-4Zm5.3 6.3L11 14.6l-2.3-2.3-1.4 1.4 3.7 3.7 5.7-5.7-1.4-1.4Z'],
    ];

    $pillClasses = 'group inline-flex h-[50px] cursor-pointer items-center gap-2.5 rounded-md border border-booking-border bg-white px-[18px] text-lg text-black aria-pressed:border-black aria-pressed:shadow-[inset_0_0_0_1px_#000] xl:text-2xl';
    $headingClasses = 'text-[22px] font-bold text-black xl:text-[26px]';
    $inputClasses = 'mt-2 block w-full rounded-md border border-booking-border px-4 py-3 text-lg text-black focus:border-black focus:outline-none xl:text-xl';
    $checkIcon = '<svg class="hidden size-6 group-aria-pressed:block" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm-1.2 14.2-4-4 1.4-1.4 2.6 2.6 5.6-5.6 1.4 1.4-7 7Z"/></svg>';
@endphp

<div class="font-lato text-black xl:pt-2 xl:pr-[5px] xl:pl-[11px]" data-booking-widget data-availability-url="{{ route('bookings.availability', ['service' => '__SERVICE__']) }}" data-store-url="{{ route('bookings.store') }}">
    <nav aria-label="Booking steps" class="overflow-x-auto rounded-xl border border-[#d9deea] bg-white shadow-[0_8px_24px_rgba(15,23,42,0.06)]">
        <ol class="flex min-w-max items-center gap-x-8 px-5 py-4 xl:gap-x-[63px] xl:px-[33px] xl:py-[26px]">
            @foreach ($steps as $number => $step)
                <li>
                    <button type="button" class="group flex cursor-pointer items-center gap-4 disabled:cursor-default xl:gap-[19px]" data-step-link="{{ $number }}" data-state="{{ $number === 1 ? 'current' : 'upcoming' }}" @disabled($number !== 1)>
                        <span class="flex size-10 items-center justify-center rounded-lg border border-booking-step-border bg-white text-black group-data-[state=current]:border-black group-data-[state=current]:bg-black group-data-[state=current]:text-white group-data-[state=current]:shadow-[0_6px_14px_rgba(0,0,0,0.25)] group-data-[state=done]:border-black group-data-[state=done]:bg-black group-data-[state=done]:text-white xl:size-[47px]">
                            <svg class="size-5 xl:size-6" viewBox="0 0 24 24" fill="currentColor" fill-rule="evenodd" aria-hidden="true"><path d="{{ $step['icon'] }}" /></svg>
                        </span>
                        <span class="text-lg text-booking-accent group-data-[state=current]:text-black group-data-[state=done]:text-black xl:text-[22px]">{{ $step['label'] }}</span>
                    </button>
                </li>
            @endforeach
        </ol>
    </nav>

    <div class="mt-6 flex flex-col rounded-xl border border-booking-border bg-white xl:mt-9 xl:min-h-[948px]">
        <div class="flex-1 px-5 pt-6 pb-8 xl:px-[37px] xl:pt-[40px]">
            {{-- Step 1: service --}}
            <section data-step-panel="1" aria-labelledby="booking-category-heading">
                <h3 id="booking-category-heading" class="{{ $headingClasses }}">Select Category</h3>
                <div class="mt-4 flex flex-wrap gap-3 xl:mt-[9px] xl:gap-[18px]" role="group" aria-labelledby="booking-category-heading">
                    <button type="button" class="{{ $pillClasses }}" aria-pressed="true" data-category-filter="all">ALL {!! $checkIcon !!}</button>
                    @foreach ($categories as $category)
                        <button type="button" class="{{ $pillClasses }}" aria-pressed="false" data-category-filter="{{ $category->id }}">{{ $category->name }} {!! $checkIcon !!}</button>
                    @endforeach
                </div>

                <h3 id="booking-service-heading" class="{{ $headingClasses }} mt-8 xl:mt-[46px]">Select Service</h3>
                <div class="mt-4 flex flex-col gap-4 xl:mt-[11px]" role="group" aria-labelledby="booking-service-heading">
                    @foreach ($categories as $category)
                        @foreach ($category->services as $service)
                            <button type="button" class="flex w-full cursor-pointer items-center gap-5 rounded-[10px] border border-booking-border bg-white px-5 py-5 text-left aria-pressed:border-black aria-pressed:shadow-[inset_0_0_0_1px_#000] xl:gap-[29px] xl:px-[31px] xl:py-[30px]" aria-pressed="false" data-service-option="{{ $service->id }}" data-category="{{ $category->id }}" data-service-name="{{ $service->name }}" data-service-duration="{{ $service->duration_minutes }}">
                                <span class="flex size-16 shrink-0 items-center justify-center rounded-full border border-booking-border xl:size-[84px]">
                                    <svg class="size-8 xl:size-10" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 7 2 18h14L9 7Zm7.5 3.5-2.2 3.4 2.6 4.1H22l-5.5-7.5Z" /></svg>
                                </span>
                                <span>
                                    <span class="block text-xl text-booking-accent xl:text-2xl">{{ $service->name }}</span>
                                    <span class="mt-2 block text-lg xl:text-[22px]">Duration: <span class="text-booking-accent">{{ $service->duration_minutes }} m</span></span>
                                </span>
                            </button>
                        @endforeach
                    @endforeach
                </div>
            </section>

            {{-- Step 2: date and time --}}
            <section data-step-panel="2" hidden aria-labelledby="booking-date-heading">
                <h3 id="booking-date-heading" class="{{ $headingClasses }}">Select Date</h3>
                <p class="mt-1 text-base text-grey">Times are shown in Pakistan time (PKT).</p>
                <p class="mt-4 text-lg text-grey" data-availability-status aria-live="polite"></p>
                <div class="mt-4 flex flex-wrap gap-3 xl:mt-5 xl:gap-[18px]" role="group" aria-labelledby="booking-date-heading" data-day-list></div>

                <div data-time-section hidden>
                    <h3 id="booking-time-heading" class="{{ $headingClasses }} mt-8 xl:mt-[46px]">Select Time</h3>
                    <div class="mt-4 flex flex-wrap gap-3 xl:mt-5 xl:gap-[18px]" role="group" aria-labelledby="booking-time-heading" data-time-list></div>
                </div>

                <template data-day-template>
                    <button type="button" class="{{ $pillClasses }}" aria-pressed="false"><span data-label></span> {!! $checkIcon !!}</button>
                </template>
            </section>

            {{-- Step 3: basic details --}}
            <section data-step-panel="3" hidden aria-labelledby="booking-details-heading">
                <h3 id="booking-details-heading" class="{{ $headingClasses }}">Basic Details</h3>
                <form class="mt-5 grid gap-5 md:grid-cols-2" data-details-form novalidate>
                    <label class="text-lg xl:text-xl">Name <span class="text-booking-accent">*</span>
                        <input name="name" type="text" autocomplete="name" required maxlength="255" class="{{ $inputClasses }}">
                    </label>
                    <label class="text-lg xl:text-xl">Email <span class="text-booking-accent">*</span>
                        <input name="email" type="email" autocomplete="email" required maxlength="255" class="{{ $inputClasses }}">
                    </label>
                    <label class="text-lg xl:text-xl">Phone
                        <input name="phone" type="tel" autocomplete="tel" maxlength="50" class="{{ $inputClasses }}">
                    </label>
                    <label class="text-lg md:col-span-2 xl:text-xl">Notes
                        <textarea name="notes" rows="4" maxlength="2000" class="{{ $inputClasses }} resize-y"></textarea>
                    </label>
                </form>
            </section>

            {{-- Step 4: summary --}}
            <section data-step-panel="4" hidden aria-labelledby="booking-summary-heading">
                <h3 id="booking-summary-heading" class="{{ $headingClasses }}" data-summary-heading>Summary</h3>
                <dl class="mt-5 grid grid-cols-[auto_1fr] gap-x-8 gap-y-3 text-lg xl:text-xl" data-summary>
                    @foreach (['service' => 'Service', 'when' => 'Date & Time', 'name' => 'Name', 'email' => 'Email', 'phone' => 'Phone', 'notes' => 'Notes'] as $key => $label)
                        <dt class="text-grey">{{ $label }}</dt>
                        <dd class="break-words" data-summary-field="{{ $key }}"></dd>
                    @endforeach
                </dl>
                <p class="mt-6 text-lg text-booking-accent" data-booking-message role="alert"></p>
            </section>
        </div>

        <div class="flex items-center justify-between gap-4 border-t border-booking-border px-5 py-5 xl:px-[46px] xl:py-[25px]" data-booking-actions>
            <button type="button" class="invisible h-12 cursor-pointer rounded-md border border-booking-border px-6 text-lg xl:h-[60px]" data-step-back>Back</button>
            <button type="button" class="flex h-12 cursor-pointer items-center gap-2 rounded-md bg-black px-6 text-base whitespace-nowrap text-white disabled:cursor-not-allowed disabled:opacity-40 xl:h-[60px] xl:min-w-[256px] xl:justify-center xl:text-lg" data-step-next disabled>
                <span data-next-label>Next: <strong>Date &amp; Time</strong></span>
                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6" /></svg>
            </button>
        </div>
    </div>
</div>
