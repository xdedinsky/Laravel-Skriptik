@extends('layouts.app')

@section('content')
    <style>
        .py-4 {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
    </style>
    <section class="tasks-list">
        <div class="info">
            <h1>BONUS</h1>     
            <p class="p-gray">Ak má úloha zelené podfarbenie tak je splnená, a jej vypracovanie ti nepridá už žiadne body.</p>           
            <p>Pre vypracovanie by si mal správne ovládať všetky potrebné veci z dokumentácie</p>   
        </div>

        <div class="tasks-import" style="display: flex">
            @foreach ($tasks as $task)
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}">    
                    <div class="task {{ in_array($task->id, $completedTasks) ? 'task-completed' : '' }}">
                        <span>Úloha:</span>
                        <span class="task-name">{{ $task->name }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
