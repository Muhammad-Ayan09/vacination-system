<?php
    include('header.php')
?>

            <!-- Content Area -->
            <div class="content-area-2">
                <h2>Hospital_detail</h2>
                <?php
                
                    $query = "SELECT * FROM tbl_hospital WHERE id=$_GET[id]";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                ?>
                <div class='image-hospital'>
                    <img src="<?php echo $row['image'];?>" alt="">
                </div>
                <ul>
                    <li>Hospital ID : <?php echo $row['id']?></li>
                    <li>Hospital Name : <?php echo $row['name']?></li>
                    <li>Hospital Contact : <?php echo $row['contact']?></li>
                    <li>City : <?php echo $row['cid']?></li>
                    <li>Hospital Email : <?php echo $row['email']?></li> 
                    <li>Hospital Password : <?php echo $row['password']?></li>
                    <li>Hospital Address : <?php echo $row['address']?></li>
                    <li>Hospital Status : <?php echo $row['status']?></li> 
                </ul>
               
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