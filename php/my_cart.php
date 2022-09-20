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
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="../css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../css/responsive.css">
      <!-- Add to cart -->
      <link rel="stylesheet" href="../css/cart_wishlist.css">
      <!-- fevicon -->
      <link rel="icon" href="../images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout position_head">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="../images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="../images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item ">
                                 <a class="nav-link" href="../templates/cust_index.html">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../templates/cust_about.html">About</a>
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" href="../php/glasses_customer.php">Our Glasses</a>
                              </li> 
                              <li class="nav-item">
                                 <a class="nav-link" href="../templates/cust_wishlist.html">Wish List</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../templates/cust_cart.html">My Cart</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="../templates/cust_contact.html">Contact Us</a>
                              </li>
                              <li class="nav-item d_none login_btn">
                                 <a class="nav-link" href="signup.html">Signup</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <div class="glasses">
      <div class="container-fluid">
         <div class="row">
         <?php
         $conn = new mysqli("localhost", "root", "abc123","sungla");
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
         // error_reporting(E_ERROR | E_PARSE);
         $sqlfetchdata ="SELECT products.id as prod_id,products.product_name as prod_name,products.description as prod_desc,products.price as prod_price,products.product_img as prod_img,users.username as username,cart.prod_qnty as prod_qnty
                        from products , users ,cart
                        where products.id = cart.prod_id
                        and cart.username = '$username' ";
         $result = $conn->query($sqlfetchdata);
         if($_SERVER["REQUEST_METHOD"] == "GET")
         {       
            while($row = $result->fetch_assoc()) 
            { 
             ?>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <div class="glasses_box">
                     <figure>
                        <img src="<?php echo $row['prod_img'];?>" alt="#"/></figure>
                        <h3><span class="blu">$</span><?php echo $row['prod_price'];?></h3>
                        <p>Product Name: <?php echo $row['prod_name'];?></p>
                        <p>Product Id: <?php echo $row['prod_id'];?></p>
                        <p><?php echo $row['prod_desc'];?></p>
                     <form action="my_cart.php" method="POST">
                        <div class="qnty_add_cart">
                           <input type="number" name="product_qty" id="productQty" class="form-control" placeholder="Quantity" min="1" max="1000" value="1">  
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
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <ul class="location_icon">
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a><br> Location</li>
                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a><br> +01 1234567890</li>
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a><br> demo@gmail.com</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="../js/jquery.min.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/bootstrap.bundle.min.js"></script>
      <script src="../js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../js/custom.js"></script>
</body>
</html>