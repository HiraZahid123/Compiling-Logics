<?php

use App\Models\Service;
use App\Models\ServiceCategory;

it('renders the contact form', function () {
    $this->get(route('contact'))
        ->assertOk()
        ->assertSee("Let's Build Something Great Together", escape: false)
        ->assertSee('action="'.route('contact.store').'"', escape: false)
        ->assertSee('name="name"', escape: false)
        ->assertSee('name="email"', escape: false)
        ->assertSee('name="message"', escape: false);
});

it('confirms a sent message', function () {
    $this->withSession(['status' => 'contact-message-sent'])
        ->get(route('contact'))
        ->assertSee('your message is on its way');
});

it('lists the bookable categories and services in the booking widget when calendly is not configured', function () {
    config(['services.calendly.url' => null]);

    $category = ServiceCategory::factory()->create(['name' => 'Graphic Design']);
    $service = Service::factory()->for($category, 'category')->create(['name' => 'Graphics', 'duration_minutes' => 30]);

    $this->get(route('contact'))
        ->assertOk()
        ->assertSeeInOrder(['Select Category', 'ALL', 'Graphic Design', 'Select Service', 'Graphics', 'Duration:', '30 m'])
        ->assertSee('data-service-option="'.$service->id.'" data-category="'.$category->id.'"', escape: false);
});

it('embeds calendly in the brand colour instead of the booking widget when configured', function () {
    config(['services.calendly.url' => 'https://calendly.com/compiling-logics/30min']);
    ServiceCategory::factory()->has(Service::factory())->create();

    $this->get(route('contact'))
        ->assertOk()
        ->assertSee('data-calendly-url="https://calendly.com/compiling-logics/30min?hide_gdpr_banner=1&amp;primary_color=0049fd"', escape: false)
        ->assertDontSee('data-booking-widget', escape: false);
});

it('marks contact as the current page in the navigation', function () {
    $currentContactLink = '/href="'.preg_quote(route('contact'), '/').'"\s+aria-current="page"/';

    expect($this->get(route('contact'))->getContent())->toMatch($currentContactLink)
        ->and($this->get(route('about'))->getContent())->not->toMatch($currentContactLink);
});
