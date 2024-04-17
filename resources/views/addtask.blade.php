@extends('layouts.app')

@section('content')  
    <div class="info-task-add">
        <h2>Úrovne</h2>
        <li> 1. úroveň -> Úroveň úlohy = 1</li> 
        <li> 2. úroveň -> Úroveň úlohy = 2</li>
        <li> 3. úroveň -> Úroveň úlohy = 3</li>
        <li> Bonusová úroveň -> Úroveň úlohy = 4</li>
        <br>
        <h2>Výsledok úlohy</h2>
        <a> Výsledok úlohy treba dobre zvážiť vrátane " " na konci reťazca</a>
        <br>
        <a> Viacej riadkov zapisujte následovne: Ahoj\nAko\nSa\nMas</a>
    </div>


<div class="container-form">
    <form method="POST" action="{{ route('main_tasks.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Názov úlohy:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">Popis úlohy:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="result">Výsledok úlohy:</label>
            <textarea class="form-control" id="result" name="result" rows="1" required></textarea>
        </div>

        <div class="form-group">
            <label for="level">Úroveň úlohy:</label>
            <textarea class="form-control" id="level" name="level" rows="1" required></textarea>
        </div>
        <div class="container-form-foot">
            <button type="submit" class="btn btn-primary">Odoslať</button>
        </div>
    </form>
</div>
@endsection
