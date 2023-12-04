@extends('layouts.app')

@section('content')
    <section class="tasks-list">
        <div class="info">
            <h1>BONUS</h1>
        </div>

        <div class="tasks-import" style="display: flex">
            @foreach ($tasks as $task)
                <div class="task">
                    <a>Úloha: </a>{{ $task->name }} 
                </div>
            @endforeach
        </div>
    </section>
@endsection