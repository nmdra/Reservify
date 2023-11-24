<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservify</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<?php include "./partials/header.php" ?>

<body>

    <div class="banner">
        <div class="overlay">
            <div class="content">
                <h2>WELCOME</h2>
                <h1>RESERVIFY</h1>
                <p>"Discover comfort and convenience with every reservation."</p>
            </div>
            <div>
                <button onclick="location.href='./hotel.php'" class="checkout"> Book Your Stay</button>
            </div>
        </div>
    </div>

    <div class="HotelOwners">

        <h2>Hotel Owners, Get Started Now!</h2>
        <h3>Join Our Network of Hotels and Boost Your Bookings</h3>
        <div>
            <button onclick="location.href='./ownerRegister.php'" type="button"><span></span> Register</button>
        </div>
    </div>

</body>

<?php include "./partials/footer.php" ?>
</html>