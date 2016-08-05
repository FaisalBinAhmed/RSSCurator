<?php

//connection
/*
$con=mysqli_connect('localhost','root','');
if(!$con)
{
    echo "Not connected";
}
if(!mysqli_select_db($con,'rsscurator'))
{
    echo "database not selected";
}



$sql= "select UID from users where email='husfus@gmail.com'";
$result=mysqli_query($con,$sql) or die(mysqli_error());

$sql2 = "select catID from usercats where UID = '$result' ";

$result2 =mysqli_query($con,$result) or die(mysqli_error());
echo $result2;*/
/*
$srch= mysqli_fetch_array($result);
if($srch['email']==$email && $srch['password']==$pass){
    echo "Welcome ".$srch['email'];
}
else{
    echo "login hoi nai ";
}
*/









include('simple_html_dom.php');

echo "<link rel='stylesheet' type='text/css' href='style.css' /><script type=\"text/javascript\" src=\"script.js\"></script>";

//$key1 = $_POST["key1"];
$link =  $_GET["url"];
$string = str_replace(' ', '', $link);

$fs = "18px";
$ff = "'Merriweather', Georgia, 'Times New Roman', Times, serif";

$html = "";
// $html .= "<button onclick= \"fontsize()\">Set</button>";
$html .= "<div class=\"article\">";

$ht = file_get_html($string);

$html .= "<div class=\"articletext\" style =\"font-size:$fs; font-family: $ff; \" >";
foreach ($ht->find('p') as $e) {

	if(strlen($e)>60){
	$html .= "<p>$e</p><br>";}
}
$html .= "</div>";

$html .= "<div class=\"articleimages\">";
foreach ($ht->find('img') as $e) {
	$html .= "<img src=\"$e->src\" ><br>";
}
$html .= "</div>";

$html .= "</div>";

echo $html;



 ?>
