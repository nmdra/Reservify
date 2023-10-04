<?php
// Start the session
session_start();

if (isset($_SESSION['username'])) {
    echo " 
        <script>
        alert('Before Login. You must logout. Are you Want to logout');
        window.location.href='./logout.php';
        </script>";
}

// Include the database connection script
require_once './conn.php';

// Check if the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])) {
    // Assign posted values to variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the values exist in the database
    $query = "SELECT * FROM `user` WHERE uName='$username' and password='$password'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_fetch_array($result);

    // If the posted values match database values, create a session for the user and redirect to the user dashboard
    if ($count > 0) {

        $_SESSION['username'] = "name";
        $_SESSION['name'] = $count['name'];
        echo $_SESSION['username'];
        echo " 
        <script>
        alert('$username Login Successfully.');
        window.location.href='./userDashboard.php';
        </script>";
    } else {
        // If login credentials don't match, show an error message and redirect to the login page
        echo " 
        <script>
        alert('Invalid Login Credentials.');
        window.location.href='./login.php';
        </script>";
    }
}
?>

// TODO: Role base system
