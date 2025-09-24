<!DOCTYPE html>
<html lang="en">

<?php
include_once('../config/config.php');
include_once('../head.php');
?>
<link rel="stylesheet" href="../css/productadd.css">

<body>

<?php
  if (isset($_POST['add_product'])) {
      $imgname = $_FILES['pimage']['name'];
      $tempname = $_FILES['pimage']['tmp_name'];
      $folder = "../images/product/" . $imgname;
      move_uploaded_file($tempname, $folder); 
      $pname = $_POST['pname'];
      $pcategory = $_POST['pcategory'];
      $pprice = $_POST['pprice'];
      
      $query = "INSERT INTO addproduct (pimage, pname, pcategory, pprice) VALUES ('$imgname', '$pname', '$pcategory', '$pprice')";
      $result = mysqli_query($con, $query);

      if ($result) {
          echo "<script>alert('Product added successfully!')</script>";
          header("Location: productcrud.php");
          
          
      } else {
          echo "<script>alert('Failed to add product. Please try again.');</script>";
      }
  }
?>
<section class="add-product-section">
  <div class="container">
    <h2 class="section-title">Add New Product</h2>

    <form class="add-product-form" method="POST" action="./productadd.php" enctype="multipart/form-data">
      
            <!-- Upload Image -->
            <div class="form-group">
              <label for="pimage">Upload Image</label>
              <input type="file" id="pimage" name="pimage" accept="image/*" required>
            </div>

      <!-- Product Name -->
      <div class="form-group">
        <label for="pname">Product Name</label>
        <input type="text" id="pname" name="pname" placeholder="Enter product name" required>
      </div>

      <!-- Category -->
     <div class="form-group">
  <label for="pcategory">Category</label>
  <select id="pcategory" name="pcategory" required>
    <option value="">-- Select Category --</option>
    <option value="Dress Watch">Dress Watch</option>
    <option value="Sports Watch">Sports Watch</option>
    <option value="Diving Watch">Diving Watch</option>
  </select>
</div>


      <!-- Price -->
      <div class="form-group">
        <label for="pprice">Price (₹)</label>
        <input type="number" id="pprice" name="pprice" placeholder="Enter price" required>
      </div>

      <!-- Submit -->
      <button type="submit" class="lux-btn add-btn" name="add_product">
        <i class="fas fa-plus"></i> Add Product
      </button>
    </form>
  </div>
</section>



     
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>