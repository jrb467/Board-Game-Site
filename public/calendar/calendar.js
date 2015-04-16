$(document).ready(function() {

    var create = $("#create");

    $("td").on('click', 'div.event', function(e){
        e.stopPropagation();
    });
    $("td.cal").click(function (e) {
        var row = $(this).parent().parent().children().index($(this).parent());
        var pos = $(this).position().left;

        var width = $(this).width();

        var offset = e.pageX - pos;

        var fraction = offset/width;
        var percent = 100*fraction;

        var week = new Date();
        week.setDate(week.getDate() - week.getDay()+1);
        var eventTime = timeFromDayAndFraction(week, row, fraction);

        create.offset({top: e.pageY - (.5 * create.outerHeight()), left: e.pageX - (.5 * create.outerWidth())}).css("visibility", "visible");
        create.find("p").empty().append(eventTime.toUTCString());
        var link = create.find('a');
        link.attr("href", "/create?time=" + eventTime.getTime());
    });
    create.find("span").click(function (e){
        create.css("visibility", "hidden");
    });

    var cur = new Date();

    var first = cur.getDate() - cur.getDay();
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
            var first_flag = true;
            for(i = 0; i < json.length; i++){
                var date = new Date(json[i].start_time);
                while(date.getTime() > dayEnd.getTime() && curDay < 7){
                    curDay++;
                    dayEnd.setDate(dayEnd.getDate() + 1);
                    first_flag = true;
                }
                if(curDay == 7){
                    return;
                }
                var dayElem = $("table tr:nth-child(" + (curDay+1) + ") td.cal");
                if(first_flag){
                    dayElem.empty();
                    first_flag = false;
                }
                date.setHours(0,0,0,0);
                var startTime = new Date(json[i].start_time);
                var minWidth = json[i].min_length / json[i].max_length * 100;
                var maxWidth = json[i].max_length / 14.4;
                var offset = (startTime.getTime() - date.getTime())/864000;

                var newDiv =
                    "<a href='/events/" + json[i].event_id + "' class='box-link'><div class='event' style='left: "+
                    offset+"%;width:"+maxWidth+"%'><div class='min' style='width: " + minWidth + "%'><p>" + json[i].game_name +
                    "</p><div class='hover'><p>View <img src='/glyphs/glyphicons-28-search.png' class='icon'></p></div></div><div class='create'>fuck</div></div></a>";
                var newDivObj = $($.parseHTML(newDiv));
                newDivObj.hide();
                dayElem.append(newDivObj);
                newDivObj.fadeIn(500);

            }
        }
    });
});

function timeFromDayAndFraction(week, dayOfWeek, fraction){
    var day = new Date(week);
    day.setDate(week.getDate() + dayOfWeek);
    fraction = fraction*24;
    var hours = Math.floor(fraction);
    fraction = Math.floor((fraction % 1)*4);
    var minutes = fraction*15;
    day.setHours(hours, minutes, 0, 0);
    return day;
}