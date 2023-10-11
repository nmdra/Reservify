<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/table.css">
    <title>Document</title>
</head>

<div class="table-main">
    <h1> Hotel Reservations </h1>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>Reserve ID</th>
                    <th>Hotel Name</th>
                    <th>Package Name</th>
                    <th>Check-In Date</th>
                    <th>Check-Out Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                require_once './conn.php';
                // Check if the values exist in the database

                $query = "SELECT r.reserve_id, h.hotel_name AS reserved_hotel, p.package_name AS reserved_package, r.checkin_date, r.checkout_date\n"

                    . "FROM reserve r\n"

                    . "JOIN hotel h ON r.hotel_id = h.hotel_id\n"

                    . "JOIN package p ON r.package_id = p.package_id\n"

                    . "WHERE h.owner_id ='$owner_id';";

                $result = mysqli_query($conn, $query);
                // $count = mysqli_fetch_array($result);
                $count = mysqli_num_rows($result);

                if ($count > 0) {
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
                        echo '<td><a href="reserveDelete.php?id=' . $id . '" class="delete-btn">Cancel</a></td>';
                        echo '<tr>';
                    }
                } else {
                    // If there are no reservations, display a message
                    echo '<tr><td colspan="6">No reservations yet</td></tr>';
                }

                ?>
            <tbody>
        </table>
    </div>
</div>

</html>