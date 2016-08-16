//our first javascript code
var x = document.createElement("IFRAME");
var out = '';
x.setAttribute("width", "1280px");


var span;
var modal;

function readfunc(a){
/*
var tab = window.open("readnews.php?url="+A[a], 'RSS Curator');
tab.focus();*/
span = document.getElementsByClassName("close")[0];
modal = document.getElementById('myModal');
modal.style.visibility = 'visible';

var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("articlewords").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "fetcharticle.php?url="+A[a], true);
        xmlhttp.send();


}


function closearticle(){

modal.style.visibility="hidden";
document.getElementById("articlewords").innerHTML = "Loading article...";

}
