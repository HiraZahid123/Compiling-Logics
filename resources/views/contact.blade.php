@extends('layouts.site')

@section('title', 'Contact — Compiling Logics')
@section('description', 'Initiate an architectural inquiry: connect directly with Compiling Logics engineering and automation architects, or book a call.')

@php
    $selectedDomain = old('pillars.0', 'AI Agent Deployment');
@endphp

@section('content')
<div class="flex flex-col w-full bg-pure-white text-deep-black">
<!-- Top Technical Status Bar -->
<section class="w-full bg-gray-subtle border-b border-deep-black/10">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 py-3 flex flex-wrap items-center justify-between gap-4 font-label-sm text-label-sm uppercase tracking-widest text-technical-gray">
<div class="flex items-center gap-3">
<span class="inline-block w-2 h-2 bg-eccentric-blue"></span>
<span class="text-deep-black font-medium">DISPATCH TELEMETRY ACTIVE</span>
<span class="text-deep-black/30">|</span>
<span>GATEWAY: COMP-IN-09</span>
</div>
<div class="flex items-center gap-6">
<span>ENCRYPTION: 4096-BIT RSA / ZERO-DATA LEAK</span>
<span class="text-eccentric-blue font-medium">DISPATCH STATUS: NORMAL RUNTIME</span>
</div>
</div>
</section>
<!-- Hero Section -->
<section class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 pt-12 pb-10 border-b border-deep-black/10">
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
<div class="max-w-3xl">
<div class="flex items-center gap-2 mb-3">
<span class="w-1.5 h-1.5 bg-eccentric-blue"></span>
<span class="font-label-md text-label-md uppercase tracking-widest text-eccentric-blue">COMMUNICATIONS &amp; DISPATCH // DIRECT ACCESS</span>
</div>
<h1 class="font-display-lg text-display-lg-mobile md:text-display-lg tracking-tight uppercase text-deep-black leading-none mb-4">
          Initiate Architectural Inquiry.
        </h1>
<p class="font-body-lg text-body-lg text-secondary max-w-2xl">
          Connect directly with our engineering and automation architects. 24/7 response commitment across all global timezones with deterministic technical evaluation.
        </p>
</div>
<!-- Quick Metrics Pill -->
<div class="flex lg:flex-col items-start gap-4 lg:items-end border-l lg:border-l-0 lg:border-t-0 border-deep-black/10 pl-6 lg:pl-0">
<div class="text-left lg:text-right">
<div class="font-label-sm text-label-sm uppercase tracking-widest text-technical-gray">Mean Engineering Response</div>
<div class="font-headline-md text-headline-md text-deep-black tracking-tight flex items-baseline lg:justify-end gap-1">
<span>&lt; 14</span><span class="text-eccentric-blue font-label-md text-label-md">MINUTES</span>
</div>
</div>
<div class="text-left lg:text-right">
<div class="font-label-sm text-label-sm uppercase tracking-widest text-technical-gray">Deterministic Guarantee</div>
<div class="font-label-md text-label-md text-deep-black uppercase tracking-wider bg-gray-subtle px-2.5 py-1 border border-deep-black/10">
            ZERO HALLUCINATION PROTOCOL
          </div>
