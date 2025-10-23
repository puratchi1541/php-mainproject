<?php
session_start();

$_SESSION = [];


unset($_SESSION['is_user']);
// Clear any admin or user flags to be safe
unset($_SESSION['is_user']);
unset($_SESSION['is_admin']);
unset($_SESSION['username']);
unset($_SESSION['role']);

header("Location: index.php");
exit;
