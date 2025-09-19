<?php
    include('header.php')
?>

            <!-- Content Area -->
            <div class="content-area">
                <div class="content-header">
                    <h2>Add New Patient</h2>
                    <a href="Patient.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Patients</a>
                </div>
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data" class="Patient-form">
                        <div class="form-group">
                            <label for="name">Patient Name</label>
                            <input type="text" id="name" placeholder="Patient Name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Contact Number</label>
                            <input type="number" id="phone" placeholder="Contact Number" name="phone" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" id="city" required>
                                <option value="" hidden>Select City</option>
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
                            <label for="email">Email Address</label>
                            <input type="email" id="email" placeholder="Email Address" name="email" required>
                        </div>  
                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" placeholder="Password" name="password" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" placeholder="Full Address" name="address" required>
                        </div>

                         <div class="form-group">
                            <label for="gender">Address</label>
                            <select name="gender" id="gender" required>
                                <option value="" hidden>Select Status</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
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
                            <label for="image">Patient Image</label>
                            <input type="file" id="image" name="image" class="file-input">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="btnadd" class="submit-btn">Add New Patient</button>
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
                        $gender = $_POST['gender'];
                        $status = $_POST['status'];
                        $imagename = $_FILES['image']['name'];
                        $tmpname = $_FILES['image']['tmp_name'];
                        $path = "asset/imgs/patient images/$imagename";
                        move_uploaded_file($tmpname, $path);
                        $insertQuery = "INSERT INTO tbl_patient (name, contact, cid, email, password, address, gender, status, image) VALUES ('$name', '$phone', '$city', '$email', '$password', '$address', '$gender', '$status', '$path')";
                        $result = mysqli_query($connection, $insertQuery);
                        if ($result) {
                            echo "<script>alert('New Patient added successfully'); 
                            window.location.href = 'patient.php';
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