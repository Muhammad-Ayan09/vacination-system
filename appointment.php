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
                <h2>Book your Appointment</h2>
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
                        
                        <div class="form-group">
                                <input type="date" name="date" required> 
                        </div>
                        
                        <div class="form-group">
                            <select name="time" required>
                                <option value="" hidden>Select Time</option>
                                <option value="9-10">9-10</option>
                                <option value="10-11">10-11</option>
                                <option value="11-12">11-12</option>
                                <option value="12-1">12-1</option>
                                <option value="1-2">1-2</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <select name="vid" required>
                                <option value="" hidden>select any vaccine</option>
                                <?php
                                $query = "SELECT * FROM tbl_vaccine where status='available'";
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
    $date = $_POST['date'];
    $time = $_POST['time'];
    $vid = $_POST['vid'];

    // Check for existing appointment at same hospital, date, time
    $existing_appointment = mysqli_query($connection, "SELECT * FROM tbl_appointment WHERE h_id='$hid' AND date='$date' AND time='$time' AND p_id='$_SESSION[patient_session]'");
    if (mysqli_num_rows($existing_appointment) > 0) {
        echo "<script>alert('You already have an appointment at this time. Please choose a different time or date.');</script>";
    } else {
        // Get all vaccine appointments for this patient
        $dose_query = mysqli_query($connection, "SELECT v_id, COUNT(*) as dose_count FROM tbl_appointment WHERE p_id='$_SESSION[patient_session]' GROUP BY v_id");
        $dose_data = [];
        while ($row = mysqli_fetch_assoc($dose_query)) {
            $dose_data[$row['v_id']] = $row['dose_count'];
        }

        if (empty($dose_data)) {
            // No previous appointments, allow booking any vaccine
            $query = "INSERT INTO tbl_appointment (p_id, h_id, date, time, v_id) VALUES ('$pid', '$hid', '$date', '$time', '$vid')";
            $result = mysqli_query($connection, $query);
            if ($result) {
                echo "<script>alert('Appointment booked successfully.'); window.location.href='appointment.php';</script>";
            }
        } else {
            // Patient has previous appointments
            $first_vaccine_id = array_key_first($dose_data);
            $dose_count = $dose_data[$first_vaccine_id];

            if ($vid != $first_vaccine_id) {
                // Trying to book a different vaccine
                echo "<script>alert('You must book the same vaccine for your second dose.');</script>";
            } elseif ($dose_count < 2) {
                // Allow booking second dose of same vaccine
                $query = "INSERT INTO tbl_appointment (p_id, h_id, date, time, v_id) VALUES ('$pid', '$hid', '$date', '$time', '$vid')";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    echo "<script>alert('Second dose appointment booked successfully.'); window.location.href='appointment.php';</script>";
                }
            } else {
                // Already booked two doses
                echo "<script>alert('You have already booked both doses for this vaccine.');</script>";
            }
        }
    }
}
                    ?>
                </div>
            
        </div>
       <div class="right-side">
            <div class="appointment-history">
                <h3>Your Appointments</h3>
                <div class="appointment-table-container">
                    <table class="appointment-table">
                        <thead>
                            <tr>
                                <th>Hospital Name</th>
                                <th>Vaccine Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           $query = "SELECT h.name as hospital_name, v.name as vaccine_name, a.date, a.time, a.status 
                                    FROM tbl_appointment a 
                                    JOIN tbl_hospital h ON a.h_id = h.id 
                                    JOIN tbl_vaccine v ON a.v_id = v.id 
                                    WHERE a.p_id = $_SESSION[patient_session] 
                                    ORDER BY a.date DESC";
                            $result = mysqli_query($connection, $query);
                            
                            if(mysqli_num_rows($result) > 0) {
                                foreach ($result as $row) {
                                    echo "<tr>
                                    <td>$row[hospital_name]</td>
                                    <td>$row[vaccine_name]</td>
                                    <td>$row[date]</td>
                                    <td>$row[time]</td>
                                    <td class='status-" . strtolower($row['status']) . "'>$row[status]</td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5' class='no-appointments'>No appointments found</td></tr>";
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