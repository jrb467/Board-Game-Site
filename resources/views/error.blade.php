@extends('base')

@section('sty')
    <link rel="stylesheet" href="/css/error.css">
@stop

@section('content')
    <h1>Sorry :(</h1>
    <h3>@yield('error_message')</h3>
    <a href="{{ URL::previous() }}">Return to Previous Page</a>
@stop
