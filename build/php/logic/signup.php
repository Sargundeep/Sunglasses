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
    if(!(strlen($username)>1) || !(preg_match("/^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/",$username)) || !(strlen($password)>6) || !(preg_match("/^[0-9a-zA-Z]*$/",$password)))
    {
        echo '<script>alert("Enter valid username and password")</script>';
        header("location: ../signupform.php?ErrorId=1");
    }
    else{ 
    if($password == $confirm_password){
        $hash_password = md5($password);
        // $hash_password = $password;
        $sql = "INSERT INTO users (username, email ,password) VALUES ('$username', '$email' , '$hash_password')";  
        if(mysqli_query($conn, $sql))
        {
            header("location: ../signupform.php");    
        }
        else
        {
            header("location: ../signupform.php?ErrorId=1");
        }
        }
    else{
        header("location: ../signupform.php?ErrorId=1");
        }
    }
}
mysqli_close($conn);
?>
