<?php
session_start();

if (!isset($_SESSION['owner_id'])) {
    echo "<script>
        alert('You must login as a Hotel owner to access this page.');
        window.location.href='./login.php';
        </script>";
    // exit();
} else {

    $owner_id = $_SESSION['owner_id'];
    $username = $_SESSION['ownername'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard</title>
    <link rel="stylesheet" href="css/ownerDashboard.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/table.css">
</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="dashboard">
        <div class="sideBar">
            <h1 class="site-logo"><a href="./ownerDashboard.php">Owner <br> Dashboard</a></h1>
            <ul>
                <li><a href="#profile">Profile</a></li>
                <li><a href="#reservations">Reservations</a></li>
                <li><a href="#hotel">Hotel</a></li>
                <li><a href="#packages">Packages</a></li>
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
                        <p><a class="update-btn" href="./ownerUpdate.php">Update Details</a></p>
                        <?php echo '<p><a class="delete-btn" href="./delete.php?oownerid=' . $owner_id . '">Delete Account</a></p>'; ?>
                    </div>
                </div>
                <div class="pbtn">
                    <a href="#reservations"><button type="button">View Reservation</button></a>
                    <a href="./addhotel.php"><button type="button">Add New Hotel</button></a>
                    <a href="./addPackage.php"><button type="button">Add New Package</button></a>
                </div>
            </section>
            <section id="reservations">
                <h1>Reservations</h1>

                <div class="table-main">
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Reserve ID</th>
                                    <th>Hotel Name</th>
                                    <th>Package Name</th>
                                    <th>Check-In Date</th>
                                    <th>Check-Out Date</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once './conn.php';

                                $query = "SELECT r.reserve_id, h.hotel_name AS reserved_hotel, p.package_name AS reserved_package, r.checkin_date, r.checkout_date
                                    FROM reserve r
                                    JOIN hotel h ON r.hotel_id = h.hotel_id
                                    JOIN package p ON r.package_id = p.package_id
                                    WHERE h.owner_id = '$owner_id'";

                                $result = mysqli_query($conn, $query);

                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['reserve_id'];
                                        $hotelName = $row['reserved_hotel'];
                                        $packageName = $row['reserved_package'];
                                        $checkindate = $row['checkin_date'];
                                        $checkoutdate = $row['checkout_date'];

                                        echo '<tr>';
                                        echo '<td>' . $id . '</td>';
                                        echo '<td>' . $hotelName . '</td>';
                                        echo '<td>' . $packageName . '</td>';
                                        echo '<td>' . $checkindate . '</td>';
                                        echo '<td>' . $checkoutdate . '</td>';
                                        // echo '<td><a href="delete.php?hotelid=' . $id . '" class="delete-btn">Cancel</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="6">No reservations yet.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section id="hotel">
                <h1>Hotel Management</h1>

                <div class="table-main">
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Hotel ID</th>
                                    <th>Hotel Name</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once './conn.php';

                                $query = "SELECT hotel_id, hotel_name FROM hotel WHERE owner_id = '$owner_id'";
                                $result = mysqli_query($conn, $query);

                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['hotel_id'];
                                        $hotelName = $row['hotel_name'];

                                        echo '<tr>';
                                        echo '<td>' . $id . '</td>';
                                        echo '<td>' . $hotelName . '</td>';
                                        echo '<td><a href="updateHotel.php?hotelid=' . $id . '" class="edit-btn">Update</a></td>';
                                        echo '<td><a href="delete.php?hotelid=' . $id . '" class="delete-btn">Delete</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="3">No hotels found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php echo '<a href="./addhotel.php"><button type="button">Add New Hotel</button></a>'; ?>

                </div>
            </section>

            <section id="packages">
                <h1>Package Management</h1>

                <div class="table-main">
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Package ID</th>
                                    <th>Package Name</th>
                                    <th>Hotel Name</th>
                                    <th colspan="2
                                    ">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once './conn.php';

                                $query = "SELECT p.package_id, p.package_name, h.hotel_name\n"

                                    . "FROM package p\n"

                                    . "JOIN hotel h ON p.hotel_id = h.hotel_id\n"

                                    . "WHERE h.owner_id = '$owner_id';";

                                $result = mysqli_query($conn, $query);

                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['package_id'];
                                        $packageName = $row['package_name'];
                                        $hotelName = $row['hotel_name'];

                                        echo '<tr>';
                                        echo '<td>' . $id . '</td>';
                                        echo '<td>' . $packageName . '</td>';
                                        echo '<td>' . $hotelName . '</td>';
                                        echo '<td><a href="updatePackage.php?packageid=' . $id . '" class="edit-btn">Update</a></td>';
                                        echo '<td><a href="delete.php?pkgid=' . $id . '" class="delete-btn">Delete</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="3">No packages available.</td></tr>';
                                }
                                ?>
                            </tbody>

                        </table>

                    </div>

                    <?php echo '<a href="./addPackage.php"><button type="button">Add New Package</button></a>'; ?>
                </div>
            </section>


        </div>
    </div>
</body>

<?php include "./partials/footer.php" ?>

</html>