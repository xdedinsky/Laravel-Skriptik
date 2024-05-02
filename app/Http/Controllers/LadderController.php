<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class LadderController extends Controller
{
    public function index()
    {
        $users = DB::table('list_tasks_done')
                    ->select('user_id', DB::raw('SUM(points) as total_points'))
                    ->groupBy('user_id')
                    ->orderBy('total_points', 'desc')
                    ->get();

        $usernames = DB::table('users')
                       ->whereIn('id', $users->pluck('user_id'))
                       ->pluck('name', 'id');

        return view('ladder', compact('users', 'usernames'));
    }

    
    public function getUserPoints()
    {
        $userId = auth()->user()->id; 
        $points = \DB::table('list_tasks_done')
                    ->where('user_id', $userId)
                    ->sum('points'); 

        return $points;
    }

}
