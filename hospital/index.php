<?php
include 'config.php';
session_start();
if (!isset($_SESSION['hospital_session'])) {
    echo "<script>window.location.href = 'login.php'; </script>";  
}
$query1 = "SELECT * FROM tbl_hospital WHERE id=" . $_SESSION['hospital_session'];
$result = mysqli_query($connection, $query1);
$row = mysqli_fetch_assoc($result);
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Vaccination System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="asset/hospital-style.css">
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
                    <i class="fas fa-cog"></i>
                    <h1>Vaccination System</h1>
                </div>
                <div class="header-right">
                    <button class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="profile-pic">
                        <a href="profile.php"><img src="<?php echo $row['image']; ?>" alt="Admin Profile"></a>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="content">
                <h2 class="page-title">Dashboard Overview</h2>
                <p class="page-subtitle">Welcome back! Here's what's happening with your vaccination system.</p>
                
                <!-- Statistics Cards -->

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div>
                                 <?php
                                     $query = "SELECT * FROM tbl_appointment";
                                     $result = mysqli_query($connection, $query);
                                     $appointment_count = mysqli_num_rows($result);
                                ?>
                                <h3 class="stat-number"><?php echo $appointment_count;?></h3>
                                <p class="stat-label">Appointments</p>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <div>
                                <?php
                                     $query = "SELECT * FROM tbl_test";
                                     $result = mysqli_query($connection, $query);
                                     $test_count = mysqli_num_rows($result);
                                ?>
                                <h3 class="stat-number"><?php echo $test_count;?></h3>
                                <p class="stat-label">Covid Tests</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Section -->
                <div class="activity-section">
                    <div class="section-header">
                        <h3>Recent Activity</h3>
                        <a href="#" class="view-all">View All</a>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-content">
                                <p>New patient registered</p>
                                <span class="activity-time">2 minutes ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div class="activity-content">
                                <p>Appointment scheduled</p>
                                <span class="activity-time">15 minutes ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-hospital-user"></i>
                            </div>
                            <div class="activity-content">
                                <p>Hospital added to system</p>
                                <span class="activity-time">1 hour ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <div class="activity-content">
                                <p>Covid test result updated</p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Menu toggle functionality
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
        });

        // Add some interactivity to stat cards
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'scale(1.02)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            });
        });
    </script>
</body>
</html>
