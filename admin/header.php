<?php
include 'config.php';
session_start();
if (!isset($_SESSION['admin_session'])) {
    echo "<script>window.location.href = 'login.php'; </script>";
};
$query = "SELECT * FROM tbl_admin WHERE id=" . $_SESSION['admin_session'];
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Vaccination System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="asset/admin-style.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Vaccination System</h2>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link active">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="hospital.php" class="nav-link">
                        <i class="fas fa-plus-square"></i>
                        Hospital
                    </a>
                </li>
                <li class="nav-item">
                    <a href="patient.php" class="nav-link">
                        <i class="fas fa-users"></i>
                        Patient
                    </a>
                </li>
                <li class="nav-item">
                    <a href="appointment.php" class="nav-link">
                        <i class="fas fa-calendar"></i>
                        Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a href="covid-test.php" class="nav-link">
                        <i class="fas fa-heartbeat"></i>
                        Covid Test
                    </a>
                </li>
                <li class="nav-item">
                    <a href="feedback.php" class="nav-link">
                        <i class="fas fa-comment"></i>
                        Feedback
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../index.php" class="nav-link">
                        <i class="fas fa-globe"></i>
                        Website
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        Sign Out
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <div class="header-left">
                    <h1>Vaccination System</h1>
                </div>
                <div class="header-right">
                    <button class="menu-toggle">
                    </button>
                    <div class="profile-pic">
                        <a href="profile.php"><img src="<?php echo $row['image']; ?>" alt="Admin Profile"></a>
                    </div>
                </div>
            </div>