<?php

use function Pest\Laravel\get;

it('should be able to render the world ranks page', function () {
    $response = get('/');

    $response->assertStatus(200);
});
