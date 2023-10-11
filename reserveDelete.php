<?php
    
    require_once './conn.php';

    $id = $_GET['id'];

    $query = "DELETE FROM `reserve` WHERE reserve_id= $id";
    $delete = mysqli_query($conn, $query);

    if($delete) {
        echo 
        "<script>
        alert(' 🎉 Checkout Cancelled.. .');
        // window.location.href='./userDashboard.php';
        window.location.href='./table.php';
        </script>";
    }

