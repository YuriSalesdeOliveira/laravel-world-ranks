<?php

namespace App\Http\Controllers;

use App\Enums\ContinentEnum;
use App\Models\Country;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $request->validate([
            'flag' => ['image'],
            'name' => ['required', 'unique:countries', 'string', 'min:4', 'max:14'],
            'population' => ['required', 'integer'],
            'area' => ['required', 'integer'],
            'continent' => ['required', Rule::enum(ContinentEnum::class)],
        ]);

        $flagImagePath = $request->file('flag')->store('flags', 'public');

        $country = new Country();
        $country->flag = $flagImagePath;
        $country->name = $request->name;
        $country->population = $request->population;
        $country->area = $request->area;
        $country->continent = $request->continent;

        $country->save();

        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
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
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        //
    }
}
