<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>
  <!-- Signup/Signin -->
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form action="../php/logic/signup.php" method="POST">
        <h1>Create Account</h1>
        <input type="text" pattern="^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$" placeholder="Username" name="username" required/>
        <input type="email" placeholder="Email" name="email" required/>
        <input type="password" placeholder="Password" name="password" required/>
        <input type="password"  placeholder="Confirm Password" name="confirm_password" required/>
        <!-- //pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" -->
        <button>Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form action="../php/logic/login.php" method="POST">
        <h1>Login</h1>
        <input type="text" placeholder="Username" name="login_username" required/>
        <input type="password" placeholder="Password" name="login_password" required />
        <a href="../php/forgotpassword.php">Forgot your password?</a>
        <button>Login</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <div class="logo">
            <img src="../images/logo.png" alt="#"/>
         </div>
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button class="ghost" id="signIn">Login</button>
        </div>
        <div class="overlay-panel overlay-right">
          <div class="logo">
            <img src="../images/logo.png" alt="#" />
         </div>
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start journey with us</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
    });
  </script>

</body>
</html>
