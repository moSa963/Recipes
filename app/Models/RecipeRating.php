<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeRating extends Model
{
    use HasFactory;
    public $table = "recipe_rating";
    public $fillable = [
        'user_id',
        'recipe_id',
        'rating',
        'comment',
    ];


    public static function getList($skip, $take, $recipe_id, $user_id = null){
        
        $quary = RecipeRating::select(["recipe_rating.recipe_id", "recipe_rating.user_id", "recipe_rating.comment", "recipe_rating.rating", "users.name as username"])
                    ->where('recipe_rating.recipe_id', $recipe_id)
                    ->join('users', 'users.id', '=', 'recipe_rating.user_id');

        if ($user_id){
            $quary = $quary->where("users.id", $user_id);
        }

        return $quary->groupBy("recipe_rating.id", "recipe_rating.recipe_id", "recipe_rating.user_id", "recipe_rating.comment", "recipe_rating.rating", "users.name")
                ->skip($skip)
                ->take($take)
                ->get();
    }

}
