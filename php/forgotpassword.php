<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="../css/forgotpass.css">
</head>
<body>
  <!-- Signup/Signin -->
  <div class="container" id="container">
    <div class="form-container sign-in-container">
      <form class="form" action="../php/logic/forgotpasslogic.php" method="POST">
        <h1>Enter New Password</h1>
        <input type="text" placeholder="Username" name="username" required/>
        <input type="password" placeholder="Password" name="password" required/>
        <input type="password"  placeholder="Confirm Password" name="confirm_password" required/>
        <button>Save Password</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <div class="logo">
            <img src="../images/logo.png" alt="#"/>
         </div>
          <h1>Forgot Password ?</h1>
          <p>To keep connected with us please login with your personal info</p>
          <form action="../php/signupform.php">
          <button class="ghost" id="signIn">Login</button>
          </form>
        </div>
        <div class="overlay-panel overlay-right">
          <div class="logo">
            <img src="../images/logo.png" alt="#" />
         </div>
          <h1>Hello, Friend!</h1>
          <p>Recalled Password?? Back to Login?</p>
          <form action="../php/signupform.php">
          <button class="ghost" id="signUp">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
