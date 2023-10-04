 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <title>Reservify: Login</title>
     <!-- Include CSS files -->
     <link rel="stylesheet" href="./css/reset.css">
     <link rel="stylesheet" href="./css/login.css">
 </head>
 <!-- Include header -->
 <?php include "./partials/header.php" ?>

 <body>

     <div class="outline">
         <!-- Login Form -->
         <div class="login-form-wrap">
             <h1>Login</h1>
             <form class="login-form" method="POST" action="./logincheck.php" name="loginform">
                 <!-- Username input with validation -->
                 <input type="text" id="username" name="username" placeholder="Username" required>
                 <i class="validation"><span></span><span></span></i>

                 <!-- Password input with validation -->
                 <input type="password" id="pass" name="password" placeholder="Password" required>
                 <i class="validation"><span></span><span></span></i>

                 <!-- Login button -->
                 <input type="submit" id="login" value="Login">
             </form>

             <!-- Create Account Link -->
             <div class="create-account-wrap">
                 <p>Not a member? <a href="./register.php">Create Account</a></p>
             </div><!-- create-account-wrap -->
         </div><!-- login-form-wrap -->
     </div>
 </body>
 <!-- Include footer -->
 <?php include "./partials/footer.php" ?>

 </html>