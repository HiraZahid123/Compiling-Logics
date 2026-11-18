<?php

it('lists every project in the showroom in order', function () {
    $this->get(route('work'))
        ->assertOk()
        ->assertSee('Pick a project.')
        ->assertSeeInOrder([
            'data-name="Best Local Law"', 'data-name="JollyWitMe"', 'data-name="Expat Car Buyers"',
            'data-name="Certus 3D"', 'data-name="PDF Tools"', 'data-name="Fluencyi"', 'data-name="Otelogia"',
            'data-name="Busy SPR"', 'data-name="Go Get Notary"', 'data-name="Kids Health Club"',
            'data-name="Tutor Hub"', 'data-name="DropPR.ai"', 'data-name="ForCoach"', 'data-name="Novartis Tech Café"',
        ], escape: false);
});

it('marks work as the current page in the navigation', function () {
    $currentWorkLink = '/href="'.preg_quote(route('work'), '/').'"\s+aria-current="page"/';

    expect($this->get(route('work'))->getContent())->toMatch($currentWorkLink)
        ->and($this->get(route('services'))->getContent())->not->toMatch($currentWorkLink);
});

it('opens the first project in the showroom stage with its case study and website', function () {
    $this->get(route('work'))
        ->assertSee('alt="Best Local Law website preview"', escape: false)
        ->assertSee('data-case-study-modal', escape: false)
        ->assertSee('data-pdf-url="'.asset('case-studies/best-local-law.pdf').'?v=', escape: false)
        ->assertSee('href="https://bestlocallaw.com" target="_blank" rel="noopener"', escape: false);
});

it('gives each project its case study pdf and website domain', function (string $name, string $pdf, string $domain) {
    $html = $this->get(route('work'))->getContent();

    expect(public_path('case-studies/'.$pdf))->toBeFile()
        ->and($html)->toMatch('/data-name="'.preg_quote($name, '/').'".*?data-domain="'.preg_quote($domain, '/').'"\s+data-pdf="'.preg_quote(asset('case-studies/'.$pdf), '/').'\?v=\d+"/s');
})->with([
    ['DropPR.ai', 'droppr-ai.pdf', 'droppr.ai'],
    ['ForCoach', 'forcoach.pdf', 'forcoach.io'],
    ['PDF Tools', 'pdf-tools.pdf', 'pdftools.net'],
]);

it('versions showroom images by modification time so replaced files bypass caches', function () {
    $version = filemtime(public_path('images/work/kids-health-club.webp'));

    $this->get(route('work'))
        ->assertSee('data-image="'.asset('images/work/kids-health-club.webp').'?v='.$version.'"', escape: false);
});

it('posts the project form to the contact handler and returns to it', function () {
    $html = $this->get(route('work'))->getContent();

    expect($html)->toMatch('/<form action="'.preg_quote(route('contact.store'), '/').'" method="POST"/')
        ->toContain('name="return_to" value="work"')
        ->not->toContain('method="GET"');
});

it('shows placeholder testimonials in the design layout until real ones are added', function () {
    $html = $this->get(route('work'))->assertSee('What clients say.')->getContent();

    expect(substr_count($html, 'data-testimonial-type="written"'))->toBe(3)
        ->and(substr_count($html, 'data-testimonial-type="video"'))->toBe(2)
        ->and(substr_count($html, 'data-testimonial-filter='))->toBe(3)
        ->and(substr_count($html, '>Placeholder</span>'))->toBe(5)
        ->and($html)->toContain('data-testimonial-modal')
        ->not->toContain('Pawal');
});
