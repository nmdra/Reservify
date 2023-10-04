<?php
// Start the session (if it's not already started)
session_start();

// Destroy the session and clear all session data
session_destroy();

// Redirect or perform any other actions after destroying the session
header("Location: login.php"); // You can replace "login.php" with the URL you want to redirect to.
exit(); // Terminate the script after redirection
?>
