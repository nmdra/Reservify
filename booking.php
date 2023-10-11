<?php
session_start();

require_once './conn.php';

if (isset($_GET['hotel'])) {

    $Hotel = $_GET['hotel'];

    // Check if the values exist in the database
    $query = "SELECT * FROM `hotel` WHERE hotel_id='$Hotel'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $name = $row['hotel_name'];
    $description = $row['description'];
    $imgname = $row['image'];
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
                echo '<h1>' . $name . '</h1>';
                echo '<div class="description">';
                echo '<p>' . $description . '</p>';
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
        $query = "SELECT * FROM `package` WHERE hotel_id='$Hotel';";
        $result = mysqli_query($conn, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $pkgid = $row['package_id'];
                $pkgname = $row['package_name'];
                $pkgimg = $row['image'];
                $price = $row['price'];

                echo '<div class="card">';
                echo '<img src="./assets/package/' . $pkgimg . '" alt="hotel">';
                echo '<h1>' . $pkgname . '</h1>';
                echo '<h2>$ ' . $price . '</h2>';
                echo '<button onclick="location.href=\'./checkout.php?hotel=' . $Hotel . '&pkg=' . $pkgid . '\'" type="button">Checkout</button>';
                echo '</div>';
            }
        }
        ?>
    </div>

</body>
<?php include "./partials/footer.php" ?>

</html>