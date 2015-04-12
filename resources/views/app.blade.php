@extends('base')

@section('styles')
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/dankness.js"></script>
@stop

@section('content')
	@yield('cont')

    <div class="sidebar">
        <div class="center padded">
            <button value="Shit" onclick="dankMemes()">Dank Memes</button>
            <p id="memeclass"></p>
        </div>
    </div>
@stop
