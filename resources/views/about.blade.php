@extends('app')

@section('title')
    About
    @stop


@section('content')

Hello, {{ Input::get("first") }} {{ Input::get("last") }}

@stop

