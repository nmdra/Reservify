<?php
session_start();
if (isset($_GET['userid'])) {
  $user_id = $_GET['userid'];
} elseif (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  echo "<script>
        alert('You must login to access this page.');
        window.location.href='./login.php';
        </script>";
}
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

  $select = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id != '$user_id' AND (email = '$email' OR username = '$username')");

  if (!$select) {
    $message[] = 'Database query error: ' . mysqli_error($conn);
  } elseif (mysqli_num_rows($select) > 0) {
    $message[] = 'Username or email already exists';
  } elseif ($password != $rPassword) {
    $message[] = 'Password Mismatch!';
  } else {
    // Update user data in the database
    $update = mysqli_query($conn, "UPDATE `user` SET `name`='$name', `username`='$username', `email`='$email', `password`='$hashpsw' WHERE user_id = '$user_id'");

        if ($update and (isset($_GET['userid']))) {
            // Update successful
            echo "<script>
        alert('User Details Update Succesfull...');
        window.location.href = './adminDashboard.php#user';
        </script>";
        } elseif ($update and (!isset($_GET['userid']))) {
            session_destroy();
            $message[] = 'Update successful. <br> Click here to <a href="./login.php">Log in with new Credentials.</a>';
        } else {
            $message[] = 'Update failed. Please try again.';
        }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Reservify: Sign Up</title>
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/register.css">
  <script src="./js/validate.js"></script>
</head>

<?php include "./partials/header.php" ?>

<body>

  <div class="outline">

    <form action="" method="POST" name="rForm" enctype="multipart/form-data" class="container">

      <h1>Update Details</h1>
      <?php
      if (isset($message)) {
        foreach ($message as $message) {
          echo '<div class="message">' . $message . '</div>';
        }
      }
      ?>
      <span id="validate"> </span>

      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Update Name" name="name" required>

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Update Username" id="uname" name="uname" required>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Update Email" id="email" name="email" required>

      <label for="psw"><b>New Password</b></label>
      <input type="password" placeholder="Update Password" id="psw" name="psw" required>

      <label for="psw-repeat"><b>Confirm New Password</b></label>
      <input type="password" placeholder="Confirm Password" name="psw-repeat" required>

      <input type="submit" id="register" name="submit" value="Update" onclick="return validate()">

    </form>
  </div>
</body>

<?php include "./partials/footer.php" ?>

</html>