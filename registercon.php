<?php
// Include the database connection script
require_once './conn.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve values from the form
    $name = $_POST['name'];
    $uName = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $rPassword = $_POST['psw-repeat'];

    // SQL query to insert user data into the database
    $sql = "INSERT INTO `user`(`name`, `uName`, `email`, `password`) VALUES ('$name', '$uName', '$email', '$password')";

    // Attempt to execute the SQL query
    if (mysqli_query($conn, $sql)) {
        echo " 
        <script>
        alert('$uName Added Successfully. You can now login using your credentials.');
        window.location.href='login.php';
        </script>";
    } else {
        // If an error occurs during the SQL query execution, display an error message
        echo "ERROR: Sorry, there was an issue with the database. " . mysqli_error($conn);
    }
}
?>
