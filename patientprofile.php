<?php
include 'admin/config.php';
session_start();
if (!isset($_SESSION['patient_session'])) {
    echo "<script>window.location.href='login.php';</script>";
}
$query = "SELECT * FROM tbl_patient WHERE id=$_SESSION[patient_session]";
$result = mysqli_query($connection, $query);
$patient = mysqli_fetch_assoc($result);
?> 

<?php
include ("header.php");
?>
    <section class="profile-section">
        <div class="container">
            <div class="section-header">
                <h2>My Profile</h2>
                <p>Manage your personal information</p>
            </div>
            
            <div class="profile-container">
                <!-- Profile Form -->
                <div class="profile-form">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Full Name" required value="<?php echo $patient['name']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <input type="tel" id="phone" name="phone" placeholder="Phone Number" required value="<?php echo $patient['contact']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <input type="email" id="email" name="email"  placeholder="Email Address" required value="<?php echo $patient['email']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <input type="password" id="password" name="password" placeholder="Password" required value="<?php echo $patient['password']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <select  name="city" required>
                                <option hidden>select any city</option>
                                <?php
                                $query = "SELECT * FROM tbl_city";
                                $result = mysqli_query($connection, $query);
                                foreach ($result as $row) {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <select id="gender" name="gender" required>
                                <option value="" disabled>Select Any Gender</option>
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" id="address" name="address" placeholder="Enter Your Address">
                        </div>
                        
                        <button type="submit" name="btnupdate" class="btn btn-primary">Update Profile</button>
                    </form>
                    <?php
                        if (isset($_POST['btnupdate'])) {
                            $name = $_POST['name'];
                            $phone = $_POST['phone'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $city = $_POST['city'];
                            $gender = $_POST['gender'];
                            $address = $_POST['address'];
                            $query = "UPDATE tbl_patient SET name='$name', contact='$phone', email='$email', password='$password', cid='$city', gender='$gender', address='$address' WHERE id=$_SESSION[patient_session]";
                            $result = mysqli_query($connection, $query);
                            if ($result) {
                                echo "<script>alert('Profile updated successfully.');window.location.href='patientprofile.php';</script>";
                            } else {
                                echo "<script>alert('Error updating profile.');</script>";
                            }
                        }      
                    ?>
                </div>
                
                <!-- Profile Image -->
                <div class="profile-image">
                    <div class="image-container">
                        <img src="<?php echo $patient['image'];?>" alt="Profile Image">
                    </div>
                      
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="file-input">
                            <input type="file" name="image" id="image" accept="image/*">
                        </div>
                        <button type="submit" name="btnupload" class="btn btn-secondary">Upload Image</button>
                    </form>
                    <?php
                         if (isset($_POST['btnupload'])) {
                            $imageName = $_FILES['image']['name'];
                            $tmpName = $_FILES['image']['tmp_name'];
                            $path = "assets/patient images/.$imageName";
                            move_uploaded_file($tmpName, $path);
                            $query = "UPDATE tbl_patient SET image='$path' WHERE id=$_SESSION[patient_session]";
                            $result = mysqli_query($connection, $query);
                            if ($result) {
                                echo "<script>alert('Image uploaded successfully.');window.location.href='patientprofile.php';</script>";
                            } else {
                                echo "<script>alert('Error uploading image.');</script>";
                            }
                        }        
                    ?>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Mobile menu toggle
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.nav-menu').classList.toggle('active');
        });
    </script>
</body>
</html>