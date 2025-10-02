<?php
session_start();
include_once('./config/config.php');
include_once('./head.php');

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if(!isset($_POST['product_id'])){
    header("Location: product.php");
    exit();
}

$product_id = (int)$_POST['product_id'];
$total_price = floatval($_POST['total_price']);
$username = $_SESSION['username'];

$sql = "SELECT * FROM addproduct WHERE id=$product_id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$product_name = $row['pname'];
?>

<!-- Order Form Section -->
<section class="order-section">
  <div class="container">
    <h2 class="section-title">Enter Your Details</h2>

    <!-- Back Button -->
    <a href="./description.php" class="back-btn">
      &larr; Back
    </a>

    <form class="order-form" action="orders.php" method="POST">
        <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
        <input type="hidden" name="price" value="<?php echo $total_price; ?>">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <textarea id="address" name="address" placeholder="Enter your address" required></textarea>
        </div>

        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" id="phone" name="phone" placeholder="10-digit number" pattern="[0-9]{10}" required>
        </div>

        <button type="submit" class="lux-btn" name="order">Place Order</button>
    </form>
  </div>
</section>

