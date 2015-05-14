@extends('app')

<?php use App\Signup; ?>

@section('styles')
    <link rel="stylesheet" href="/calendar/calendar.css">
    <script src="/calendar/calendar.js"></script>
@stop

@section('title')
    Schedule
@stop

@section('cont')

<div class="empty">
<div id="calendar">
    <table>

        <?php
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        echo "<tr id='clock-row'><td></td><td id='clock'><span></span>";
        for($i = 1; $i < 24; $i++){
            echo "<span>" . timeFromHour($i) . "</span>";
        }
        echo "</td></tr>";
        for($i = 0; $i < 7; $i++){
            echo "<tr><td class='heading'>" . $days[$i] . "</td><td class='cal'></td></tr>";
        }
        ?>
    </table>
</div>
</div>
<div id="create"><p></p><br><a class="button-prim accept" href="/create">New Event</a><span class="button-prim reject">Cancel</span></div>
<a class="button" href="/">Return to Index</a>

@stop

<?php
    function timeFromHour($hour){
        if($hour == 12){
            return "12 PM";
        }else if($hour > 12){
            return ($hour - 12) . " PM";
        }else{
            return $hour . " AM";
        }
    }
?>
