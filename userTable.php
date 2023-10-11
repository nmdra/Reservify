<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/table.css">
    <title>Document</title>
</head>

    <div class="table-main">
        <h1> Reservations </h1>
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Reserve ID</th>
                        <th>Check-In Date</th>
                        <th>Check-Out Date</th>
                        <th>Special Requirements</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    require_once './conn.php';
                    // Check if the values exist in the database
                    $query = "SELECT * FROM `reserve` WHERE user_id='$user_id'";

                    // $query = "SELECT * FROM `reserve` WHERE user_id=4";

                    $result = mysqli_query($conn, $query);
                    // $count = mysqli_fetch_array($result);
                    $count = mysqli_num_rows($result);

                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['reserve_id'];
                            $checkindate = $row['checkin_date'];
                            $checkoutdate = $row['checkout_date'];
                            $requirements = $row['special_requirements'];

                            echo '<tr>'; // Added a new table row for each iteration 
                            echo '<td>' . $id . '</td>'; // Use <td> to represent table data
                            echo '<td>' . $checkindate . '</td>'; // Use <td> to represent table data
                            echo '<td>' . $checkoutdate . '</td>'; // Use <td> to represent table data  
                            echo '<td>' . $requirements . '</td>'; // Use <td> to represent table data
                            echo '<td><a href="reserveEdit.php?id=' . $id . '" class="edit-btn">Edit</a></td>';
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