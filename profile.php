
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
echo "Font: ".$_SESSION["font"]."<br>" ;

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
  <option value="Segoe UI">Segoe UI</option>
<<<<<<< HEAD
  <option value="Times New Roman">Times New Roman</option>
  <option value="verdana">Verdana</option>
=======
  <option value="Times Roman">Times Roman</option>
  <option value="Verdana">Verdana</option>
>>>>>>> origin/master
  <input type="submit" name="updateFont" value="update Font"/><br>
</select>

Font Size:
	<input type="text" name="newFS"/>
	<input type="submit" name="updateFS" value="update Font Size"/><br>
<hr>

<<<<<<< HEAD
 		<input type="checkbox" name="check_list[]" value="1">Entertainment<br>
  	<input type="checkbox" name="check_list[]" value="2">Sports<br>
  	<input type="checkbox" name="check_list[]" value="3">Technology<br>
  	<input type="checkbox" name="check_list[]" value="4">Politics<br>
  	<input type="checkbox" name="check_list[]" value="5">World<br>
  	<input type="checkbox" name="check_list[]" value="6">Local<br>
  	<input type="checkbox" name="check_list[]" value="7">Science<br>
  	<input type="checkbox" name="check_list[]" value="8">Top<br>
  	<input type="submit" value="Submit" name="catSel">
=======
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




$q2 = "SELECT catname FROM categories WHERE catID IN ( SELECT catID from usercats WHERE uid =".$_SESSION["UID"]." )";
$result2 = mysqli_query($con,$q2) or die( mysqli_error($con) );
$rows2 = array();
$index2 = 0;
while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
{
    $rows2[$index2] = $row2["catname"];
        $index2++;
}
        

        echo "<select name='categories'>";
        if (!in_array("Entertainment", $rows2))
        {
             echo "<option value='1'>Entertainment</option>" ;
        }
        
        if (!in_array("Sports", $rows2))
        {
            echo "<option value='2'>Sports</option>";
        }
        if (!in_array("Technology", $rows2))
        {
            echo "<option value='3'>Technology</option>";
        }
        if (!in_array("Politics", $rows2))
        {
            echo "<option value='4'>Politics</option>";
        }
        if (!in_array("World", $rows2))
        {
            echo "<option value='5'>World</option>";
        }
        if (!in_array("Local", $rows2))
        {
            echo "<option value='6'>Local</option>";
        }
        if (!in_array("Science", $rows2))
        {
            echo "<option value='7'>Science</option>";
        }
        if (!in_array("Top", $rows2))
        {
            echo "<option value='8'>Top</option>";
        }
     
        echo "<input type='submit' value='Submit' name='catSel'>"; echo "<br>";
      
        echo "</select>";
    ?>

<select name="categoriesDel">
  <option value="1">Entertainment</option>
  <option value="2">Sports</option>
  <option value="3">Technology</option>
  <option value="4">Politics</option>
  <option value="5">World</option>
  <option value="6">Local</option>
  <option value="7">Science</option>
  <option value="8">Top</option>
  <input type="submit" value="Delete" name="catDel"><br>
</select>

>>>>>>> origin/master
</form>
</body>
</html>

<?php



   


	

if(!empty($rows2[0]))
{
    echo $rows2[0]."\n";
    
}
if(!empty($rows2[1]))
{
    echo $rows2[1]."\n";
}
if(!empty($rows2[2]))
{
    echo $rows2[2]."\n";
}
if(!empty($rows2[3]))
{
    echo $rows2[3]."\n";
}
if(!empty($rows2[4]))
{
    echo $rows2[4]."\n";
}
if(!empty($rows2[5]))
{
    echo $rows2[5]."\n";
}
if(!empty($rows2[6]))
{
    echo $rows2[6]."\n";
}
if(!empty($rows2[7]))
{
    echo $rows2[7]."\n";
}



	 if (isset($_POST['updateName']))
	 {
    	$newName = $_POST['newName'];
        $_SESSION["name"]=$newName;
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

    else if (isset($_POST['catSel']))
     {
        $cat = $_POST['categories'];
        $sql= "INSERT INTO usercats (UID,catID) VALUES ('$uid', '$cat')";

        if(!mysqli_query($con, $sql))
        {
            echo "Not Updated";
        }
        else
        {
            echo "Updated";
        }
    }

     else if (isset($_POST['catDel']))
     {
        $cat = $_POST['categoriesDel'];
        $sql= "DELETE FROM usercats WHERE UID='$uid' AND catID='$cat'";

        if(!mysqli_query($con, $sql))
        {
            echo "Not Deleted";
        }
        else
        {
            echo "Deleted";
        }
    }

	else if (isset($_POST['updatePass']))
	 {
    	$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newpass'];

        $_SESSION["password"]=$newpass;
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
        $_SESSION["email"]=$newEmail;
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
        $_SESSION["font"]=$newFont;
    	$sql= "UPDATE users SET font='$newFont' WHERE UID='$uid'";

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
        $_SESSION["fontsize"]=$newFS;
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
    
 ?>
