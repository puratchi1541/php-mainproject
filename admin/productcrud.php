<?php
session_start();
include '../config/config.php';
if (!isset($_SESSION['username']) || !in_array($_SESSION['role'], ['admin', 'superadmin'])) {
  // redirect to admin login page
  header("Location: index.php");
  exit();
}

$query = "SELECT * FROM addproduct order by id desc";
$result = mysqli_query($con, $query);
if (!$result) {
    die("Query Failed: " . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LuxTime - Manage Products</title>
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
              <h2 class="section-title">Manage Products</h2>
              <a href="./productadd.php" class="btn add-btn">
                <i class="fas fa-plus"></i> Add Product
              </a>
            </div>

           <div class="product-table-scroll">
             <table class="product-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Price (₹)</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $id = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagePath = !empty($row['pimage']) 
                        ? "../images/product/" . $row['pimage'] 
                        : "../images/product/placeholder.png";
                ?>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td>
                    <img src="<?php echo $imagePath; ?>" 
                         alt="<?php echo $row['pname']; ?>" 
                         class="product-img">
                  </td>
                  <td><?php echo $row['pname']; ?></td>
                  <td><?php echo $row['pcategory']; ?></td>
                  <td>₹<?php echo $row['pprice']; ?></td>
                  <td class="actions">
                    <a href="./productedit.php?id=<?php echo $row['id']; ?>" class="btn edit-btn">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="./productdelete.php?id=<?php echo $row['id']; ?>" 
                       class="btn delete-btn"
                       onclick="return confirm('Are you sure you want to delete this product?');">
                      <i class="fas fa-trash"></i> Delete
                    </a>
                  </td>
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
<?php include('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>


