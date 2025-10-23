<!DOCTYPE html>
<html lang="en">
<?php
include_once('../config/config.php');
include_once('../head.php');
?>
<link rel="stylesheet" href="../css/productadd.css">
<body>
<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query  = "SELECT * FROM addproduct WHERE id = $id";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query Failed: " . mysqli_error($con));
    } else {
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            die("No product found with the given ID.");
        }
    }
} else {
    die("No product ID provided.");
}
if (isset($_POST['update_product'])) {
    $id        = (int)$_POST['id']; 
    $pname     = mysqli_real_escape_string($con, $_POST['pname']);
    $pcategory = mysqli_real_escape_string($con, $_POST['pcategory']);
    $pprice    = mysqli_real_escape_string($con, $_POST['pprice']);
    if (!empty($_FILES['pimage']['name'])) {
        $imgname  = $_FILES['pimage']['name'];
        $tempname = $_FILES['pimage']['tmp_name'];
        $folder   = "../images/product/" . $imgname;
        move_uploaded_file($tempname, $folder);
        $query = "UPDATE addproduct 
                  SET pname='$pname', 
                      pcategory='$pcategory', 
                      pprice='$pprice', 
                      pimage='$imgname' 
                  WHERE id=$id";
    } else {
        $query = "UPDATE addproduct 
                  SET pname='$pname', 
                      pcategory='$pcategory', 
                      pprice='$pprice' 
                  WHERE id=$id";
    }
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Product updated successfully!');</script>";
        echo "<script>window.location.href='productcrud.php';</script>";
        exit;
    } else {
        die("Update Failed: " . mysqli_error($con));
    }
}
?>
<section class="add-product-section">
  <div class="container">
    <h2 class="section-title">Edit Product</h2>
    <form class="add-product-form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="pimage">Update Image (leave blank to keep current)</label>
            <input type="file" id="pimage" name="pimage" accept="image/*">
        </div>
        <div class="form-group">
            <label for="pname">Update Product Name</label>
            <input type="text" id="pname" name="pname" value="<?php echo htmlspecialchars($row['pname']); ?>" required>
        </div>
        <div class="form-group">
            <label for="pcategory">Change Category</label>
            <select id="pcategory" name="pcategory" required>
                <option value="">-- Select Category --</option>
                <option value="Dress Watch"  <?php if ($row['pcategory']=="Dress Watch")  echo "selected"; ?>>Dress Watch</option>
                <option value="Sports Watch" <?php if ($row['pcategory']=="Sports Watch") echo "selected"; ?>>Sports Watch</option>
                <option value="Diving Watch" <?php if ($row['pcategory']=="Diving Watch") echo "selected"; ?>>Diving Watch</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pprice">Price (₹)</label>
            <input type="number" id="pprice" name="pprice" value="<?php echo htmlspecialchars($row['pprice']); ?>" required>
        </div>
        <button type="submit" class="lux-btn add-btn" name="update_product">Update Product</button>
    </form>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
