@extends('layouts.site')

@section('title', 'Compiling Logics — Engineered Digital Systems')
@section('description', '24/7 AI agents, workflow automation and resilient custom software that free enterprises from manual friction in healthcare, real estate and hospitality.')

@php
    $telemetry = [
        ['value' => '99.98%', 'label' => 'Automation Uptime', 'text' => 'Continuous deterministic operations without fallback dropouts.'],
        ['value' => '< 120ms', 'label' => 'Model Latency', 'text' => 'Near-instantaneous inference validation on edge clusters.'],
        ['value' => '$4.2M+', 'label' => 'Overhead Eliminated', 'text' => 'Cumulative labor friction reclaimed across deployed client systems.'],
        ['value' => '24/7', 'label' => 'Global Timezone Ops', 'text' => 'Uninterrupted mission availability across EMEA, US, and APAC.'],
    ];

    $solutions = [
        ['tag' => '01 // Automation', 'title' => 'Intelligent AI Agents', 'text' => 'Autonomous multi-agent orchestration, LLM synthesis, and continuous 24/7 operational tasking built with non-drifting guardrails.', 'status' => 'Dispatch capable', 'url' => route('services').'#ai-agents-automation', 'icon' => 'M5 9h14v10H5zM12 4v5M9 13h1M14 13h1M9 16h6'],
        ['tag' => '02 // Orchestration', 'title' => 'End-to-End Workflow Automation', 'text' => 'Eliminating repetitive friction across legacy ERPs, internal databases, and modern APIs with guaranteed zero-failure message queues.', 'status' => 'Pipeline verified', 'url' => route('services').'#ai-agents-automation', 'icon' => 'M4 4h6v6H4zM14 14h6v6h-6zM10 7h4v10'],
        ['tag' => '03 // Architecture', 'title' => 'Mission-Critical Custom Software', 'text' => 'Next-generation web and cloud applications built with type-safe precision, microsecond response bounds, and unyielding scalability.', 'status' => 'Deterministic build', 'url' => route('services').'#software-development', 'icon' => 'M3 4h18v16H3zM7 9l3 3-3 3M12 15h5'],
        ['tag' => '04 // Protocols', 'title' => 'Specialized Industry Frameworks', 'text' => 'Pre-compiled compliance engines structured directly for Healthcare HIPAA, Real Estate MLS protocols, and Hospitality real-time POS systems.', 'status' => 'Compliance locked', 'url' => route('services').'#quality-assurance', 'icon' => 'M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6zM8.5 12l2.5 2.5 4.5-5'],
    ];

    $industries = [
        ['tag' => '01 / Healthcare', 'badge' => 'HIPAA verified', 'image' => 'healthcare', 'caption' => 'CLINICAL_INTAKE', 'title' => 'Patient Intake Routing & Document Engine', 'text' => 'Automated end-to-end ingestion and triage of complex patient referrals, unstructured clinical records, and insurance eligibility pipelines.', 'metric' => '84%', 'metricLabel' => 'Manual Review Reduction', 'bar' => 'w-[84%]'],
        ['tag' => '02 / Real Estate', 'badge' => 'MLS integrated', 'image' => 'real-estate', 'caption' => 'MLS_QUALIFICATION', 'title' => 'Autonomous Lead Qualification & Lease Compilation', 'text' => 'Continuous conversational agents interacting with prospective tenants, verifying credentials, and compiling fault-free lease documents instantly.', 'metric' => '3.2x', 'metricLabel' => 'Lease Execution Speed', 'bar' => 'w-[76%]'],
        ['tag' => '03 / Hospitality', 'badge' => 'POS harmonized', 'image' => 'hospitality', 'caption' => 'POS_ALLOCATION', 'title' => 'Dynamic Concierge Booking & Inventory Reconciliation', 'text' => 'Autonomous concierge logic orchestrating guest reservations, real-time room allocations, and point-of-sale synchronizations across multi-property portfolios.', 'metric' => '100%', 'metricLabel' => 'Booking Discrepancy Elimination', 'bar' => 'w-full'],
    ];

    $values = [
        ['title' => 'Precision', 'text' => 'Strict type safety and deterministic execution eliminate statistical hallucination.', 'stat' => 'Tolerance: 0.000%'],
        ['title' => 'Reliability', 'text' => 'Self-healing pipelines with redundant circuit-breakers guarantee system continuity.', 'stat' => 'Failover: Instant'],
        ['title' => 'Global', 'text' => 'Distributed node deployment ensures instant responses across every active timezone.', 'stat' => 'Zones: All active'],
        ['title' => 'Innovation', 'text' => 'Pioneering multi-modal agents that convert raw institutional data into structured work.', 'stat' => 'Paradigm: Adaptive'],
        ['title' => 'Trust', 'text' => 'Air-tight data privacy and transparent audit trails ensure absolute governance.', 'stat' => 'Audit: Continuous'],
    ];

    $topology = [
        ['step' => '01. Ingestion layer', 'title' => 'Data Ingestion Engine', 'text' => 'Multi-source telemetry, EHR streams, MLS live listings, API hooks'],
        ['step' => '02. Core reasoning', 'title' => 'Compiling Logics Engine', 'text' => 'Deterministic state evaluation, schema validation, non-hallucinatory parsing', 'core' => true],
        ['step' => '03. Execution dispatch', 'title' => 'Real-Time Action Array', 'text' => 'HIPAA compliance audits, reservation updates, autonomous outreach'],
    ];

    $label = 'text-[10px] leading-[0.875rem] tracking-[0.12em] uppercase';
    $primaryButton = 'inline-flex items-center justify-center border-2 border-eccentric-blue bg-eccentric-blue px-8 py-4 text-xs tracking-[0.08em] text-white uppercase transition-colors hover:bg-white hover:text-eccentric-blue';
    $secondaryButton = 'inline-flex items-center justify-center border border-black bg-white px-8 py-4 text-xs tracking-[0.08em] text-black uppercase transition-colors hover:bg-black hover:text-white';
    $arrowDown = '<svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M12 4v16M6 14l6 6 6-6"/></svg>';
    $check = '<svg class="size-4 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M4 12l6 6L20 6"/></svg>';
