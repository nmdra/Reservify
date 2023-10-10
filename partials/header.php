<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/reset.css">
</head>

<!-- Navigation Bar -->
<nav class="navBar">
    <h1 class="site-logo"><a href="./index.php">Reservify</a></h1>
    <ul>
        <li><a href="./about.php">About Us</a></li>
        <li><a href="./hotel.php">Hotel</a></li>
        <li><a href="./contact.php">Contact Us</a></li>
    </ul>
    <div class="btn">
        <?php
        // Check if there is a user logged in (using a session)
        if (isset($_SESSION['username'])) {
            // Display the user's username and a logout button
            echo '<button class="username"><a href="./userDashboard.php">';
            echo $_SESSION['name'] . '</a><i class="fas fa-user-check"></i></button>';
            echo '<button class="logoutbtn"><a href="./logout.php">Logout</a></button>';
        } else {
            // If no user is logged in, display login and register buttons
            echo '<button class="loginBtn"><a href="./login.php">Login</a></button>';
            echo '<button class="signBtn"><a href="./register.php">Register</a></button>';
        }
        ?>
    </div>
</nav>


</html>
