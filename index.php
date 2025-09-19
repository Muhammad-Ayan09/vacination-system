<?php
include 'admin/config.php';
session_start();

$active_patient = null;
if (isset($_SESSION['patient_session'])) {
    $fetch_patient_query = "SELECT * FROM tbl_patient WHERE id={$_SESSION['patient_session']}";
    $active_patient = mysqli_fetch_assoc(mysqli_query($connection, $fetch_patient_query));
}
?>


<?php
include 'header.php';
?>

<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>With Vaccination We Can End This Pandemic</h1>
            <p>With vaccination, we can reduce the number of cases of Covid-19 transmission, and can create a safe community.</p>
            <div class="hero-buttons">
                <a href="appointment.php" class="btn btn-primary">Book Appointment</a>
                <a href="covid-test.php" class="btn btn-secondary">Covid Test</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="assets/hero-removebg-preview.png" alt="Vaccination Illustration">
        </div>
    </div>
</section>

<section id="services" class="services">
    <div class="container">
        <div class="section-header">
            <h2>Our Services</h2>
            <p>Comprehensive vaccination services for all age groups</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-baby"></i>
                </div>
                <h3>Child Vaccination</h3>
                <p>Essential vaccines for children of all ages following the recommended immunization schedule.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-user"></i>
                </div>
                <h3>Adult Vaccination</h3>
                <p>Stay protected with vaccines recommended for adults based on age, health conditions, and other factors.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-virus"></i>
                </div>
                <h3>COVID-19 Vaccination</h3>
                <p>Get your COVID-19 vaccine or booster shot to protect yourself and those around you.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-plane"></i>
                </div>
                <h3>Travel Vaccines</h3>
                <p>Specialized vaccines for international travelers based on destination requirements.</p>
            </div>
        </div>
    </div>
</section>

<section id="about" class="about">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>About VacciCare</h2>
                <p>VacciCare is dedicated to providing accessible, high-quality vaccination services to communities nationwide. Our team of healthcare professionals is committed to ensuring everyone has access to essential vaccines.</p>
                <p>With state-of-the-art facilities and a patient-centered approach, we make vaccination a comfortable and convenient experience for all age groups.</p>
                <div class="stats">
                    <div class="stat-item">
                        <h3>10,000+</h3>
                        <p>Vaccinations Administered</p>
                    </div>
                    <div class="stat-item">
                        <h3>50+</h3>
                        <p>Healthcare Centers</p>
                    </div>
                    <div class="stat-item">
                        <h3>98%</h3>
                        <p>Patient Satisfaction</p>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <img src="assets/doctor-woman-point-good-deal-600nw-2511611991-removebg-preview.png" alt="Healthcare Team">
            </div>
        </div>
    </div>
</section>

<section id="appointment" class="appointment">
    <div class="container">
        <div class="section-header">
            <h2>Book Your Appointment</h2>
            <p>Schedule your vaccination in three simple steps</p>
        </div>
        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3>Choose Date & Time</h3>
                <p>Select a convenient date and time for your vaccination appointment.</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <h3>Select Location</h3>
                <p>Pick from our network of healthcare centers near you.</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Confirm Booking</h3>
                <p>Receive confirmation and reminders for your appointment.</p>
            </div>
        </div>
        <div class="cta-button">
            <a href="#" class="btn btn-primary">Schedule Now</a>
        </div>
    </div>
</section>

