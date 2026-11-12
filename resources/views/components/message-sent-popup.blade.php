@if (session('status') === 'contact-message-sent')
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/55 p-4 font-electrolize" data-sent-popup>
        <div class="w-full max-w-md border-t-4 border-eccentric-blue bg-white p-8 text-center shadow-[0_24px_60px_rgba(0,20,70,0.35)]" role="dialog" aria-modal="true" aria-labelledby="sent-popup-title" aria-describedby="sent-popup-text">
            <span class="mx-auto flex size-16 items-center justify-center rounded-full bg-eccentric-blue text-white">
                <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" aria-hidden="true"><path d="M4 12l6 6L20 6"/></svg>
            </span>

            <h2 id="sent-popup-title" class="mt-5 text-2xl text-eccentric-blue">Message sent successfully</h2>
            <p id="sent-popup-text" class="mt-3 text-base leading-[1.6] text-black/75">Thank you for reaching out. We've received your message and will get back to you shortly.</p>

            <button type="button" class="mt-7 inline-flex cursor-pointer items-center justify-center border-2 border-eccentric-blue bg-eccentric-blue px-8 py-3 tracking-[0.02em] text-white transition-colors hover:border-black hover:bg-black" data-sent-popup-close>
                Done
            </button>
        </div>
    </div>
@endif
