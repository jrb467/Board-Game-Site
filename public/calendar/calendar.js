$(document).ready(function() {

    var create = $("#create");

    $("td").on('click', 'div.event', function(e){
        e.stopPropagation();
    });
    $("td.cal").click(function (e) {
        var row = $(this).parent().parent().children().index($(this).parent()) - 1;

        var width = $(this).width();

        var x = e.clientX - $(this).offset().left;
        var y = e.clientY;

        var fraction = x/width;

        var week = startOfWeek();
        var eventTime = timeFromDayAndFraction(week, row, fraction);

        create.offset({top: y - (0.5 * create.outerHeight()), left: e.clientX - (0.5 * create.outerWidth())}).css("visibility", "visible");
        create.find("p").empty().append(formatTime(eventTime));
        var link = create.find('a');
        link.attr("href", "/create?time=" + eventTime.getTime() + "&tzo=" + eventTime.getTimezoneOffset());
    });
    create.find("span").click(function (e){
        create.css("visibility", "hidden");
    });

    var cur = new Date(); //Local time (current time)
    cur.setHours(0,0,0,0); //Initializes to start of local day

    //NOTE: 0 is SUNDAY, while 6 is SATURDAY. MONDAY as 0 is this minus 1
    //If a sunday, set to current date (start of week), else set to the date minus day (gets saturday) + 1
    var first = startOfWeek();
    var last = endOfWeek();

    var fTime = first.getTime();
    var lTime = last.getTime();

    //------------------------------------_NOTE_---------------------------------------------------------------
    //Problem is in transfer and storage.  Every time is stored as 24hr, but gets truncate to 12 hour (which becomes AM)
    //---ABOVE should be fixed. Now there is an issue with Sunday






    //Updating calendar ajax
    $.ajax({
        url: '/cal/events',

        data: {
            start: Math.floor(fTime/1000), //Both UTC time, based on the local begin/end periods
            end: Math.floor(lTime/1000)
        },

        dataType: 'json',

        success: function (json){
            var curDay = 0; //Monday
            var dayEnd = startOfWeek(); //Creates a date for the end of the day
            dayEnd.setDate(dayEnd.getDate()+1);
            var first_flag = true;
            for(i = 0; i < json.length; i++){
                var firstHalf = json[i].start_time.substr(0,10);
                var lastHalf = json[i].start_time.substr(11);
                var dateString= firstHalf + "T" + lastHalf + "Z";
                var date = new Date(dateString); //CHECK Date.parse() to ensure proper formatting
                while(date.getTime() >= dayEnd.getTime() && curDay < 7){
                    curDay++;
                    dayEnd.setDate(dayEnd.getDate() + 1);
                    first_flag = true;
                }
                if(curDay == 7){
                    return;
                }
                var dayElem = $("tr:nth-child(" + (curDay+2) + ") td.cal");
                if(first_flag){
                    dayElem.empty();
                    first_flag = false;
                }
                date.setHours(0,0,0,0);
                var startTime = new Date(dateString);

                var minWidth = json[i].min_length / json[i].max_length * 100;
                var maxWidth = json[i].max_length / 14.4;
                var offset = (startTime.getTime() - date.getTime())/864000;

                var newDiv =
                    "<a href='/events/" + json[i].event_id + "?tzo=" + date.getTimezoneOffset() + "' class='box-link'><div class='event' style='left: "+
                    offset+"%;width:"+maxWidth+"%'><div class='min' style='width: " + minWidth + "%'></div><div class='title'><p>" + json[i].game_name +
                    "</p></div><div class='hover'><p>View <img src='/glyphs/glyphicons-28-search.png' class='icon'></p></div></div></a>";
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
    fraction = fraction*24 + 0.125;
    var hours = Math.floor(fraction);
    fraction = Math.floor((fraction % 1)*4);
    var minutes = fraction*15;
    day.setHours(hours, minutes, 0, 0);
    return day;
}

function startOfWeek(){
    var cur = new Date();
    var first = (cur.getDay() !== 0) ? (cur.getDate() - cur.getDay() + 1) : (cur.getDate()-6); //gets date of first day of week (1-31)
    cur.setDate(first);
    cur.setHours(0,0,0,0);
    return cur;
}

function formatTime(date){
    var hours = date.getHours();
    var minutes = date.getMinutes();
    if(minutes.toString().length == 1) minutes = "0" + minutes;
    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear().toString().substring(2);
    var mer;
    if(date.getHours >= 12){
        mer = "PM";
    }else{
        mer = "AM";
    }
    var tString = hours + ":" + minutes + " " + mer + ", " + month + "/" + day + "/" + year;
    return tString;
}

function endOfWeek(){
    var start = startOfWeek();
    start.setDate(start.getDate() + 7);
    return start;
}
