@php
    $solutionLinks = [
        ['label' => 'Intelligent AI Agents', 'url' => route('services').'#ai-agents-automation'],
        ['label' => 'Workflow Automation', 'url' => route('services').'#ai-agents-automation'],
        ['label' => 'Custom Enterprise Software', 'url' => route('services').'#software-development'],
        ['label' => 'Cloud & DevOps', 'url' => route('services').'#cloud-devops'],
    ];

    $companyLinks = [
        ['label' => 'About Us', 'url' => route('about')],
        ['label' => 'Case Studies', 'url' => route('work')],
        ['label' => 'Contact', 'url' => route('contact')],
    ];

    $socialLinks = [
        ['label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/company/compiling-logics/'],
        ['label' => 'Facebook', 'url' => 'https://www.facebook.com/compiling.logics'],
    ];

    $headingClasses = 'border-b border-white/15 pb-2 text-xs tracking-widest text-white uppercase';
    $linkClasses = 'transition-colors hover:text-white';
@endphp

<footer class="w-full bg-black font-space text-white">
    <div class="mx-auto max-w-7xl px-6 pt-16 pb-24 lg:px-12 lg:pb-12">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
            <div class="flex flex-col gap-4">
                <a href="{{ route('home') }}" class="block w-fit" aria-label="Compiling Logics home">
                    <img src="{{ asset('images/logo-footer.webp') }}" alt="Compiling Logics" class="block h-11 w-auto" width="196" height="48" loading="lazy">
                </a>
                <div class="text-xs tracking-widest text-eccentric-blue uppercase">Where the logics never prank</div>
                <p class="text-sm leading-relaxed text-[#808080]">Deterministic enterprise AI systems, high-integrity workflow automation, and fault-tolerant infrastructure built for healthcare, hospitality, and critical operations.</p>
            </div>

            <nav class="flex flex-col gap-4" aria-label="Solutions">
                <div class="{{ $headingClasses }}">Solutions</div>
                <ul class="flex flex-col gap-2.5 text-sm text-[#808080]">
                    @foreach ($solutionLinks as $link)
                        <li><a href="{{ $link['url'] }}" class="{{ $linkClasses }}">{{ $link['label'] }}</a></li>
                    @endforeach
                </ul>
            </nav>

            <nav class="flex flex-col gap-4" aria-label="Company">
                <div class="{{ $headingClasses }}">Company</div>
                <ul class="flex flex-col gap-2.5 text-sm text-[#808080]">
                    @foreach ($companyLinks as $link)
                        <li><a href="{{ $link['url'] }}" class="{{ $linkClasses }}">{{ $link['label'] }}</a></li>
                    @endforeach
                    @foreach ($socialLinks as $link)
                        <li><a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer" class="{{ $linkClasses }}">{{ $link['label'] }}</a></li>
                    @endforeach
                </ul>
            </nav>

            <div class="flex flex-col gap-4">
                <div class="{{ $headingClasses }}">Global 24/7 Operations</div>
                <div class="flex flex-col gap-2 text-sm text-[#808080]">
                    <div>Enterprise Support Desk Active</div>
                    <div>Global Timezone Availability: 24/7/365</div>
                    <a href="mailto:info@compilinglogics.com" class="pt-2 text-xs tracking-wider text-eccentric-blue uppercase hover:text-white">info@compilinglogics.com</a>
                </div>
            </div>
        </div>

        <div class="mt-16 flex flex-col items-center justify-between gap-4 border-t border-white/20 pt-8 text-center text-[10px] tracking-widest text-[#808080] uppercase sm:flex-row sm:text-left">
            <div>&copy; 2019-{{ now()->year }} Compiling Logics. Engineered, not guessed.</div>
            <div class="text-eccentric-blue">Latency protocol verified // Strict logic engine</div>
        </div>
    </div>
</footer>
