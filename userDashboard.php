<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>
        alert('You must login to access this page.');
        window.location.href='./login.php';
        </script>";
    // exit();
} else {

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/userDashboard.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/table.css">
</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="dashboard">
        <div class="sideBar">
            <h1 class="site-logo"><a href="./userDashboard.php">User <br> Dashboard</a></h1>
            <ul>
                <li><a href="#profile">Profile</a></li>
                <li><a href="#reservations">Reservations</a></li>
            </ul>
        </div>
        <div class="content">
            <section id="profile">
                <span class="title">
                    <h1> Profile </h1>
                </span>
                <div class="details">
                    <div class="userdetails">
                        <?php

                        echo '<h2>' . "$name" . '</h2>';
                        echo '<p class="title">' . "$username" . '</p>';
                        echo '<p>' . "$email" . '</p>';
                        ?>
                    </div>
                    <div class="button">
                        <p><a class="update-btn" href="./userUpdate.php">Update Details</a></p>
                        <?php echo '<p><a class="delete-btn" href="./delete.php?uuserid=' . $user_id . '">Delete Account</a></p>'; ?>
                    </div>
                </div>
        <div class="pbtn">
            <a href="./hotel.php"><button type="button">Add New Reservation</button></a>
            <a href="#reservations"><button type="button">Recent Reservation</button></a>
        </div>
        </section>
        <section id="reservations">
            <h1>My Reservations</h1>

            <div class="table-main">
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Reserve ID</th>
                                <th>Check-In Date</th>
                                <th>Check-Out Date</th>
                                <th>Requirements</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            require_once './conn.php';
                            // Check if the values exist in the database
                            $query = "SELECT * FROM `reserve` WHERE user_id='$user_id'";

                            $result = mysqli_query($conn, $query);
                            $count = mysqli_num_rows($result);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['reserve_id'];
                                    $checkindate = $row['checkin_date'];
                                    $checkoutdate = $row['checkout_date'];
                                    $requirements = $row['special_requirements'];

                                    echo '<tr>';
                                    echo '<td>' . $id . '</td>';
                                    echo '<td>' . $checkindate . '</td>';
                                    echo '<td>' . $checkoutdate . '</td>';
                                    echo '<td>' . $requirements . '</td>';
                                    echo '<td><a href="reserveEdit.php?reserveid=' . $id . '" class="edit-btn">Edit</a></td>';
                                    echo '<td><a href="delete.php?reserveid=' . $id . '" class="delete-btn">Cancel</a></td>';
                                    echo '<tr>';
                                }
                            } else {
                                // no reservations, display a message
                                echo '<tr><td colspan="6">No reservations yet</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    </div>
</body>

<?php include "./partials/footer.php" ?>

</html>