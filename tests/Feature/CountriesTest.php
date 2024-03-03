<?php

use App\Models\Country;
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

    $response = post(
        route('countries.store'),
        $country->getAttributes()
    );

    $response
        ->assertStatus(302)
        ->assertRedirectToRoute('home.index');
});

it('should be able to update a country using put http method', function () {

    $registeredCountry = Country::inRandomOrder()->firstOrFail();

    $flag = UploadedFile::fake()->image('flag.jpg');

    $country = Country::factory()->make([
        'flag' => $flag,
    ]);

    $response = put(
        route('countries.update', ['country' => $registeredCountry->id]),
        $country->getAttributes()
    );

    $response
        ->assertStatus(302)
        ->assertRedirectToRoute('home.index');
});

it('should be able to delete a country', function () {

    $registeredCountry = Country::inRandomOrder()->firstOrFail();

    $response = delete(
        route('countries.destroy', ['country' => $registeredCountry->id])
    );

    $response
        ->assertStatus(302)
        ->assertRedirectToRoute('home.index');
});

todo('should be able to create a tag');

todo('should be possible for a country to have one or more tags');

it('should be able to render the country page', function () {

    $registeredCountry = Country::inRandomOrder()->firstOrFail();

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
