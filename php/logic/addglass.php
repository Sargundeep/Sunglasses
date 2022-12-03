<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Include config file
include("../includes/config.php");

 // Define variables and initialize with empty values
$name=$_POST["name"];
$desc = $_POST['desc'];
$image = $_POST['img_conn'];
$price = $_POST['price'];

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{   
    $sql = "INSERT INTO products (product_name, description ,product_img , price) VALUES ('$name', '$desc' , '$image','$price')";  
    if(mysqli_query($conn, $sql))
    {
        header("location: ../admin/glasses.php");    
    }
    else
    {
        echo "<h1>Oops! Something went wrong. Please try again later.</h1>";
    }
}
mysqli_close($conn);
?>
</body>
</html>