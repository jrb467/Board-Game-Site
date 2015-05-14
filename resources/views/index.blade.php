@extends('app')

@section('title')
    Index
@stop


@section('cont')

<h1>Donlon <b><i>5</i></b> Board Games</h1>

<a class='button' href="/cal">View the current Schedule</a>

<div id="input_form">
    <h2>Player creation:</h2>
    <form action='add_player' method='POST'>
        Name: <input type='text' name='name'><br>
        Username: <input type='text' name="username"><br>
        <input type='submit' value='Create User'><br>
        <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}'>
    </form>
</div>

<form action='add_game' method='POST'>
    <h2>Game creation:</h2>
    Game Name: <input type='text' name='name'><br>
    Game Description: <input type='text' name='description'><br>
    Minimum Length (minutes): <input type='number' name='min_length' min="0" max="600"><br>
    Maximum Length (minutes): <input type='number' name='max_length' min="0" max="600"><br>
    Minimum Players: <input type='number' name='min' min="1" max="10"><br>
    Maximum Players: <input type='number' name='max' min="1" max="20"><br>
    <input type='submit' value='Add Game'><br>
    <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}'>
</form>

<p><a class='button' href="info">Info Page</a></p>

<?php
    $players = DB::select('select * from players');
    echo "<h3>Players:</h3><p>";
    foreach($players as $player){
        echo "Name: " . $player->name . "<br><br>";
    }
    echo "</p>";


    $games = DB::select('select * from games');
    echo "<h3>Games:</h3><p>";
    foreach($games as $game){
        echo "Name: " . $game->name . "<br>Length: " . $game->min_length . " - " . $game->max_length . " minutes<br>"
                . "Description: " . $game->description . "<br>Players: " . $game->min_players . " - "
                . $game->max_players . "<br><br>";
    }
    echo "</p>";

    /*
    $events = DB::select('select * from events');
    echo "<h3>Events:</h3><p>";
    foreach($events as $event){
        echo "Game: " . $event->game_name . "<br>Time: "
                . $event->start_time . "<br><br>";
    }
    echo "</p>";

    $signups = DB::select('select * from signups');
    echo "<h3>Signups:</h3><p>";
    foreach($signups as $signup){
        echo "User ID: " . $signup->player . "<br>Event ID: " . $signup->event . "<br><br>";
    }
    echo "</p>";
    */
?>

@stop
