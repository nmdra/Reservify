<?php

 session_start();

require_once './conn.php';

if (!isset($_SESSION['username'])) {
    echo
    "<script>
        alert('Before Checkout. You must Login.');
        window.location.href='./login.php';
        </script>";
} else {
    $username = $_SESSION['username'];
    $hotelid = $_SESSION['hotel'];
    $pkgid = $_SESSION['package'];
    $uid = $_SESSION['user_id'];
}
    
if (isset($_POST['submit'])) {
    // Retrieve values from the form
    $checkinDate = $_POST['checkinDate'];
    $checkoutDate = $_POST['checkoutDate'];
    $requirement = $_POST['specialRequirement'];
    $payMethod = $_POST['paymentMethod'];

    $query = "INSERT INTO `reserve`(`checkin_date`, `checkout_date`, `special_requirements`, `user_id`, `hotel_id`, `package_id`) VALUES ('$checkinDate','$checkoutDate','$requirement','$uid','$hotelid','$pkgid')";
    $insert = mysqli_query($conn, $query);

    echo
    "<script>
        alert(' 🎉 Checkout Succesfull .');
        window.location.href='./userDashboard.php';
        </script>";
    
    if ($insert) {
    echo
    "<script>
        alert(' 🎉 Checkout Succesfull .');
        window.location.href='./userDashboard.php';
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
