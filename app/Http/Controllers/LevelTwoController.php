<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelTwoController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id; 

        $tasks = DB::table('main_tasks')->where('level', 2)->get();

        $completedTasks = DB::table('list_tasks_done')
                            ->where('user_id', $user_id)
                            ->pluck('task_id')->all();

        return view('tasks.levelTwo', [
            'tasks' => $tasks,
            'completedTasks' => $completedTasks
        ]);
    }
}
