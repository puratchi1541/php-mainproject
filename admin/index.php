<?php
session_start();
include('../config/config.php'); 
include('../head.php');

$message = "";

// preserve next parameter so we can redirect after admin login
$next = '';
if (isset($_GET['next'])) {
  $next = $_GET['next'];
}

// ---------- Admin / Superadmin Login ----------
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass  = md5($_POST['password']); 

    // Allow both admin and superadmin
    $query = "SELECT * FROM users WHERE email='$email' AND password='$pass' AND role IN ('admin','superadmin')";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

    // Clear any user-related session flags to avoid cross-login state
    unset($_SESSION['is_user']);

    // Set admin session variables
    $_SESSION['username'] = $row['name'];
    $_SESSION['role']     = $row['role'];
    $_SESSION['is_admin'] = true;

    // Redirect to next if provided and safe, else admin dashboard
    $redirect = 'manageusers.php';
    if (!empty($_POST['next'])) {
      $candidate = $_POST['next'];
    } elseif (!empty($next)) {
      $candidate = $next;
    } else {
      $candidate = '';
    }
    if (!empty($candidate)) {
      $decoded = urldecode($candidate);
      if (strpos($decoded, 'http://') === false && strpos($decoded, 'https://') === false && strpos($decoded, '..') === false) {
        $redirect = $decoded;
      }
    }
    header("Location: {$redirect}"); 
    exit();
    } else {
        $message = "Invalid email or password for admin/superadmin.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LuxTime Admin Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <div class="login-container">
    <h1>LuxTime Admin</h1>
    <p>Please login to continue</p>

    <?php if ($message != "") { ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>

    <form method="post">
      <?php if(!empty($next)): ?>
        <input type="hidden" name="next" value="<?php echo htmlspecialchars($next); ?>">
      <?php endif; ?>
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
