<?php
session_start();
include_once('./config/config.php');

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if(!isset($_GET['product_id'])){
    header("Location: product.php");
    exit();
}

$product_id = (int)$_GET['product_id'];
$sql = "SELECT * FROM addproduct WHERE id=$product_id";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 0){
    die("Product not found");
}

$row = mysqli_fetch_assoc($result);
$uname = $_SESSION['username'];
$productname = mysqli_real_escape_string($con, $row['pname']);
$price = floatval($row['pprice']);

if(isset($_POST['order'])){
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $insertquery = "INSERT INTO orders(username, productname, price, address, phone)
                    VALUES('$uname', '$productname', $price, '$address', '$phone')";

    $res = mysqli_query($con, $insertquery);

    if($res){
        echo "<script>
                alert('Order placed successfully');
                
              </script>";
        exit();
    } else {
        die("Error: " . mysqli_error($con));
    }
}
?>

<h2>Enter your details to place the order</h2>
<form action="" method="POST">
    <label>Address:</label><br>
    <textarea name="address" required></textarea><br><br>

    <label>Phone:</label><br>
    <input type="tel" name="phone" required pattern="[0-9]{10}" placeholder="10-digit number"><br><br>

    <input type="submit" value="Order Now" name="order">
</form>
