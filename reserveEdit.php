<?php
session_start();

require_once './conn.php';

if (isset($_GET['reserveid'])) {
    // Check if the values exist in the database
    $reserve_id = $_GET['reserveid'];
} else {
    echo
    "<script>
    alert('Something Went Wrong');
    window.location.href='./userDashboard#reservations.php';
    </script>";
}

if (isset($_POST['submit'])) {
    // Retrieve values from the form

    $checkinDate = $_POST['checkinDate'];
    $checkoutDate = $_POST['checkoutDate'];
    $requirement = $_POST['specialRequirement'];

    // Modify the query to update the existing reservation
    $query = "UPDATE `reserve` SET 
                `checkin_date`='$checkinDate',
                `checkout_date`='$checkoutDate',
                `special_requirements`='$requirement'
              WHERE `reserve_id`='$reserve_id'";

    $update = mysqli_query($conn, $query);

    if ($update) {
        echo
        "<script>
        alert(' 🎉 Reservation Updated Successfully .');
        window.location.href='./userDashboard.php#reservations';
        </script>";
    } else {
        // Update failed
        echo
        "<script>
        alert('Something went Wrong. Update Unsuccessful.');
        window.location.href='./userDashboard.php#reservations';
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
                <input type="submit" name="submit" value="Update">
            </div>
        </form>
    </div>
</body>

<?php include "./partials/footer.php" ?>

</html>