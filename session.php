<?php
//Start session
// Start session
session_start();

// Check whether the session variable role is present or not
if (!isset($_SESSION['role']) || (trim($_SESSION['role']) == '')) {
    header("Location: index.php");
    exit();
}

$role = $_SESSION['role'];

// Redirect to the respective dashboard based on role
if ($role === 'user') {
    header("Location: userlog/userdashboard.php");
    exit();
} elseif ($role === 'staff') {
    header("Location: staffdashboard.php");
    exit();
}


?>