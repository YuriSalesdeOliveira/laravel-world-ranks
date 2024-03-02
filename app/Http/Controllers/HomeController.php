<?php

namespace App\Http\Controllers;

use App\Enums\ContinentEnum;
use App\Models\Country;
use App\Models\Tag;

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

            $countries->where(function ($query) use ($continents) {

                foreach ($continents as $continent) {

                    $query->orWhere('continent', $continent);
                }

                return $query;
            });
        }

        if ($tags = request()->tags) {

            $countries->whereHas('tags', function ($query) use ($tags) {

                return $query->whereIn('tags.id', $tags);
            });
        }

        return inertia('Home', [
            'countries' => $countries->paginate(10),
            'continents' => ContinentEnum::values(),
            'tags' => Tag::take(10)->get(),
        ]);
    }
}
