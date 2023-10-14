<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Viewed</title>
    <!-- Include CSS file -->
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
    <!-- Include header -->
    <?php include "./partials/header.php"; ?>

    <div class="main">
        <div class="ConnOuntline">
            <div class="container">
                <?php
                session_start();

                require_once "./conn.php";

                if (isset($_GET['veiwid'])) {
                    $id = $_GET['veiwid'];

                    $sql = "SELECT * FROM contact WHERE msg_ID=$id ";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                ?>

                    <h3>Name</h3>
                    <p><?php echo $row["sender_Name"]; ?> </p>

                    <h3>Email</h3>
                    <p><?php echo $row["email"]; ?> </p>

                    <h3>Phone</h3>
                    <p><?php echo $row["phone"]; ?> </p>

                    <h3>Message</h3>
                    <p><?php echo $row["message"]; ?> </p>
                <?php
                }
                ?>
                <a href="./customerCareDashboard.php"> <button class="Button">Back</button> </a>
            </div>
        </div>
    </div>

    <!-- Include footer -->
    <?php include "./partials/footer.php"; ?>
</body>

</html>