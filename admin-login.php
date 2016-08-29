<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="images/pexels-photo-26525.jpg"><!--background="images/pexels-photo-26525.jpg"-->

<div class="login" align="right">
    <form action = "<?php $_PHP_SELF ?>" method="post">

      <p style="color:white">Admin Login</p>
	  <input class="login-form" type="password" name="loginPass" placeholder="Password" required>
      <button class="login-form" type="submit" name="btnLogin" value="Sign IN" required><b>Sign In</b></button>

    </form>
</div>

<?php
if (isset($_POST['btnLogin']))
     {
        $pass = $_POST['loginPass'];
       // $_SESSION["email"]=$newEmail;
       // $sql= "UPDATE users SET email='$newEmail' WHERE UID='$uid'";

        if($pass ==="aaa")
        {

            header('Location: admin.php');
          
        }
        else
        {
            header('Location: admin-login.php');
        }
    }
?>

</body>
</html>

