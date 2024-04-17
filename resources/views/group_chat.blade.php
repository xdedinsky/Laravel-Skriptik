@extends('layouts.app')
<style>
    ul {
        list-style-type: none;
        padding: 0;
    }

    p{
        border: 0px !important;
        padding: 0px !important;
    }

    .right-name {
        text-align: right;
        color: rgb(3, 252, 194);
    }

    .left-name {
        text-align: left;
        color: rgb(3, 252, 194);
    }

    .message-container {
        display: flex;
        flex-direction: column;
    }

    .right-container {
        align-items: flex-end;
    }

    .left-container {
        align-items: flex-start;
    }

    .send-message {
        position: fixed;
        align-items: center;
        text-align: center;
        bottom: 0;
        width: 100%;
        padding: 10px;
    }
    .send-message input {
        width: 80%;
        padding: 10px;
        border: 1px solid #ccc;
    }
    .send-message button {
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #181818;
        color: #fff;
    }
    .send-message button:hover {
        background-color: rgb(3, 252, 194);
        color: #000;
    }

    .chat-container {
        margin-bottom: 50px;
    }	
    .message {
        border: 1px solid #ccc;
        padding: 10px;
        margin-right: 30px;
        margin-bottom: 10px;
    }

    .own-message {
        background-color: #181818;  
        text-align: left;
        color: #fff; 
        width: 60%;
        border: 1px solid rgb(3, 252, 194);
        position: relative; /* Added */
    }

    .delete-btn { /* Added */
        position: absolute;
        top: 0;
        right: 0;
        background-color: transparent;
        border: none;
        color: #fff;
        cursor: pointer;
    }

    .other-message {
        background-color: #181818; 
        text-align: left;
        color: #fff; 
        width: 60%;
    }

    .message-body {
        margin: 5px;
    }
</style>

@section('content')
<link href="{{ asset('storage/css/subPages.css')}}" rel="stylesheet" type="text/css" >
    <div class="chat-container">
        <ul class="message-list">
            @foreach($messages as $message)
                <div class="message-container {{ $message->user->id === Auth::user()->id ? 'right-container' : 'left-container' }}">
                    <p class="message {{ $message->user->id === Auth::user()->id ? 'right-name' : 'left-name' }}">{{ $message->user->name }}</p> 
                    <div class="message {{ $message->user->id === Auth::user()->id ? 'own-message' : 'other-message' }}">
                        <div class="message-body">{{ $message->message }}</div>
                        @if(Auth::check() && Auth::user()->id === $message->user_id)
                            <button class="delete-btn" onclick="event.preventDefault(); document.getElementById('delete-message-{{ $message->id }}').submit();">&#10005;</button>
                            <form id="delete-message-{{ $message->id }}" action="{{ route('delete.message', $message->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </ul>
    </div>

    <div class="send-message">
        <form action="{{ route('send.message') }}" method="post">
            @csrf
            <input type="text" name="message" placeholder="Napíšte správu">
            <button type="submit">Odoslať</button>
        </form>
    </div>

<script>
    window.onload = function() {
        window.scrollTo(0,document.body.scrollHeight);
    }
</script>
@endsection
