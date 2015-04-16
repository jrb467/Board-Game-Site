@extends('base')

<?php use App\Signup; ?>

@section('styles')
    <link rel="stylesheet" href="/calendar/calendar.css">
    <script src="/calendar/calendar.js"></script>
@stop

@section('title')
    Schedule
@stop

@section('content')

<table>

<?php
    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    for($i = 0; $i < 7; $i++){
        echo "<tr><td class='heading'>" . $days[$i] . "</td><td class='cal'></td></tr>";
    }
?>
</table>
<div id="create"><p></p><br><a class="button-prim accept" href="/create">New Event</a><span class="button-prim reject">Cancel</span></div>
<a class="button" href="/">Return to Index</a>

@stop