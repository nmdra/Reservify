<?php
session_start();

require_once './conn.php';

if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Before Checkout. You must login.');
        window.location.href='./login.php';
        </script>";
} else {

    $hotelid = $_GET['hotel'];
    $pkgid = $_GET['pkg'];

    $_SESSION['hotel'] = $hotelid;
    $_SESSION['package'] = $pkgid;

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
        window.location.href='./book.php';
        </script>";
    }
}
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

        <form action="getcheckout.php" method="POST">
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