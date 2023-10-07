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


<div class="title">
    <h1>HOTELS</h1>
</div>

<div class="cardContainer">
    

    <?php

    require_once './conn.php';
    // Check if the values exist in the database
    $query = "SELECT * FROM `Hotel`";
    $result = mysqli_query($conn, $query);
    // $row = mysqli_fetch_array($result);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['hid'];
            $name = $row['hName'];
            $imgname = $row['imgname'];

        echo '<div class="card">';
        echo '<img src="./assets/image/' . $imgname .'" alt=hotel>';
        echo '<h1>' . $name . '</h1>';
        echo '<button onclick="location.href=\'./booking.php?hotel=' . $id . '\'" type="button">Book Now</button>';
        echo '</div>';
        }
    }

?>
</div>

</body>

<?php include "./partials/footer.php" ?>
</html>