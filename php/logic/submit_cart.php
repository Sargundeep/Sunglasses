<?php
    session_start();
    // Create connection
    include("../includes/config.php");
    $username = $_SESSION['username'];
    if (empty($_SESSION["username"])) {
        header("location: ../signupform.php");
    }
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
        header("location: ../customer/cust_glasses.php");
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
 