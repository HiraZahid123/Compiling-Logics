<?php

it('renders all six service pillars in order', function () {
    $this->get(route('services'))
        ->assertOk()
        ->assertSeeInOrder([
            'AI Agents &amp; Automation',
            'Software Development',
            'Cloud &amp; DevOps',
            'Quality Assurance',
            'Design',
            'IT Consultation',
        ], escape: false);
});

it('defers every pillar video so none downloads with the page', function () {
    $html = $this->get(route('services'))->getContent();

    expect(substr_count($html, 'data-lazy-video'))->toBe(6)
        ->and($html)->toContain('preload="none"')
        ->and($html)->not->toMatch('/<video[^>]*\ssrc=/');
});

it('marks services as the current page in the navigation', function () {
    $currentServicesLink = '/href="'.preg_quote(route('services'), '/').'"\s+aria-current="page"/';

    expect($this->get(route('services'))->getContent())->toMatch($currentServicesLink)
        ->and($this->get(route('home'))->getContent())->not->toMatch($currentServicesLink);
});

it('renders a contact form that picks pillars and returns to the services page', function () {
    $html = $this->get(route('services'))->assertOk()->getContent();

    expect($html)->toContain('action="'.route('contact.store').'"')
        ->toContain('name="return_to" value="services"')
        ->and(substr_count($html, 'name="pillars[]"'))->toBe(6);
});

it('confirms a request sent from the services page', function () {
    $this->withSession(['status' => 'contact-message-sent'])
        ->get(route('services'))
        ->assertSee('Your request is in.');
});
