<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VacciCare - Your Vaccination Partner</title>
    <link rel="stylesheet" href="assets/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <i class="fas fa-syringe"></i>
                    <h1>Vaccination System</h1>
                </div>
                <button class="menu-toggle" aria-label="Toggle navigation">
                    <img src="assets/menu_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg" alt="Menu" style="width:32px;height:32px;">
                </button>
                <ul class="nav-menu">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <?php if (isset($_SESSION['patient_name'])){
                        echo "<li><a href='patientprofile.php'>".$_SESSION['patient_name']."</a></li>";
                        echo "<li class='login-btn'><a href='patientlogout.php'>Logout</a></li>";
                    } else {
                        echo "<li class='login-btn'><a href='patientlogin.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <style>
            .hidecontact{
                display: none;
            }
        </style>
    </header>
    <script>
        // Responsive menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const navMenu = document.querySelector('.nav-menu');
            menuToggle.addEventListener('click', function() {
                navMenu.classList.toggle('active');
            });
        });
    </script>