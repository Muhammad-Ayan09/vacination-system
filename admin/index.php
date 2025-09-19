
<?php
    include('header.php')
?>
            <!-- Content Area -->
            <div class="content">
                <h2 class="page-title">Dashboard Overview</h2>
                <p class="page-subtitle">Welcome back! Here's what's happening with your vaccination system.</p>
                
                <!-- Statistics Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <?php
                                     $query = "SELECT * FROM tbl_patient";
                                     $result = mysqli_query($connection, $query);
                                     $patient_count = mysqli_num_rows($result);
                                ?>
                                <h3 class="stat-number"><?php echo $patient_count;?></h3>
                                <p class="stat-label">Patients</p>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-hospital"></i>
                            </div>
                            <div>
                                <?php
                                     $query = "SELECT * FROM tbl_hospital";
                                     $result = mysqli_query($connection, $query);
                                     $hospital_count = mysqli_num_rows($result);
                                ?>
                                <h3 class="stat-number"><?php echo $hospital_count;?></h3>
                                <p class="stat-label">Hospitals</p>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div>
                                 <?php
                                     $query = "SELECT * FROM tbl_appointment";
                                     $result = mysqli_query($connection, $query);
                                     $appointment_count = mysqli_num_rows($result);
                                ?>
                                <h3 class="stat-number"><?php echo $appointment_count;?></h3>
                                <p class="stat-label">Appointments</p>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <div>
                                <?php
                                     $query = "SELECT * FROM tbl_test";
                                     $result = mysqli_query($connection, $query);
                                     $test_count = mysqli_num_rows($result);
                                ?>
                                <h3 class="stat-number"><?php echo $test_count;?></h3>
                                <p class="stat-label">Covid Tests</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Section -->
                <div class="activity-section">
                    <div class="section-header">
                        <h3>Recent Activity</h3>
                        <a href="#" class="view-all">View All</a>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-content">
                                <p>New patient registered</p>
                                <span class="activity-time">2 minutes ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div class="activity-content">
                                <p>Appointment scheduled</p>
                                <span class="activity-time">15 minutes ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-hospital-user"></i>
                            </div>
                            <div class="activity-content">
                                <p>Hospital added to system</p>
                                <span class="activity-time">1 hour ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <div class="activity-content">
                                <p>Covid test result updated</p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Menu toggle functionality
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
        });

        // Add some interactivity to stat cards
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'scale(1.02)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            });
        });
    </script>
</body>
</html>
