<?php

it('should be able to render the world ranks page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
