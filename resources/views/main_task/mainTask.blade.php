@extends('layouts.app')

@section('content')

<div class="gallery">
        <img src="{{ asset('storage/top.png')}}" alt="top" onclick="redirectToLevelTwo()">
        <img src="{{ asset('storage/right.png')}}" alt="right" onclick="redirectToLevelThree()">
        <img src="{{ asset('storage/bottom.png')}}" alt="bottom" onclick="redirectToLevelBonus()">
        <img src="{{ asset('storage/left.png')}}" alt="left" onclick="redirectToLevelOne()">
</div>

<script>
    function redirectToLevelOne() {
        window.location.href = "{{ url('/levelOne') }}";
    }
    function redirectToLevelTwo() {
        window.location.href = "{{ url('/levelTwo') }}";
    }
    function redirectToLevelThree() {
        window.location.href = "{{ url('/levelThree') }}";
    }
    function redirectToLevelBonus() {
        window.location.href = "{{ url('/levelBonus') }}";
    }
</script>

@endsection