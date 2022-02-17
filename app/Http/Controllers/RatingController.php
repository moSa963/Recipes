<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Models\Recipe;
use App\Models\RecipeRating;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RatingController extends Controller
{
    public function store(StoreRatingRequest $request, $recipe_id){

        //make sure recipe exist
        $recipe = Recipe::find($recipe_id);
        if (! $recipe) abort(404);

        try{
            RecipeRating::updateOrCreate([
                'user_id' => Auth::user()->id,
                'recipe_id' => $recipe->id,
            ] , [
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]);
        }catch(Exception $e){
            return back()->withErrors(['You already rated the recipe.']);
        }

        return back();
    }
}
