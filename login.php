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

        session_start();
        if (isset($_POST['btnLogin']))
        {
            $email=$_POST['loginEmail'];
            $pass=$_POST['loginPass'];


        $sql= "select * from users where email='$email' AND password='$pass'";
        $result=mysqli_query($con,$sql) or die(mysqli_error());

        $srch= mysqli_fetch_array($result);

        if($srch['email']==$email && $srch['password']==$pass){
            $name=$srch['name'];
            $uid=$srch['UID'];
            $fonts=$srch['fontsize'];
            $font=$srch['font'];

            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['email'] = $email;
            $_SESSION['UID'] = $uid;
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $pass;
            $_SESSION['fontsize'] = $fonts;
            $_SESSION['font'] = $font;

            $sql2="SELECT catid FROM usercats where uid = $uid";
            $result2=mysqli_query($con,$sql2) or die(mysqli_error());
        //    $_SESSION["index"] = 0;
            while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC))
            {
              if($row["catid"]==1){$_SESSION["Entertaintment"] = true;}
              else if($row["catid"]==2){$_SESSION["Sports"] = true;}
              else if($row["catid"]==3){$_SESSION["Technology"] = true;}
              else if($row["catid"]==4){$_SESSION["Politics"] = true;}
              else if($row["catid"]==5){$_SESSION["World"] = true;}
              else if($row["catid"]==6){$_SESSION["Local"] = true;}
              else if($row["catid"]==7){$_SESSION["Science"] = true;}
              else if($row["catid"]==8){$_SESSION["Top"] = true;}


            }

            //echo 'You have entered valid use name and password';
            header('Location: profile.php');
        }
        else{

            header('Location: register.php?login=false');
        }




    }
 ?>
