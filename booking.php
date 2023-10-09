<?php
session_start();

// $username = $_SESSION['username'];

require_once './conn.php';

if (isset($_GET['hotel'])) {

    $Hotel = $_GET['hotel'];

    // Check if the values exist in the database
    $query = "SELECT * FROM `Hotel` WHERE hid='$Hotel'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $name = $row['hName'];
    $description = $row['hDescription'];
    $imgname = $row['imgname'];
} else {
    echo
    "<script>
        alert('Hotel Not Available');
        window.location.href='./book.php';
        </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amora Resort</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/booking.css">
    <?php
    echo "
    <style>
        .conMain {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-image: url('./assets/hotel/{$imgname}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            width: 100%;
            height: 100vh;
        }
    </style>";
    ?>
</head>
<?php include "./partials/header.php" ?>

<body>
    <div class="conMain">
        <div class="main-overlay">
            <div class="text">
            <?php    
            echo '<h1>'. $name .'</h1>';
            echo '<div class="description">';
            echo '<p>'. $description .'</p>';
            echo  '</div>';
            ?>
            </div>
        </div>
    </div>
    <div class="title">
        <h1>Packages</h1>
    </div>

    <div class="packages">
        <?php
        $query = "SELECT * FROM `packages` WHERE hid='$Hotel';";
        $result = mysqli_query($conn, $query);
        // $row = mysqli_fetch_array($result);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $pkgid = $row['pkgid'];
                $pkgname = $row['pkgname'];
                // $imgname = $row['imgname'];
                $price = $row['pkgprice'];

                // echo $pkgid;
                // echo $pkgname;

                echo '<div class="card">';
                echo '<img src="./assets/package/null.jpeg" alt="hotel">';
                echo '<h1>'. $pkgname .'</h1>';
                echo '<h2>$ '. $price .'</h2>';
                echo '<button onclick="location.href=\'./checkout.php?hotel=' . $Hotel . '&pkg=' . $pkgid . '\'" type="button">Book Now</button>';
                echo '</div>';
            }
        }
        ?>
    </div>

</body>
<?php include "./partials/footer.php" ?>

</html>