<div
    id="case-study-modal"
    data-case-study-modal
    class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-6 bg-black/75 backdrop-blur-sm opacity-0 transition-opacity duration-200"
    role="dialog"
    aria-modal="true"
    aria-labelledby="case-study-modal-title"
    tabindex="-1"
>
    <div
        data-case-study-dialog
        class="relative flex flex-col w-full max-w-5xl h-[88vh] bg-white rounded-2xl shadow-2xl overflow-hidden border border-[#cfd6e5] font-electrolize transform scale-95 transition-transform duration-200"
    >
        <!-- Modal Header -->
        <header class="flex items-center justify-between px-4 sm:px-6 py-3.5 sm:py-4 border-b border-[#edeff5] bg-[#f7f7f8] shrink-0">
            <div class="flex items-center gap-3 min-w-0 pr-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold uppercase tracking-wider bg-[#0049fd]/10 text-eccentric-blue">
                    Case Study
                </span>
                <h2 id="case-study-modal-title" data-case-study-title class="text-base sm:text-xl font-bold text-black truncate">
                    Project Case Study
                </h2>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <a
                    href="#"
                    data-case-study-download
                    target="_blank"
                    rel="noopener noreferrer"
                    download
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs sm:text-sm font-medium rounded-lg bg-white border border-[#cfd6e5] hover:border-eccentric-blue hover:text-eccentric-blue text-black shadow-xs transition-colors"
                    title="Open PDF in new tab / Download"
                >
                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span class="hidden sm:inline">Download PDF</span>
                </a>

                <button
                    type="button"
                    data-case-study-close
                    class="p-2 rounded-lg text-grey hover:text-black hover:bg-[#edeff5] transition-colors cursor-pointer"
                    aria-label="Close case study viewer"
                >
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </header>

        <!-- Modal Body (PDF Viewer) -->
        <div class="relative flex-1 bg-neutral-100 overflow-hidden">
            <iframe
                data-case-study-frame
                src="about:blank"
                class="size-full border-0 bg-neutral-100"
                title="Case Study PDF Document"
            ></iframe>
        </div>

        <!-- Modal Footer / Mobile Fallback -->
        <footer class="px-4 py-2 bg-[#f7f7f8] border-t border-[#edeff5] text-xs text-grey flex flex-col sm:flex-row items-center justify-between gap-1 shrink-0">
            <span>Viewing case study presentation.</span>
            <span>
                Problems viewing?
                <a href="#" data-case-study-fallback target="_blank" rel="noopener noreferrer" class="text-eccentric-blue hover:underline font-semibold">
                    Open directly in browser &nearr;
                </a>
            </span>
        </footer>
    </div>
</div>
