
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

    	$name=$_POST['name'];
    	$email=$_POST['email'];
    	$pass=$_POST['pass'];

        if(empty($name) || empty($email) || empty($pass))
        {
            echo "Field must not be empty";
        }
        else
        {
            $sql= "INSERT into users (name,email,password) VALUES('$name','$email','$pass')";

        if(!mysqli_query($con, $sql))
        {

					echo "<script type=\"text/javascript\">";
					echo "alert(\"Please insert your email and password correctly\");";
					echo "window.location = \"register.php\";";
					echo "</script>";

        }

        else
        {
					/*
						echo "<script type=\"text/javascript\">";
						echo "alert(\"Your account has been created successfully. Please Log in\");";
						echo "window.location = \"cat.php\";";
						echo "</script>";
*/

				echo	"	<form action=\"login.php\" method=\"post\" visibility=\"hidden\">
				         <input class=\"login-form\" type=\"email\" name=\"loginEmail\" placeholder=\"Registerd Email\" value=\"$email\">
									<input class=\"login-form\" type=\"password\" name=\"loginPass\" placeholder=\"Password\" value=\"$pass\">
				            <button class=\"login-form\" id=\"sup\" type=\"submit\" name=\"btnLogin\" value=\"Sign IN\"><b>Sign In</b></button>

				    </form> ";
						echo "<script type=\"text/javascript\">";
						echo "document.getElementById(\"sup\").click();";

						echo "</script>";








        }
        }



?>
