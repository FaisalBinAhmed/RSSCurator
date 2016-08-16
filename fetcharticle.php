<?php

include('simple_html_dom.php');

$link =  $_REQUEST["url"];
$string = str_replace(' ', '', $link);

$html = "";
$fs = "18px";
$ff = "Segoe UI";

$html .= "<div class=\"article\">";

$ht = file_get_html($string);

$html .= "<div class=\"articletext\" >";
foreach ($ht->find('p') as $e) {

	if(strlen($e)>60){
	$html .= "<p>$e</p><br>";}
}
$html .= "</div>";

echo $html;

 ?>
