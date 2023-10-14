<?php
session_start();
?>

<?php
require_once "./conn.php";

if (isset($_GET['cid'])) {
    $id = $_GET["cid"];

    if (isset($_POST['submit'])) {

        $status = $_POST['status'];

        $query = "UPDATE `contact` SET  status='$status' WHERE msg_ID='$id'";

        $result = mysqli_query($conn, $query);

        if ($result) {

            echo
            "<script>
        alert(' 🎉 Message Succesfully Updated.. .');
        window.location.href='./customerCareDashboard.php';
         </script>";
        } else {

            echo
            "<script>
        alert(' Something went wrong Try Again.. .');
        window.location.href='./customerCareDashboard.php';
        </script>";
        }
    }
}
// close the connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark As Completed</title>
    <link rel="stylesheet" href="css/contact.css">
</head>

<!-- Include header -->
<?php include "./partials/header.php" ?>

<body>
    <div class="main">
        <div class="ConnOuntline">
            <div class="container">

                <div class="contactForm">

                    <form action="" method="POST" name="cForm" enctype="multipart/form-data">

                        <lable for="status"><b>Status</b></lable>
                        <select id="status" name="status" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                        </select>

                        <input type="submit" class="Button" name="submit" value="Update">

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Include footer -->
<?php include "./partials/footer.php" ?>

</html>