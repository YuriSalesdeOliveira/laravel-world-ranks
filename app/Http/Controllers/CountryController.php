<?php

namespace App\Http\Controllers;

use App\Enums\ContinentEnum;
use App\Models\Country;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'flag' => ['image'],
            'name' => ['required', 'string', 'min:2', 'max:47', 'unique:countries'],
            'population' => ['required', 'integer'],
            'area' => ['required', 'integer'],
            'continent' => ['required', Rule::enum(ContinentEnum::class)],
        ]);

        $country = new Country();

        request()->whenFilled('flag', function (UploadedFile $flag) use (&$country) {

            $country->flag = $flag->store('flags', 'public');
        });

        $country->name = request()->string('name')->title();
        $country->population = request()->integer('population');
        $country->area = request()->integer('area');
        $country->continent = request()->enum('continent', ContinentEnum::class);

        $country->save();

        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return inertia('Country', [
            'country' => $country,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Country $country)
    {
        request()->validate([
            'flag' => ['image'],
            'name' => ['required', 'string', 'min:2', 'max:47', Rule::unique('countries')->ignore($country->id)],
            'population' => ['required', 'integer'],
            'area' => ['required', 'integer'],
            'continent' => ['required', Rule::enum(ContinentEnum::class)],
            'tags' => ['array'],
            'tags.*' => ['integer', 'exists:tags,id'],
        ]);

        request()->whenFilled('flag', function (UploadedFile $flag) use (&$country) {

            $country->flag = $flag->store('flags', 'public');
        });

        $country->name = request()->string('name')->title();
        $country->population = request()->integer('population');
        $country->area = request()->integer('area');
        $country->continent = request()->enum('continent', ContinentEnum::class);

        $country->save();

        request()->whenFilled('tags', function (array $tags) use ($country) {

            $country->tags()->attach($tags);
        });

        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('home.index');
    }
}
