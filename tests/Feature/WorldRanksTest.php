<?php

use Inertia\Testing\AssertableInertia as Assert;

use function Pest\Laravel\get;

it('should be able to render the world ranks page', function () {

    $response = get(
        route('home.index')
    );

    $response->assertInertia(function (Assert $page) {
        return $page
            ->component('Home')
            ->has('countries')
            ->has('continents')
            ->has('tags');
    })
        ->assertStatus(200);
});
