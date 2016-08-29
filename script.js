//our first javascript code
var arturl;
var span;
var modal;

function readfunc(a){
arturl=A[a];
span = document.getElementsByClassName("close")[0];
modal = document.getElementById('myModal');
modal.style.visibility = 'visible';

var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("articlewords").innerHTML = xmlhttp.responseText;
                document.getElementById("articlehead").innerHTML = B[a];
            }
        };
        xmlhttp.open("GET", "fetcharticle.php?url="+A[a], true);
        xmlhttp.send();


}


function closearticle(){

modal.style.visibility="hidden";
document.getElementById("articlewords").innerHTML = "Loading article...";
document.getElementById("articlehead").innerHTML = "Loading headline...";
}

function sharearticle(){

window.open ("https://www.facebook.com/sharer/sharer.php?u="+arturl,
"Share","menubar=1,resizable=1,width=350,height=250");

}

function sharearticletw(){

window.open ("http://twitter.com/share?url="+arturl,
"Share","menubar=1,resizable=1,width=350,height=250");

}


function switcharticle(){
  var modaly = document.getElementById('modaly');
  var texty = document.getElementById('articlewords');
  var heady = document.getElementById("articlehead");
  var x = document.getElementById("themes").value;
 //var option = theme.options[theme.selectedIndex].value;

 if(x=="white"){
   texty.style.backgroundColor='White';
   texty.style.color='Black';
   heady.style.color='Black';
   modaly.style.backgroundColor='White';
}
else if(x=="night"){
texty.style.backgroundColor='Black';
texty.style.color='White';
heady.style.color='White';
modaly.style.backgroundColor='Black';
}
else if(x=="sepia"){
texty.style.backgroundColor='#f5f5dc';
texty.style.color='Black';
heady.style.color='Black';
modaly.style.backgroundColor='#f5f5dc';
}
else{
texty.style.backgroundColor='#191970';
texty.style.color='White';
heady.style.color='White';
modaly.style.backgroundColor='#191970';
}



}
