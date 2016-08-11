<?php
//menu
include('navigation.php');
//db connection
$con=mysqli_connect('localhost','root','');
if(!$con)
{
		echo "Not connected";
}
if(!mysqli_select_db($con,'rsscurator'))
{
		echo "database not selected";
}

session_start();



//query

$q = " SELECT siteurl FROM sites WHERE catid IN (SELECT catID FROM usercats WHERE UID =".$_SESSION["UID"]." )";
$result=mysqli_query($con,$q) or die( mysqli_error($con) );

$rows = array();
$index = 0;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $rows[$index] = $row["siteurl"];
		$index++;
}

/*
$q = " SELECT catID FROM usercats WHERE UID =".$_SESSION["UID"]."";
$result=mysqli_query($con,$q) or die( mysqli_error($con) );

$rows = array();
$index = 0;
$rows2 = array();
$index2 = 0;

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $rows[$index] = $row["catID"];
		$index++;}


		for ($i=0; $i<$index; $i++) {

			$q2 = " SELECT siteurl FROM sites WHERE catid = ".$rows[$i]."";
			$result2=mysqli_query($con,$q2) or die( mysqli_error($con) );


			while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
			{
			    $rows2[$index] = $row2["siteurl"];
					$index2++;}



			# code...
	//}
	for($i=0; $i<$index2; $i++){
echo $rows2[$i];}
*/
//includes
echo "<link rel='stylesheet' type='text/css' href='style.css' /><script type=\"text/javascript\" src=\"script.js\"></script><script src=\"jquery-3.1.0.min.js\"></script>";

//grid
$html = "";
//$feeds = array("http://feeds.reuters.com/reuters/topNews" ,"http://arstechnica.com/feed");
$js = "";
echo "<div class=\"grid-container outline\">";
$links = array();
$js .= "<script type=\"text/javascript\"> var A=[];";
//$js .= " var B=[];";
$j=0;
foreach ($rows as $url) {
  # code...
$j=$j+1;
$html .= "<div class=\"cathead\"> <p>Category Name</p> </div>";
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
$html .= "
<div id=\"myModal\" class=\"modal\">

  <!-- Modal content -->
  <div class=\"modal-content\">
    <div class=\"modal-header\">

      <h2>Modal Header</h2>
			<button type=\"button\" class=\"close\" onclick=\"closearticle()\" >X</button>
    </div>
    <div class=\"modal-body\">
      <p id = \"articlewords\">Loading article...</p>

    </div>

  </div>

</div>

";

$html .= "</div>";
$js .= "</script>";
echo $html;
echo $js;
?>
