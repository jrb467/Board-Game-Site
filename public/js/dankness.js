var color = "#ff0000";

var cycle = 0;
var started = false;

function dankMemes(){
    if(!started){
        setInterval(function(){updateColor()}, 60);
        started = true;
    }
    document.getElementById("memeclass").innerHTML += "( ͡° ͜ʖ ͡°)";
}

function updateColor(){
    var red = normalize(255*Math.sin(cycle) | 0);
    var green = normalize(255*Math.sin(cycle + 2) | 0);
    var blue = normalize(255*Math.sin(cycle + 4) | 0);

    var redHex = correctLength(red.toString(16));
    var greenHex = correctLength(green.toString(16));
    var blueHex = correctLength(blue.toString(16));

    var colorString = "#" + redHex + greenHex + blueHex;
    document.getElementById("memeclass").style.color = colorString;
    document.getElementById("memeclass").style.transform =
        "translate("+(Math.random() * 300)+"px, "+(Math.random() * 300)+"px)";
    cycle += .05;
}

function normalize(num){
    return (num < 0) ? 0 : num;
}

function correctLength(str){
    if(str.length == 1) return "0"+str;
    else return str;
}