</div>
</div>
</div>
</section>
<!-- Main Modular Console: Left Form & Right Operations -->
<section class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 py-12">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
<!-- LEFT COLUMN: Intake Console (7 Cols) -->
<div class="lg:col-span-7 bg-pure-white border border-deep-black p-6 sm:p-8 relative">
<div class="flex items-center justify-between border-b border-deep-black/10 pb-4 mb-8">
<div>
<span class="font-label-sm text-label-sm text-eccentric-blue uppercase tracking-widest block">SYS_CONSOLE // PR-01</span>
<h2 class="font-headline-md text-headline-md text-deep-black uppercase tracking-wide">Project Intake Specification</h2>
</div>
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-none bg-eccentric-blue animate-pulse"></span>
<span class="font-label-sm text-label-sm text-deep-black uppercase tracking-widest">INPUT CONSOLE READY</span>
</div>
</div>
<form class="space-y-6" id="contact-form" method="POST" action="{{ route('contact.store') }}">
@csrf
<!-- Field 01 -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="flex flex-col space-y-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-deep-black flex items-center justify-between" for="fullName">
<span>01. Full Name</span>
<span class="text-eccentric-blue">*REQUIRED</span>
</label>
<input class="w-full bg-pure-white text-deep-black px-3.5 py-2.5 border border-technical-gray focus:border-2 focus:border-eccentric-blue focus:outline-none font-body-md text-body-md placeholder:text-technical-gray/50 transition-colors" id="fullName" name="name" value="{{ old('name') }}" placeholder="Dr. Evelyn Vance" required maxlength="255" autocomplete="name" type="text">
</div>
<div class="flex flex-col space-y-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-deep-black flex items-center justify-between" for="companyDomain">
<span>Company Domain</span>
<span class="text-eccentric-blue">*REQUIRED</span>
</label>
<input class="w-full bg-pure-white text-deep-black px-3.5 py-2.5 border border-technical-gray focus:border-2 focus:border-eccentric-blue focus:outline-none font-body-md text-body-md placeholder:text-technical-gray/50 transition-colors" id="companyDomain" name="company_domain" value="{{ old('company_domain') }}" placeholder="vancehealth.org" required maxlength="255" autocomplete="url" type="text">
</div>
</div>
<!-- Field 02 -->
<div class="flex flex-col space-y-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-deep-black flex items-center justify-between" for="workEmail">
<span>02. Corporate Email Address</span>
<span class="text-technical-gray">NO GENERIC INBOXES</span>
</label>
<input class="w-full bg-pure-white text-deep-black px-3.5 py-2.5 border border-technical-gray focus:border-2 focus:border-eccentric-blue focus:outline-none font-body-md text-body-md placeholder:text-technical-gray/50 transition-colors" id="workEmail" name="email" value="{{ old('email') }}" placeholder="evance@vancehealth.org" required maxlength="255" autocomplete="email" type="email">
</div>
<!-- Field 03: Interactive Domain Selector -->
<div class="flex flex-col space-y-2">
<p class="font-label-sm text-label-sm uppercase tracking-wider text-deep-black flex items-center justify-between">
<span>03. Primary Domain of Interest</span>
<span class="text-eccentric-blue" id="selected-domain-label" data-domain-label>SELECTED: {{ strtoupper($selectedDomain) }}</span>
</p>
<div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
<label class="domain-btn group cursor-pointer text-left p-3 border border-deep-black/20 hover:border-deep-black bg-pure-white hover:bg-gray-subtle transition-all has-checked:bg-deep-black has-checked:text-pure-white has-checked:border-deep-black has-focus-visible:outline-2 has-focus-visible:outline-offset-2 has-focus-visible:outline-eccentric-blue">
<input type="radio" name="pillars[]" value="AI Agent Deployment" class="sr-only" data-domain-pick @checked($selectedDomain === 'AI Agent Deployment')>
<span class="font-label-sm text-label-sm text-technical-gray block mb-1 group-has-checked:text-eccentric-blue">03A</span>
<span class="font-body-sm text-body-sm font-medium uppercase tracking-tight block">AI Agent Deployment</span>
</label>
<label class="domain-btn group cursor-pointer text-left p-3 border border-deep-black/20 hover:border-deep-black bg-pure-white hover:bg-gray-subtle transition-all has-checked:bg-deep-black has-checked:text-pure-white has-checked:border-deep-black has-focus-visible:outline-2 has-focus-visible:outline-offset-2 has-focus-visible:outline-eccentric-blue">
<input type="radio" name="pillars[]" value="Workflow Automation" class="sr-only" data-domain-pick @checked($selectedDomain === 'Workflow Automation')>
<span class="font-label-sm text-label-sm text-technical-gray block mb-1 group-has-checked:text-eccentric-blue">03B</span>
<span class="font-body-sm text-body-sm font-medium uppercase tracking-tight block">Workflow Automation</span>
</label>
<label class="domain-btn group cursor-pointer text-left p-3 border border-deep-black/20 hover:border-deep-black bg-pure-white hover:bg-gray-subtle transition-all has-checked:bg-deep-black has-checked:text-pure-white has-checked:border-deep-black has-focus-visible:outline-2 has-focus-visible:outline-offset-2 has-focus-visible:outline-eccentric-blue">
<input type="radio" name="pillars[]" value="Custom Cloud App" class="sr-only" data-domain-pick @checked($selectedDomain === 'Custom Cloud App')>
<span class="font-label-sm text-label-sm text-technical-gray block mb-1 group-has-checked:text-eccentric-blue">03C</span>
<span class="font-body-sm text-body-sm font-medium uppercase tracking-tight block">Custom Cloud App</span>
</label>
<label class="domain-btn group cursor-pointer text-left p-3 border border-deep-black/20 hover:border-deep-black bg-pure-white hover:bg-gray-subtle transition-all has-checked:bg-deep-black has-checked:text-pure-white has-checked:border-deep-black has-focus-visible:outline-2 has-focus-visible:outline-offset-2 has-focus-visible:outline-eccentric-blue">
<input type="radio" name="pillars[]" value="Healthcare Solution" class="sr-only" data-domain-pick @checked($selectedDomain === 'Healthcare Solution')>
<span class="font-label-sm text-label-sm text-technical-gray block mb-1 group-has-checked:text-eccentric-blue">03D</span>
<span class="font-body-sm text-body-sm font-medium uppercase tracking-tight block">Healthcare (HIPAA)</span>
</label>
<label class="domain-btn group cursor-pointer text-left p-3 border border-deep-black/20 hover:border-deep-black bg-pure-white hover:bg-gray-subtle transition-all has-checked:bg-deep-black has-checked:text-pure-white has-checked:border-deep-black has-focus-visible:outline-2 has-focus-visible:outline-offset-2 has-focus-visible:outline-eccentric-blue">
<input type="radio" name="pillars[]" value="Real Estate / PropTech" class="sr-only" data-domain-pick @checked($selectedDomain === 'Real Estate / PropTech')>
<span class="font-label-sm text-label-sm text-technical-gray block mb-1 group-has-checked:text-eccentric-blue">03E</span>
<span class="font-body-sm text-body-sm font-medium uppercase tracking-tight block">Real Estate / PropTech</span>
</label>
<label class="domain-btn group cursor-pointer text-left p-3 border border-deep-black/20 hover:border-deep-black bg-pure-white hover:bg-gray-subtle transition-all has-checked:bg-deep-black has-checked:text-pure-white has-checked:border-deep-black has-focus-visible:outline-2 has-focus-visible:outline-offset-2 has-focus-visible:outline-eccentric-blue">
<input type="radio" name="pillars[]" value="Hospitality Engine" class="sr-only" data-domain-pick @checked($selectedDomain === 'Hospitality Engine')>
<span class="font-label-sm text-label-sm text-technical-gray block mb-1 group-has-checked:text-eccentric-blue">03F</span>
<span class="font-body-sm text-body-sm font-medium uppercase tracking-tight block">Hospitality Engine</span>
</label>
</div>
</div>
<!-- Field 04 -->
<div class="flex flex-col space-y-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-deep-black flex items-center justify-between" for="targetMetric">
<span>04. Operational Bottleneck or Target Metric</span>
<span class="text-technical-gray">QUANTITATIVE BENCHMARK</span>
</label>
<input class="w-full bg-pure-white text-deep-black px-3.5 py-2.5 border border-technical-gray focus:border-2 focus:border-eccentric-blue focus:outline-none font-body-md text-body-md placeholder:text-technical-gray/50 transition-colors" id="targetMetric" name="target_metric" value="{{ old('target_metric') }}" placeholder="e.g. Cut claim verification latency from 72h to 3m; eliminate sync failure" maxlength="500" type="text">
</div>
<!-- Field 05 -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="flex flex-col space-y-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-deep-black" for="techStack">
                05A. Existing Architecture &amp; Stack
              </label>
