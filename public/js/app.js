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

/* Assigns a random background-color to a javascript DOM element, within the given RGB range
* (given as color strings, without the '#')
*/
function randomColor(elem, low, high){
    var r = randomRange(intSub(low,0,2), intSub(high,0,2));
    var g = randomRange(intSub(low,2,4), intSub(high,2,4));
    var b = randomRange(intSub(low,4,6), intSub(high,4,6));
    var colString = "#" + r + g + b;
    elem.style.backgroundColor = colString;
}

/* For colors, returns two number hex string. a is low, b is high (inclusive-exclusive) */
function randomRange(a,b){
    var str = (a + Math.floor((b-a)*Math.random())).toString(16);
    if(str.length == 1) str = "0" + str;
    return str;
}

/* parseInt(`string`.substring(a,b)), effectively
*/
function intSub(str,a,b){
    return parseInt(str.substring(a,b), 16);
}
