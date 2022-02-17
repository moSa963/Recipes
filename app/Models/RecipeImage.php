<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeImage extends Model
{
    use HasFactory;
    public $table = "recipe_images";
    
    public $fillable = [
        'recipe_id',
        'name'
    ];
}