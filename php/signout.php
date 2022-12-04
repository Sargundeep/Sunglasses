<?php
   unset($_SESSION['username']);
   unset($_SESSION['loggedin']);
   header("location: ../php/signupform.php");
?>