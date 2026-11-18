<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('features ForCoach, JollyWitMe and DropPR.ai as the latest work on the home page', function () {
    $this->get('/')
        ->assertSeeInOrder(['Latest Work', 'ForCoach', 'JollyWitMe', 'DropPR.ai'])
        ->assertSee('href="https://forcoach.io" target="_blank"', escape: false)
        ->assertDontSee('healthsync-patient-management', escape: false);
});
