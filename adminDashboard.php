<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    echo "<script>
        alert('You must login as a Admin to access this page.');
        window.location.href='./admin.php';
        </script>";
    // exit();
} else {

    $admin_id = $_SESSION['admin_id'];
    $name = $_SESSION['adminname'];
    $email = $_SESSION['admin_email'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/adminDashboard.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/table.css">
</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="dashboard">
        <div class="sideBar">
            <h1 class="site-logo"><a href="./adminDashboard.php">Admin <br> Dashboard</a></h1>
            <ul>
                <li><a href="#profile">Profile</a></li>
                <li><a href="#user">User</a></li>
                <li><a href="#employee">Employee</a></li>
                <li><a href="#hotelOwner">Hotel Owner</a></li>
                <li><a href="./customerCareDashboard.php">Customer Care</a></li>

            </ul>
        </div>
        <div class="content">
            <section id="profile">
                <span class="title">
                    <h1> Admin Profile </h1>
                </span>
                <div class="details">
                    <div class="userdetails">
                        <?php

                        echo '<h2>' . "$name" . '</h2>';
                        // echo '<p class="title">' . "$username" . '</p>';
                        echo '<p>' . "$email" . '</p>';
                        ?>
                    </div>
                    <div class="button">
                        <p><button class="update-btn">Update Details</button></p>
                        <!-- <p><button class="delete-btn">Delete My Account</button></p> -->
                    </div>
                </div>
                <div class="pbtn">
                    <a href="#user"><button type="button">Customer Management</button></a>
                    <a href="#employee"><button type="button">Employee Management</button></a>
                    <a href="#hotelOwner"><button type="button">Hotel Owner Management</button></a>
                    <a href="./customerCareDashboard.php"><button type="button">Customer Care Dashboard</button></a>
                </div>
            </section>
            <!-- Add user management content here -->
            <section id="user">
                <h1>User Management</h1>
                <div class="table-main">
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // // Add PHP code to fetch and display user data in the table
                                // // Modify the SQL query to retrieve user data as needed
                                // $query = "SELECT user_id, username, email FROM user";
                                // $result = mysqli_query($conn, $query);

                                // if ($result) {
                                //     while ($row = mysqli_fetch_assoc($result)) {
                                //         $userId = $row['user_id'];
                                //         $username = $row['username'];
                                //         $email = $row['email'];

                                //         echo '<tr>';
                                //         echo '<td>' . $userId . '</td>';
                                //         echo '<td>' . $username . '</td>';
                                //         echo '<td>' . $email . '</td>';
                                //         echo '<td> <!-- Add action buttons here --> </td>';
                                //         echo '</tr>';
                                //     }
                                // } else {
                                //     echo '<tr><td colspan="4">No users found.</td></tr>';
                                // }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            </section>
            <!-- Add employee management content here -->
            <section id="employee">
                <h1>Employee Management</h1>
                <div class="table-main">
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Add PHP code to fetch and display employee data in the table
                                // Modify the SQL query to retrieve employee data as needed
                                // $query = "SELECT employee_id, name, email FROM employee";
                                // $result = mysqli_query($conn, $query);

                                // if ($result) {
                                //     while ($row = mysqli_fetch_assoc($result)) {
                                //         $employeeId = $row['employee_id'];
                                //         $name = $row['name'];
                                //         $email = $row['email'];

                                //         echo '<tr>';
                                //         echo '<td>' . $employeeId . '</td>';
                                //         echo '<td>' . $name . '</td>';
                                //         echo '<td>' . $email . '</td>';
                                //         echo '<td> <!-- Add action buttons here --> </td>';
                                //         echo '</tr>';
                                //     }
                                // } else {
                                //     echo '<tr><td colspan="4">No employees found.</td></tr>';
                                // }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            </section>
            <!-- Add hotel owner management content here -->
            <section id="hotelOwner">
                <h1>Hotel Owner Management</h1>
                <div class="table-main">
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Owner ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Add PHP code to fetch and display hotel owner data in the table
                                // Modify the SQL query to retrieve hotel owner data as needed
                                // $query = "SELECT owner_id, name, email FROM hotel_owner";
                                // $result = mysqli_query($conn, $query);

                                // if ($result) {
                                //     while ($row = mysqli_fetch_assoc($result)) {
                                //         $ownerId = $row['owner_id'];
                                //         $name = $row['name'];
                                //         $email = $row['email'];

                                //         echo '<tr>';
                                //         echo '<td>' . $ownerId . '</td>';
                                //         echo '<td>' . $name . '</td>';
                                //         echo '<td>' . $email . '</td>';
                                //         echo '<td> <!-- Add action buttons here --> </td>';
                                //         echo '</tr>';
                                //     }
                                // } else {
                                //     echo '<tr><td colspan="4">No hotel owners found.</td></tr>';
                                // }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            </section>
        </div>
    </div>
</body>

<?php include "./partials/footer.php" ?>

</html>