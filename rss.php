<?php

echo "<link rel='stylesheet' type='text/css' href='style.css' /><script type=\"text/javascript\" src=\"script.js\"></script><script src=\"jquery-3.1.0.min.js\"></script>";

$html = "";
$feeds = array("http://feeds.reuters.com/reuters/topNews" ,"http://arstechnica.com/feed");
$js = "";
echo "<div class=\"grid-container outline\">";
$links = array();
$js .= "<script type=\"text/javascript\"> var A=[];";
//$js .= " var B=[];";
$j=0;
foreach ($feeds as $url) {
  # code...
$j=$j+1;
$html .= "<div class=\"cathead\"> <p>Technologies</p> </div>";
$html .= "<div class=\"row\">";


$xml = simplexml_load_file($url);
for($i = 0; $i < 3; $i++){
	$j=$j+$i;

	$title = $xml->channel->item[$i]->title;
	$links[$j] = $xml->channel->item[$i]->link;
	$js .= " A[$j] = ' $links[$j]';";
	//$js .= " B[$j] = ' $title ';";
//	$js .= "window.alert(A[$j]);";
	$description = $xml->channel->item[$i]->description;
	$des = substr($description, 0, 80)."...";
	$pubDate = $xml->channel->item[$i]->pubDate;



				$html .= "<div class=\"col-$i\">";
        $html .= "<div class=\"headline\">$title</div>";

      	$html .= "<div class=\"excerpt\">$des</div>";
				$html .="<div class=\"gridbottom\">";
      	$html .= "<div class=\"timestamp\">$pubDate</div>";
				$html .= "<div class=\"rmbtn\"><button id=\"rm-$j\" class=\"readmore\" onclick=\"readfunc($j)\" > Read more.. </button></div>";
				$html .= "</div>";
				$html .= "</div>";
}

$html .= "</div>";

}

$html .= "</div>";
$js .= "</script>";


echo $html;
echo $js;



?>
