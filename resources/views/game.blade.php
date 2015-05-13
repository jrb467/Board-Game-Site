@extends('base')

@section('title')
    {{$game->name}}
@stop

@section('content')
    <h1>{{$game->name}}</h1>
    <p><strong>Players: </strong>{{$game->min_players}} - {{$game->max_players}}</p>
    <h2>Length: </h2>
    <p>{{$game->min_length}} - {{$game->max_length}} minutes</p>
    <h2>About:</h2>
    <p>{{$game->description}}</p>
@stop