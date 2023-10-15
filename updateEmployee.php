<?php
session_start();

// check employeeid
if (isset($_GET['employeeid'])) {
    $employee_id = $_GET['employeeid'];
} elseif (isset($_SESSION['admin_id'])) {
    $employee_id = $_SESSION['admin_id'];
    // exit();
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
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $rPassword = $_POST['psw-repeat'];
    $hashpsw = sha1($password);

    // Check if the username or email already exists in the database

    $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE admin_id != '$employee_id' AND (admin_email = '$email' OR admin_name = '$username')");

    if (!$select) {
        $message[] = 'Database query error: ' . mysqli_error($conn);
    } elseif (mysqli_num_rows($select) > 0) {
        $message[] = 'Username or email already exists';
    } elseif ($password != $rPassword) {
        $message[] = 'Password Mismatch!';
    } else {
        // Update user data in the database
        $update = mysqli_query($conn, "UPDATE `admin` SET `admin_name`='$username', `admin_email`='$email', `admin_password`='$hashpsw' WHERE admin_id = '$employee_id'");

        if ($update and (isset($_GET['employeeid']))) {
            // Update successful
            echo "<script>
        alert('Employee Details Update Succesfull...');
        window.location.href = './adminDashboard.php#employee';
        </script>";
        } elseif ($update and (!isset($_GET['employeeid']))) {
            session_destroy();
            $message[] = 'Update successful. <br> Click here to <a href="./admin.php">Log in with new Credentials.</a>';
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
    <title>Reservify: Update Details</title>
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