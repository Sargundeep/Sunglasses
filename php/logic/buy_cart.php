<?php
use PHPMailer\PHPMailer\PHPMailer; use PHPMailer\PHPMailer\Exception; 
require 'vendor/autoload.php';

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
    
    $sql = "SELECT email FROM users where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $rec = $row['email'];
    $mail = new PHPMailer(true); 
        
    $sender = "sargundeepkaur.s@somaiya.edu"; 
    $password = "SARGUN165"; 
    $msg = "Your Order Is Placed Successfully.Thank You for Shopping with us."."\n"."
            Your Order Details are as follows:"."\n"." 
                Product Name: $product_name"."\n"."
                Product Quantity: $product_qty"."\n"."
                Product Price: $product_price "."\n"."
                Total Price: $total_price "."\n"."
                Tax: $tax "."\n"."
                Grand Total: $grand_total"; 
    $sub = "Order Confirmation"; 
    $name = "Sungla"; 
   
   try { 
       $mail->SMTPDebug = 2;                                        
       $mail->isSMTP();                                                
       $mail->Host       = 'smtp.gmail.com';                     
       $mail->SMTPAuth   = true;                              
       $mail->Username   = $sender;   
       $mail->Password   = $password;   
       $mail->SMTPSecure = 'tls';                                
       $mail->Port       = 587;   
      
       $mail->setFrom($sender, $name);            
       $mail->addAddress($rec); 
           
       $mail->isHTML(true);                                   
       $mail->Subject = $sub; 
       $mail->Body    = $msg; 
       $mail->AltBody = 'Experiment finally successfully'; 
       $mail->send(); 
       echo "Mail has been sent successfully!"; 
   } catch (Exception $e) { 
       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   }
    
       
    $chk = "INSERT INTO sungla.order_details (username,product_id,product_name,product_price,product_qty,total_price,tax,grand_total) VALUES ('$username','$product_id','$product_name','$product_price','$product_qty','$total_price','$tax','$grand_total')"; 
    $result=$conn->query($chk);
    header("location: ../customer/cust_invoice.php");
    mysqli_close($conn);  
 
   ?>