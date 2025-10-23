<!-- sidebar.php -->
<div class="sidebar">
  <a href="#" class="logo"><i class="fas fa-clock"></i></a>
  <h2>LuxTime</h2>
  <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    echo "<script>console.log('$currentPage');</script>"
  ?>
  <ul>
    <li><a href="./admin.php" class="<?php if($currentPage=='admin.php') echo 'active'; ?>">Dashboard</a></li>
    <li><a href="./productcrud.php" class="<?php if($currentPage=='productcrud.php') echo 'active'; ?>">Products</a></li>
    <li><a href="./manageusers.php" class="<?php if($currentPage=='manageusers.php') echo 'active'; ?>">Users</a></li>
    <li><a href="./query.php" class="<?php if($currentPage=='query.php') echo 'active'; ?>">Queries</a></li>
    <!-- Admin logout should point to admin/logout.php -->
    <li><a href="./logout.php">Logout</a></li>
  </ul>
</div>
