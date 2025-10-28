<?php
$page = basename($_SERVER['PHP_SELF']); 
$title = "LuxTime";

if ($page == "index.php") {
    $title = "LuxTime - Premium Wristwatches";
} elseif ($page == "product.php") {
    $title = "LuxTime - Our Collection";
} elseif ($page == "about.php") {
    $title = "About - LuxTime";
} elseif ($page == "description.php") {
    $title = "Cart - LuxTime";
}
?>
<!DOCTYPE html>     
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <link rel="icon" href='data:image/svg+xml;utf8,
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <title>LuxTime</title>
  <rect x="28" y="1" width="8" height="12" rx="2" ry="2" fill="%23050605"/>
  <rect x="28" y="51" width="8" height="12" rx="2" ry="2" fill="%23050605"/>
  <circle cx="32" cy="32" r="18" fill="%23FDF3DC" stroke="%23D4AF37" stroke-width="3"/>
  <circle cx="32" cy="32" r="2" fill="%2300011B"/>
  <rect x="31.2" y="18" width="1.6" height="12" rx="0.8" transform="rotate(30 32 32)" fill="%2300011B"/>
  <rect x="31.2" y="12" width="1.6" height="20" rx="0.8" transform="rotate(120 32 32)" fill="%2300011B"/>
  <rect x="46" y="28" width="4" height="8" rx="1" fill="%23D4AF37"/>
</svg>' type="image/svg+xml">


  <!-- Common Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Lato:wght@300;400;700&family=Raleway:wght@400;500;600&family=Dancing+Script:wght@400;500;600;700&family=Great+Vibes&family=Satisfy&display=swap" rel="stylesheet">

  <!-- Common Styles -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="../css/style.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <?php if ($page == "index.php" || $page == "admin/index.php") { ?>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../css/login.css">

  <?php } 
  elseif ($page == "product.php") { ?>
    <link rel="stylesheet" href="./css/product.css">
  <?php } 
  elseif ($page == "about.php") { ?>
    <link rel="stylesheet" href="./css/about.css">
  <?php } 
  elseif ($page == "checkout.php") { ?>
    <link rel="stylesheet" href="./css/checkout.css">
  <?php } 
  
  ?>
</head>
