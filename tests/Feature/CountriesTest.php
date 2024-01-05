<?php

use App\Models\Country;
use Illuminate\Http\UploadedFile;

use function Pest\Laravel\post;

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

todo('should be able to update a country');
todo('should be able to delete a country');
todo('should be able to render the country page');
