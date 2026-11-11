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



    <div data-reveal-stagger class="mt-6 grid grid-cols-1 gap-5 sm:mt-10 sm:grid-cols-2 sm:gap-8 xl:mt-[72px] xl:grid-cols-3 xl:gap-x-[50px] xl:gap-y-[55px]">
        @foreach ($services as $service)
            <div data-reveal>
                <a href="{{ $service['url'] }}" class="image-hover image-hover-lift block aspect-square">
                    <img src="{{ asset('images/services/'.$service['image']) }}" alt="{{ $service['alt'] }}" class="size-full object-cover" loading="lazy" width="560" height="560">
                </a>
            </div>
        @endforeach
    </div>

    <div class="mt-10 flex justify-center xl:mt-[clamp(40px,3.646vw,70px)]">
        <x-book-call-button size="large" href="/contact" />
    </div>
</section>