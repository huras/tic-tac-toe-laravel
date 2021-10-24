<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(){
        return view('results.index');
    }

    public function store(Request $request){
        $result = Result::create($request->all());
        return response()->json(['result' => $result]);
    }
}
