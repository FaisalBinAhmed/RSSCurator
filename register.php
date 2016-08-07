<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="login" align="right">

    <form action="login.php" method="post">
         <p>Already have an account?</p>

            <input class="login-form" type="email" name="loginEmail" placeholder="Registerd Email">
        
            <input class="login-form" type="password" name="loginPass" placeholder="Password">
        
            <button class="login-form" type="submit" name="btnLogin" value="Sign IN"><b>Sign In</b></button>
    </form>
    
</div>



<div class="signUP">
            
    <form action="config.php" method="post">
       
            
        <input class="text-input" id="name" type="text" name="name" placeholder="Full Name" required maxlength="22"><br>
        
 

        <input class="text-input" type="email" name="email" placeholder="Email" required><br>
  
    
        <input class="text-input"  type="password" name="pass" placeholder="Password length between 5 to 10" required pattern=".{5,10}"><br>

 
        <input class="text-input" type="password"  name="conPass" placeholder="Confirm Password" required pattern=".{5,10}"><br>

        <button class="submit text-input" type="submit" value="Sign up"><b>Sign Up</b></button><br>
                     
    </form>
 </div>
</body>
</html>
=======
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="login" align="right">

<form action="login.php" method="post">
     <p>Already have an account?</p>
     <table>
        <tr>
            <td>
                <input class="login-form" type="email" name="loginEmail" placeholder="Registerd Email">
            </td>

            <td>
                <input class="login-form" type="password" name="loginPass" placeholder="Password">
            </td>

            <td>
                <button class="login-form" type="submit" value="Sign IN"><b>Sign In</b></button>
            </td>

        </tr>
     </table>
     </form>
</div>


<div class="sign-up-form">
            
            <form action="config.php" method="post">
                <table align="center" cellspacing="1">
                    <tr>
                        <td>
                            <input class="text-input" type="text" name="name" placeholder="Full Name">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input class="text-input" type="email" name="email" placeholder="Email">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="text-input" type="password" name="pass" placeholder="Password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="text-input" type="password" name="conPass" placeholder="Confirm Password">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <button class="submit text-input" type="submit" value="Sign up"><b>Sign Up</b></button>
                        </td>
                    </tr>     
                </table>       
            </form>
        </div>

        

</body>
</html>
>>>>>>> origin/master
