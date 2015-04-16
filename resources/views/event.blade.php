@extends('app')

@section('title')
    {{ $event->game_name }}
@stop

@section('content')
    <h2>Start Time: </h2>
    <p>{{ (new DateTime($event->start_time))->format('l \@ H:i a, m/d/y') }}</p>
    <h2>Min length: </h2>
    <p>{{ $event->min_length }}</p>
    <h2>Game name: </h2>
    <p>{{ $event->game_name }}</p>
    <?php
        echo "<form action='/delete/" . $event->event_id . "'>";
        echo "<input type='submit' value='Delete Event'></form>";
    ?>
@stop