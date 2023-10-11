<?php
// Start the session
session_start();

// Destroy the session
session_destroy();
echo
    "<script>
    alert('Logout successfully.');
    window.location.href='./login.php';
    </script>";

exit();
