
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
//echo "Hello Fahim";
?>
<a href="setting.php"><input class="submit text-input" type="button" name="home" value="Home" ></a>
<a href="profile.php"><input class="submit text-input" type="button" name="profile" value="profile"></a>
<a href="logout.php"><input class="submit text-input" type="button" name="logout" value="Sign Out" ></a>

</body>
</html>