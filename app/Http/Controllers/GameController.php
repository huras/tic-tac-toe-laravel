<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function GameScreen(){
        return view('game.index');
    }
}
