<?php
session_start();

require_once './conn.php';

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    echo "<script>
        alert('You must login as an admin to access this page.');
        window.location.href='./adminLogin.php';
        </script>";
}

if (isset($_POST['submit'])) {
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password =  $_POST['psw'];
    $rPassword = $_POST['psw-repeat'];
    $hashpsw = sha1($password);

    // Check if the username or email already exists in the database
    $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE admin_email = '$email' OR admin_name = '$username'");

    if (!$select) {
        $message[] = 'Database query error: ' . mysqli_error($conn);
    } elseif (mysqli_num_rows($select) > 0) {
        $message[] = 'Username or email already exists';
    } elseif ($password != $rPassword) {
        $message[] = 'Password Mismatch!';
    } else {
        // Insert the new employee data into the database
        $insert = mysqli_query($conn, "INSERT INTO `admin` (`admin_name`, `admin_email`, `admin_password`) VALUES ('$username', '$email', '$hashpsw')");

        if ($insert) {
            // Registration successful
            echo "<script>
            alert('Employee added successfully.');
            window.location.href='./adminDashboard.php#employee';
            </script>";
        } else {
            // Registration failed
            $message[] = 'Error adding the employee. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/register.css">
    <script src="./js/validate.js"></script>
</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="outline">
        <form action="" method="POST" name="rForm" enctype="multipart/form-data" class="container">
            <h1>Add Employee</h1>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
            <span id="validate"> </span>
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" id="uname" name="uname" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" id="email" name="email" required>

            <label for="psw"><b>New Password</b></label>
            <input type="password" placeholder="Enter Password" id="psw" name="psw" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

            <input type="submit" id="register" name="submit" value="Add Employee" onclick="return validate()">
        </form>
    </div>
</body>

<?php include "./partials/footer.php" ?>

</html>
