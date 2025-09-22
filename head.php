<?php
$page = basename($_SERVER['PHP_SELF']); 
$title = "LuxTime";

if ($page == "index.php") {
    $title = "LuxTime - Premium Wristwatches";
} elseif ($page == "product.php") {
    $title = "LuxTime - Our Collection";
} elseif ($page == "about.php") {
    $title = "About - LuxTime";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>

  <!-- Common Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Lato:wght@300;400;700&family=Raleway:wght@400;500;600&family=Dancing+Script:wght@400;500;600;700&family=Great+Vibes&family=Satisfy&display=swap" rel="stylesheet">

  <!-- Common Styles -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="../css/style.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <?php if ($page == "index.php") { ?>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/style.css">
  <?php } 
  elseif ($page == "product.php") { ?>
    <link rel="stylesheet" href="./css/product.css">
  <?php } 
  elseif ($page == "about.php") { ?>
    <link rel="stylesheet" href="./css/about.css">
  <?php } 
  
  ?>
</head>
