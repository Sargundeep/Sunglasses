<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>sungla</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../../css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="../../css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../../css/responsive.css">
      <!-- Add to cart -->
      <link rel="stylesheet" href="../../css/cart_wishlist.css">
      <!-- fevicon -->
      <link rel="icon" href="../../images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout position_head">
      <!-- header -->
      <?php 
         include("../includes/navbar.php");
      ?> 
      <!-- end header inner -->
      <!-- Our  Glasses section -->
      <form action="../logic/buy_cart.php" method="POST">   
         <div class="btn-group">
               <button type="submit" class="cart">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                     <path d="M19.029 13h2.971l-.266 1h-2.992l.287-1zm.863-3h2.812l.296-1h-2.821l-.287 1zm-.576 2h4.387l.297-1h-4.396l-.288 1zm2.684-9l-.743 2h-1.929l-3.474 12h-11.239l-4.615-11h14.812l-.564 2h-11.24l2.938 7h8.428l3.432-12h4.194zm-14.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm5.9-7-.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z" />
                  </svg>
                  <span>Buy All</span>
               </button>
         </div>
      </form>
      <div class="glasses">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage">
                     <h2>My Cart</h2>
                  </div>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="row">
         <?php
         $username = $_SESSION['username'];
         include("../includes/config.php");
         error_reporting(E_ERROR | E_PARSE);
         $sql = "SELECT products.id,products.product_name,products.description,products.price,products.product_img,cart.prod_qnty as quantity
                  FROM products ,cart
                  WHERE products.id = cart.prod_id
                  AND cart.username = '$username';";
         $result = $conn->query($sql);
         if($_SERVER["REQUEST_METHOD"] == "GET")
         {  
            while($row = $result->fetch_assoc()) { 
               ?>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="glasses_box">
                     <figure><img src="<?php echo $row['product_img'];?>" alt="#"/></figure>
                     <h3><span class="blu">$</span><?php echo $row['price'];?></h3>
                     <p>Product Name: <?php echo $row['product_name'];?></p>
                     <p>Product Id: <?php echo $row['id'];?></p>
                     <p><?php echo $row['description'];?></p>
                     <form action="../logic/buy_cart.php" method="POST">
                        <div class="qnty_add_cart">
                           <input type="number" name="quantity" class="form-control" placeholder="Quantity" min="1" max="1000" value="<?php echo $row['quantity'];?>"><br>
                           <input type="hidden" name="product_id" id=product_id" class="form-control" value="<?php echo $row['id'];?>"> 
                           <div class="btn-group">
                                 <button type="submit" class="cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                       <path d="M19.029 13h2.971l-.266 1h-2.992l.287-1zm.863-3h2.812l.296-1h-2.821l-.287 1zm-.576 2h4.387l.297-1h-4.396l-.288 1zm2.684-9l-.743 2h-1.929l-3.474 12h-11.239l-4.615-11h14.812l-.564 2h-11.24l2.938 7h8.428l3.432-12h4.194zm-14.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm5.9-7-.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z" />
                                    </svg>
                                    <span>Buy</span>
                                 </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <?php
         }
         }
         mysqli_close($link);
         ?>
            </div>
         </div>
      </div>
      <!-- end Our  Glasses section -->
      <!--  footer -->
      <?php 
         include("../includes/footer.php");
      ?> 
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <script src="../../js/bootstrap.bundle.min.js"></script>
      <script src="../../js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="../../js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../../js/custom.js"></script>
   </body>
</html>

