<?php

use App\Models\Tag;

use function Pest\Laravel\post;

it('should be able to create a tag', function () {

    $tag = Tag::factory()->make();

    $response = post(
        route('tags.store'),
        $tag->getAttributes()
    );

    $response
        ->assertStatus(302)
        ->assertSessionDoesntHaveErrors()
        ->assertRedirectToRoute('home.index');
});

todo('should be able to update a tag', function () {
});

todo('should be able to delete a tag', function () {
});
