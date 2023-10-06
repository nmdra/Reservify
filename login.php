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
        $query = "SELECT * FROM `user` WHERE uName='$username' and password='$password'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_fetch_array($result);

        // If the posted values match database values, create a session for the user and redirect to the user dashboard
        if ($count > 0) {
            if ($count['role'] == 'User') {
                //saving user data into session variables
            $_SESSION['username'] = $count['uName'];
            $_SESSION['name'] = $count['name'];
                $message[] = $username . "Login Succesful";
                header('location: userDashboard.php');
            } else if ($count['role'] == 'Admin') {
                //saving Admin data into session variables 
            $_SESSION['username'] = $count['uName'];
            $_SESSION['name'] = $count['name'];
 
                header('location: adminDashboard.php');
            } else if ($count['role'] == 'Owner') {
                //saving Admin data into session variables
            $_SESSION['username'] = $count['uName'];
            $_SESSION['name'] = $count['name'];
 
                header('location: ownerDashboard.php');
            } 
        } else {
            // If login credentials don't match, show an error message and redirect to the login page
            $message[] = 'Invalid Login Credentials';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reservify: Login</title>
    <!-- Include CSS files -->
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <!-- Include header -->
    <?php include "./partials/header.php" ?>

    <div class="outline">
        <!-- Login Form -->

        <form method="POST" action="./login.php" name="loginform" enctype="multipart/form-data">
            <div class="container">
                <h1>Login</h1>
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

                <!-- Login button -->
                <input type="submit" id="login" value="Login">
        </form>

        <!-- Create Account Link -->
        <div class="create-account-wrap">
            <p>Not a member? <a href="./register.php">Create Account</a></p>
        </div><!-- create-account-wrap -->
    </div><!-- login-form-wrap -->
    </div>



    <!-- Include footer -->
    <?php include "./partials/footer.php" ?>
</body>

</html>