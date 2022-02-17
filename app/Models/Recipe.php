<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Recipe extends Model
{
    use HasFactory;
    public $table = "recipes";
    public $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'ingredients',
        'directions',
        'note',
        'cook_time',
        'preparation_time',
        'servings',
    ];

    public static function getFirst ($id) {
        return Recipe::select(["recipes.*",  "categories.name as categories_name", "users.name as username", DB::raw("AVG(`recipe_rating`.`rating`) as rating")])
                    ->groupBy("id", "user_id", "category_id", "title", "description","ingredients","directions","note","cook_time","preparation_time","servings", "created_at", "updated_at", "recipes.categories.name", "recipes.users.name")
                    ->where("recipes.id", $id)
                    ->join('users', 'users.id', '=', 'recipes.user_id')
                    ->join('categories', 'categories.id', '=', 'recipes.category_id')
                    ->leftJoin("recipe_rating", "recipe_rating.recipe_id", "=", "recipes.id")
                    ->first();
    }


    public static function getList($skip = 0, $take = 10, $user_id = null){
        $quary = Recipe::select(["recipes.id", "recipes.title", "recipes.description", "users.name as username", DB::raw("AVG(`recipe_rating`.`rating`) as rating"), DB::raw("MIN(`recipe_images`.`id`) as img_id")])
                    ->leftJoin("recipe_images", "recipe_images.recipe_id", "=", "recipes.id")
                    ->leftJoin("recipe_rating", "recipe_rating.recipe_id", "=", "recipes.id")
                    ->join('users', 'users.id', '=', 'recipes.user_id');
                    
        if ($user_id){
            $quary = $quary->where("users.id", $user_id);
        }

        return $quary->groupBy("recipes.id", "recipes.title", "recipes.description", "users.name")
                    ->skip($skip)
                    ->take($take)
                    ->get();
    }
}
