<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservify</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<!-- Navigation Bar -->
<nav class="navBar">
    <h1 class="site-logo"><a href="../index.php">Reservify</a></h1>
    <ul>
        <li><a href="../about.php">About Us</a></li>
        <li><a href="../hotel.php">Hotel</a></li>
        <li><a href="../contact.php">Contact Us</a></li>
    </ul>
<div class="btn">
    <?php
    //if there is a user display username
    if (isset($_SESSION['username'])) {
        echo '<div class="btn">
        <button class="username"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></g></svg>&nbsp;&nbsp;<a href="./userDashboard.php">';
        echo $_SESSION['name'] . '</a><i class="fas fa-user-check"></i></button>';
        echo '<button class="logoutbtn"><a href="./logout.php">Logout</a></button></div>';
    } else {
        //if the user is not a registered user display a register button
        echo '<div class="btn">
        <button class="loginBtn"><a href="./login.php">Login</a></button>
        <button class="signBtn"><a href="./register.php">Register</a></button>';
    }
    ?>
    </div>
</nav>

</html>