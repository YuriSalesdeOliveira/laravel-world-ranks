<?php

use App\Models\Country;
use Illuminate\Http\UploadedFile;

use function Pest\Laravel\delete;
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

todo('should be able to render the country page');
