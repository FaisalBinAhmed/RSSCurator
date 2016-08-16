<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="images/pexels-photo-26525.jpg"><!--background="images/pexels-photo-26525.jpg"-->

<div class="login" align="right">

    <form action="login.php" method="post">
         <p style="color:white">Already have an account?</p>
<<<<<<< HEAD
          <input class="login-form" type="email" name="loginEmail" placeholder="Registerd Email">
					<input class="login-form" type="password" name="loginPass" placeholder="Password">
            <button class="login-form" type="submit" name="btnLogin" value="Sign IN"><b>Sign In</b></button>
=======

>>>>>>> origin/master
            <input class="login-form" type="email" name="loginEmail" placeholder="Registerd Email" required>
            <input class="login-form" type="password" name="loginPass" placeholder="Password" required>
            <button class="login-submit" type="submit" name="btnLogin" value="Sign IN"><b>Sign In</b></button>
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

 <div class="content">

    <div class="bigsidebar" style="float:left;">

        <h1>READ<br> WHAT YOU LIKE <br>TO READ</h1>

    </div>

    <div class="sidebar" style="float:right;">

        <h1>ENTERTAINMENT</h1>

    </div>
    <div class="sidebar" style="float:right;">
        <h1>SPORTS</h1>

    </div>
    <div class="sidebar" style="float:right;">
        <h1>TECHNOLOGY</h1>

    </div>

 </div>
 <div class="content">

    <div class="sidebar" style="float:right;">

        <h1>WORLD</h1>

    </div>
    <div class="sidebar" style="float:right;">

        <h1>POLITICS</h1>

    </div>
    <div class="sidebar" style="float:right;">

        <h1>SCIENCE</h1>

    </div>

 </div>

 </div>

 <div class="content">

    <div class="bigsidebar" style="float:right; height:500px">

        <h1>CUSTOMIZE<br> YOUR FONT</h1>
         <h2><em>MEET<br> OUR TEAM<em></h2>

    </div>

    <div class="feature" style="float:left;">

        <h1><em>CHOOSE YOUR FONT FAMILY<em></h1>

    </div>

    <div class="feature" style="float:left;">

        <h1><em>CHANGE FONT SIZE<em></h1>

    </div>

    <div class="feature" style="float:left;">

        <h1>LOREM IPSUM</h1>

    </div>

 </div>
  <div class="content">


    <div class="about" style="float:right;">

        <h1><em>RABBI<em></h1>

    </div>

    <div class="about" style="float:right;">

        <h1><em>FAISAL<em></h1>

    </div>

    <div class="about" style="float:right;">

        <h1><em>ISTIAK<em></h1>

    </div>

 </div>

</div class="footer">
<h1 style="font-size: 42px; color:white"><b>Make Your Account Today</b></h1>
    <div class="fsignUP">

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
