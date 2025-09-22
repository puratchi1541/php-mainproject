<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include_once('./config/config.php');

if(!isset($_GET['product_id'])){
    header("Location: product.php");
    exit();
}

$id = (int)$_GET['product_id'];
$query  = "SELECT * FROM addproduct WHERE id=$id";
$result = mysqli_query($con,$query);
if(!$result || mysqli_num_rows($result)==0){
    echo "Product not found";
    exit();
}
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>LuxTime Cart</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Lato:wght@300;400;500;600;700&family=Dancing+Script:wght@400;500;600;700&family=Great+Vibes&family=Satisfy&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./css/description.css" />
<link rel="stylesheet" href="./css/style.css" />

</head>
<body>

<div class="header">
  <div class="header-content">
    <a href="./product.php" class="back-btn"><i class="bi bi-arrow-left"></i></a>
    <h1 class="header-title">Shopping Cart</h1>
  </div>
</div>

<div id="toast"></div>

<section class="cart-section">
<div class="container">
<div class="cart-wrapper">

<div class="cart-items">
<h2 class="section-title">Your Cart</h2>


<div class="cart-product">
  <img src="./images/product/<?php echo $row['pimage']; ?>" 
       alt="<?php echo $row['pname']; ?>" class="product-thumb" />
  <div class="product-info">
    <h3 class="product-title"><?php echo $row['pname']; ?></h3>
    <div class="product-meta">
      <span class="meta-item"><i class="bi bi-tag"></i><?php echo $row['pcategory']; ?></span>
    </div>
    <div class="product-price" id="unitprice" data-price="<?php echo $row['pprice']; ?>">
      RS <?php echo number_format($row['pprice'],2); ?>
    </div>
  </div>

  <div class="product-actions">
    <button class="icon-btn delete" onclick="emptyCart()" title="Remove item">
      <i class="bi bi-trash"></i>
    </button>
    <div class="quantity-control">
      <button class="icon-btn subbtn" title="Decrease quantity"><i class="bi bi-dash"></i></button>
      <span class="quantity" id="quantity">1</span>
      <button class="icon-btn addbtn" title="Increase quantity"><i class="bi bi-plus"></i></button>
    </div>
  </div>
</div>
</div>

<div class="order-summary-box">
<h2 class="section-title">Order Summary</h2>

<div class="summary-item">
  <span>Subtotal</span>
  <span class="summary-price" id="subtotal">RS <?php echo number_format($row['pprice'],2); ?></span>
</div>

<div class="summary-item">
  <span><i class="bi bi-truck"></i> Shipping</span>
  <span style="color: var(--color-green); font-weight:500;">Free</span>
</div>

<!-- <div class="summary-item discount hidden" id="discountRow">
  <span><i class="bi bi-percent"></i> Discount</span>
  <span id="discountAmount">- RS 0.00</span>
</div> -->

<div class="summary-item total">
  <strong>Total</strong>
  <strong class="summary-total" id="total">RS <?php echo number_format($row['pprice'],2); ?></strong>
</div>

<!-- <div class="promo-section">
  <input type="text" placeholder="Enter promo code" class="promo-input" id="promoInput" />
  <button class="btn btn-outline" onclick="applyPromo()">Apply</button>
</div> -->

<form action="orders.php" method="POST">
  <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
  <button class="btn btn-primary btn-block" type="submit">Proceed to Checkout</button>
</form>


<div class="trust-indicators">
  <div class="trust-item"><i class="bi bi-shield-check"></i><span>Secure</span></div>
  <div class="trust-item"><i class="bi bi-truck"></i><span>Free Shipping</span></div>
  <div class="trust-item"><i class="bi bi-arrow-counterclockwise"></i><span>Easy Returns</span></div>
</div>
</div>

</div>
</div>
</section>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/description.js">

</script>

</body>
</html>
