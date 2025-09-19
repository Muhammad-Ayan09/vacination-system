<?php
session_start();

// Destroy all session data
session_destroy();

// Redirect to login page
echo "<script>window.location.href = 'login.php';</script>";
?>
