<?php
include 'config.php';
session_start();
if (!isset($_SESSION['admin_session'])) {
    echo "<script>window.location.href = 'login.php'; </script>";
};
$query = "SELECT * from tbl_hospital WHERE id=$_GET[id]";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$query = "SELECT * FROM tbl_admin WHERE id=" . $_SESSION['admin_session'];
$result = mysqli_query($connection, $query);
$row1 = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hospital - Vaccination System</title>
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
                    <a href="#" class="nav-link">
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
                         <a href="profile.php"><img src="<?php echo $row1['image']; ?>" alt="Admin Profile"></a>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="content-area">
                <div class="content-header">
                    <h2>edit / update your Hospital</h2>
                    <a href="hospital.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Hospitals</a>
                </div>
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data" class="hospital-form">
                        <div class="form-group">
                            <label for="name">Hospital Name</label>
                            <input type="text" id="name" placeholder="Hospital Name" name="name" required value="<?php echo $row['name']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Contact Number</label>
                            <input type="number" id="phone" placeholder="Contact Number" name="phone" required value="<?php echo $row['contact']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" id="city" required>
                                <option value="" hidden>Select City</option>
                                <?php
                                $query = "SELECT * FROM tbl_city";
                                $result = mysqli_query($connection, $query);
                                foreach ($result as $row1) {
                                    echo "<option value='$row1[id]'>$row1[name]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" placeholder="Email Address" name="email" required value="<?php echo $row['email']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" placeholder="Password" name="password" required value="<?php echo $row['password']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" placeholder="Full Address" name="address" required value="<?php echo $row['address']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" required>
                                <option value="" hidden>Select Status</option>
                                <option value="activate">Activate</option>
                                <option value="deactivate">Deactivate</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Hospital Image</label>
                            <input type="file" name="image" class="file-input">
                        </div>
                        <div class="form-group hospital-image-preview">
                            <label>Current Image</label>
                            <div class="image-container">
                                <img src="<?php echo $row['image'];?>" alt="Hospital Image" class="hospital-image">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="btnadd"  class="submit-btn">Update Hospital</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['btnadd'])) {
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $city = $_POST['city'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $address = $_POST['address'];
                        $status = $_POST['status'];
                        $imagename = $_FILES['image']['name'];
                        $tmpname = $_FILES['image']['tmp_name'];
                        $path = "asset/imgs/hospital images/$imagename";
                        move_uploaded_file($tmpname, $path);
                        $insertQuery = "UPDATE tbl_hospital SET name='$name', contact='$phone', cid='$city', email='$email', password='$password', address='$address', status='$status', image='$path' WHERE id=$_GET[id]";
                        $result = mysqli_query($connection, $insertQuery);
                        if ($result) {
                            echo "<script>alert('hospital updated successfully'); 
                            window.location.href = 'hospital.php';
                            </script>";
                        }
                    }                        
                    ?>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple form submission handling
        document.querySelector('.profile-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (name && email && password) {
                alert('Profile updated successfully!');
                // Here you would typically send the data to the server
            } else {
                alert('Please fill in all fields');
            }
        });

        // Menu toggle functionality
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
        });
    </script>
</body>

</html>