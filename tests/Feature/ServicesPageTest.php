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
