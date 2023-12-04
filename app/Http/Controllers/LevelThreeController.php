<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelThreeController extends Controller
{
    public function index()
    {
        $tasks = DB::table('main_tasks')->where('level', 3)->get();
        
        return view('tasks.levelThree', ['tasks' => $tasks]);
    }
}
