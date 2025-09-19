<?php
include 'admin/config.php';
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login - VacciCare</title>
    <link rel="stylesheet" href="assets/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Additional styles specific to login page */
        .login-section {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: var(--card);
            border: 1px solid rgba(148, 163, 184, 0.15);
            border-radius: 16px;
            padding: 28px;
            backdrop-filter: saturate(160%) blur(14px);
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.04);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .brand i {
            font-size: 24px;
            color: var(--primary);
        }

        .brand h1 {
            font-size: 24px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: var(--muted);
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 8px;
            color: var(--text);
            font-size: 16px;
            transition: all 0.2s;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--ring);
        }

        .login-btn-full {
            width: 100%;
            padding: 12px;
            background: var(--primary);
            color: var(--bg);
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 10px;
        }

        .login-btn-full:hover {
            background: var(--primary-dark);
        }

        .login-footer {
            margin-top: 24px;
            text-align: center;
            font-size: 14px;
            color: var(--muted);
        }

        .login-footer a {
            color: var(--primary);
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .back-to-home {
            position: absolute;
            top: 20px;
            left: 20px;
            color: var(--text);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            transition: all 0.2s;
        }

        .back-to-home:hover {
            color: var(--primary);
        }
    </style>
</head>

<body>
    <a href="index.php" class="back-to-home">
        <i class="fas fa-arrow-left"></i> Back to Home
    </a>

    <div class="login-section">
        <div class="login-card">
            <div class="brand">
                <i class="fas fa-syringe"></i>
                <h1>Patient Login</h1>
            </div>

            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" name="btnlogin" class="login-btn-full">Login</button>
            </form>
             
            <div class="login-footer">
                <p>Don't have an account? <a href="patientregister.php">Register</a></p>
            </div>
              <div class="login-footer">
                <p>Sign in as Hospital <a href="hospital/login.php">login</a></p>
            </div>
            <div class="login-footer">
                <p>Sign in as Admin <a href="admin/login.php">Login</a></p>
            </div>
            
            <?php
            if (isset($_POST['btnlogin'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $query = "SELECT * FROM tbl_patient WHERE email='$email' AND password='$password'";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['patient_session'] = $row['id'];
                    $_SESSION['patient_name'] = $row['name'];
                    echo "<script>
                    alert('Login successful');
                    window.location.href = 'index.php';
                    </script>";
                } else {
                    echo "<script>
                    alert('Invalid email or password.');
                    </script>";
                }
            }

            ?>
        </div>
    </div>
</body>

</html>