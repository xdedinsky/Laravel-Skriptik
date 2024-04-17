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
            <h1>Úroveň 1</h1>
            <p class="p-gray">Ak má úloha zelené podfarbenie tak je splnená, a jej vypracovanie ti nepridá už žiadne body.</p>
            <p>V tejto úrovni sú najzákladnejšie programy, pre ich úspešné vypracovanie si treba prejsť dokumentácie:</p>
            <li>#1 Prvý kód v C++ </li> 
            <li>#2 Vytvorenie premenných a výpis programu</li>      
        </div>

        <div class="tasks-import">
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