<input class="w-full bg-pure-white text-deep-black px-3.5 py-2.5 border border-technical-gray focus:border-2 focus:border-eccentric-blue focus:outline-none font-body-md text-body-md placeholder:text-technical-gray/50 transition-colors" id="techStack" name="tech_stack" value="{{ old('tech_stack') }}" placeholder="PostgreSQL, AWS EKS, HL7/FHIR, Epic" maxlength="500" type="text">
</div>
<div class="flex flex-col space-y-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-deep-black" for="timeline">
                05B. Deployment Target Window
              </label>
<select class="w-full bg-pure-white text-deep-black px-3.5 py-2.5 border border-technical-gray focus:border-2 focus:border-eccentric-blue focus:outline-none font-body-md text-body-md transition-colors rounded-none appearance-none" id="timeline" name="timeline">
<option value="immediate" @selected(old('timeline') === 'immediate')>Immediate Dispatch (Under 30 Days)</option>
<option value="quarter" @selected(old('timeline') === 'quarter')>Q2 Strategic Implementation (60–90 Days)</option>
<option value="longterm" @selected(old('timeline') === 'longterm')>Enterprise Modernization (6+ Months)</option>
<option value="audit" @selected(old('timeline') === 'audit')>Architecture Audit &amp; Feasibility Only</option>
</select>
</div>
</div>
<!-- Field 06 -->
<div class="flex flex-col space-y-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-deep-black flex items-center justify-between" for="brief">
<span>06. Project Description &amp; Architectural Brief</span>
<span class="text-technical-gray">PLAIN TEXT FORMAT</span>
</label>
<textarea class="w-full bg-pure-white text-deep-black px-3.5 py-2.5 border border-technical-gray focus:border-2 focus:border-eccentric-blue focus:outline-none font-body-md text-body-md placeholder:text-technical-gray/50 transition-colors resize-y" id="brief" name="message" placeholder="Detail the deterministic flow required, current data volume, integration touchpoints, and fault tolerance criteria..." rows="4" required maxlength="5000">{{ old('message') }}</textarea>
</div>
<x-recaptcha />
<!-- Submit Button & Security Note -->
<div class="pt-4 border-t border-deep-black/10 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4">
<button class="inline-flex items-center justify-center gap-3 bg-eccentric-blue text-pure-white px-8 py-3.5 font-label-md text-label-md uppercase tracking-wider border-2 border-eccentric-blue hover:bg-pure-white hover:text-eccentric-blue transition-colors cursor-pointer group" id="submit-btn" type="submit">
<span>Submit System Specification</span>
<svg class="size-[18px] shrink-0 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M4 12h16M14 6l6 6-6 6"></svg>
</button>
<div class="flex items-center gap-2 text-technical-gray font-label-sm text-label-sm tracking-wider uppercase">
<svg class="size-[16px] shrink-0 text-deep-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M5 11h14v10H5zM8 11V7a4 4 0 0 1 8 0v4"></svg>
<span>Encrypted submission. NDA guaranteed by default.</span>
</div>
</div>
<!-- Form Feedback Message Container -->
<div role="status">
@if (session('status') === 'contact-message-sent')
<div class="p-4 border border-eccentric-blue bg-gray-subtle">
<div class="flex items-start gap-3">
<svg class="size-5 shrink-0 text-eccentric-blue" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M12 2l2.6 2 3.2-.4.9 3.1 2.9 1.5-1.2 3 1.2 3-2.9 1.5-.9 3.1-3.2-.4L12 22l-2.6-2-3.2.4-.9-3.1-2.9-1.5 1.2-3-1.2-3 2.9-1.5.9-3.1 3.2.4zM8.5 12l2.5 2.5 4.5-5"></svg>
<div>
<p class="font-headline-sm text-headline-sm uppercase text-deep-black">Message Received</p>
<p class="font-body-sm text-body-sm text-secondary mt-1">Thanks — your message is on its way. We'll get back to you soon.</p>
</div>
</div>
</div>
@elseif ($errors->any())
<ul class="p-4 border border-[#d33] bg-[#fdf2f2] font-body-sm text-body-sm text-[#a11]">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif
</div>
</form>
</div>
<!-- RIGHT COLUMN: Global Operations & Support Directives (5 Cols) -->
<div class="lg:col-span-5 space-y-6">
<!-- SLA Status Monitor Card -->
<div class="bg-deep-black text-pure-white p-6 border border-deep-black">
<div class="flex items-center justify-between border-b border-white/20 pb-3 mb-4">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-eccentric-blue">ACTIVE LOGIC MONITOR</span>
<span class="flex items-center gap-1.5 text-pure-white font-label-sm text-label-sm">
<span class="inline-block w-2 h-2 bg-eccentric-blue animate-ping"></span>
              LIVE DISPATCH
            </span>
