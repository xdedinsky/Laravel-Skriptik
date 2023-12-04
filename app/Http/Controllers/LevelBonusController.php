<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelBonusController extends Controller
{
    public function index()
    {
        $tasks = DB::table('main_tasks')->where('level', 4)->get();
        
        return view('tasks.levelBonus', ['tasks' => $tasks]);
    }
}
