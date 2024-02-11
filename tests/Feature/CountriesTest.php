<?php

use App\Models\Country;
use Inertia\Testing\AssertableInertia as Assert;

use function Pest\Laravel\get;
use function Pest\Laravel\put;
use function Pest\Laravel\post;
use function Pest\Laravel\delete;
use Illuminate\Http\UploadedFile;

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

    $registeredCountry = Country::inRandomOrder()->first();

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

    $registeredCountry = Country::inRandomOrder()->first();

    $response = delete(
        route('countries.destroy', ['country' => $registeredCountry->id])
    );

    $response
        ->assertStatus(302)
        ->assertRedirectToRoute('home.index');
});

it('should be able to render the country page', function () {

    $registeredCountry = Country::inRandomOrder()->first();

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