@endphp

@section('content')
    <div class="font-space text-black">
        {{-- ============ HERO & TELEMETRY ============ --}}
        <section class="relative overflow-hidden border-b border-black/10 bg-white px-4 py-16 sm:px-6 lg:px-12 lg:py-24" aria-labelledby="home-heading">
            <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(to_right,#000_1px,transparent_1px),linear-gradient(to_bottom,#000_1px,transparent_1px)] bg-[size:48px_48px] opacity-[0.03]" aria-hidden="true"></div>

            <div class="relative mx-auto flex max-w-7xl flex-col gap-16">
                <div class="flex flex-wrap items-center justify-between gap-4 border-b border-black pb-4">
                    <div class="flex items-center gap-3">
                        <span class="inline-block size-2.5 bg-eccentric-blue"></span>
                        <span class="{{ $label }}">Enterprise digital transformation // 24/7 autonomous logic</span>
                    </div>
                    <div class="{{ $label }} hidden items-center gap-4 text-[#808080] md:flex">
                        <span>Spec_v1.0</span><span>Deterministic_runtime: active</span><span class="font-bold text-eccentric-blue">Node_01//sys_stable</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-12 lg:gap-8">
                    <div class="flex flex-col gap-8 lg:col-span-7">
                        <div class="flex flex-col gap-4">
                            <div class="inline-flex w-fit items-center border border-black/10 bg-[#f5f5f7] px-3 py-1"><span class="{{ $label }}">Core architecture manifesto</span></div>
                            <h1 id="home-heading" class="text-[2.5rem] leading-[3rem] tracking-tight uppercase lg:text-5xl lg:leading-[1.1]">Where the logics never prank.<br><span class="text-eccentric-blue">Engineered digital systems</span> for global scale.</h1>
                            <p class="max-w-2xl text-lg leading-[1.6] text-[#808080]">We free ambitious enterprises from manual friction by delivering 24/7 accessible AI agents, automated workflow orchestration, and resilient custom architectures across Healthcare, Real Estate, and Hospitality.</p>
                        </div>
                        <div class="flex flex-wrap items-center gap-4 pt-2">
                            <a href="#evaluation" class="{{ $primaryButton }}">Launch System Evaluation</a>
                            <a href="{{ route('work') }}" class="{{ $secondaryButton }}">Inspect Architectural Portfolio</a>
                        </div>
                        <div class="flex flex-col gap-2 border border-black/15 bg-[#f5f5f7] p-4 {{ $label }}">
                            <div class="flex items-center justify-between border-b border-black/10 pb-2 text-[#808080]"><span>Terminal stream: runtime_logger</span><span class="animate-pulse text-eccentric-blue">● Broadcasting</span></div>
                            <div class="flex items-center gap-3"><span class="text-eccentric-blue">&gt;&gt;</span><span>Verifying state integrity: zero guesswork tolerance detected. Ready for deployment.</span></div>
                        </div>
                    </div>

                    <div class="relative flex flex-col justify-between border-2 border-black bg-white p-6 shadow-[4px_4px_0_0_#000] lg:col-span-5">
                        <div class="mb-6 flex items-center justify-between border-b border-black pb-4">
                            <div class="text-xs font-bold tracking-widest uppercase">Logic topology map // Level-0</div>
                            <span class="border border-eccentric-blue px-2 py-0.5 text-[10px] font-bold text-eccentric-blue">LIVE FLOW</span>
                        </div>
                        <div class="flex flex-col gap-4 py-2">
                            @foreach ($topology as $node)
                                @if (! $loop->first)
                                    <div class="-my-2 flex justify-center text-eccentric-blue">{!! $arrowDown !!}</div>
                                @endif
                                <div @class(['p-4', 'border-2 border-eccentric-blue bg-white shadow-[2px_2px_0_0_#0049FD]' => $node['core'] ?? false, 'group border border-black bg-[#f5f5f7] p-3.5 transition-colors hover:border-eccentric-blue' => ! ($node['core'] ?? false)])>
                                    <div class="mb-1 flex items-center justify-between">
                                        <span @class([$label, 'font-bold text-eccentric-blue' => $node['core'] ?? false, 'text-[#808080]' => ! ($node['core'] ?? false)])>{{ $node['step'] }}</span>
                                        @if ($node['core'] ?? false)
                                            <span class="bg-eccentric-blue px-1.5 text-[9px] text-white uppercase">Zero prank core</span>
                                        @else
                                            <span class="size-2 bg-eccentric-blue"></span>
                                        @endif
                                    </div>
                                    <div class="text-xl leading-7 font-bold uppercase">{{ $node['title'] }}</div>
                                    <div @class(['text-sm', 'text-black' => $node['core'] ?? false, 'text-[#808080]' => ! ($node['core'] ?? false)])>{{ $node['text'] }}</div>
                                    @if ($node['core'] ?? false)
                                        <div class="mt-2 flex justify-between border-t border-black/10 pt-2 text-[10px] text-[#808080]"><span>LATENCY: 0.04ms</span><span class="text-eccentric-blue">CONCURRENCY: 10K OPS/SEC</span></div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6 flex items-center justify-between border-t border-black pt-4 {{ $label }} text-[#808080]"><span>Signal status: continuous</span><span class="font-bold text-black">Recursion: negative</span></div>
                    </div>
                </div>

                <div class="mt-8 grid grid-cols-1 border-t border-l border-black md:grid-cols-2 lg:grid-cols-4">
                    @foreach ($telemetry as $stat)
                        <div class="flex flex-col justify-between gap-4 border-r border-b border-black bg-white p-6">
                            <div class="flex items-start justify-between"><span class="{{ $label }} text-[#808080]">Telemetry_{{ sprintf('%02d', $loop->iteration) }}</span><span class="size-2 bg-eccentric-blue"></span></div>
                            <div>
                                <div class="text-[40px] leading-tight font-bold">{{ $stat['value'] }}</div>
                                <div class="mt-1 text-xs tracking-[0.08em] uppercase">{{ $stat['label'] }}</div>
                                <p class="mt-2 text-sm text-[#808080]">{{ $stat['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============ SOLUTIONS MATRIX ============ --}}
        <section id="matrix" class="border-b border-black/10 bg-white px-4 py-20 sm:px-6 lg:px-12" aria-labelledby="matrix-heading">
            <div class="mx-auto flex max-w-7xl flex-col gap-12">
                <div class="flex flex-col justify-between gap-6 border-b border-black pb-6 md:flex-row md:items-end">
                    <div>
                        <span class="{{ $label }} mb-2 block font-bold text-eccentric-blue">Disciplined digital craft // Modular stack</span>
                        <h2 id="matrix-heading" class="text-[2.25rem] leading-[2.75rem] tracking-tight uppercase">Engineered Solutions Matrix</h2>
                    </div>
                    <p class="max-w-md text-sm text-[#808080]">High-integrity components built with absolute modularity. Every solution is pre-validated to integrate cleanly into active operational architectures.</p>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                    @foreach ($solutions as $solution)
                        <a href="{{ $solution['url'] }}" class="group flex flex-col justify-between gap-8 border border-black bg-white p-6 transition-colors hover:border-eccentric-blue" data-reveal>
                            <div class="flex flex-col gap-4">
                                <div class="flex items-center justify-between border-b border-black/10 pb-3">
                                    <span class="{{ $label }} font-bold transition-colors group-hover:text-eccentric-blue">{{ $solution['tag'] }}</span>
                                    <svg class="size-5 transition-colors group-hover:text-eccentric-blue" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="{{ $solution['icon'] }}"/></svg>
                                </div>
                                <h3 class="text-2xl leading-8 tracking-tight uppercase">{{ $solution['title'] }}</h3>
                                <p class="text-sm leading-relaxed text-[#808080]">{{ $solution['text'] }}</p>
                            </div>
                            <div class="{{ $label }} flex items-center justify-between border-t border-black/10 pt-4"><span>{{ $solution['status'] }}</span><span class="text-eccentric-blue transition-transform group-hover:translate-x-1">-&gt;</span></div>
                        </a>
                    @endforeach
                </div>

                <div class="flex flex-wrap items-center justify-between gap-4 pt-4">
                    <a href="{{ route('services') }}" class="group inline-flex items-center gap-3 text-xs tracking-[0.08em] uppercase transition-colors hover:text-eccentric-blue"><span>Explore All System Services</span><span class="text-eccentric-blue transition-transform group-hover:translate-x-1">-&gt;</span></a>
                    <span class="{{ $label }} text-[#808080]">Index reference // Matrix_sec_02</span>
                </div>
            </div>
        </section>

        {{-- ============ INDUSTRY SHOWCASE ============ --}}
        <section class="border-b border-black/10 bg-[#f5f5f7] px-4 py-20 sm:px-6 lg:px-12" aria-labelledby="industry-heading">
            <div class="mx-auto flex max-w-7xl flex-col gap-12">
                <div class="flex flex-col gap-2">
                    <span class="{{ $label }} font-bold text-eccentric-blue">Vertical deployments // Measurable field metrics</span>
                    <h2 id="industry-heading" class="text-[2.25rem] leading-[2.75rem] tracking-tight uppercase">Industry Transformation Showcase</h2>
                </div>

                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                    @foreach ($industries as $industry)
                        <article class="flex flex-col justify-between border border-black bg-white" data-reveal>
                            <div class="border-b border-black p-6">
                                <div class="mb-4 flex items-center justify-between">
                                    <span class="{{ $label }} border border-black/10 bg-[#f5f5f7] px-2 py-0.5">{{ $industry['tag'] }}</span>
                                    <span class="{{ $label }} font-bold text-eccentric-blue">{{ $industry['badge'] }}</span>
                                </div>
                                <div class="relative mb-4 h-44 w-full overflow-hidden border border-black/10 bg-[#f5f5f7]">
                                    <img src="{{ asset('images/home/'.$industry['image'].'.webp') }}" alt="" class="size-full object-cover" width="512" height="280" loading="lazy">
                                    <div class="absolute right-2 bottom-2 bg-black px-2 py-0.5 text-[10px] text-white">{{ $industry['caption'] }}</div>
                                </div>
                                <h3 class="mb-2 text-2xl leading-8 uppercase">{{ $industry['title'] }}</h3>
                                <p class="text-sm leading-relaxed text-[#808080]">{{ $industry['text'] }}</p>
                            </div>
                            <div class="flex flex-col gap-2 bg-white p-6">
                                <div class="{{ $label }} text-[#808080]">Performance outcome</div>
                                <div class="flex items-baseline gap-2"><span class="text-[32px] font-bold">{{ $industry['metric'] }}</span><span class="text-xs font-bold tracking-[0.08em] text-eccentric-blue uppercase">{{ $industry['metricLabel'] }}</span></div>
                                <div class="mt-2 h-1.5 w-full bg-[#f5f5f7]"><div class="h-1.5 bg-eccentric-blue {{ $industry['bar'] }}"></div></div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============ ENGINEERING PHILOSOPHY ============ --}}
        <section class="border-b border-black/10 bg-white px-4 py-20 sm:px-6 lg:px-12" aria-labelledby="philosophy-heading">
            <div class="mx-auto flex max-w-7xl flex-col gap-12">
                <div class="flex flex-col items-start justify-between gap-6 border-b-2 border-black pb-8 md:flex-row md:items-end">
                    <div class="flex flex-col gap-3">
                        <span class="{{ $label }} font-bold text-eccentric-blue">Foundational ethos // Architectural code</span>
                        <h2 id="philosophy-heading" class="text-[2.25rem] leading-[2.75rem] tracking-tight uppercase lg:text-[40px]">The Engineering Philosophy</h2>
                    </div>
                    <div class="bg-black px-5 py-3 text-xs tracking-widest text-white uppercase">Every deliverable is engineered, not guessed.</div>
                </div>

                <div class="grid grid-cols-1 border-t border-l border-black sm:grid-cols-2 md:grid-cols-5">
                    @foreach ($values as $value)
                        <div class="flex min-h-[220px] flex-col justify-between border-r border-b border-black bg-white p-6">
                            <div>
                                <div class="{{ $label }} mb-2 font-bold text-eccentric-blue">{{ sprintf('%02d', $loop->iteration) }} // Metric</div>
                                <h3 class="mb-3 text-2xl leading-8 uppercase">{{ $value['title'] }}</h3>
                                <p class="text-sm text-[#808080]">{{ $value['text'] }}</p>
                            </div>
                            <div class="{{ $label }} border-t border-black/10 pt-4">{{ $value['stat'] }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col items-center justify-between gap-6 border border-black bg-[#f5f5f7] p-6 md:flex-row">
                    <div class="flex items-center gap-4"><span class="size-3 shrink-0 bg-eccentric-blue"></span><span class="text-xl leading-7 font-bold uppercase">Conventional guesswork vs. Compiling Logics architecture</span></div>
                    <div class="{{ $label }} text-[#808080]">Deterministic verification certified // Audit #CL-8894</div>
                </div>
            </div>
        </section>

        {{-- ============ CONSULTATION BANNER ============ --}}
        <section id="evaluation" class="bg-white px-4 py-20 sm:px-6 lg:px-12" aria-labelledby="evaluation-heading">
            <div class="mx-auto max-w-7xl">
                <div class="relative border-2 border-black bg-white p-8 shadow-[8px_8px_0_0_#0049FD] lg:p-14">
                    <div class="{{ $label }} absolute top-0 right-0 bg-eccentric-blue px-4 py-1 text-white">Protocol: Intake active</div>
                    <div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12">
                        <div class="flex flex-col gap-6 lg:col-span-8">
                            <div class="flex items-center gap-3"><span class="size-2.5 bg-eccentric-blue"></span><span class="{{ $label }} font-bold">Initiate runtime evaluation // No compromise architecture</span></div>
                            <h2 id="evaluation-heading" class="text-[2.5rem] leading-[3rem] tracking-tight uppercase lg:text-[42px] lg:leading-[1.15]">Ready to free your enterprise from <span class="text-eccentric-blue">manual computational friction</span>?</h2>
                            <p class="max-w-2xl text-lg leading-relaxed text-[#808080]">Book a direct architectural review with our engineering leadership. We evaluate your active workflows, diagnose data bottlenecks, and demonstrate deterministic AI pipelines tailored to your industry.</p>
                            <div class="flex flex-wrap items-center gap-6 pt-2 {{ $label }} text-[#808080]">
                                @foreach (['Direct Engineer Consult', 'Zero Hallucination Blueprint', 'Fixed Scope SOW'] as $point)
                                    <div class="flex items-center gap-2">{!! $check !!}<span>{{ $point }}</span></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex flex-col gap-4 border-t border-black/15 pt-6 lg:col-span-4 lg:border-t-0 lg:border-l lg:pt-0 lg:pl-8">
                            <div class="text-xs font-bold tracking-[0.08em] uppercase">System evaluation dispatch</div>
                            <a href="{{ route('contact') }}" class="{{ $primaryButton }} w-full py-5 tracking-widest">Schedule Architecture Deep-Dive</a>
                            <a href="{{ route('work') }}" class="{{ $secondaryButton }} w-full tracking-widest">Review System Blueprints</a>
                            <div class="{{ $label }} mt-1 text-center text-[#808080]">Estimated response latency: &lt; 2 hours</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
