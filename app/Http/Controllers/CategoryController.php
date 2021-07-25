<?php

namespace App\Http\Controllers;

use Faker\Factory;
use App\Models\Task;
use InvertColor\Color;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        $nbPerCategories = [];
        foreach($categories as $category){
            $nbPerCategories[$category->id] = Task::select()->where("category_id", $category->id)->count();
        }
        
        return view('categories.categories', compact('categories', 'nbPerCategories'));
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $faker = Factory::create('fr_FR');
        $color_bg = $faker->hexColor();
        $color_text = Color::fromHex($color_bg)->invert(true); 

        $category->name = $request->name;
        $category->ref = bin2hex(random_bytes(23));
        $category->color_bg = $color_bg;
        $category->color_text = $color_text;
        $category->save();

        return redirect()->route('categories');

    }

    /**
     * Display the specified category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified category from storage.
     *
     * @param string|int  $idCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
    }

    /***
     * 
     * @param Request $request
     * @Return \Illuminate\Http\Response
     */
    public function destroyMulti(Request $request)
    {
        $categories = [];
        foreach($request->category as $idCategory){
            Category::find($idCategory)->delete();
            $categories[] = $idCategory;
        }
        echo json_encode($categories);
    }

    public function categoryExport() 
    {
        return Excel::download(new CategoriesExport, 'categories-collection.xlsx');
    }  
}
