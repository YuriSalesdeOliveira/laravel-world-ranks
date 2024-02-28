<?php

namespace App\Http\Controllers;

use App\Enums\ContinentEnum;
use App\Enums\CountryStatusEnum;
use App\Models\Country;

class HomeController extends Controller
{
    public function __invoke()
    {
        $countries = Country::query();

        if ($search = request()->search) {

            $countries->where('name', 'like', "%{$search}%");
        }

        return inertia('Home', [
            'countries' => $countries->paginate(10),
            'continents' => ContinentEnum::values(),
            'countryStatus' => CountryStatusEnum::values(),
        ]);
    }
}
