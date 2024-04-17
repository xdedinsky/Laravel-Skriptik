<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDone extends Model
{
    protected $table = 'list_tasks_done';
    use HasFactory;
    protected $fillable = ['user_id', 'task_id', 'points'];
}