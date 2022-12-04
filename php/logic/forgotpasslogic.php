<?php
// Include config file
include("../includes/config.php");

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{   
    if((!strlen($password)>6) || (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/",$password)))
    {
        echo '<script>alert("Enter valid password")</script>';
        header("location: ../forgotpassword.php");
    }
    else{
    $sql1= "SELECT * FROM users WHERE username = '$username'";
    $result1 = mysqli_query($conn,$sql1);
    $rows1 = mysqli_num_rows($result1);
    if($rows1 == 1){
        if($password == $confirm_password)
        {
            $hash_password = md5($password);
            
            $sql = "UPDATE users SET password = '$hash_password' WHERE username = '$username'";  
            if(mysqli_query($conn, $sql))
            {
                header("location: ../signupform.php");    
            }
            else
            {
                echo '<script>alert(Oops! Something went wrong. Please try again later<script>';
                header("location: ../forgotpassword.php");
            }
            }
        else{
            echo '<script>alert(Oops! Please check your Password<script>';
            header("location: ../forgotpassword.php");
            }
    }
    else{
        echo '<script>alert(Oops! Please enter valid username<script>';
        header("location: ../forgotpassword.php");
    }
}}
mysqli_close($conn);
?>
