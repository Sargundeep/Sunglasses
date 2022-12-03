<?php
// Include config file
include("../includes/config.php");

$username = $_POST['username'];
$password = $_POST['password'];

$email = $_POST['email'];
$confirm_password = $_POST['confirm_password'];

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{   
        if($password == $confirm_password){
            $hash_password = md5($password);
            $sql = "INSERT INTO users (username, email ,password) VALUES ('$username', '$email' , '$hash_password')";  
            if(mysqli_query($conn, $sql))
            {
                header("location: ../signupform.php");    
            }
            else
            {
                echo "<h1>Oops! Something went wrong. Please try again later.</h1>";
            }
            }
        else{
            echo "<h1>Oops! Please check you password </h1>";
            }
}
mysqli_close($conn);
?>
