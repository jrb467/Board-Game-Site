@extends('infobase')

@section('title')
    Create Event
@stop

@section('info_content')
    <h1>Create an Event!</h1>
    {{ $time }}
    <h3>Game:</h3>
    <select name="game" form="create">
    <?php
        $games = DB::table('games')->lists('name');
        foreach($games as $game){
            echo "<option value='" . $game . "'>" . $game . "</option>";
        }
    ?>
    </select>
    <form action="/add_event" method="POST" id="create">
        <input class="button" type="submit" value="Create Game">
        <input type="hidden" name="time" value="{{ $timestamp }}">
        <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}'>
    </form>
@stop

@section('back_address')
    "/cal"
@stop
