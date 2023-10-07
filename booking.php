<?php
    session_start();

    // $username = $_SESSION['username'];

require_once './conn.php';

if (isset($_GET['hotel'])){
    
    $Hotel = $_GET['hotel'];

    // Check if the values exist in the database
    $query = "SELECT * FROM `Hotel` WHERE hid=$Hotel";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    echo $row['hName'];
    echo $row['hDescription'];

} else {
        echo 
        "<script>
        alert('Hotel Not Available');
        window.location.href='./book.php';
        </script>";
}

echo $Hotel;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



</body>
</html>