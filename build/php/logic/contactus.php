<?php
// Include config file
include("../includes/config.php");

$username = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{   
    $sql = "INSERT INTO contact_us(name, email ,phone,message) VALUES ('$username', '$email' ,'$phone', '$message')";  
    if(mysqli_query($conn, $sql))
    {
        header("location: ../customer/cust_contact.php");    
    }
    else
    {
        echo "<h1>Oops! Something went wrong. Please try again later.</h1>";
    }
}

mysqli_close($conn);
?>
