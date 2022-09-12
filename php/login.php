<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../templates/index.html");
    exit;
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
    echo "<h1>$rows</h1>";
    if($rows == 1){
        echo "<h1>Hi</h1>";
	    $_SESSION['username'] = $username;
	    header("location: ../templates/index.html");
    }
    else{
        echo "<h1>Oops! Something went wrong. Please try again later.</h1>";
        echo "<h1>$hashed_password</h1>";
    }
}
mysqli_close($link);
?>