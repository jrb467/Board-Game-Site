<?php use \App\Event; ?>

@extends('app')

@section('title')
    {{ $event->game_name }}
@stop

@section('cont')
    <h2>Start Time: </h2>
    <p>{{ (new DateTime($event->start_time))->format('l \@ H:i a, m/d/y O e') }}</p>
    <h2>Min length: </h2>
    <p>{{ $event->min_length }}</p>
    <h2>Game name: </h2>
    <p>{{ $event->game_name }}</p>
    <?php
        echo "<form action='/delete/" . $event->event_id . "'>";
        echo "<input type='submit' value='Delete Event'></form>";
    ?>
    <h2>Players:</h2>
    <ul>
    <?php
        $players = DB::select('select * from events join signups on events.event_id = signups.event join players on signups.player = players.username');
        foreach($players as $player){
            echo "<li>" . $player->player . "</li>";
        }
    ?>
    </ul>

    <form action='{{$event->event_id}}/signup' method='POST'>
        Username: <input type='text' name='username'><br>
        <input type='checkbox' name='first_time' value="true">First Time?<br>
        <input class="button" type='submit' value='Signup!'><br>
        <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}'>
    </form>
@stop