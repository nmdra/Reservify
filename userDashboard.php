<?php

    if (!isset($_SESSION['username'])) {
        echo " 
        <script>
        alert('You Must Login to access this page');
        window.location.href='./login.php';
        </script>";
    }

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

    <div class="main">
        <!-- Your main content goes here -->
        <H1>WIP</H1>
    </div>
</body>

<?php include "./partials/footer.php" ?>

</html>