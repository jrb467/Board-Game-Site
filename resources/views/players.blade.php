@extends('infobase')

@section('title')
    Players
@stop

@section('info_content')
    <?php
        $players = DB::select('select * from players');
        foreach($players as $player){
            echo "<h2>" . $player->name . "</h2>";
        }
    ?>
@stop

@section('back_address')
    "/"
@stop
