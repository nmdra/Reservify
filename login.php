<?php
session_start();
?>

<?php
// Include the database connection script
require_once './conn.php';

if (isset($_SESSION['username']) || isset($_SESSION['ownername']) || isset($_SESSION['adminname'])) {
    $message[] = 'Before Login. You must logout.';
    // exit();
} else {

    // Check if the form is submitted
    if (isset($_POST['username']) and isset($_POST['password'])) {

        $username = $_POST['username'];
        $pass = $_POST['password'];
        $password = sha1($pass);

        if ($_POST['role'] == 'User') {

            // Check if the values exist in the database
            $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_fetch_array($result);

            if ($count > 0) {
                $_SESSION['username'] = $count['username'];
                $_SESSION['name'] = $count['name'];
                $_SESSION['user_id'] = $count['user_id'];
                $_SESSION['email'] = $count['email'];
                $message[] = $username . "Login Succesful";
                header('location: userDashboard.php');
            } else {
                $message[] = 'Invalid Login Credentials';
            }
        } elseif ($_POST['role'] == 'Owner') {
            $query = "SELECT * FROM `hotel_owner` WHERE username='$username' and password='$password'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_fetch_array($result);

            // echo $count['owner_name'];
            if ($count > 0) {
                $_SESSION['ownername'] = $count['username'];
                $_SESSION['name'] = $count['name'];
                $_SESSION['owner_id'] = $count['owner_id'];
                $_SESSION['email'] = $count['email'];
                // echo $count['owner_name'];
                $message[] = $username . "Login Succesful";
                header('location: ownerDashboard.php');
            } else {
                // If login credentials don't match, show an error message and redirect to the login page
                $message[] = 'Invalid Login Credentials';
            }
        } else {
            $message[] = 'Invalid Role';
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
    <?php include "./partials/header.php" ?>

    <div class="outline">

        <form method="POST" action="" name="loginform" enctype="multipart/form-data">
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
                <input type="text" id="username" name="username" placeholder="Username" required>

                <input type="password" id="pass" name="password" placeholder="Password" required>

                <div class="role-selection">
                    <label for="user-role">Select Role:</label>
                    <input type="radio" id="user-role" name="role" value="User" required>
                    <label for="user-role">User</label>

                    <input type="radio" id="owner-role" name="role" value="Owner" required>
                    <label for="owner-role">Hotel Owner</label>
                </div>
                <input type="submit" id="login" value="Login">
        </form>

        <div class="create-account-wrap">
            <p>Not a member? <a href="./register.php">Create Account</a></p>
        </div>
    </div>
    </div>

    <?php include "./partials/footer.php" ?>
</body>

</html>