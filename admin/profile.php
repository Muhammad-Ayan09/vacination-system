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
<?php
                if (isset($_POST['btnupdate'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $Query = "UPDATE tbl_admin SET name='$name', email='$email', password='$password' WHERE id=" . $_SESSION['admin_session'];
                    $result = mysqli_query($connection, $Query);
                    if ($result) {
                        echo "<script>alert('Profile updated successfully'); 
                        window.location.href = 'profile.php';
                        </script>";
                    }
                }
                ?>

                <?php
                    if (isset($_POST['btnupload'])) {
                        $imagename = $_FILES['image']['name'];
                        $tmpname = $_FILES['image']['tmp_name'];
                        $path = "asset/imgs/$imagename";
                        move_uploaded_file($tmpname, $path);
                        $updateQuery = "UPDATE tbl_admin SET image='$path' WHERE id=" . $_SESSION['admin_session'];
                        $result = mysqli_query($connection, $updateQuery);
                        if ($result) {
                            echo "<script>alert('image updated successfully'); 
                             window.location.href = 'profile.php';
                            </script>";
                        }
                    }
                    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Vaccination System</title>
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
                    <a href="index.php" class="nav-link">
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
                    <a href="#" class="nav-link">
                        <i class="fas fa-calendar"></i>
                        Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-heartbeat"></i>
                        Covid Test
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
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

            <!-- Content Area -->
            <div class="content-1">
                <h2 class="page-title">My Profile</h2>
                <div class="pfpbox">
                    <form class="profile-form" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter Your Name" required value="<?php echo $row['name']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Your Email" required value="<?php echo $row['email']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" id="password" name="password" placeholder="Enter Your Password" required value="<?php echo $row['password']; ?>">
                    </div>

                    <button type="submit" class="update-btn" name="btnupdate">Update Profile</button>
                </form>
                <div class="rightside">
                    <div class="image">
                        <img src="<?php echo $row['image']; ?>" alt=""
                            style="width:150px; height:150px; border-radius:50%; object-fit:cover;">
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <label class="upload-label" for="profile-img">Choose Image</label>
                        <input id="profile-img" type="file" name="image"><br>
                        <input type="submit" value="upload image" name="btnupload">
                    </form>
                </div>
                </div>
            </div>   
        </div>
    </div>

    <script>
        // Simple form submission handling

        // Menu toggle functionality
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
        });
    </script>
</body>

</html>