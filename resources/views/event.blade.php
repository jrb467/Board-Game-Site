@extends('app')

@section('title')
    {{ $signup->game_name }}
@stop

@section('content')
    <h2>Start Time: </h2>
    <p>{{ (new DateTime($signup->start_time))->format('l \@ H:i a, m/d/y') }}</p>
    <h2>Min length: </h2>
    <p>{{ $signup->min_length }}</p>
    <h2>Game name: </h2>
    <p>{{ $signup->game_name }}</p>
    <?php
        echo "<form action='/delete/" . $signup->signup_id . "'>";
        echo "<input type='submit' value='Delete Event'></form>";
    ?>
@stop