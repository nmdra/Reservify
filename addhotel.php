<?php
session_start();

require_once './conn.php';
if (!isset($_SESSION['owner_id'])) {
    echo "<script>
        alert('Before Add Hotel. You must login.');
        window.location.href='./login.php';
        </script>";
    // exit();
} else {
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        $hotel_name = $_POST['hotelName'];
        $description = $_POST['description'];
        $owner_id =  $_SESSION['owner_id'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
        $imgname = $hotel_name . "." . $ext;

        // Check if the image is uploaded successfully
        if (move_uploaded_file($_FILES['image']['tmp_name'], 'assets/hotel/' . $imgname)) {
            $insert = "INSERT INTO `hotel` (`hotel_name`, `description`, `image`, `owner_id`) VALUES ('$hotel_name', '$description', '$imgname', '$owner_id')";
            $result = mysqli_query($conn, $insert);

            if ($result) {
                echo
                "<script>
            alert(' 🎉 Hotel added successfully.');
            window.location.href='./ownerDashboard.php';
            </script>";
            } else {
                // Insertion failed
                echo
                "<script>
            alert('Error adding the hotel. Please try again.');
            window.location.href='./addhotel.php';
            </script>";
            }
        } else {
            // Image upload failed
            echo "Error uploading the image. Please try again.";
            echo
            "<script>
            alert('Error uploading the image. Please try again.');
            window.location.href='./addhotel.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hotel</title>
    <link rel="stylesheet" href="./css/addhotel.css">
</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="main">
        <h1>Add Hotel</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="hotelName">Hotel Name:</label>
            <input type="text" id="hotelName" name="hotelName" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="image">Hotel Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <input type="submit" name="submit" value="Add Hotel"> 
        </form>
    </div>
</body>

<?php include "./partials/footer.php" ?>

</html>