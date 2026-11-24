<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('renders the new home page sections with working links', function () {
    $this->get('/')
        ->assertSeeInOrder(['WHERE THE LOGICS NEVER PRANK.', 'OUR SOLUTIONS AT A GLANCE', 'Industry Transformation Showcase', 'The Engineering Philosophy', 'manual computational friction'], escape: false)
        ->assertSee('href="'.route('services').'#ai-agents-automation"', escape: false)
        ->assertSee('href="'.route('work').'"', escape: false)
        ->assertSee('href="'.route('contact').'"', escape: false);
});

it('marks home as the current page and keeps the mobile menu in the header', function () {
    $html = $this->get('/')->getContent();

    expect($html)->toMatch('/href="'.preg_quote(route('home'), '/').'"\s+aria-current="page"/')
        ->toContain('data-menu-toggle')
        ->toContain('data-menu');
});

it('shows the new footer with company links and contact email', function () {
    $this->get(route('services'))
        ->assertSee('Global 24/7 Operations')
        ->assertSee('href="mailto:info@compilinglogics.com"', escape: false)
        ->assertSee('href="https://www.linkedin.com/company/compiling-logics/"', escape: false);
});
