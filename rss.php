<?php

echo "<link rel='stylesheet' type='text/css' href='style.css' /><script type=\"text/javascript\" src=\"script.js\"></script><script src=\"jquery-3.1.0.min.js\"></script>";

$html = "";
$feeds = array("http://feeds.reuters.com/reuters/topNews" ,"http://arstechnica.com/feed");
$js = "";
echo "<div class=\"grid-container outline\">";
$links = array();
$js .= "<script type=\"text/javascript\"> var A=[];";
$j=0;
foreach ($feeds as $url) {
  # code...
$j=$j+1;
$html .= "<div class=\"row\">";


$xml = simplexml_load_file($url);
for($i = 0; $i < 2; $i++){
	$j=$j+$i;

	$title = $xml->channel->item[$i]->title;
	$links[$j] = $xml->channel->item[$i]->link;
	$js .= " A[$j] = ' $links[$j]';";
//	$js .= "window.alert(A[$j]);";
	$description = $xml->channel->item[$i]->description;
	$des = substr($description, 0, 80)."...";
	$pubDate = $xml->channel->item[$i]->pubDate;



				$html .= "<div class=\"col-$i\">";
        $html .= "<div class=\"headline\">$title</div>";

      	$html .= "<div class=\"excerpt\">$des</div>";
      	$html .= "<div class=\"timestamp\">$pubDate</div>";
				$html .= "<button id=\"rm-$j\" class=\"readmore\" onclick=\"readfunc($j)\" > Read more.. </button>";
				$html .= "</div>";
}

$html .= "</div>";

}
$html .= "</div>";
$js .= "</script>";
/*
$ht = file_get_html($links[2]);
foreach ($ht->find('img') as $e) {
	$html .= "<img src=\"$e->src\" ><br>";
	# code...
}*/

echo $html;
echo $js;



?>
