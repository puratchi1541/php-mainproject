<?php
session_start();
include('./config/config.php'); 

$message = "";

// ---------- Registration ----------
if (isset($_POST['register'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = md5($_POST['password']); 

    $query = "INSERT INTO users (name,email,password,role) VALUES ('$name','$email','$pass','user')";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Registration successful! Please login to continue.');</script>";
         header("Location: ./login.php");
    } else {
        $message = "Error: " . mysqli_error($con);
    }
}

// ---------- Login ----------
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);

        $_SESSION['username'] = $row['name'];
        $_SESSION['role']     = $row['role'];

        if ($row['role'] == 'admin') {
            header("Location: ./admin/admin.php");
            exit();
        } else {
            header("Location: index.php");
            exit();
        }
    } else {
        $message = "Invalid email or password.";
    }
}

// flags for which form to show
$showRegister = isset($_GET['action']) && $_GET['action'] == 'register';
$showAdmin    = isset($_GET['action']) && $_GET['action'] == 'admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LuxTime Login</title>
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  <div class="login-container">
    <h1>LuxTime</h1>
    <p>
      <?php 
        if ($showRegister) { 
            echo "Create your account"; 
        } else if ($showAdmin) {
            echo "Admin Login"; 
        } else { 
            echo "Welcome back! Please login to continue"; 
        } 
      ?>
    </p>

    <?php if ($message != "") { ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>

    <!-- Admin Login Form -->
    <?php if ($showAdmin) { ?>
    <form method="post">
      <div class="input-group">
        <label>Email Address</label>
        <input type="email" name="email" placeholder="Enter admin email" required>
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password" required>
      </div>
      <button type="submit" name="login" class="btn">Login as Admin</button>
      <p>Back to <a href="login.php">User Login</a></p>
    </form>
    <?php } ?>

    <!-- User Login Form -->
    <?php if (!$showRegister && !$showAdmin) { ?>
    <form method="post">
      <div class="input-group">
        <label>Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" name="login" class="btn">Login</button>
      <p>Don’t have an account? <a href="login.php?action=register">Register Now</a></p>
      <p>Admin? <a href="login.php?action=admin">Login Here</a></p>
    </form>
    <?php } ?>

    <!-- Register Form -->
    <?php if ($showRegister) { ?>
    <form method="post">
      <div class="input-group">
        <label>Full Name</label>
        <input type="text" name="name" placeholder="Enter your full name" required>
      </div>
      <div class="input-group">
        <label>Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" name="register" class="btn">Register</button>
      <p>Already have an account? <a href="login.php">Login Here</a></p>
    </form>
    <?php } ?>
  </div>
</body>
</html>
