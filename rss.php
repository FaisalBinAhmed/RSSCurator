<?php
echo "<link rel='stylesheet' type='text/css' href='style.css' />";

$html = "";
$feeds = array("http://anandtech.com/rss", "http://arstechnica.com/feed");

echo "<div class=\"grid-container outline\">";

foreach ($feeds as $url) {
  # code...
echo "<div class=\"row\">";


$xml = simplexml_load_file($url);
for($i = 0; $i < 2; $i++){
	$j=$i+1;

	$title = $xml->channel->item[$i]->title;
	$link = $xml->channel->item[$i]->link;
//  $author = $xml->channel->$item[$i]->author;
	//$description = $xml->channel->item[$i]->description;
	$pubDate = $xml->channel->item[$i]->pubDate;
//  $media = $xml->channel->$item[$i]->thumbnail;
//  $thumb = $media->thumbnail->attributes();
//  $murl = (string) $thumb['url'];
				$html .= "<div class=\"col-$j\">";
        $html .= "<a href='$link'><h3>$title</h3></a>";
      //  $html .= "<br />$author<hr />";
      //  $html .= "<img src=$media>";
      //	$html .= "$description";
      	$html .= "<br />$pubDate<hr />";

$html .= "</div>";
}

echo "</div>";

}
echo $html;
echo "</div>";

?>
