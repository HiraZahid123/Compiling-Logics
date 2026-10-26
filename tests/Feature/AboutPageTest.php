<?php

it('renders the about page sections in order', function () {
    $this->get(route('about'))
        ->assertOk()
        ->assertSeeInOrder([
            'Building Digital Solutions That Last.',
            'Team that actually answers.',
            'MISSION',
            'We work embedded inside your business',
            'Great People. Better Solutions.',
            'Want the full story on a specific build?',
        ]);
});

it('marks about as the current page in the navigation', function () {
    $currentAboutLink = '/href="'.preg_quote(route('about'), '/').'"\s+aria-current="page"/';

    expect($this->get(route('about'))->getContent())->toMatch($currentAboutLink)
        ->and($this->get(route('work'))->getContent())->not->toMatch($currentAboutLink);
});
