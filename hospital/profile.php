<?php
include 'config.php';
session_start();
if (!isset($_SESSION['hospital_session'])) {
    echo "<script>window.location.href = 'login.php'; </script>";
    exit;
}

if (isset($_POST['btnupdate'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $Query = "UPDATE tbl_hospital SET name='$name', email='$email', password='$password', cid='$city', address='$address' WHERE id=" . $_SESSION['hospital_session'];
    mysqli_query($connection, $Query);
    echo "<script>alert('Profile updated successfully'); window.location.href = 'profile.php';</script>";
    exit;
}
if (isset($_POST['btnupload'])) {
    $imagename = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $path = "asset/imgs/$imagename";
    move_uploaded_file($tmpname, $path);
    $updateQuery = "UPDATE tbl_hospital SET image='$path' WHERE id=" . $_SESSION['hospital_session'];
    mysqli_query($connection, $updateQuery);
    echo "<script>alert('Image updated successfully'); window.location.href = 'profile.php';</script>";
    exit;
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
    <title>My Profile - Vaccination System</title>
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
                    <h1>Vaccination System</h1>
                </div>
                <div class="header-right">
                    <button class="menu-toggle"></button>
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
                            <input type="text" id="name" name="name" placeholder="Enter Your Name" required value="<?php echo htmlspecialchars($row['name']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter Your Email" required value="<?php echo htmlspecialchars($row['email']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" id="password" name="password" placeholder="Enter Your Password" required value="<?php echo htmlspecialchars($row['password']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" id="city" required>
                                <option hidden>select any city</option>
                                <?php
                                $cityQuery = "SELECT * FROM tbl_city";
                                $cityResult = mysqli_query($connection, $cityQuery);
                                foreach ($cityResult as $row1) {
                                    $selected = ($row['cid'] == $row1['id']) ? 'selected' : '';
                                    echo "<option value='{$row1['id']}' $selected>{$row1['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" placeholder="Enter Your Address" required value="<?php echo htmlspecialchars($row['address']); ?>">
                        </div>
                        <button type="submit" class="update-btn" name="btnupdate">Update Profile</button>
                    </form>
                    <div class="rightside">
                        <div class="image">
                            <img src="<?php echo $row['image']; ?>" alt="" style="width:150px; height:150px; border-radius:50%; object-fit:cover;">
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <label class="upload-label" for="profile-img">Choose Image</label>
                            <input id="profile-img" type="file" name="image"><br>
                            <input type="submit" value="Upload Image" name="btnupload" class="upload-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
        });
    </script>
</body>
</html>