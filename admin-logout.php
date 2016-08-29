<?php
   session_start();
   unset($_SESSION["pass"]);
   session_unset(); 
   session_destroy();
   header('Refresh: 0; URL = register.php');
?>