</div>
<div class="space-y-4">
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-technical-gray block">System Status</span>
<span class="font-body-md text-body-md text-pure-white font-medium">All 24/7 Dispatch Queues Operational</span>
</div>
<svg class="size-[20px] shrink-0 text-pure-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18zM8 12l3 3 5-6"></svg>
</div>
<div class="h-px bg-white/10 w-full"></div>
<div class="flex items-start justify-between">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-technical-gray block">Average Initial Triage Time</span>
<span class="font-display-lg text-[2rem] leading-none text-pure-white tracking-tight">14 Minutes</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-eccentric-blue border border-eccentric-blue px-2 py-0.5 mt-1">SLA TIED</span>
</div>
<div class="h-px bg-white/10 w-full"></div>
<div class="flex items-center justify-between text-technical-gray font-label-sm text-label-sm uppercase tracking-widest">
<span>UPTIME RATE: 99.998%</span>
<span>RUNTIMES: 0 FAULT ERRORS</span>
</div>
</div>
</div>
<!-- Direct Channels Module -->
<div class="bg-pure-white border border-deep-black p-6">
<div class="flex items-center justify-between border-b border-deep-black/10 pb-3 mb-4">
<h3 class="font-headline-sm text-headline-sm uppercase text-deep-black tracking-wide">Direct Routing Channels</h3>
<span class="font-label-sm text-label-sm text-technical-gray uppercase">DIRECT LINE</span>
</div>
<div class="space-y-4">
<!-- Channel 1 -->
<div class="p-3 bg-gray-subtle border border-deep-black/10 hover:border-eccentric-blue transition-colors group">
<div class="font-label-sm text-label-sm uppercase text-technical-gray tracking-wider">Enterprise Inquiries &amp; Architect Consultation</div>
<a class="font-body-lg text-body-lg text-deep-black group-hover:text-eccentric-blue transition-colors font-medium flex items-center justify-between mt-1" href="mailto:enterprise@compilinglogics.com">
<span>enterprise@compilinglogics.com</span>
<svg class="size-[18px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M6 18 18 6M8 6h10v10"></svg>
</a>
</div>
<!-- Channel 2 -->
<div class="p-3 bg-gray-subtle border border-deep-black/10 hover:border-eccentric-blue transition-colors group">
<div class="font-label-sm text-label-sm uppercase text-technical-gray tracking-wider">24/7 Technical Support Desk</div>
<a class="font-body-lg text-body-lg text-deep-black group-hover:text-eccentric-blue transition-colors font-medium flex items-center justify-between mt-1" href="mailto:support@compilinglogics.com">
<span>support@compilinglogics.com</span>
<svg class="size-[18px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M6 18 18 6M8 6h10v10"></svg>
</a>
</div>
<!-- Channel 3 -->
<div class="p-3 bg-gray-subtle border border-deep-black/10 hover:border-eccentric-blue transition-colors group">
<div class="font-label-sm text-label-sm uppercase text-technical-gray tracking-wider">Brand Guardian &amp; Press Operations</div>
<a class="font-body-lg text-body-lg text-deep-black group-hover:text-eccentric-blue transition-colors font-medium flex items-center justify-between mt-1" href="mailto:press@compilinglogics.com">
<span>press@compilinglogics.com</span>
<svg class="size-[18px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M6 18 18 6M8 6h10v10"></svg>
</a>
</div>
</div>
</div>
<!-- Global Node Presences -->
<div class="bg-pure-white border border-deep-black p-6">
<div class="flex items-center justify-between border-b border-deep-black/10 pb-3 mb-4">
<h3 class="font-headline-sm text-headline-sm uppercase text-deep-black tracking-wide">Global Node Presences</h3>
<span class="font-label-sm text-label-sm text-eccentric-blue uppercase">3 NODES</span>
</div>
<div class="grid grid-cols-1 gap-3">
<div class="flex items-start gap-3 p-3 border border-deep-black/10">
<svg class="size-[20px] shrink-0 text-deep-black mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21zM12 7a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5z"></svg>
<div class="flex-1">
<div class="flex items-center justify-between">
<span class="font-body-sm text-body-sm font-semibold uppercase text-deep-black">North America Hub</span>
<span class="font-label-sm text-label-sm text-technical-gray uppercase">EST // ACTIVE</span>
</div>
<p class="font-body-sm text-body-sm text-secondary mt-0.5">Silicon Alley &amp; Boston Corridor Operations</p>
</div>
</div>
<div class="flex items-start gap-3 p-3 border border-deep-black/10">
<svg class="size-[20px] shrink-0 text-deep-black mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21zM12 7a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5z"></svg>
<div class="flex-1">
<div class="flex items-center justify-between">
<span class="font-body-sm text-body-sm font-semibold uppercase text-deep-black">London Engineering Hub</span>
<span class="font-label-sm text-label-sm text-technical-gray uppercase">GMT // ACTIVE</span>
</div>
<p class="font-body-sm text-body-sm text-secondary mt-0.5">1 Finsbury Avenue, Central Technical District</p>
</div>
</div>
<div class="flex items-start gap-3 p-3 border border-deep-black/10">
<svg class="size-[20px] shrink-0 text-deep-black mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21zM12 7a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5z"></svg>
<div class="flex-1">
<div class="flex items-center justify-between">
<span class="font-body-sm text-body-sm font-semibold uppercase text-deep-black">Singapore APAC Operations</span>
<span class="font-label-sm text-label-sm text-technical-gray uppercase">SGT // ACTIVE</span>
</div>
<p class="font-body-sm text-body-sm text-secondary mt-0.5">Marina One East Tower, Tier-4 Logic Engine</p>
</div>
</div>
</div>
</div>
<!-- Emergency Escalation & PGP Security Key -->
<div class="border border-deep-black p-6 bg-gray-subtle">
<div class="flex items-start gap-4">
<div class="w-10 h-10 bg-deep-black text-pure-white flex items-center justify-center shrink-0">
<svg class="size-[22px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M3 5h18v14H3zM7 10l2.5 2L7 14M12 14h5"></svg>
</div>
<div class="flex-1">
<div class="font-label-sm text-label-sm uppercase tracking-widest text-deep-black font-semibold">Priority Escalation Hotline</div>
<div class="font-headline-sm text-headline-sm text-deep-black mt-0.5 tracking-tight">+1 (888) 902-LOGIC</div>
<p class="font-body-sm text-body-sm text-secondary mt-1">Restricted to tier-1 enterprise SLA production outages and active automated failovers.</p>
<div class="mt-4 pt-4 border-t border-deep-black/10 flex items-center justify-between">
<a class="inline-flex items-center gap-1.5 font-label-md text-label-md uppercase tracking-wider text-eccentric-blue hover:text-deep-black transition-colors underline underline-offset-4" href="mailto:info@compilinglogics.com?subject=PGP%20public%20key%20request">
<svg class="size-[16px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M15 3a6 6 0 0 0-5.7 7.9L3 17.2V21h3.8l.9-.9v-2h2v-2h2l1.1-1.1A6 6 0 1 0 15 3zM16.5 7.5h.01"></svg>
<span>Download Architectural PGP Public Key</span>
</a>
<span class="font-label-sm text-label-sm text-technical-gray">REV 2026.1</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Calendly Booking -->
<section class="w-full max-w-7xl mx-auto px-4 sm:px-4 sm:px-6 lg:px-12 pb-12 scroll-mt-6" id="booking" aria-labelledby="booking-heading">
<div class="bg-pure-white border border-deep-black p-6 sm:p-8">
<div class="flex flex-wrap items-center justify-between gap-4 border-b border-deep-black/10 pb-4 mb-6">
<div>
<span class="font-label-sm text-label-sm text-eccentric-blue uppercase tracking-widest block">SYS_SCHEDULER // CAL-01</span>
<h2 class="font-headline-md text-headline-md text-deep-black uppercase tracking-wide" id="booking-heading">Book a Call</h2>
</div>
<div class="flex items-center gap-2">
<span class="w-2 h-2 bg-eccentric-blue animate-pulse"></span>
<span class="font-label-sm text-label-sm text-deep-black uppercase tracking-widest">LIVE CALENDAR</span>
</div>
</div>
@if ($calendlyUrl)
<div class="min-h-[700px] w-full" data-calendly-url="{{ $calendlyUrl }}">
<noscript><a href="{{ $calendlyUrl }}" class="font-body-md text-body-md text-eccentric-blue underline">Book a call on Calendly</a></noscript>
</div>
@else
<x-booking-widget :categories="$categories" />
@endif
</div>
</section>
<!-- Technical Process / Dispatch Workflow Bar -->
<section class="w-full bg-deep-black text-pure-white py-12 border-t border-deep-black">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="border-l-2 border-eccentric-blue pl-4 py-1">
<span class="font-label-sm text-label-sm text-eccentric-blue uppercase tracking-widest block mb-1">STAGE 01 // INTAKE</span>
<h4 class="font-headline-sm text-headline-sm uppercase text-pure-white">Telemetry Parse</h4>
<p class="font-body-sm text-body-sm text-technical-gray mt-1 leading-relaxed">Direct algorithmic triage against available capacity and domain specialty.</p>
</div>
<div class="border-l-2 border-white/20 pl-4 py-1">
<span class="font-label-sm text-label-sm text-technical-gray uppercase tracking-widest block mb-1">STAGE 02 // TRIAGE</span>
<h4 class="font-headline-sm text-headline-sm uppercase text-pure-white">Architect Briefing</h4>
<p class="font-body-sm text-body-sm text-technical-gray mt-1 leading-relaxed">Lead system engineer conducts feasibility review within 14-minute window.</p>
</div>
<div class="border-l-2 border-white/20 pl-4 py-1">
<span class="font-label-sm text-label-sm text-technical-gray uppercase tracking-widest block mb-1">STAGE 03 // DISCOVERY</span>
<h4 class="font-headline-sm text-headline-sm uppercase text-pure-white">Deep-Logic Session</h4>
<p class="font-body-sm text-body-sm text-technical-gray mt-1 leading-relaxed">Zero-guessing deep-dive session mapping schemas, APIs, and security envelopes.</p>
</div>
<div class="border-l-2 border-white/20 pl-4 py-1">
<span class="font-label-sm text-label-sm text-technical-gray uppercase tracking-widest block mb-1">STAGE 04 // PROTOCOL</span>
<h4 class="font-headline-sm text-headline-sm uppercase text-pure-white">Blueprint Delivery</h4>
<p class="font-body-sm text-body-sm text-technical-gray mt-1 leading-relaxed">Rigid architecture contract with deterministic execution milestones.</p>
</div>
</div>
</div>
</section>
<!-- FAQ Accordion for Rapid Onboarding -->
<section class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 py-16 border-t border-deep-black/10">
<div class="flex flex-col lg:flex-row items-start justify-between gap-12">
<div class="max-w-md">
<span class="font-label-md text-label-md uppercase tracking-widest text-eccentric-blue block mb-2">VERIFICATION DIRECTIVES // FAQ</span>
<h2 class="font-display-lg text-display-lg uppercase tracking-tight text-deep-black leading-none mb-4">
          Direct Answers.
        </h2>
