@extends('layouts.app')

@section('content')
    <section class="tasks-list">
        <div class="info">
            <h1>Úroveň 1</h1>
            <p>V tejto úrovni sú najzákladnejšie programy, pre ich úspešné vypracovanie si treba prejsť dokumentáciu XX:</p>
        </div>
        <div class="tasks-import">
            @foreach ($tasks as $task)
                <div class="task">
                    <a>Úloha: </a>{{ $task->name }} 
                </div>
            @endforeach
        </div>
    </section>
@endsection