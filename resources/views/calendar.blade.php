@extends('base')

<?php use App\Signup; ?>

@section('styles')
    <link rel="stylesheet" href="/calendar/calendar.css">
    <script>

        $(document).ready(function() {
            $("td").on('click', 'div.event', function(e){
                e.stopPropagation();
            });
            $("td").click(function (e) {
                var row = $(this).parent().parent().children().index($(this).parent());
                var pos = $(this).position().left;

                var width = $(this).width();

                var offset = e.pageX - pos;

                var percent = 100*offset/width;

                //TODO translate into time, send server POST
            });

            var cur = new Date();

            var first = cur.getDate() - cur.getDay()+7;
            var last = first + 6;

            var fTime = new Date(cur.setDate(first)).getTime();
            var lTime = new Date(cur.setDate(last)).getTime();

            //Updating calendar ajax
            $.ajax({
                url: '/cal/events',

                data: {
                    start: Math.floor(fTime/1000),
                    end: Math.floor(lTime/1000)
                },

                dataType: 'json',

                success: function (json){
                    var curDay = 0; //Monday
                    var dayEnd = new Date(fTime);
                    dayEnd.setDate(dayEnd.getDate() + 1);
                    for(i = 0; i < json.length; i++){
                        var date = new Date(json[i].start_time);
                        while(date.getTime() > dayEnd.getTime() && curDay < 7){
                            curDay++;
                            dayEnd.setDate(dayEnd.getDate() + 1);
                        }
                        if(curDay == 7){
                            return;
                        }
                        date.setHours(0,0,0,0);
                        var dayElem = "table tr:nth-child(" + (curDay+1) + ") td.cal";
                        $(dayElem).empty();
                        var startTime = new Date(json[i].start_time);
                        var minWidth = json[i].min_length / json[i].max_length * 100;
                        var maxWidth = json[i].max_length / 14.4;
                        var offset = (startTime.getTime() - date.getTime())/864000;

                        var newDiv = "<a href='/events/" + json[i].signup_id + "' class='box-link'><div class='event' style='left: "+
                                offset+"%;width:"+maxWidth+"%'><div class='min' style='width: " + minWidth + "%'><p>" + json[i].game_name +
                                "</p><div class='hover'><p>View <img src='/glyphs/glyphicons-28-search.png' class='icon'></p></div></div></div></a>";
                        var newDivObj = $($.parseHTML(newDiv));
                        newDivObj.hide();
                        $(dayElem).append(newDivObj);
                        newDivObj.fadeIn(500);

                    }
                }
            });
        });
    </script>
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
<a class="button" href="/">Return to Index</a>

@stop