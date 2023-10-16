<?php
session_start();

require_once './conn.php';

if (!isset($_SESSION['owner_id'])) {
    echo "<script>
        alert('Before updating hotel details, you must login.');
        window.location.href='./login.php';
        </script>";
} else {
    $owner_id = $_SESSION['owner_id'];
    $hotel_id = $_GET['hotelid'];

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        $hotel_name = $_POST['hotelName'];
        $description = $_POST['description'];
        
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
        $imgname = $hotel_name . "." . $ext;

        // Check if the image is uploaded successfully
        if (move_uploaded_file($_FILES['image']['tmp_name'], 'assets/hotel/' . $imgname)) {
            $update = "UPDATE `hotel` SET `hotel_name` = '$hotel_name', `description` = '$description', `image` = '$imgname' WHERE `hotel_id` = '$hotel_id';";
            $result = mysqli_query($conn, $update);

            if ($result) {
                echo
                "<script>
                    alert(' 🎉 Hotel details updated successfully.');
                    window.location.href='./ownerDashboard.php#hotel';
                </script>";
            } else {
                // Update failed
                echo
                "<script>
                    alert('Error updating the hotel details. Please try again.');
                    window.location.href='./ownerDashboard.php#hotel';
                </script>";
            }
        } else {
            // Image upload failed
            echo "Error uploading the image. Please try again.";
            echo
            "<script>
                alert('Error uploading the image. Please try again.');
                window.location.href='./updateHotel.php';
            </script>";
        }
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Hotel Details</title>
    <link rel="stylesheet" href="./css/addhotel.css">
</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="main">
        <h1>Update Hotel Details</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="hotelName">Hotel Name:</label>
            <input type="text" id="hotelName" name="hotelName" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="image">Hotel Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <input type="submit" name="submit" value="Update Hotel Details">
        </form>
    </div>
</body>

<?php include "./partials/footer.php" ?>

</html>
