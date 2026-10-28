<?php

it('renders the agentic chat widget with whatsapp integration on the site layout', function () {
    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertSee('data-agentic-chat', escape: false)
        ->assertSee('data-chat-window', escape: false)
        ->assertSee('data-chat-messages', escape: false)
        ->assertSee('data-chat-toggle', escape: false)
        ->assertSee('https://wa.me/', escape: false);
});

it('renders the chat toggle button on the home what we build section', function () {
    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertSee('aria-label="Chat with AI Agent"', escape: false)
        ->assertSee('data-chat-toggle', escape: false);
});
