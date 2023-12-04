<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelOneController extends Controller
{
    public function index()
    {

        $tasks = DB::table('main_tasks')->where('level', 1)->get();
        
        return view('tasks.levelOne', ['tasks' => $tasks]);
    
    }
}