<p class="font-body-md text-body-md text-secondary leading-relaxed mb-6">
          Deterministic logic leaves no space for guesswork. Here is the operational reality of initiating enterprise contracts with Compiling Logics.
        </p>
<div class="p-4 border border-deep-black bg-gray-subtle">
<div class="font-label-sm text-label-sm uppercase tracking-widest text-deep-black font-semibold">NEED AN ON-SITE ARCHITECT?</div>
<p class="font-body-sm text-body-sm text-secondary mt-1">Critical mission teams deploy on 48h notice to high-availability hospitals and data operations worldwide.</p>
</div>
</div>
<!-- Accordion Module -->
<div class="flex-1 w-full space-y-4">
<!-- FAQ 01 -->
<details class="group border border-deep-black bg-pure-white">
<summary class="w-full p-6 text-left flex items-center justify-between gap-4 cursor-pointer list-none [&::-webkit-details-marker]:hidden">
<span class="font-headline-sm text-headline-sm uppercase tracking-tight text-deep-black group-hover:text-eccentric-blue transition-colors">
              How does the 24/7 accessibility SLA work?
            </span>
<svg class="size-6 shrink-0 text-deep-black group-open:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M12 5v14M5 12h14"></svg><svg class="hidden size-6 shrink-0 text-eccentric-blue group-open:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M5 12h14"></svg>
</summary>
<div class="px-6 pb-6 pt-2 border-t border-deep-black/10 font-body-md text-body-md text-secondary leading-relaxed">
            Every incoming transmission is logged to our redundant operations queues in North America, London, and Singapore. Within 14 minutes, a practicing Systems Architect (not a sales representative) reviews your payload, maps feasibility constraints, and initiates secure comms with your engineering team.
          </div>
