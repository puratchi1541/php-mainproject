<?php

session_start();



unset($_SESSION['is_user']);

// Clear admin-specific session flags and role
unset($_SESSION['is_admin']);
unset($_SESSION['is_user']);
unset($_SESSION['username']);
unset($_SESSION['role']);

// Redirect to admin login page
header("Location: index.php");
exit;


?>