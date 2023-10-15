<?php
    session_start();

require_once './conn.php';

if (isset($_GET['reserveid'])) {
    $id = $_GET['reserveid'];

    $query = "DELETE FROM `reserve` WHERE reserve_id= '$id'";
    $delete = mysqli_query($conn, $query);

    if ($delete) {
        echo
        "<script>
        alert(' 🎉 Reservation Cancelled.. .');
        window.location.href='./userDashboard.php#reservations';
        </script>";
    }
} elseif (isset($_GET['pkgid'])) {
    $id = $_GET['pkgid'];

    $query = "DELETE FROM `package` WHERE package_id= '$id'";
    $delete = mysqli_query($conn, $query);

    if ($delete) {
        echo
        "<script>
        alert(' 🎉 Package removed...');
        window.location.href='./ownerDashboard.php';
        </script>";
    }
} elseif (isset($_GET['hotelid'])) {
    $id = $_GET['hotelid'];

    $query = "DELETE FROM `hotel` WHERE hotel_id='$id'";
    $delete = mysqli_query($conn, $query);

    if ($delete) {
        echo
        "<script>
        alert(' 🎉 Hotel Removed...');
        window.location.href='./ownerDashboard.php';
        </script>";
    }
} elseif (isset($_GET['userid'])) {
    $id = $_GET['userid'];

    $query = "DELETE FROM `user` WHERE user_id='$id'";
    $delete = mysqli_query($conn, $query);

    if ($delete) {
        echo
        "<script>
        alert(' 🎉 Account has been deleted.');
        window.location.href = 'javascript:history.go(-1)';
        </script>";
    }
} elseif (isset($_GET['msgid'])) {
    $id = $_GET['msgid'];

    $query = "DELETE FROM `contact` WHERE msg_ID=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {

        echo
        "<script>
            alert(' Succesfully Deleted.. .');
            window.location.href='./customerCareDashboard.php';
            </script>";
    } else {

        echo
        "<script>
            alert('The delete action cannot be completed. Try Again.. .');
            window.location.href='./customerCareDashboard.php';
            </script>";
    }
} elseif (isset($_GET['ownerid'])) {
    $id = $_GET['ownerid'];

    $query = "DELETE FROM `hotel_owner` WHERE owner_id='$id'";
    $delete = mysqli_query($conn, $query);

    if ($delete) {
        echo
        "<script>
        alert(' 🎉 Account Deleted...');
        window.location.href = 'javascript:history.go(-1)';
        </script>";
    }
} elseif (isset($_GET['uuserid'])) {
    $id = $_GET['uuserid'];

    $query = "DELETE FROM `user` WHERE user_id='$id'";
    $delete = mysqli_query($conn, $query);

    if ($delete) {
        session_destroy();
        echo
        "<script>
        alert(' 🎉 Your account has been deleted.');
        window.location.href = './register.php';
        </script>";
    }
} elseif (isset($_GET['oownerid'])) {
    $id = $_GET['oownerid'];

    $query = "DELETE FROM `hotel_owner` WHERE owner_id='$id'";
    $delete = mysqli_query($conn, $query);

    if ($delete) {

        session_destroy();

        echo
        "<script>
        alert(' 🎉 Account Deleted...');
        window.location.href = './ownerRegister.php';
        </script>";
    }
} elseif (isset($_GET['employeeid'])) {
    $id = $_GET['employeeid'];

    $query = "DELETE FROM `admin` WHERE admin_id='$id'";
    $delete = mysqli_query($conn, $query);

    if ($delete) {
        echo
        "<script>
        alert(' 🎉 Account has been deleted.');
        window.location.href = 'javascript:history.go(-1)';
        </script>";
    }
}
// close the connection
mysqli_close($conn);
