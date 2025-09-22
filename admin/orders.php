

<!DOCTYPE html>
<html lang="en">

<?php
include_once('../config/config.php');
include_once('../head.php');
?>
<link rel="stylesheet" href="../css/productcrud.css">

<body>
<?php
$query = "SELECT * FROM orders ORDER BY created_at DESC";
$result = mysqli_query($con, $query);
if (!$result) {
    die("Query Failed: " . mysqli_error($con));
} else {
?>
<section class="product-table-section">
  <div class="container">
    <div class="table-header">
      <h2>Orders  History</h2>
    </div>
    <table class="product-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Product</th>
          <th>Price (₹)</th>
          <th>Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Qty</th>
          <th>Final Price (₹)</th>
          <th>Username</th>
          <th>Created At</th>
   
        </tr>
      </thead>
      <tbody>
        <?php
        $id = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $row['product']; ?></td>
          <td>₹<?php echo number_format($row['price'],2); ?></td>
          <td><?php echo $row['fullname']; ?></td>
          <td><?php echo $row['address']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td><?php echo $row['qty']; ?></td>
          <td>₹<?php echo number_format($row['final_price'],2); ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php
          $id++;
        }
        ?>
      </tbody>
    </table>
  </div>
</section>
<?php
}
?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>
