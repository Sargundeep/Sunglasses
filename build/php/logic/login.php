<?php
// Initialize the session
session_start();
$_SESSION['username'] = "";
// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: ../customer/cust_index.php");
//     exit();
// }
// Include config file
include("../includes/config.php");
// Define variables and initialize with empty values
$username = $_POST["login_username"];
$password = $_POST["login_password"];
$hashed_password = md5($password);
if($_SERVER["REQUEST_METHOD"] == "POST")
{       
    $sql = "SELECT password FROM users WHERE username = '$username' and password ='$hashed_password'";
    // echo $username;
    $result = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($result);
    
    if($rows == 1){
        if($username == "Admin" and $password == "Admin123")
        {
            $_SESSION['username'] = $username;
            $_SESSION["loggedin"] = true;
	        header("location: ../admin/index.php");
        }
        else{
	        $_SESSION['username'] = $username;
            $_SESSION["loggedin"] = true;
	        header("location: ../customer/cust_index.php");
            echo "$username";
            echo "$password";
            exit();
        }
    }
    else{
        echo "<script>alert(Username or Password is incorrect.Please try again.)<script>";
        header("location: ../signupform.php?ErrorId=1");
        // echo "<h1>$hashed_password</h1>";
    }
}
mysqli_close($conn);
?>