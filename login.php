<?php
session_start();
include('./config/config.php'); 
include('./head.php');

$message = "";

// ---------- User Registration ----------
if (isset($_POST['register'])) {
    $name  = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass  = md5($_POST['password']); // or use password_hash() for more security

    // Check if email already exists
    $check = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        $message = "Email already registered. Please login.";
    } else {
        $query = "INSERT INTO users (name,email,password,role) VALUES ('$name','$email','$pass','user')";
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Registration successful! Please login.');</script>";
        } else {
            $message = "Error: " . mysqli_error($con);
        }
    }
}

// ---------- User Login ----------
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass  = md5($_POST['password']); 

    $query = "SELECT * FROM users WHERE email='$email' AND password='$pass' AND role='user'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['name'];
        $_SESSION['role']     = $row['role'];

        header("Location: index.php"); // redirect after login
        exit();
    } else {
        $message = "Invalid email or password.";
    }
}

// flags for which form to show
$showRegister = isset($_GET['action']) && $_GET['action'] == 'register';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LuxTime User Login/Register</title>
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  <div class="login-container">
    <h1>LuxTime</h1>
    <p>
      <?php echo $showRegister ? "Create your account" : "Welcome back! Please login"; ?>
    </p>

    <?php if ($message != "") { ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>

    <!-- Login Form -->
    <?php if (!$showRegister) { ?>
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
