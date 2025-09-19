<?php
    include('header.php')
?>

            <!-- Content Area -->
            <div class="content-area">
                <div class="content-header">
                    <h2>List of feedback</h2>
                </div>
                <div class="table-responsive">
                    <table class="hospital-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>patient Name</th>
                                <th>message</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT tbl_feedback.*,tbl_patient.name as 'pname' FROM tbl_feedback inner join tbl_patient on tbl_feedback.p_id=tbl_patient.id";
                            $result = mysqli_query($connection, $query);
                            foreach ($result as $row) 
                            {
                                echo 
                                "<tr>
                                        <td>$row[id]</td>
                                        <td>$row[pname]</td>
                                        <td>$row[message]</td>
                                        <td>$row[status]</td>
                                        <td>";
                                            if($row['status']=='hide'){
                                                echo "<a class='btn-view' href='show_feedback-status.php?id=$row[id]&status=show'>show</a>";
                                            }else{
                                                echo "<a class='btn-view' href='hide_feedback-status.php?id=$row[id]&status=hide'>hide</a>";
                                            }
                                                
                                        "
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