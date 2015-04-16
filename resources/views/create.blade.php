@extends('app')

@section('title')
    Create Event
@stop

@section('content')

    <?php
        $time = (new DateTime())->setTimestamp(Input::get('time')/1000);
    ?>

    <h1>Create an Event!</h1>
    <h3>Time:</h3>
    {{ $time->format("h:i:s a, F jS, Y") }}
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
        <input type="hidden" name="time" value="{{ $time->format("Y-m-d H:i:s") }}">
        <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}'>
    </form>
@stop