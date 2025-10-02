<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$userQuery = "SELECT COUNT(*) as total_users FROM users WHERE role='user'";
$userResult = mysqli_query($con, $userQuery);
$totalUsers = $userResult ? mysqli_fetch_assoc($userResult)['total_users'] : 0;

$productQuery = "SELECT COUNT(*) as total_products FROM addproduct";
$productResult = mysqli_query($con, $productQuery);
$totalProducts = $productResult ? mysqli_fetch_assoc($productResult)['total_products'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LuxTime - Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include_once('../head.php'); ?>
  <link rel="stylesheet" href="../css/productcrud.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="dashboard-container">
  <div class="sidebar">
    <a href="#" class="logo"><i class="fas fa-clock"></i></a>
    <h2>LuxTime</h2>
    <ul>
      <li><a href="./admin.php">Dashboard</a></li>
      <li><a href="./productcrud.php">Products</a></li>
      <li><a href="./manageusers.php">Users</a></li>
      <li><a href="./query.php">Queries</a></li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </div>

  <div class="main-content">
    <!-- <div class="topbar">
      <h2 class="section-title">Admin Dashboard</h2>
    </div> -->

    <div class="stats">
      <div class="stat-card"><h4>Total Users</h4><p><?php echo $totalUsers; ?></p></div>
      <div class="stat-card"><h4>Total Sales</h4><p>₹2,50,000</p></div>
      <div class="stat-card"><h4>Revenue</h4><p>₹4,80,000</p></div>
      <div class="stat-card"><h4>Products</h4><p><?php echo $totalProducts; ?></p></div>
    </div>

    <section class="product-table-section" style="margin-top:40px;">
      <div class="container">
        <div class="table-header">
          <h2 class="section-title">Recent Orders</h2>
        </div>

      <div class="product-table-scroll">
          <table class="product-table">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Product Name</th>
              <th>Product Price</th>
              <th>Full Name</th>
              <th>Address</th>
              <th>Phone</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $query = "SELECT * FROM orders ORDER BY id DESC LIMIT 5";

            $result = mysqli_query($con, $query);
            if (!$result) {
                die("Query Failed: " . mysqli_error($con));
            }
            $orderNo = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$orderNo}</td>
                        <td>{$row['product_name']}</td>
                        <td>₹{$row['price']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['mobile']}</td>
                      </tr>";
                $orderNo++;
            }
            ?>
          </tbody>
        </table>
      </div>
      </div>
    </section>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
