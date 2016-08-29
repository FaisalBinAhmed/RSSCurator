<?php
//menu
//error_reporting(0);
include('navigation.php');
echo "<link rel='stylesheet' type='text/css' href='style.css' /><script type=\"text/javascript\" src=\"script.js\"></script>";
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

$fs=$_SESSION["fontsize"]."px";
$fonty =$_SESSION["font"];
$zero = 0;
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

//grid
$html = "";
$js = "";
echo "<div class=\"grid-container outline\">";
$links = array();
$js .= "<script type=\"text/javascript\">";
$js .=  "var A = [];";
$js .=  "var B = [];";
$j=0;
$rows2= "";
foreach ($rows as $url) {

	$q2 = "SELECT catname FROM categories WHERE catID = (SELECT catID from sites where siteurl = '".$url."')";
	$result2 = mysqli_query($con,$q2) or die( mysqli_error($con) );

	while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
	{
	    $rows2 = $row2["catname"];
	}
  # code...
	$html .= "<div class=\"rowcontainer\">";
$j=$j+1;
$html .= "<div class=\"cathead\"> <p> $rows2</p> </div>";
$html .= "<div class=\"row\">";
$xml = simplexml_load_file($url);
for($i = 0; $i < 3; $i++){
	$j=$j+$i;
	$title = $xml->channel->item[$i]->title;
	$links[$j] = $xml->channel->item[$i]->link;
	$js .= " A[$j] = \"$links[$j]\";";
	$js .= " B[$j] = \"$title\";";
	$description = $xml->channel->item[$i]->description;
	$des = substr($description, 0, 80)."...";
	$pubDate = $xml->channel->item[$i]->pubDate;
				$html .= "<div class=\"col-$i\">";
        $html .= "<div class=\"headline\">$title</div>";
      	$html .= "<div class=\"excerpt\">$des</div>";
				$html .= "<hr/>";
				$html .="<div class=\"gridbottom\">";
      	$html .= "<div class=\"timestamp\">$pubDate</div>";
				$html .= "<div class=\"rmbtn\"><button id=\"rm-$j\" class=\"readmore\" onclick=\"readfunc($j)\" > Read more.. </button></div>";
				$html .= "</div>";
				$html .= "</div>";
}
$html .= "</div></div>";
}
$html .= "
<div id=\"myModal\" class=\"modal\">


  <div id=\"modaly\" class=\"modal-content\">
    <div class=\"modal-header\">

		<img src=\"images/close.png\" class=\"close\" id=\"cross\" onclick=\"closearticle()\" />
		<img src=\"images/fb.png\" class=\"close\" id=\"fb\" onclick=\"sharearticle()\"/>
		<img src=\"images/twitter.png\" class=\"close\" id=\"tw\" onclick=\"sharearticletw()\"/>
		<select id=\"themes\" class=\"close\" onchange=\"switcharticle()\">
		<option value=\"white\">White</option>
		<option value=\"night\">Night</option>
		<option value=\"sepia\">Sepia</option>
		<option value=\"dark\">Dark</option>
		</select>
    </div>
    <div class=\"modal-body\">
			<p id=\"articlehead\"> Loading headline...</p>
      <p style=\"font-size: $fs; font-family: $fonty; \" id = \"articlewords\">Loading article...</p>

    </div>

  </div>

</div>

";

$html .= "</div>";
$js .= "</script>";
echo $html;
echo $js;
?>
