<?php

use App\Models\Tag;

use function Pest\Laravel\delete;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

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

it('should be able to update a tag', function () {

    $registeredTag = Tag::query()->inRandomOrder()->firstOrFail();

    $response = put(
        route('tags.update', ['tag' => $registeredTag->id]),
        $registeredTag->getAttributes()
    );

    $response
        ->assertStatus(302)
        ->assertSessionDoesnthaveErrors()
        ->assertRedirectToRoute('home.index');
});

it('should be able to delete a tag', function () {

    $registeredTag = Tag::query()->inRandomOrder()->firstOrFail();

    $response = delete(
        route('tags.destroy', ['tag' => $registeredTag->id])
    );

    $response
        ->assertStatus(302)
        ->assertSessionDoesnthaveErrors()
        ->assertRedirectToRoute('home.index');

    expect(Tag::query()->where('id', '=', $registeredTag->id)->exists())
        ->toBeFalsy();
});
