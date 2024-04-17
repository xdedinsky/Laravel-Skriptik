@extends('layouts.app')

@section('content')
<style>
/* Glow Border Animation */
@keyframes slide {
  to {
    background-position: 200% center;
  }
}

.user-frame {
  position: relative;
  border: 3px solid transparent; 
  padding: 10px;
  margin: 5px;
  width: 50%;
  text-align: center;
  border-radius: 10px; 
  overflow: hidden; 
  background: linear-gradient(90deg, rgba(0,0,0,0), rgb(14, 92, 74), rgba(0,0,0,0));
}

.first-place {
  background: linear-gradient(90deg, rgb(118, 104, 40), #FFD700, rgb(118, 104, 40));
  background-size: 200% 100%;
  animation: slide 4s linear infinite;
}

.second-place {
  background: linear-gradient(90deg, rgba(0,0,0,0), #C0C0C0, rgba(0,0,0,0));
}

.third-place {
  background: linear-gradient(90deg, rgba(0,0,0,0), #CD7F32, rgba(0,0,0,0));
}

.ladder-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

</style>
<section class="ladder-list">
    @php
        $previousTotalPoints = null;
        $displayRank = 0;
        $class = '';
    @endphp
    @foreach ($users as $index => $user)
        @if ($previousTotalPoints !== $user->total_points)
            @php
                $displayRank++;
            @endphp
        @endif
        @php
            $class = '';
            if ($displayRank == 1) $class = 'first-place';
            elseif ($displayRank == 2) $class = 'second-place';
            elseif ($displayRank == 3) $class = 'third-place';
        @endphp
        <div class="user-frame {{ $class }}">
            <strong>#{{ $displayRank }}</strong> <strong>{{ $usernames[$user->user_id] }}</strong>: {{ $user->total_points }} (Počet bodov)
        </div>
        @php
            $previousTotalPoints = $user->total_points;
        @endphp
    @endforeach
</section>

@endsection
