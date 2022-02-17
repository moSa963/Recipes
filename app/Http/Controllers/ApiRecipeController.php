<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiRecipeController extends Controller
{
    public function list(Request $request){
        //get page number from url query
        $page = $request->query("page", 1);
        $user = $request->query("user", null);

        if ($page <= 0) $page = 1;

        $recipes = Recipe::getList(10 * ($page - 1), 10, $user);

        return response()->json([
            "next" => count($recipes) < 10 ? null : $page + 1,
            "list" => $recipes
        ], 200);
    }
}
