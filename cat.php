
<!DOCTYPE html>
<html>
<head>
    <title>MY CATEGORIES</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
    input[type=submit], button[type=button] {
        width: 200px;
        font-family: "Fakt","AvenirNext-Medium","Segoe UI";
        font-size: 18px;
        padding: 12px 20px;
        margin: 8px 0;
        background-color: #03997e;
        color: white;
        box-sizing: border-box;
        border: none;
        cursor: pointer;
    }

    body{font-size: 22px;}
    select {
        width: 250px;
       font-family: "Fakt","AvenirNext-Medium","Segoe UI";
        font-size: 18px;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }
    </style>



</head>
<body>

<?php   include('navigation.php'); ?>


<?php
session_start();

 $uid= $_SESSION["UID"];
?>


<form action = "<?php $_PHP_SELF ?>" method = "POST">

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


        //your categories
        echo "<div class='cats'>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            $space=", ";
            echo "<label class='mycat'>CATEGORIES </label>";
            if(!empty($rows2[0]))
            {
                echo $rows2[0].$space;

            }
            if(!empty($rows2[1]))
            {
                echo $rows2[1].$space;
            }
            if(!empty($rows2[2]))
            {
                echo $rows2[2].$space;
            }
            if(!empty($rows2[3]))
            {
                echo $rows2[3].$space;
            }
            if(!empty($rows2[4]))
            {
                echo $rows2[4].$space;
            }
            if(!empty($rows2[5]))
            {
                echo $rows2[5].$space;
            }
            if(!empty($rows2[6]))
            {
                echo $rows2[6].$space;
            }
            if(!empty($rows2[7]))
            {
                echo $rows2[7].$space;
            }
        echo "</div>";

        echo "<br>";
        echo "<br>";

        echo "<label class='cat-title'>Add Categories</label>";
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
        //echo "</select><br>";
        echo "<input type='submit' value='Submit' name='catSel'>";


    ?>
<label class="cat-title">Remove Categories</label>
<select name="categoriesDel">
<?php
  if(in_array("Entertainment", $rows2))
  {
    echo  "<option value=\"1\">Entertainment</option>";

  }
  if(in_array("Sports", $rows2))
  {
    echo  "<option value=\"2\">Sports</option>";
  }
  if(in_array("Technology", $rows2))
  {
    echo   "<option value=\"3\">Technology</option>";
  }
  if(in_array("Politics", $rows2))
  {
      echo "<option value=\"4\">Politics</option>";
  }
  if(in_array("World", $rows2))
  {
      echo "<option value=\"5\">World</option>";
  }
  if(in_array("Local", $rows2))
  {
      echo "<option value=\"6\">Local</option>";
  }
  if(in_array("Science", $rows2))
  {
      echo "<option value=\"7\">Science</option>";
  }
  if(in_array("Top", $rows2))
  {
      echo "<option value=\"8\">Top</option></select>";
  }


?>


  <input type="submit" value="Delete" name="catDel">
<br>

</form>
</body>
</html>

<?php


echo "<br><br>";


    if (isset($_POST['catSel']))
     {
        $cat = $_POST['categories'];
        $sql= "INSERT INTO usercats (UID,catID) VALUES ('$uid', '$cat')";

        if(!mysqli_query($con, $sql))
        {
            echo "Not Updated";
        }
        else
        {
            header("Refresh:0");
        }
    }

     else if (isset($_POST['catDel']))
     {
        $cat = $_POST['categoriesDel'];
        $sql= "DELETE FROM usercats WHERE UID='$uid' AND catID='$cat'";

        if(!mysqli_query($con, $sql))
        {
             echo '<script language="javascript">';
             echo 'alert("Sorry Not Deleted")';
             echo '</script>';
        }
        else
        {
            header("Refresh:0");
        }
    }

 ?>
