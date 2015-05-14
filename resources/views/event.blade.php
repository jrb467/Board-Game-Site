<?php use \App\Event; ?>

@extends('infobase')

@section('title')
    {{ $event->game_name }}
@stop

@section('info_content')
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
    <p>
    <?php
        $query = \DB::table('events')->join('signups', 'event_id', '=', 'event')->join('players', 'player', '=', 'id')->where('event_id', '=', $event->event_id);
        $players = $query->get(['name']);
        foreach($players as $player){
            echo $player->name . "<br>";
        }
    ?>
    </p>

    <form action='{{$event->event_id}}/signup' method='POST'>
        <input type='checkbox' name='first_time' value="true">First Time?<br>
        <input class="button" type='submit' value='Signup!'><br>
        <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}'>
    </form>
@stop
