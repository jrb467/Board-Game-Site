<?php use \App\Event; ?>

@extends('infobase')

@section('title')
    {{ $event->game_name }}
@stop

@section('info_content')
    <h1>{{ $event->game_name }}</h1>
    <p>{{ $time }}</p>
    <p>{{ $event->min_length }}-{{$event->max_length}} minutes</p>
    <div class="narrow"><b>{{ $event->description }}</b></div>
    <?php
        echo "<form action='/delete/" . $event->event_id . "'>";
        echo "<input type='submit' value='Delete Event'></form>";
    ?>
    <p>
    <?php
        $query = \DB::table('events')->join('signups', 'event_id', '=', 'event')->join('players', 'player', '=', 'id')->where('event_id', '=', $event->event_id);
        $players = $query->get(['name']);
        foreach($players as $player){
            echo $player->name . "<br>";
        }
    ?>
    </p>

    @if (Auth::check())
    <form action='{{$event->event_id}}/signup' method='POST'>
        <input type='checkbox' name='first_time' value="true">First Time?<br>
        <input class="button" type='submit' value='Signup!'><br>
        <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}'>
    </form>
    @else
    <a class="button" href="/auth/login">Login</a>
    @endif
@stop

@section('back_address')
    "/cal"
@stop
