<?php
session_start();

require_once './conn.php';
if (!isset($_SESSION['user_id'])) {
    echo "<script>
        alert('Before Add Hotel. You must login.');
        window.location.href='./login.php';
        </script>";
} else {
    $hotelName = $_POST['hotel'];
    $query = "SELECT * FROM `hotel` WHERE hotel_name = '$hotelName'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['submit'])) {
        $hotelid = $row['hotel_id'];
        $packagename = $_POST['packageName'];
        $price = $_POST['price'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
        $imgname = $packagename . "." . $ext;

        // Check if the image is uploaded successfully
        if (move_uploaded_file($_FILES['image']['tmp_name'], 'assets/package/' . $imgname)) {

            $insert = "INSERT INTO `package`(`package_name`, `price`, `hotel_id`, `image`) VALUES ('$packagename','$price','$hotelid','$imgname')";
            $result = mysqli_query($conn, $insert);

            if ($result) {
                echo
                "<script>
            alert(' 🎉 Package added successfully.');
            window.location.href='./ownerDashboard.php';
            </script>";
            } else {
                // Insertion failed
                echo
                "<script>
            alert('Error adding the Package. Please try again.');
            window.location.href='./addPackage.php';
            </script>";
            }
        } else {
            // Image upload failed
            echo "Error uploading the image. Please try again.";
            echo
            "<script>
            alert('Error uploading the image. Please try again.');
            window.location.href='./addPackage.php';
            </script>";
        }
    }
}
