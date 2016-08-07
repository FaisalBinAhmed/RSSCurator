
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<a href="setting.php"><input class="submit text-input" type="button" name="home" value="Home" ></a>
<a href="profile.php"><input class="submit text-input" type="button" name="profile" value="profile"></a>
<a href="logout.php"><input class="submit text-input" type="button" name="logout" value="Sign Out" ></a><br>


<?php
session_start();

//echo "Hello";
echo "User ID: ".$_SESSION["UID"]."<br>" ;
echo "Name: ".$_SESSION["name"]."<br>" ;
echo "Email: ".$_SESSION["email"]."<br>" ;
echo "Password: ".$_SESSION["password"]."<br>" ;
echo "Font Size: ".$_SESSION["fontsize"]."<br>" ;
echo "Font: ".$_SESSION["bgcolor"]."<br>" ;

 $uid= $_SESSION["UID"];
?>


<form action = "<?php $_PHP_SELF ?>" method = "POST">
<hr>
<br>
	Old password:
	<input type="text" name="oldpass"/><br><br>

	New password:
	<input type="text" name="newpass"/><br><br>
	
	<input type="submit" name="updatePass" value="update Password"/><br><br>

	Name:
	<input type="text" name="newName"/>
	<input type="submit" name="updateName" value="update Name"/><br>
	
	Email:
	<input type="text" name="newEmail"/>
	<input type="submit" name="updateEmail" value="update Email"/><br>
	
	 <select name="font">
  <option value="segoe">Segoe UI</option>
  <option value="times">Times Roman</option>
  <option value="verdana">Verdana</option>
  <input type="submit" name="updateFont" value="update Font"/><br>
</select>

Font Size:
	<input type="text" name="newFS"/>
	<input type="submit" name="updateFS" value="update Font Size"/><br>
<hr>

 	<input type="checkbox" name="check_list[]" value="1">Entertainment<br>
  	<input type="checkbox" name="check_list[]" value="2">Sports<br>
  	<input type="checkbox" name="check_list[]" value="3">Technology<br>
  	<input type="checkbox" name="check_list[]" value="4">Politics<br>
  	<input type="checkbox" name="check_list[]" value="5">World<br>
  	<input type="checkbox" name="check_list[]" value="6">Local<br>
  	<input type="checkbox" name="check_list[]" value="7">Science<br>
  	<input type="checkbox" name="check_list[]" value="8">Top<br>
  	<input type="submit" value="Submit" name="catSel">
</form>
</body>
</html>

<?php

	$con=mysqli_connect('localhost','root','');

	if(!$con)
	{
		echo "Not connected";
	}
	if(!mysqli_select_db($con,'rsscurator'))
	{
		echo "database not selected";
	}	


	 if (isset($_POST['updateName']))
	 {
    	$newName = $_POST['newName'];
    	$sql= "UPDATE users SET name='$newName' WHERE UID='$uid'";

        if(!mysqli_query($con, $sql))
        {
            echo "Not Updated";
        }
        else
        {
            echo "Updated";
        }
	}

	else if (isset($_POST['updatePass']))
	 {
    	$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newpass'];
    	$sql= "UPDATE users SET password='$newpass' WHERE UID='$uid'";

        if(!mysqli_query($con, $sql))
        {
            echo "Not Updated";
        }
        else
        {
            echo "Updated";
        }
	}

	else if (isset($_POST['updateEmail']))
	 {
    	$newEmail = $_POST['newEmail'];
    	$sql= "UPDATE users SET email='$newEmail' WHERE UID='$uid'";

        if(!mysqli_query($con, $sql))
        {
            echo "Not Updated";
        }
        else
        {
            echo "Updated";
        }
	}

	else if (isset($_POST['updateFont']))
	 {
    	$newFont = $_POST['font'];
    	$sql= "UPDATE users SET bgcolor='$newFont' WHERE UID='$uid'";

        if(!mysqli_query($con, $sql))
        {
            echo "Not Updated";
        }
        else
        {
            echo "Updated";
        }
	}

	else if (isset($_POST['updateFS']))
	 {
    	$newFS = $_POST['newFS'];
    	$sql= "UPDATE users SET fontsize='$newFS' WHERE UID='$uid'";

        if(!mysqli_query($con, $sql))
        {
            echo "Not Updated";
        }
        else
        {
            echo "Updated";
        }
	}

	
	if(!empty($_POST['check_list']))
	{
		foreach($_POST['check_list'] as $check)
		{
    	  	if ($check == 1)
        	{
        		$sql= "INSERT INTO usercats (UID,catID) VALUES ('$uid', '1')";
				mysqli_query($con, $sql);
		       
        	}
        	else if ($check == 2)
        	{
        		$sql= "INSERT INTO usercats (UID,catID) VALUES ('$uid', '2')";
		        mysqli_query($con, $sql);
		        
        	}

        	else if ($check == 3)
        	{
        		$sql= "INSERT INTO usercats (UID,catID) VALUES ('$uid', '3')";
				mysqli_query($con, $sql);
		       
        	}
        	else if ($check == 4)
        	{
        		$sql= "INSERT INTO usercats (UID,catID) VALUES ('$uid', '4')";
		        mysqli_query($con, $sql);
		        
        	}

        	else if ($check == 5)
        	{
        		$sql= "INSERT INTO usercats (UID,catID) VALUES ('$uid', '5')";
				mysqli_query($con, $sql);
		       
        	}
        	else if ($check == 6)
        	{
        		$sql= "INSERT INTO usercats (UID,catID) VALUES ('$uid', '6')";
		        mysqli_query($con, $sql);
		        
        	}

        	else if ($check == 7)
        	{
        		$sql= "INSERT INTO usercats (UID,catID) VALUES ('$uid', '7')";
				mysqli_query($con, $sql);
		       
        	}
        	else if ($check == 8)
        	{
        		$sql= "INSERT INTO usercats (UID,catID) VALUES ('$uid', '8')";
		        mysqli_query($con, $sql);
		        
        	}
		}
    }
 ?>