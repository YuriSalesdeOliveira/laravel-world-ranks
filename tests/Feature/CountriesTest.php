<?php

it('has countries page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
