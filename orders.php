<?php
session_start();
include_once('./config/config.php');

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['order'])){
    $username = $_SESSION['username'];
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $price = floatval($_POST['price']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $name= mysqli_real_escape_string($con, $_POST['name']);

    $insertquery = "INSERT INTO orders(username, product_name, price, address, mobile)
                    VALUES('$name', '$product_name', $price, '$address', '$phone')";
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


