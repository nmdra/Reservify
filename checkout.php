<?php
session_start();

require_once './conn.php';

if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Before Checkout. You must login as User.');
        window.location.href='./login.php';
        </script>";
} else {
    $hotelid = $_GET['hotel'];
    $pkgid = $_GET['pkg'];
    $uid = $_SESSION['user_id'];

    if (isset($_GET['pkg'])) {
        // Check if the values exist in the database
        $query = "SELECT * FROM `package` WHERE package_id='$pkgid' and hotel_id='$hotelid';";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        $pkg = $row['package_id'];
        $pkgname = $row['package_name'];
        $price = $row['price'];
    } else {
        echo
        "<script>
        alert('Hotel Not Available');
        window.location.href='./booking.php';
        </script>";
    }
}

if (isset($_POST['submit'])) {
    // Retrieve values from the form
    $checkinDate = $_POST['checkinDate'];
    $checkoutDate = $_POST['checkoutDate'];
    $requirement = $_POST['specialRequirement'];
    $payMethod = $_POST['paymentMethod'];

    $query = "INSERT INTO `reserve`(`checkin_date`, `checkout_date`, `special_requirements`, `user_id`, `hotel_id`, `package_id`) VALUES ('$checkinDate','$checkoutDate','$requirement','$uid','$hotelid','$pkgid')";
    $insert = mysqli_query($conn, $query);

    if ($insert) {
        echo
        "<script>
        alert(' 🎉 Checkout Succesfull .');
        window.location.href='./userDashboard.php#reservations';
        </script>";
    } else {
        // Registration failed
        echo
        "<script>
        alert('Something went Wrong. Checkout Unsuccesfull.');
        window.location.href='./checkout.php';
        </script>";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/checkout.css">
    <title>Hotel Checkout</title>

</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="main">
        <h1>Hotel Checkout</h1>

        <form action="" method="POST">
            <div class="form-container">
                <div class="form">
                    <label for="checkinDate">Check-in Date:</label>
                    <input type="date" id="checkinDate" name="checkinDate" required>
                </div>
                <div class="form">
                    <label for="checkoutDate">Check-out Date:</label>
                    <input type="date" id="checkoutDate" name="checkoutDate" required>
                </div>
                <div class="form">
                    <label for="specialRequirements">Special Requirements:</label>
                    <textarea id="specialRequirements" name="specialRequirement" rows="4" placeholder="Enter any special requirements or notes"></textarea>
                </div>
            </div>
            <div class="summery">
                <?php
                echo "<h2> Package Name : $pkgname  </h2>";
                echo "<h2> Package Price : USD $price  </h2>";
                ?>

                <label for="paymentMethod">Payment Method:</label>
                <select id="paymentMethod" name="paymentMethod" required>
                    <option value="" disabled selected>Select a payment method</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="debit_card">Debit Card</option>
                    <option value="pay_later">Pay Later</option>
                </select>
                <input type="submit" name="submit" value="Checkout">
            </div>
        </form>
    </div>
</body>

<?php include "./partials/footer.php" ?>

</html>