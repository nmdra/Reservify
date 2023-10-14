<?php
session_start();

if (!isset($_SESSION['owner_id'])) {
    echo "<script>
        alert('Before Add Hotel. You must login.');
        window.location.href='./login.php';
        </script>";
} else {
    require_once './conn.php';

    $owner_id =  $_SESSION['owner_id'];
    $query = "SELECT `hotel_id`, `hotel_name`, `description`, `image`, `owner_id` FROM `hotel` WHERE owner_id=$owner_id;";
    $result = mysqli_query($conn, $query);
}

if (isset($_POST['submit'])) {
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package</title>
    <link rel="stylesheet" href="./css/addhotel.css">
</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="main">
        <h1>Add Package</h1>

        <form action="addPackage.php" method="POST" enctype="multipart/form-data">
            <label for="packageName">Package Name:</label>
            <input type="text" id="packageName" name="packageName" required>

            <label for="price">Package Price:</label>
            <input type="number" id="price" name="price" required> <!-- Corrected the name attribute to "price" -->

            <label for="image">Package Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <label for="hotel">Payment Method:</label>
            <select id="hotel" name="hotel" required>
                <option value="" disabled selected>Select Hotel</option>

                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['hotel_name'];
                        echo "<option value=\"$name\">$name</option>";
                    }
                }
                ?>
            </select>

            <input type="submit" name="submit" value="Add Package"> <!-- Added the 'name' attribute to the submit button -->

        </form>
    </div>

    <?php include "./partials/footer.php" ?>

</html>