<?php
session_start();
include_once('./config/config.php');

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['order'])){
    $username = $_SESSION['username'];

    // Validate product id and quantity server-side
    if (!isset($_POST['product_id'])) {
        die("Invalid request: missing product");
    }
    $product_id = intval($_POST['product_id']);
    $qty = isset($_POST['qty']) ? max(1, intval($_POST['qty'])) : 1;

    // Fetch product to validate price and name
    $pstmt = mysqli_query($con, "SELECT pname, pprice FROM addproduct WHERE id=$product_id");
    if (!$pstmt || mysqli_num_rows($pstmt) == 0) {
        die("Invalid product selected");
    }
    $prow = mysqli_fetch_assoc($pstmt);
    $product_name = mysqli_real_escape_string($con, $prow['pname']);
    $unit_price = floatval($prow['pprice']);

    // Calculate total server-side (prevents tampering with posted price)
    $total_price = $unit_price * $qty;

    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $name= mysqli_real_escape_string($con, $_POST['name']);

    // Insert order (if orders table has qty column it will be ignored if absent)
    $insertquery = "INSERT INTO orders(username, product_name, price, address, mobile) VALUES('$name', '$product_name', $total_price, '$address', '$phone')";
    $res = mysqli_query($con, $insertquery);

    if($res){
        echo "<script>alert('Order placed successfully');
              window.location.href='product.php';</script>";
        exit();
    } else {
        die("Error: " . mysqli_error($con));
    }
}
?>


