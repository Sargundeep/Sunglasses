<?php
   unset($_SESSION['username']);
   $_SESSION['loggedin'] = 0;
   // echo '12'.$_SESSION['loggedin'];
   header("location: ../php/signupform.php");
?>