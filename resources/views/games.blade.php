@extends('infobase')

@section('info_content')
<?php

    $games = DB::select('select * from games');
    foreach($games as $game){
        echo "<div class='li-equiv'>";
        echo "<h1>" . $game->name . "</h1>" . $game->min_length . " - " . $game->max_length . " minutes<br>"
                 . $game->min_players . " - "
                . $game->max_players . " Players<br><br>"
                . "<div class='narrow'><b>" . $game->description . "</b></div><br><br><br>";
        echo "</p></div>";
    }
?>

@if(Auth::check() and Auth::user()->is_admin != 0)
    <h1>Create Game</h1>
    <form id="game-create" action='/add_game' method='POST'>
        <input type='text' name='name' placeholder='Name'><br>
        <textarea name="description" form="game-create" placeholder="Description"></textarea><br>
        Minimum Length (minutes): <input type='number' name='min_length' min="0" max="600"><br>
        Maximum Length (minutes): <input type='number' name='max_length' min="0" max="600"><br>
        Minimum Players: <input type='number' name='min' min="1" max="10"><br>
        Maximum Players: <input type='number' name='max' min="1" max="20"><br>
        <input type='submit' value='Add Game'><br>
        <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}'>
    </form>
@endif

@stop

@section('back_address')
    "/"
@stop
