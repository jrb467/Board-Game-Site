@extends('base')

@section('styles')
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/dankness.js"></script>
@stop

@section('content')
    <div id="content">
        @yield('cont')
    </div>
@stop
