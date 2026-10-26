@php
    $services = [
        ['image' => 'ai-agents-automation.png', 'alt' => 'AI Agents & Automation — AI/ML, Chatbots, Workflow Integrations', 'url' => route('services').'#ai-agents-automation'],
        ['image' => 'software-development.png', 'alt' => 'Software Development — MVP, SaaS, Web, Mobile, Enterprise mobility', 'url' => route('services').'#software-development'],
        ['image' => 'cloud-devops.png', 'alt' => 'Cloud & DevOps — Infrastructure, Deployment, Scaling', 'url' => route('services').'#cloud-devops'],
        ['image' => 'quality-assurance.png', 'alt' => 'Quality Assurance — Software testing, end to end', 'url' => route('services').'#quality-assurance'],
        ['image' => 'design.png', 'alt' => 'Design — UX/UI, Graphic Design, Brand Identity', 'url' => route('services').'#design'],
        ['image' => 'it-consultation.png', 'alt' => 'IT Consultation — Advisory before the build starts', 'url' => route('services').'#it-consultation'],
    ];
@endphp

<section class="relative px-4 pt-10 pb-16 font-electrolize sm:px-8 sm:pt-14 xl:px-[70px] xl:pt-[71px] xl:pb-[171px]" aria-labelledby="what-we-build-heading">
    <h2 id="what-we-build-heading" class="text-[32px] leading-[normal] text-black sm:text-[40px] xl:text-[48px]">What We Build</h2>

    <a href="#" class="fixed right-4 bottom-4 z-30 block size-[60px] xl:absolute xl:top-[128px] xl:right-[134px] xl:bottom-auto" aria-label="Chat with us">
        <svg class="size-full text-eccentric-blue" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
        </svg>
    </a>

    <div data-reveal-stagger class="mt-6 grid grid-cols-1 gap-5 sm:mt-10 sm:grid-cols-2 sm:gap-8 xl:mt-[72px] xl:grid-cols-3 xl:gap-x-[50px] xl:gap-y-[55px]">
        @foreach ($services as $service)
            <div data-reveal>
                <a href="{{ $service['url'] }}" class="image-hover image-hover-lift block aspect-square">
                    <img src="{{ asset('images/services/'.$service['image']) }}" alt="{{ $service['alt'] }}" class="size-full object-cover" loading="lazy" width="560" height="560">
                </a>
            </div>
        @endforeach
    </div>
</section>
