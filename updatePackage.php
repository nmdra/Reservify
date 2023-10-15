<?php
session_start();

if (!isset($_SESSION['owner_id'])) {
    echo "<script>
        alert('Before updating a package, you must log in.');
        window.location.href='./login.php';
        </script>";
} else {
    require_once './conn.php';
    
    $package_id = $_GET['packageid'];
}

if (isset($_POST['submit'])) {
    
    if (isset($_POST['submit'])) {
        $packagename = $_POST['packageName'];
        $price = $_POST['price'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension'];
        $imgname = $packagename . "." . $ext;
    
        // Check if the image is uploaded successfully
        if (move_uploaded_file($_FILES['image']['tmp_name'], 'assets/package/' . $imgname)) {
    
            $update = "UPDATE `package` SET `package_name` = '$packagename', `price` = '$price', `image` = '$imgname' WHERE `package_id` = '$package_id'";
            $result = mysqli_query($conn, $update);
    
            if ($result) {
                echo
                "<script>
            alert(' 🎉 Package details updated successfully.');
            window.location.href='./ownerDashboard.php#packages';
            </script>";
            } else {
                // Update failed
                echo
                "<script>
            alert('Error updating the Package. Please try again.');
            window.location.href='./ownerDashboard.php.php';
            </script>";
            }
        } else {
            // Image upload failed
            echo "Error uploading the image. Please try again.";
            echo
            "<script>
            alert('Error uploading the image. Please try again.');
            window.location.href='./updatePackage.php';
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
    <title>Update Package Details</title>
    <link rel="stylesheet" href="./css/addhotel.css">
</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="main">
        <h1>Update Package Details</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <label for="packageName">Package Name:</label>
            <input type="text" id="packageName" name="packageName" required>

            <label for="price">Package Price:</label>
            <input type="number" id="price" name="price" required> 

            <label for="image">Package Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <input type="submit" name="submit" value="Update Package"> 

        </form>
    </div>

    <?php include "./partials/footer.php" ?>

</html>
