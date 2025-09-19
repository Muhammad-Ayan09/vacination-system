<?php
include 'admin/config.php';
session_start();
if (!isset($_SESSION['patient_session'])) {
    echo "<script>window.location.href='patientlogin.php';</script>";
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
                <h2>Apply for Covid Test</h2>
            </div>
             <div class="profile-form">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="hidden" readonly value="<?php echo $patient['id']; ?>" name="pid">
                        </div>

                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $patient['name']; ?>">
                        </div>
                        
                        <div class="form-group">
                          <select name="hid" required>
                                <option value="" hidden>select any hospital</option>
                                <?php
                                $query = "SELECT * FROM tbl_hospital where status='activate'";
                                $result = mysqli_query($connection, $query);
                                foreach ($result as $row) {
                                    echo "<option value='$row[id]'>$row[name]</option>";
                                }
                                ?>
                            </select>
                        </div>
                         
                        <button type="submit" name="btnbook" class="btn btn-primary">Book Appointment</button>
                    </form>
                    <?php
                         if (isset($_POST['btnbook'])) {
                             $pid = $_POST['pid'];
                             $hid = $_POST['hid'];
                             $query = "INSERT INTO tbl_test (p_id, h_id) VALUES ('$pid', '$hid')";
                             $result = mysqli_query($connection, $query);
                                 if ($result) {
                                     echo "<script>alert('Test booked successfully.'); window.location.href='covid-test.php';</script>";
                                 }
                            }


                             
                    ?>
                </div>
            
        </div>
       <div class="right-side">
            <div class="appointment-history">
                <h3>Your Current Test Status</h3>
                <div class="appointment-table-container">
                    <table class="appointment-table">
                        <thead>
                            <tr>
                                <th>Hospital Name</th>
                                <th>Patient Name</th>
                                <th>Result</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           $query = "SELECT tbl_patient.name AS 'pname' , tbl_hospital.name AS 'hname', tbl_test.* FROM tbl_test INNER JOIN tbl_hospital ON tbl_test.h_id=tbl_hospital.id INNER JOIN tbl_patient ON tbl_test.p_id=tbl_patient.id";
                            $result = mysqli_query($connection, $query);
                                foreach ($result as $row) {
                                    echo "<tr>
                                    <td>$row[hname]</td>
                                    <td>$row[pname]</td>
                                    <td class='result-" . strtolower($row['result']) . "'>$row[result]</td>";
                                    if ($row['result'] == 'positive') {
                                        echo "<td><a href='download-report.php?id=$row[id]' class='btn btn-secondary'>Download Report</a></td>";
                                    } else {
                                        echo "<td>N/A</td>";
                                    }
                                    "</tr>";
                                }
                           ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Mobile menu toggle
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.nav-menu').classList.toggle('active');
        });
        
        // Set minimum date to today
        const dateInput = document.querySelector('input[name="date"]');
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');
        const formattedToday = `${yyyy}-${mm}-${dd}`;
        dateInput.min = formattedToday;
    </script>
</body>
</html>