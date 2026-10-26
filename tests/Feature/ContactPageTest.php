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

it('lists the bookable categories and services in the booking widget', function () {
    $category = ServiceCategory::factory()->create(['name' => 'Graphic Design']);
    $service = Service::factory()->for($category, 'category')->create(['name' => 'Graphics', 'duration_minutes' => 30]);

    $this->get(route('contact'))
        ->assertOk()
        ->assertSeeInOrder(['Select Category', 'ALL', 'Graphic Design', 'Select Service', 'Graphics', 'Duration:', '30 m'])
        ->assertSee('data-service-option="'.$service->id.'" data-category="'.$category->id.'"', escape: false);
});

it('marks contact as the current page in the navigation', function () {
    $currentContactLink = '/href="'.preg_quote(route('contact'), '/').'"\s+aria-current="page"/';

    expect($this->get(route('contact'))->getContent())->toMatch($currentContactLink)
        ->and($this->get(route('about'))->getContent())->not->toMatch($currentContactLink);
});
