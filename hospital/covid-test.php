<?php
include 'config.php';
session_start();
if (!isset($_SESSION['hospital_session'])) {
    echo "<script>window.location.href = 'login.php'; </script>";
}
$query1 = "SELECT * FROM tbl_hospital WHERE id=" . $_SESSION['hospital_session'];
$result = mysqli_query($connection, $query1);
$row1 = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hospital - Vaccination System</title>
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
                        <a href="profile.php"><img src="<?php echo $row1['image']; ?>" alt="Admin Profile"></a>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="content-area">
                <div class="content-header">
                    <h2>List of covid test</h2>
                </div>
                <div class="table-responsive">
                    <table class="hospital-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>patient Name</th>
                                <th>hospital Number</th>
                                <th>date</th>
                                <th>time</th>
                                <th>result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT tbl_patient.name as 'pname',tbl_hospital.name as 'hname',tbl_test.* FROM tbl_test inner join tbl_patient on tbl_test.p_id=tbl_patient.id inner join tbl_hospital on tbl_test.h_id=tbl_hospital.id";
                            $result = mysqli_query($connection, $query);
                            foreach ($result as $row) 
                            {
                               echo 
                                 "<tr>
                                   <td>$row[id]</td>
                                   <td>$row[pname]</td>
                                   <td>$row[hname]</td>
                                   <td>$row[date]</td>";
                                   if (isset($row['time'])) {
                                   echo "<td>$row[time]</td>";
                                     } else {
                                   echo "<td>N/A</td>";
                                     }
                                     echo "<td>$row[result]</td>    
                                    </tr>";
                            }

                            ?>
                        </tbody>
                    </table>
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
    </script>
</body>

</html>