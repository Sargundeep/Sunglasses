<?php
// Initialize the session
session_start();
$_SESSION['username'] = "abc";
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../templates/index.html");
    exit();
}
// Include config file
include("config.php"); 
// Define variables and initialize with empty values
$username = $_POST["login_username"];
$password = $_POST["login_password"];
$hashed_password = md5($password);
if($_SERVER["REQUEST_METHOD"] == "POST")
{       
    $sql = "SELECT password FROM users WHERE username = '$username' and password ='$hashed_password'";
    $result = mysqli_query($link,$sql);
    $rows = mysqli_num_rows($result);
    
    if($rows == 1){
        if($username == "Admin" and $password == "abc123sungla")
        {
            $_SESSION['username'] = $username;
	        header("location: ../templates_admin/index.html");
        }
        else{
	        $_SESSION['username'] = "$username";
	        header("location: ../php/cust_index.php");
            exit();
        }
    }
    else{
        echo "<h1>Oops! Something went wrong. Please try again later.</h1>";
        echo "<h1>$hashed_password</h1>";
    }
}
mysqli_close($link);
?>