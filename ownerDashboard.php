<?php
// <-- Table For owner dashboard -->
session_start();

require_once './conn.php';

if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Before Checkout. You must login.');
        window.location.href='./login.php';
        </script>";
} else {
    $owner_id = $_SESSION['user_id'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservify</title>
    <link rel="stylesheet" href="css/userDashboard.css">
</head>

<?php include "./partials/header.php" ?>
<body>

    <div class="main">

    </div>

<?php include "./ownerTable.php" ?>
</body>

<?php include "./partials/footer.php" ?>

</html>