<?php

namespace App\Http\Controllers;

use Faker\Factory;
use App\Models\Tag;
use Illuminate\Database\QueryException;
use InvertColor\Color;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the tags.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.tags', compact('tags'));
    }

    /**
     * Store a newly created tag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $tag = new Tag();
            $faker = Factory::create('fr_FR');
            $color_bg = $faker->hexColor();
            $color_text = Color::fromHex($color_bg)->invert(true); 
            
            $tag->name = $request->name;
            $tag->color_bg = $color_bg;
            $tag->color_text = $color_text;
            $tag->save();

            return redirect()->route('tags');
        }

        catch (QueryException $e){
            return view('errors.404');
        }

    }

    /**
     * Display the specified tag.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified tag.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified tag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified tag from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
