<?php
session_start();  
include 'config.php';
if(isset($_POST['hospital_login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM tbl_hospital WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['hospital_session'] = $row['id'];
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>hospital Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="asset/style.css">
</head>
<body>
  <div class="grid-center">
    <div class="login-card" role="region" aria-labelledby="loginTitle">
      <div class="brand">
        <div class="logo" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M21 3l-6.5 6.5m0 0L11 8l-2 2 1.5 3.5M14.5 9.5l-6 6M8 16l-3 3" stroke="#0b1220" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h1 id="loginTitle">Hospital login</h1>
      </div>
      <p class="subtitle">Sign in to manage appointments, inventory, and records.</p>

      <form action="" method="post" novalidate>
        <div class="field">
          <label for="email">Email address</label>
          <input class="input" type="email" id="email" name="email" placeholder="you@example.com" autocomplete="email" required>
        </div>
        <div class="field">
          <label for="password">Password</label>
          <input class="input" type="password" id="password" name="password" placeholder="••••••••" autocomplete="current-password" required>
        </div>

        <div class="actions">
          <button class="btn-primary" type="submit" aria-label="Sign in to admin" name="hospital_login">
            <span>Sign in</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M5 12h14M13 5l7 7-7 7" stroke="#0b1220" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </div>

        <div class="divider"></div>
        <p class="footer-text">Don't have an Account <a href="hospital_register.php">Signup</a> </p>
      </form>
    </div>
  </div>
</body>
</html>

