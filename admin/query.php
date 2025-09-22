<?php
session_start();
include '../config/config.php';
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$query  = "SELECT * FROM queries ORDER BY id ASC";
$result = mysqli_query($con, $query);
if (!$result) {
    die("Query Failed: " . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LuxTime - Manage Queries</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include_once('../head.php'); ?>
  <link rel="stylesheet" href="../css/productcrud.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="dashboard-container">

    <?php include_once('./sidebar.php'); ?> 

    <div class="main-content">
      

        <section class="product-table-section">
          <div class="container">
            <div class="table-header">
              <h2 class="section-title">Manage Queries</h2>
            </div>

            <div class="product-table-scroll">
              <table class="product-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Message</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $id = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                  <td><?php echo htmlspecialchars($row['email']); ?></td>
                  <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                </tr>
                <?php
                  $id++;
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
