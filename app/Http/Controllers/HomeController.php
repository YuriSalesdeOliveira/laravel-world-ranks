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

        if ($column = request()->column) {

            $countries->orderBy($column);
        }

        if ($continents = request()->continents) {

            $countries->where(function($query) use ($continents) {

                foreach ($continents as $continent) {
                    
                    $query->orWhere('continent', $continent);
                }

                return $query;
            });
        }

        if ($search = request()->search) {

        }

        return inertia('Home', [
            'countries' => $countries->paginate(10),
            'continents' => ContinentEnum::values(),
            'countryStatus' => CountryStatusEnum::values(),
        ]);
    }
}
