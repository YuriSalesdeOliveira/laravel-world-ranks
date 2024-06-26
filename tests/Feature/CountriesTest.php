<?php

use App\Models\Country;
use App\Models\Tag;
use Illuminate\Http\UploadedFile;
use Inertia\Testing\AssertableInertia as Assert;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

it('should be able to create a country', function () {

    $flag = UploadedFile::fake()->image('flag.jpg');

    $country = Country::factory()->make([
        'flag' => $flag,
    ]);

    $numberOfCountries = Country::query()->count();

    $response = post(
        route('countries.store'),
        $country->getAttributes()
    );

    $response
        ->assertStatus(302)
        ->assertSessionDoesntHaveErrors()
        ->assertRedirectToRoute('home.index');

    expect(Country::query()->count())->toEqual($numberOfCountries + 1);
});

it('should be able to update a country', function () {

    $registeredCountry = Country::query()->inRandomOrder()->firstOrFail();

    $flag = UploadedFile::fake()->image('flag.jpg');

    $registeredCountry->flag = $flag;

    $response = put(
        route('countries.update', ['country' => $registeredCountry->id]),
        $registeredCountry->getAttributes()
    );

    $response
        ->assertStatus(302)
        ->assertSessionDoesntHaveErrors()
        ->assertRedirectToRoute('home.index');

    expect($registeredCountry->update_at)->not->toBeObject($registeredCountry->fresh()->updated_at);
});

it('should be possible for a country to have one or more tags', function () {

    $registeredTags = Tag::query()->inRandomOrder()->take(2)->get();

    if (! $registeredTags->count()) {

        $registeredTags = Tag::factory(2)->create();
    }

    $registeredCountry = Country::query()->inRandomOrder()->firstOrFail();

    $flag = UploadedFile::fake()->image('flag.jpg');

    $registeredCountry->flag = $flag;

    $registeredTagsIds = $registeredTags->pluck('id')->toArray();

    $response = put(
        route('countries.update', ['country' => $registeredCountry->id]),
        [
            ...$registeredCountry->getAttributes(),
            'tags' => $registeredTagsIds,
        ]
    );

    $response
        ->assertStatus(302)
        ->assertSessionDoesntHaveErrors()
        ->assertRedirectToRoute('home.index');

    expect(
        $registeredCountry
            ->tags()
            ->pluck('tags.id')
            ->toArray()
    )
        ->toContain(...$registeredTagsIds);
});

it('should be able to render the country page', function () {

    $registeredCountry = Country::query()->inRandomOrder()->firstOrFail();

    $response = get(
        route('countries.show', ['country' => $registeredCountry->id])
    );

    $response->assertInertia(function (Assert $page) use ($registeredCountry) {
        return $page
            ->component('Country')
            ->where('country.id', $registeredCountry->id);
    })
        ->assertStatus(200);
});

it('should be able to delete a country', function () {

    $registeredCountry = Country::query()->inRandomOrder()->firstOrFail();

    $response = delete(
        route('countries.destroy', ['country' => $registeredCountry->id])
    );

    $response
        ->assertStatus(302)
        ->assertRedirectToRoute('home.index');
});
