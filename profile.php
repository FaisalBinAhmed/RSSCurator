
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>
	input[type=text], input[type=number], input[type=date], input[type=password], input[type=submit], button[type=button] {
	    width: 300px;
		font-family: Segoe UI;
		font-size: 18px;
	    padding: 12px 20px;
	    margin: 8px 0;
	    box-sizing: border-box;
			border: none;

	}
	input[type=radio]{

		font-family: Segoe UI;
		font-size: 18px;
	}
	body{font-size: 22px;}
    select {width: 300px;
    font-family: Segoe UI;
    font-size: 18px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;}
	</style>
<script>

</script>


</head>
<body>

<?php	include('navigation.php'); ?>


<?php
     session_start();

     $uname=$_SESSION["name"];
     $uemail=$_SESSION["email"];
     $uid= $_SESSION["UID"];
     $ufonts=$_SESSION["fontsize"];
     $ufont=$_SESSION["font"];
     $upass=$_SESSION["password"];
?>

<div class="acc">
<form action = "<?php $_PHP_SELF ?>" method = "POST">
<br>
    <label class="cat-title" >Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="text" name="newName" value="<?php echo $uname; ?>"/><br>
  <!--  <input type="submit" name="update" value="update Name"/><br>  -->

    <label class="cat-title" >Email:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="text" name="newEmail" value="<?php echo $uemail; ?>"/><br>
  <!--  <input type="submit" name="updateEmail" value="update Email"/><br> -->

	<label class="cat-title" >Old Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
	<input type="text" name="oldpass"/><br>

	<label class="cat-title" >New Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
	<input type="text" name="newpass"/><br>

	<!--<input type="submit" name="updatePass" value="update Password"/><br> -->


    <label class="cat-title">Font: <?php echo $ufont; ?></label>
	<select id="myfont" name="font"><br>
	<option value=""></option>
  <option value="Segoe UI">Segoe UI</option>

  <option value="Times New Roman">Times New Roman</option>
  <option value="Verdana">Verdana</option>

  <option value="Trebuchet MS">Trebuchet</option>
  <option value="Sans-Serif">sans-serif</option></select><br>
<!--  <input type="submit" name="updateFont" value="update Font"/><br> -->

    <label class="cat-title" >Font Size:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
	<input type="number" name="newFS" min="5" max="40" value="<?php echo $ufonts; ?>"/><br>
	<input style="background-color: #03997e; color:white;" type="submit" name="update" value="UPDATE"/><br>
</div>
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

    ?>


</form>
</body>
</html>

<?php

	 if (isset($_POST['update']))
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
            header("Refresh:0");
        }
	}

    if (isset($_POST['update']))
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
            header("Refresh:0");
        }
    }

	if (isset($_POST['update']))
	 {
    	$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newpass'];

        if($oldpass == $upass)
        {
           $sql= "UPDATE users SET password='$newpass' WHERE UID='$uid'";
           if(!mysqli_query($con, $sql))
            {
                echo "Not Updated";
            }
            else
            {
                 header("Refresh:0");
            }
        }
        if($oldpass === NULL)
        {
            header("Refresh:0");
        }
        else if($oldpass != $upass && $oldpass != NULL)
        {
             echo '<script language="javascript">';
             echo 'alert("Sorry Your Old Password Does not Match!")';
             echo '</script>';
        }

       // $_SESSION["password"]=$newpass;



	}



	if (isset($_POST['update']))
	 {
    	$newFont = $_POST['font'];
			if($newFont != ""){
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
	}}

	if (isset($_POST['update']))
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
