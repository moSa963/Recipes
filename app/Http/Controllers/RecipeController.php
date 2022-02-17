<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\RecipeImage;
use App\Models\RecipeRating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function show($id){
        //get recipe with average rating
        $recipe = Recipe::getFirst($id);

        if (! $recipe) abort(404);

        $comments =  RecipeRating::getList(0, 5, $recipe->id, null);

        //get all recipe images
        $imgs = RecipeImage::where('recipe_id', '=', $recipe->id)->get();

        return view("recipe.show", ["recipe" => $recipe, "imgs" => $imgs, "comments" => $comments]);
    }

    public function list(){
        return view('recipe.list');
    }
    
    public function create(){
        return view('recipe.create');
    }

    public function store(StoreRecipeRequest $request){
        //create or get first catrgory with this name
        $category = Category::firstOrCreate(["name" => $request->category]);
        
        //convert array to string   
        $directions = implode("\n", $request->directions);
        $ingredients = implode("\n", $request->ingredients);

        //create new recipe
        $recipe = Recipe::create([
            "user_id"          => Auth::user()->id,
            "category_id"      => $category->id,
            "title"            => $request->title ,
            "cook_time"        => $request->cook_time ,
            "preparation_time" => $request->preparation_time ,
            "servings"         => $request->servings ,
            "description"      => $request->description ,
            "ingredients"      => $ingredients ,
            "directions"       => $directions ,
            "note"             => $request->note ,
        ]);

        $files = $request->file("images");

        //store each image 
        foreach($files as $file){
            $path = $file->store('images', 'local');

            RecipeImage::create([
                'recipe_id' => $recipe->id,
                'name' => $path
            ]);
        }

        //TODO: redirect to show page
        return redirect()->route("recipe.show", ['id' => $recipe->id]);
    }

    public function image($recipe_id, $img_id){
        //get image

        $img = RecipeImage::find($img_id);

        if (! $img || $img->recipe_id != $recipe_id) return response('', 404);

        return Storage::download($img->name);
    }

    public function destroy($id){


        //get the recipe
        $recipe = Recipe::find($id);
        if (! $recipe || $recipe->user_id != Auth::user()->id) abort(404);

        //get images
        $imgs = RecipeImage::where('recipe_id', '=', $recipe->id)->get();

        $paths = [];

        
        //push all images paths to an erray
        foreach($imgs as $img){
            $paths[] = $img->name;
        }
        
        //remove images from the drive
        Storage::delete($paths);

        //delete the database record
        Recipe::where("id", $id)->delete();

        return redirect()->route('home');
    }
}
