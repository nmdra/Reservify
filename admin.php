<?php
session_start();
?>

<?php
// Include the database connection script
require_once './conn.php';

if (isset($_SESSION['username'])) {
    $message[] = 'Before Login. You must logout.';
    // exit();
} else {

    // Check if the form is submitted
    if (isset($_POST['username']) and isset($_POST['password'])) {
        // Assign posted values to variables

        $username = $_POST['username'];
        $pass = $_POST['password'];
        $password = sha1($pass);

        // Check if the values exist in the database
        $query = "SELECT * FROM `admin` WHERE admin_name='$username' and admin_password='$password'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_fetch_array($result);
        // echo $count
        if ($count > 0) {
            $_SESSION['username'] = $count['admin_name'];
            $_SESSION['user_id'] = $count['admin_id'];
            $_SESSION['name'] = $count['admin_name'];
            header('location: adminDashboard.php');
        } else {
            $message[] = 'Invalid Login Credentials';
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <!-- Include CSS files -->
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <!-- Include header -->
    <?php include "./partials/header.php" ?>

    <div class="outline">
        <!-- Login Form -->
        <form method="POST" action="./admin.php" name="loginform" enctype="multipart/form-data">
            <div class="container">
                <h1>Admin Login</h1>
                <?php
                if (isset($message)) {
                    foreach ($message as $message) {
                        echo '<div class="message">' . $message . '</div>';
                    }
                }
                ?>
                <hr>
                <!-- Username input with validation -->
                <input type="text" id="username" name="username" placeholder="Username" required>

                <!-- Password input with validation -->
                <input type="password" id="pass" name="password" placeholder="Password" required>

                <input type="submit" id="login" value="Login">
            </div>
        </form>
    </div><!-- login-form-wrap -->
    <!-- Include footer -->
    <?php include "./partials/footer.php" ?>
</body>

</html>