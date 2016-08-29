
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>
	input[type=text], input[type=date], input[type=password], input[type=submit], button[type=button] {
	    width: 300px;
		font-family: Segoe UI;
		font-size: 18px;
	    padding: 12px 20px;
	    margin: 8px 0;
	    box-sizing: border-box;

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



</head>
<body>



<?php
     session_start();

     $_SESSION["pass"]="aaa";
    
?>

<a href="admin-logout.php" style="text-decoration:none;"><input class="submit nav-bar" type="button" name="logout" value="SIGN OUT" ></a><br>
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


         $result = "SELECT * FROM users ";
       
    ?>

        <table border="2" style= "background-color: #84ed86; color: #761a9b; margin: 0 auto;" >
      <thead>
        <tr>
          <th>UID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Fontsize</th>
          <td>Font</td>
        </tr>
      </thead>
      <tbody>
        <?php
         
          $q2 = "SELECT * FROM users";
        $result2 = mysqli_query($con,$q2) or die( mysqli_error($con) );
       
        $rows2 = array();
        
        $index2 = 0;
        while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
       {
            $rows1[$index2] = $row2["UID"];
            $rows2[$index2] = $row2["name"];
            $rows3[$index2] = $row2["email"];
            $rows4[$index2] = $row2["password"];
            $rows5[$index2] = $row2["fontsize"];
            $rows6[$index2] = $row2["font"];

                $index2++;
        }
            
            for($i=2;$i<$index2;$i++)
            {
              echo
            "<tr>
              <td>{$rows1[$i]}</td>
              <td>{$rows2[$i]}</td>
              <td>{$rows3[$i]}</td>
              <td>{$rows4[$i]}</td>
              <td>{$rows5[$i]}</td>
              <td>{$rows6[$i]}</td> 
          
            </tr>\n";
            }
            
        ?>
      </tbody>
    </table>
<form class="cats" action = "<?php $_PHP_SELF ?>" method = "POST">
    <input type="text" name="newFS" placeholder="TYPE USER ID" "/><br>
  <input style="background-color: #0099CC; color:white;" type="submit" name="update" value="DELETE"/><br>
  </form>
<?php
  if (isset($_POST['update']))
   {
      $newFS = $_POST['newFS'];
       
      $sql= "DELETE FROM users WHERE UID= '$newFS'";

        if(!mysqli_query($con, $sql))
        {
            echo "Not Updated";
        }
        else
        {
            header("Refresh:0");
        }
  }
?>
</body>
</html>