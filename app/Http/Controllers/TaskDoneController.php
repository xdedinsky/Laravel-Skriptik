<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskDone;

class TaskDoneController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'task_id' => 'required|integer',
            'points' => 'required|integer',
        ]);

        $taskDoneAlready = TaskDone::where('user_id', $validatedData['user_id'])
                                    ->where('task_id', $validatedData['task_id'])
                                    ->exists();

        if ($taskDoneAlready) {
            return response()->json(['error' => 'Danú úlohu ste už odovzdali!'], 409);
        }

        $taskDone = new TaskDone();
        $taskDone->user_id = $validatedData['user_id'];
        $taskDone->task_id = $validatedData['task_id'];
        $taskDone->points = $validatedData['points'];

        $taskDone->save();
        $newTotalPoints = TaskDone::where('user_id', $validatedData['user_id'])->sum('points');
        // Vrátenie odpovede, napríklad JSON s potvrdením úspechu
        return response()->json([
            'success' => true,
            'newTotalPoints' => $newTotalPoints, // Nový celkový počet bodov používateľa
        ]);
        
    }

}