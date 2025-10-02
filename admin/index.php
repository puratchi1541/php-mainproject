<?php
session_start();
include('../config/config.php'); 
include('../head.php');

$message = "";

// ---------- Admin Login ----------
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass  = md5($_POST['password']); // keep MD5 if stored as MD5

    $query = "SELECT * FROM users WHERE email='$email' AND password='$pass' AND role='admin'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['name'];
        $_SESSION['role']     = $row['role'];

        // redirect to admin dashboard
        header("Location: admin.php");
        exit();
    } else {
        $message = "Invalid admin email or password.";
    }
}
?>


<body>
  <div class="login-container">
    <h1>LuxTime Admin</h1>
    <p>Please login to continue</p>

    <?php if ($message != "") { ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>

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
      
    </form>
  </div>
</body>
</html>
