<?php
session_start();
?>

<?php
require_once './conn.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $username = $_POST['uname'];
  $email = $_POST['email'];
  $password = $_POST['psw'];
  $rPassword = $_POST['psw-repeat'];
  $hashpsw = sha1($password);

  // Check if the username or email already exists in the database
  $select = mysqli_query($conn, "SELECT * FROM `hotel_owner` WHERE email = '$email' OR username = '$username'");
  if (!$select) {
    $message[] = 'Database query error: ' . mysqli_error($conn);
  } elseif (mysqli_num_rows($select) > 0) {
    $message[] = 'Username or email already exists';
  } elseif ($password != $rPassword) {
    $message[] = 'Password Mismatch!';
  } else {
    // Insert user data into the database
    $insert = mysqli_query($conn, "INSERT INTO `hotel_owner` (`name`, `username`, `email`, `password`) VALUES ('$name', '$username', '$email', '$hashpsw')");

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
  <title>Reservify: Sign Up - Owner</title>
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/register.css">
  <script src="./js/validate.js"></script>
</head>

<?php include "./partials/header.php" ?>

<div class="outline">

  <form action="ownerRegister.php" method="POST" name="rForm" enctype="multipart/form-data" class="container">

    <h1>Sign Up : Owner</h1>
    <?php
    if (isset($message)) {
      foreach ($message as $message) {
        echo '<div class="message">' . $message . '</div>';
      }
    }
    ?>
      <span id="validate"> </span>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" id="uname" name="uname" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" id="email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="uname" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

    <p>By creating an account you agree to our <a href="./terms.php" style="color:dodgerblue">Terms.</a>.</p>

    <input type="submit" id="register" name="submit" value="Sign Up" onclick="return validate()">

    <div class="login-wrap">
      <p>Are you member? <a href="./login.php">Login</a></p>
    </div>

</div>
</form>
</body>

<?php include "./partials/footer.php" ?>

</html>