</details>
<!-- FAQ 02 -->
<details class="group border border-deep-black bg-pure-white">
<summary class="w-full p-6 text-left flex items-center justify-between gap-4 cursor-pointer list-none [&::-webkit-details-marker]:hidden">
<span class="font-headline-sm text-headline-sm uppercase tracking-tight text-deep-black group-hover:text-eccentric-blue transition-colors">
              How long does a typical discovery to prototype cycle take?
            </span>
<svg class="size-6 shrink-0 text-deep-black group-open:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M12 5v14M5 12h14"></svg><svg class="hidden size-6 shrink-0 text-eccentric-blue group-open:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M5 12h14"></svg>
</summary>
<div class="px-6 pb-6 pt-2 border-t border-deep-black/10 font-body-md text-body-md text-secondary leading-relaxed">
            Standard discovery takes exactly 5 business days, culminating in a mathematically bounded architecture specification. Prototype cycles are bounded to 14 days, producing runnable, containerized software running deterministic logic loops against your sanitized sandbox data.
          </div>
</details>
<!-- FAQ 03 -->
<details class="group border border-deep-black bg-pure-white">
<summary class="w-full p-6 text-left flex items-center justify-between gap-4 cursor-pointer list-none [&::-webkit-details-marker]:hidden">
<span class="font-headline-sm text-headline-sm uppercase tracking-tight text-deep-black group-hover:text-eccentric-blue transition-colors">
              What compliance standards (HIPAA, SOC2, GDPR) are pre-engineered?
            </span>
