<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function create(){
        return view("user.show", ["user" => Auth::user()]);
    }

    public function show($id){
        $user = User::find($id);

        if (! $user) abort(404);

        if (Auth::check() && $user->id == Auth::user()->id) return redirect()->route("user.create");

        return view("user.show", ["user" => $user]);
    }

    public function update(Request $request) {
        $request->validate([
            "image" => ["image"],
        ]);

        //delete the old image if exist
        Storage::delete("user/".Auth::user()->email);

        $file = $request->file("image");

        //store the new image
        Storage::putFileAs("user", $file, Auth::user()->email);
        
        return back();
    }

    public function image($id){
        $user = User::find($id);

        if (! $user) return response('', 404);

        if (Storage::exists("user/".$user->email)){
            return Storage::download("user/".$user->email);
        }

        return redirect("img/default_user.png");
    }

}