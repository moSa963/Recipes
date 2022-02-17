<?php

namespace App\Http\Controllers;

use App\Models\RecipeRating;
use Illuminate\Http\Request;

class ApiRatingController extends Controller
{
    public function list( Request $request, $recipe_id){
        
        $page = $request->query("page", 1);

        if ($page <= 0) $page = 1;

        $comments =  RecipeRating::getList(5 * ($page - 1), 5,  $recipe_id);

        return response()->json([
            "next" => count($comments) < 10 ? null : $page + 1,
            "list" => $comments
        ], 200);
    }
}
