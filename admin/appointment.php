<?php
    include('header.php');
?>

            <!-- Content Area -->
            <div class="content-area">
                <div class="content-header">
                    <h2>List of appointment</h2>
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
                                <th>vaccine</th>
                                <th>status</th>
                            </tr>  
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT tbl_patient.name as 'pname',tbl_hospital.name as 'hname',tbl_vaccine.name as 'vname',tbl_appointment.* FROM tbl_appointment inner join tbl_patient on tbl_appointment.p_id=tbl_patient.id inner join tbl_hospital on tbl_appointment.h_id=tbl_hospital.id inner join tbl_vaccine on tbl_appointment.v_id=tbl_vaccine.id";
                            $result = mysqli_query($connection, $query);
                            foreach ($result as $row) 
                            {
                                echo 
                                "<tr>
                                        <td>$row[id]</td>
                                        <td>$row[pname]</td>
                                        <td>$row[hname]</td>
                                        <td>$row[date]</td>
                                        <td>$row[time]</td>
                                        <td>$row[vname]</td>
                                        <td>$row[status]</td>    
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