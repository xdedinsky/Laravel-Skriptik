<?php

namespace App\Http\Controllers;

use App\Models\MainTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function showDetailedView($taskId)
    {
        // Získajte úlohu podľa ID
        $task = MainTask::find($taskId);

        // Kontrola, či úloha existuje
        if (!$task) {
            abort(404); // V prípade, že úloha neexistuje, vráťte 404
        }

        // Poskytnite údaje o úlohe do view
        return view('tasks.task-detailed', compact('task'));
    }
}
