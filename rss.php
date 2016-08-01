<?php
$html = "";
$feeds = array("http://anandtech.com/rss", "http://arstechnica.com/feed", "http://www.dhakatribune.com/rss/latest");
foreach ($feeds as $url) {
  # code...

$xml = simplexml_load_file($url);
for($i = 0; $i < 3; $i++){
	$title = $xml->channel->item[$i]->title;
	$link = $xml->channel->item[$i]->link;
//  $author = $xml->channel->$item[$i]->author;
	$description = $xml->channel->item[$i]->description;
	$pubDate = $xml->channel->item[$i]->pubDate;
//  $media = $xml->channel->$item[$i]->thumbnail;
//  $thumb = $media->thumbnail->attributes();
//  $murl = (string) $thumb['url'];

        $html .= "<a href='$link'><h3>$title</h3></a>";
      //  $html .= "<br />$author<hr />";
      //  $html .= "<img src=$media>";
      	$html .= "$description";
      	$html .= "<br />$pubDate<hr />";

}}
echo $html;
?>
