<?php
session_start();
?>

<?php
require_once './conn.php';

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $username = $_POST['uname'];
  $email = $_POST['email'];
  $password = $_POST['psw'];
  $rPassword = $_POST['psw-repeat'];
  $hashpsw = sha1($password);

  // Check if the username or email already exists in the database
  $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' OR username = '$username'");
  if (!$select) {
    $message[] = 'Database query error: ' . mysqli_error($conn);
  } elseif (mysqli_num_rows($select) > 0) {
    $message[] = 'Username or email already exists';
  } elseif ($password != $rPassword) {
    $message[] = 'Password Mismatch!';
  } else {
    // Insert user data into the database
    $insert = mysqli_query($conn, "INSERT INTO `user` (`name`, `username`, `email`, `password`) VALUES ('$name', '$username', '$email', '$hashpsw')");

    if ($insert) {
      // Registration successful
      $message[] = 'Registration successful. Click here to <a href="./login.php">Log in.</a>';
    } else {
      // Registration failed
      $message[] = 'Registration failed. Please try again.';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Reservify: Sign Up</title>
  <!-- Include CSS files -->
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/register.css">
</head>
<!-- Include header -->
<?php include "./partials/header.php" ?>

<body>

  <div class="outline">

    <form action="register.php" method="POST" name="rForm" enctype="multipart/form-data" class="container">

      <h1>Sign Up : Customer</h1>
      <?php
      if (isset($message)) {
        foreach ($message as $message) {
          echo '<div class="message">' . $message . '</div>';
        }
      }
      ?>
      <hr>

      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" required>

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

      <p>By creating an account you agree to our <a href="./terms.php" style="color:dodgerblue">Terms.</a>.</p>

      <input type="submit" id="register" name="submit" value="Sign Up">

      <div class="login-wrap">
        <p>Are you member? <a href="./login.php">Login</a></p>
      </div>
      <div class="login-wrap">
        <p>Are you Hotel Owner? <a href="./ownerRegister.php">Register Here.</a></p>
      </div>

    </form>
  </div>
</body>

<?php include "./partials/footer.php" ?>

</html>