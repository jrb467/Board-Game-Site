@extends('base')

@section('sty')
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/dankness.js"></script>
    @yield('styles')
@stop

@section('content')
    <div id="content">
        @yield('cont')
    </div>
    @if (Auth::check())
        <div id="user-info">
            <p>Currently logged in as:</p>
            <h3>{{Auth::user()->name}}</h3>
            <a href="/logout">Logout</a>
        </div>
    @endif
@stop
