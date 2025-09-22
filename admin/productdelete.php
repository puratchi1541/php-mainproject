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
    $id = $_GET['id'];
    $query = "DELETE FROM addproduct WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    if (!$result) {
      die("Query Failed: " . mysqli_error($con));
    } else {
       header("Location: productcrud.php");
     echo "<script>alert('Product deleted successfully!')</script>";   
    }
}
?>




     
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>