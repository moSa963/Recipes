<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(StoreReportRequest $request){
        Report::create([
            "user_id" => Auth::user()->id,
            "recipe_id" => $request->recipe_id,
            "title" => $request->title,
            "content" => $request->content,
        ]);

        return back();
    }
}
