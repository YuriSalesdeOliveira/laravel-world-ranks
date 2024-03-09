<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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
            'name' => ['required', 'unique:tags,name', 'min:2'],
        ]);

        $tag = new Tag();
        $tag->name = request()->string('name')->title();

        $tag->save();

        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Tag $tag)
    {
        request()->validate([
            'name' => ['required', Rule::unique('tags')->ignore($tag->id), 'min:2'],
        ]);

        $tag->name = request()->string('name')->title();

        $tag->save();

        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('home.index');
    }
}