<svg class="size-6 shrink-0 text-deep-black group-open:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M12 5v14M5 12h14"></svg><svg class="hidden size-6 shrink-0 text-eccentric-blue group-open:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M5 12h14"></svg>
</summary>
<div class="px-6 pb-6 pt-2 border-t border-deep-black/10 font-body-md text-body-md text-secondary leading-relaxed">
            All code artifacts originate within HIPAA BAA-ready infrastructure and strict SOC 2 Type II controls. We execute end-to-end zero-knowledge encryption with immutable audit logs (SHA-256 state hashing) for all real estate and hospitality patient/client workflows.
          </div>
</details>
<!-- FAQ 04 -->
<details class="group border border-deep-black bg-pure-white">
<summary class="w-full p-6 text-left flex items-center justify-between gap-4 cursor-pointer list-none [&::-webkit-details-marker]:hidden">
<span class="font-headline-sm text-headline-sm uppercase tracking-tight text-deep-black group-hover:text-eccentric-blue transition-colors">
              What does “Where The Logics Never Prank” guarantee?
            </span>
<svg class="size-6 shrink-0 text-deep-black group-open:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M12 5v14M5 12h14"></svg><svg class="hidden size-6 shrink-0 text-eccentric-blue group-open:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true"><path d="M5 12h14"></svg>
</summary>
<div class="px-6 pb-6 pt-2 border-t border-deep-black/10 font-body-md text-body-md text-secondary leading-relaxed">
            It is our architectural covenant: we construct deterministic AI guardrails that completely eliminate non-deterministic hallucinations, state corruption, or silent logic failure. System outputs are strictly bounded, verifiable, and programmatically tested before merge.
          </div>
</details>
</div>
</div>
</section>
</div>
@endsection
