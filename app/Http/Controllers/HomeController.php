<?php

namespace App\Http\Controllers;

use App\Models\Country;

class HomeController extends Controller
{
    public function __invoke()
    {
        $countries = Country::paginate(5);

        return inertia('Home', [
            'countries' => $countries,
        ]);
    }
}
