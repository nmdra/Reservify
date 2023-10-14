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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Care Dashboard</title>
    <link rel="stylesheet" href="css/customerCareDashboard.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/table.css">
</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="dashboard">
        <div class="sideBar">
            <h1 class="site-logo"><a href="./customerCareDashboard.php">Customer Care <br> Dashboard</a></h1>
            <ul>
                <li><a href="#pending">Pending</a></li>
                <li><a href="#completed">Completed</a></li>
            </ul>
        </div>
        <div class="content">
            <section id="pending">
                <h1>Pending Inquiries</h1>

                <div class="table-main">
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Inquiry ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once './conn.php';

                                $query = "SELECT * FROM `contact` WHERE status = 'Pending'";

                                $result = mysqli_query($conn, $query);

                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['msg_ID'];
                                        $name = $row['sender_Name'];
                                        $email = $row['email'];
                                        $phone = $row['phone'];
                                        $status = $row['status'];

                                        echo '<tr>';
                                        echo '<td>' . $id . '</td>';
                                        echo '<td>' . $name . '</td>';
                                        echo '<td>' . $email . '</td>';
                                        echo '<td>' . $phone . '</td>';
                                        echo '<td>' . $status . '</td>';
                                        echo '<td><button class="action"><a href="markAsCompleted.php?cid=' . $id . '" class="textDesign">Complete</a></button>
                                        <button class="delete"><a href="delete.php?msgid=' . $id . '" class="textDesign">Delete</a></button></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="6">No pending inquiries found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section id="completed">
                <h1>Completed Inquiries</h1>

                <div class="table-main">
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Inquiry ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once './conn.php';

                                $query = "SELECT * FROM `contact` WHERE status = 'Completed'";

                                $result = mysqli_query($conn, $query);

                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['msg_ID'];
                                        $name = $row['sender_Name'];
                                        $email = $row['email'];
                                        $phone = $row['phone'];
                                        $status = $row['status'];

                                        echo '<tr>';
                                        echo '<td>' . $id . '</td>';
                                        echo '<td>' . $name . '</td>';
                                        echo '<td>' . $email . '</td>';
                                        echo '<td>' . $phone . '</td>';
                                        echo '<td>' . $status . '</td>';
                                        echo '<td><button class="action"><a href="messageViewed.php?veiwid=' . $id . '"  class="textDesign">View</a></button>
                                        <button class="delete"><a href="delete.php?msgid=' . $id . '" class="textDesign">Delete</a></button></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="6">No completed inquiries found.</td></tr>';
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