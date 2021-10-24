<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(){
        $results = Result::all();
        return view('results.index', compact('results'));
    }

    public function store(Request $request){
        $result = Result::create($request->all());
        return response()->json(['result' => $result]);
    }
}
