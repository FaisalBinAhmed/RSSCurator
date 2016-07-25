
<?php
		$con=mysqli_connect('localhost','root','');
		if(!$con)
		{
			echo "Not connected";
		}
		if(!mysqli_select_db($con,'reg'))
		{
			echo "database not selected";
		}	

    	$name=$_POST['name'];
    	$email=$_POST['email'];
    	$pass=$_POST['pass'];

    	$sql= "INSERT into users (Name,email,password) VALUES('$name','$email','$pass')";

    	if(!mysqli_query($con, $sql))
    	{
    		echo "Not Inserted";
    	}
    	else
    	{
    		echo "Inserted";
    	}


?>


