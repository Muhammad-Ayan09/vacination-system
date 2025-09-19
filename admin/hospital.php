<?php
    include('header.php')
?>

            <!-- Content Area -->
            <div class="content-area">
                <div class="content-header">
                    <h2>List of Hospitals</h2>
                    <a href="add-new-hospital.php" class="add-btn"><i class="fas fa-plus"></i> Add New Hospital</a>
                </div>
                <div class="table-responsive">
                    <table class="hospital-table">
                        <thead>
                            <tr class="row1">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tbl_hospital";
                            $result = mysqli_query($connection, $query);
                            foreach ($result as $row) {
                                echo "<tr>
                                <td>  $row[id]  </td>
                                <td>  $row[name]  </td>
                                <td>  $row[contact]  </td>
                                <td>  $row[status]  </td>
                                <td>
                                    <a class='btn-view' href='view_hospital.php?id=$row[id]'>view</a> 
                                    <a class='btn-edit' href='edit_hospital.php?id=$row[id]'>edit</a>
                                </td>     
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