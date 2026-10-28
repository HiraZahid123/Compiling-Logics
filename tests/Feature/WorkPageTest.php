<?php

it('renders the project showcase in order', function () {
    $this->get(route('work'))
        ->assertOk()
        ->assertSeeInOrder([
            'alt="Best Local Law"',
            'alt="JollyWitMe"',
            'alt="Expat Car Buyers"',
            'alt="Certus 3D"',
            'alt="PDF Tools"',
            'alt="Fluencyi"',
            'alt="Otelogia"',
            'alt="Busy SPR"',
            'alt="Go Get Notary"',
            'alt="Kids Health Club"',
            'alt="Tutor Hub"',
        ], escape: false);
});

it('marks work as the current page in the navigation', function () {
    $currentWorkLink = '/href="'.preg_quote(route('work'), '/').'"\s+aria-current="page"/';

    expect($this->get(route('work'))->getContent())->toMatch($currentWorkLink)
        ->and($this->get(route('services'))->getContent())->not->toMatch($currentWorkLink);
});

it('tags each project with the filters it belongs to', function () {
    $this->get(route('work'))
        ->assertSee('data-types="web-app" data-industries="healthcare"', escape: false)
        ->assertSee('data-types="web-app" data-industries="hospitality real-estate"', escape: false);
});

it('starts with all filters selected', function () {
    $html = $this->get(route('work'))->getContent();

    expect(substr_count($html, 'aria-pressed="true"'))->toBe(2)
        ->and($html)->toMatch('/aria-pressed="true" data-filter-group="type" data-filter-value="all"/')
        ->and($html)->toMatch('/aria-pressed="true" data-filter-group="industry" data-filter-value="all"/');
});

it('links each project to its case study pdf and renders the viewer modal', function () {
    $this->get(route('work'))
        ->assertOk()
        ->assertSee('data-case-study-modal', escape: false)
        ->assertSee('data-case-study-frame', escape: false)
        ->assertSee('data-pdf-url="'.asset('case-studies/best-local-law.pdf').'"', escape: false)
        ->assertSee('data-pdf-url="'.asset('case-studies/tutor-hub.pdf').'"', escape: false)
        ->assertSee('Read Case Study (PDF)', escape: false);
});
