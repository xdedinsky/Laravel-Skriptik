<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelTwoController extends Controller
{
    public function index()
    {
        $tasks = DB::table('main_tasks')->where('level', 2)->get();
        
        return view('tasks.levelTwo', ['tasks' => $tasks]);
    }
}
