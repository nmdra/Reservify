<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/hotel.css">
</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="main">
        <div class="title">
            <h1>HOTELS</h1>
        </div>

        <!-- Add a search bar and button -->
        <div class="search-container">
            <input type="text" id="hotelSearch" placeholder="Search for hotels...">
            <button onclick="searchHotels()">Search</button>
        </div>

        <div class="cardContainer">


            <?php

            require_once './conn.php';
            // Check if the values exist in the database
            $query = "SELECT * FROM `hotel`";
            $result = mysqli_query($conn, $query);
            // $row = mysqli_fetch_array($result);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['hotel_id'];
                    $name = $row['hotel_name'];
                    $imgname = $row['image'];

                    echo '<div class="card">';
                    echo '<img src="./assets/hotel/' . $imgname . '" alt=hotel>';
                    echo '<h1>' . $name . '</h1>';
                    echo '<button onclick="location.href=\'./booking.php?hotel=' . $id . '\'" type="button">Book Now</button>';
                    echo '</div>';
                }
            }

            ?>
        </div>
    </div>

</body>

<script src="./js/search.js"></script>
<?php include "./partials/footer.php" ?>

</html>