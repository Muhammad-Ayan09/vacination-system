<?php
    include('header.php')
?>
 
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