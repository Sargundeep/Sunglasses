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
    include("../includes/config.php");
    $username = $_SESSION['username'];
    $product_qty = $_POST['product_qty'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $total_price = $product_price * $product_qty ;
    $tax = $total_price /10 ;
    $grand_total = $total_price + $tax;
    $product_id = $_POST['product_id'];
    $chk = "INSERT INTO sungla.order_details (username,product_id,product_name,product_price,product_qty,total_price,tax,grand_total) VALUES ('$username','$product_id','$product_name','$product_price','$product_qty','$total_price','$tax','$grand_total')"; 
    $result=$conn->query($chk);
    header("location: ../customer/cust_invoice.php");
    mysqli_close($conn);
?>
 