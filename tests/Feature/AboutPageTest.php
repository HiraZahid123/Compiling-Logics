<?php

it('renders the about page sections in order', function () {
    $this->get(route('about'))
        ->assertOk()
        ->assertSeeInOrder([
            'We Build Systems',
            'That Never Prank.',
            'The Mission',
            'The Vision',
            'Brand Values In Practice',
            'Precision', 'Reliability', 'Global', 'Innovation', 'Trust',
            'Confident but not arrogant.',
            'Continuous Multi-Zone Coverage',
            'Engineering Realities, Not Projections.',
        ]);
});

it('links the call to action buttons to the contact and work pages', function () {
    $html = $this->get(route('about'))->getContent();

    expect(substr_count($html, 'href="'.route('contact').'"'))->toBeGreaterThanOrEqual(2)
        ->and($html)->toContain('href="'.route('work').'"')
        ->not->toContain('href="#"');
});

it('marks about as the current page in the navigation', function () {
    $currentAboutLink = '/href="'.preg_quote(route('about'), '/').'"\s+aria-current="page"/';

    expect($this->get(route('about'))->getContent())->toMatch($currentAboutLink)
        ->and($this->get(route('work'))->getContent())->not->toMatch($currentAboutLink);
});
