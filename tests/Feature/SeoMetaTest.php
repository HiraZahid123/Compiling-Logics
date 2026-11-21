<?php

it('gives every public page its own meta description and a canonical link', function (string $routeName) {
    $html = $this->get(route($routeName))->assertOk()->getContent();

    preg_match('/<meta name="description" content="([^"]+)">/', $html, $description);

    expect($description[1] ?? '')->not->toBeEmpty()
        ->and(mb_strlen(html_entity_decode($description[1])))->toBeLessThanOrEqual(160)
        ->and($html)->toContain('<link rel="canonical" href="'.route($routeName).'">');
})->with(['home', 'services', 'work', 'about', 'contact']);

it('uses a different description on each page', function () {
    $descriptions = collect(['home', 'services', 'work', 'about', 'contact'])
        ->map(fn (string $routeName): string => preg_match('/<meta name="description" content="([^"]+)">/', $this->get(route($routeName))->getContent(), $match) ? $match[1] : '');

    expect($descriptions->unique())->toHaveCount(5);
});

it('loads the web fonts without blocking the first paint', function () {
    expect($this->get(route('home'))->getContent())
        ->toMatch('/<link rel="stylesheet" href="https:\/\/fonts\.bunny\.net[^"]*" media="print" onload="this\.media=\'all\'">/');
});
