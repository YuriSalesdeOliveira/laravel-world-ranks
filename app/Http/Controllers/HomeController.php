<?php

namespace App\Http\Controllers;

use App\Enums\ContinentEnum;
use App\Models\Country;
use App\Models\Tag;

class HomeController extends Controller
{
    public function __invoke()
    {
        $countryQuery = Country::query();

        $countryQuery->when(request('search', false), function ($query, $search) {

            return $query->where('name', 'like', "%{$search}%");
        });

        $countryQuery->when(request('column', false), function ($query, $column) {

            return $query->orderBy($column);
        });

        $countryQuery->when(request('continents', false), function ($query, $continents) {

            return $query->where(function ($query) use ($continents) {

                foreach ($continents as $continent) {

                    $query->orWhere('continent', $continent);
                }

                return $query;
            });
        });

        $countryQuery->when(request('tags', false), function ($query, $tags) {

            return $query->whereHas('tags', function ($query) use ($tags) {

                return $query->whereIn('tags.id', $tags);
            });
        });

        return inertia('Home', [
            'countries' => $countryQuery->paginate(10),
            'continents' => ContinentEnum::values(),
            'tags' => Tag::query()->take(10)->get(),
        ]);
    }
}