<section id="faq" class="faq">
    <div class="container">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions about vaccination</p>
        </div>
        <div class="faq-grid">
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Are vaccines safe?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, vaccines are thoroughly tested for safety before being approved for use. The benefits of vaccination far outweigh the potential risks.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What vaccines do I need?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Recommended vaccines depend on your age, health conditions, and other factors. Our healthcare professionals can provide personalized recommendations.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Do I need an appointment?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>While we recommend scheduling an appointment for minimal wait times, we also accept walk-ins based on availability.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What should I bring to my appointment?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Please bring your ID, insurance information (if applicable), and any previous vaccination records if available.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="contact <?php echo !isset($_SESSION['patient_session']) ? 'hidecontact' : ''; ?>">
    <div class="container">
        <div class="section-header">
            <h2>Contact Us</h2>
            <p>Get in touch with our team for any inquiries</p>
        </div>
        <div class="contact-grid">
            <div class="contact-info">
                 <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h3>Address</h3>
                        <p>123 Healthcare Avenue, Medical District, City, Country</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <h3>Phone</h3>
                        <p>+1 (555) 123-4567</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Email</h3>
                        <p>info@vaccicare.com</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h3>Working Hours</h3>
                        <p>Monday - Friday: 8:00 AM - 6:00 PM</p>
                        <p>Saturday: 9:00 AM - 1:00 PM</p>
                    </div>
                </div>
            </div>
            </div>
            <div class="contact-form">
                <?php if ($active_patient): ?>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="hidden" value="<?php echo $active_patient['id'] ?>" name="pid">
                        <input type="text" id="name" name="name" readonly value="<?php echo $active_patient['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" readonly value="<?php echo $active_patient['email'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Phone Number</label>
                        <input type="text" id="contact" name="contact" readonly value="<?php echo $active_patient['contact'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" name="btnsend" class="btn btn-primary">Send Message</button>
                </form>
                <?php
                if (isset($_POST['btnsend'])) {
                    $pid = $_POST['pid'];
                    $message = $_POST['message'];
                    $result = mysqli_query($connection, "INSERT INTO tbl_feedback(p_id, message) VALUES('$pid','$message')");
                    if ($result) {
                        echo "<script>alert('Message sent successfully.'); window.location='index.php';</script>";
                    } else {
                        echo "<script>alert('Failed to send message. Please try again.'); window.location='index.php';</script>";
                    }
                }
                ?>
                <?php else: ?>
                <p>Please <a href="patientlogin.php">login</a> to send a message.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<section id="hospitals" class="hospitals">
    <div class="container">
        <div class="section-header">
            <h2>Our Partner Hospitals</h2>
            <p>Leading healthcare facilities providing quality vaccination services</p>
        </div>
        <div class="hospital-grid">
            <?php
            $query = "SELECT tbl_hospital.*, tbl_city.name as 'cname' FROM tbl_hospital
                INNER JOIN tbl_city ON tbl_hospital.cid=tbl_city.id
                WHERE tbl_hospital.status='activate'";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);

            if (!$result) {
                echo "Query failed: " . mysqli_error($connection);
            } else if (mysqli_num_rows($result) == 0) {
                echo '<p class="no-hospitals">No hospitals available at the moment.</p>';
            } else {
                foreach ($result as $row) {
    $imagePath = $row['image'];
    
    if (!empty($imagePath)) {
        if (strpos($imagePath, 'asset/') === 0) {
            $imagePath = 'admin/' . $imagePath;
        }
        $imagePath = str_replace(' ', '%20', $imagePath);
    } else {
        $imagePath = 'https://placehold.co/400x300/2dd4bf/071a2d?text=Hospital+Image';
    }

    echo '<div class="hospital-card">
        <div class="hospital-image">
            <img src="' . htmlspecialchars($imagePath) . '" alt="' . htmlspecialchars($row['name']) . '" onerror="this.src=\'https://placehold.co/400x300/2dd4bf/071a2d?text=Hospital+Image\'">
        </div>
        <div class="hospital-info">
            <h3>' . htmlspecialchars($row['name']) . '</h3>
            <p class="hospital-city">' . htmlspecialchars($row['cname']) . '</p>
        </div>
    </div>';
}
            }
            ?>
        </div>
    </div>
</section>

<section id="testimonials" class="testimonials">
    <div class="container">
        <div class="section-header">
            <h2>What Our Patients Say</h2>
            <p>Real experiences from our valued patients</p>
        </div>
        <div class="testimonials-grid">

            <?php
            $query = "SELECT tbl_feedback.*, tbl_patient.name as 'pname' FROM tbl_feedback INNER JOIN tbl_patient ON tbl_feedback.p_id=tbl_patient.id WHERE tbl_feedback.status='show'";
            $result = mysqli_query($connection, $query);

            if ($result) {
                foreach ($result as $row) {
                    echo '<div class="testimonial-card"> 
                <div class="testimonial-content"> 
                    <i class="fas fa-quote-left"></i> 
                    <p>' . $row['message'] . '</p> 
                </div> 
                <div class="testimonial-author"> 
                    <img src="https://placehold.co/100x100/2dd4bf/071a2d?text=' . strtoupper($row['pname'][0]) . '" alt="' . $row['pname'] . '"> 
                    <div class="author-info"> 
                        <h4>' . $row['pname'] . '</h4> 
                        <p>Patient</p>
                    </div> 
                </div> 
            </div>';
                }
            } else {
                echo "Error: " . mysqli_error($connection);
            }
            ?>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-about">
                <div class="logo">
                    <i class="fas fa-syringe"></i>
                    <h2>VacciCare</h2>
                </div>
                <p>Providing quality vaccination services to protect communities and promote public health.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-services">
                <h3>Our Services</h3>
                <ul>
                    <li><a href="#">Child Vaccination</a></li>
                    <li><a href="#">Adult Vaccination</a></li>
                    <li><a href="#">COVID-19 Vaccination</a></li>
                    <li><a href="#">Travel Vaccines</a></li>
                    <li><a href="#">Flu Shots</a></li>
                </ul>
            </div>
            <div class="footer-newsletter">
                <h3>Newsletter</h3>
                <p>Subscribe to our newsletter for updates on vaccination programs and health tips.</p>
                <form action="#" method="post">
                    <input type="email" placeholder="Your Email Address" required>
                    <button type="submit"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 VacciCare. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script>
 

    // FAQ accordion
    document.querySelectorAll('.faq-question').forEach(question => {
        question.addEventListener('click', () => {
            const item = question.parentElement;
            item.classList.toggle('active');
        });
    });
</script>
</body>

</html>