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
    session_start();
    // Create connection
    $conn = new mysqli("localhost", "root", "abc123");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = $_SESSION['username'];
    $product_qty = $_POST['quantity'];
    $product_id = $_POST['product_id'];
    echo $username;
    echo "PID:".$product_id;
    echo "Prod_Qnty:".$product_qty;
    $chk = "SELECT prod_id from sungla.cart where username = '$username' and prod_id = '$product_id'";
    $result=$conn->query($chk);
    $rows = $result->fetch_assoc();
    if($rows == 0)
    {
        $q ="INSERT INTO sungla.cart (username,prod_id, prod_qnty) VALUES ('$username','$product_id','$product_qty')"; 
        $conn->query($q);
    }
    else
    {
        $q =    "UPDATE sungla.cart 
                set prod_qnty='$product_qty' 
                where prod_id='$product_id' 
                and username='$username'";
        if ($conn->query($q) === TRUE) {
            echo "Record updated successfully";
            header("location: ../customer/cust_glasses.php");
          } else {
            echo "Error updating record: " . $conn->error;
          }
    }
    mysqli_close($conn);
?>
 