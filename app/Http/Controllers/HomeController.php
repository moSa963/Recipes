<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function create(){
        $recipes =  Recipe::getList(0, 6);

        return view("home" ,[
            "recipes" => $recipes,
        ]);
    }
}
