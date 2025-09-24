<?php
// product.php
// session_start();
include_once('./config/config.php');
include_once('./head.php');
include_once('./header.php');

// Get filter values from URL
$category = isset($_GET['category']) ? $_GET['category'] : "";
$price = isset($_GET['price']) ? $_GET['price'] : "";

// Filtered products query
$filterQuery = "SELECT * FROM addproduct WHERE 1";

if ($category != "" && $category != "all") {
    $filterQuery .= " AND pcategory='$category'";
}

if ($price != "" && $price != "all") {
    if ($price == "under-1000") {
        $filterQuery .= " AND pprice < 1000";
    } elseif ($price == "1000-5000") {
        $filterQuery .= " AND pprice BETWEEN 1000 AND 5000";
    } elseif ($price == "over-5000") {
        $filterQuery .= " AND pprice > 5000";
    }
}

$filterQuery .= " ORDER BY id DESC";
$filterResult = mysqli_query($con, $filterQuery);

// All products for New Arrivals
$allQuery = "SELECT * FROM addproduct ORDER BY id DESC";
$allResult = mysqli_query($con, $allQuery);
?>

<!DOCTYPE html>
<html lang="en">
<body>

<!-- Hero Section -->
<section class="hero-parallax">
    <div class="hero-content">
        <h1>Our Collection</h1>
        <p>Discover Timeless Elegance</p>
    </div>
</section>

<!-- Filter Section -->
<section class="filter-section">
    <div class="container">
        <form method="GET" class="filter-container">
            <div class="filter-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="filter-select" onchange="this.form.submit()">
                    <option value="all" <?php if($category=="all" || $category=="") echo "selected"; ?>>All Categories</option>
                    <option value="Dress Watch" <?php if($category=="Dress Watch") echo "selected"; ?>>Dress Watches</option>
                    <option value="Sports Watch" <?php if($category=="Sports Watch") echo "selected"; ?>>Sports Watches</option>
                    <option value="Diving Watch" <?php if($category=="Diving Watch") echo "selected"; ?>>Diving Watches</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="price">Price Range</label>
                <select name="price" id="price" class="filter-select" onchange="this.form.submit()">
                    <option value="all" <?php if($price=="all" || $price=="") echo "selected"; ?>>All Prices</option>
                    <option value="under-1000" <?php if($price=="under-1000") echo "selected"; ?>>Under RS 1,000</option>
                    <option value="1000-5000" <?php if($price=="1000-5000") echo "selected"; ?>>RS 1,000 - RS 5,000</option>
                    <option value="over-5000" <?php if($price=="over-5000") echo "selected"; ?>>Over RS 5,000</option>
                </select>
            </div>
        </form>
    </div>
</section>

<!-- Filtered Products Section -->
<?php if(($category != "" && $category != "all") || ($price != "" && $price != "all")): ?>
<section class="filtered-products">
    <div class="container">
        <h2 class="section-title">Filtered Products</h2>
        <div class="products-grid">
            <?php
            if ($filterResult && mysqli_num_rows($filterResult) > 0) {
                while ($row = mysqli_fetch_assoc($filterResult)) {
            ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="./images/product/<?php echo $row['pimage']; ?>" alt="<?php echo $row['pname']; ?>">
                    <div class="product-overlay">
                        <a href="description.php?product_id=<?php echo $row['id']; ?>" class="view-btn">Add to cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3><?php echo $row['pname']; ?></h3>
                    <p class="product-category"><?php echo $row['pcategory']; ?></p>
                    <p class="product-price">RS <?php echo $row['pprice']; ?></p>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Product Categories Section -->
<section class="categories-section">
    <div class="container">
        <h2 class="section-title">Browse by Category</h2>
        <div class="categories-grid">
            <div class="category-card">
                <img src="./images/product/bbc1.jpg" alt="Dress Watches">
                <div class="category-content"><h3>Dress Watches</h3></div>
            </div>
            <div class="category-card">
                <img src="./images/product/bbc2.jpg" alt="Sports Watches">
                <div class="category-content"><h3>Sports Watches</h3></div>
            </div>
            <div class="category-card">
                <img src="./images/product/bbc3.jpg" alt="Diving Watches">
                <div class="category-content"><h3>Diving Watches</h3></div>
            </div>
        </div>
    </div>
</section>

<!-- New Arrivals Section -->
<section class="new-arrivals-section">
    <div class="container">
        <h2 class="section-title">New Arrivals</h2>
        <div class="products-grid">
            <?php
            if ($allResult && mysqli_num_rows($allResult) > 0) {
                while ($row = mysqli_fetch_assoc($allResult)) {
            ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="./images/product/<?php echo $row['pimage']; ?>" alt="<?php echo $row['pname']; ?>">
                    <div class="product-overlay">
                        <a href="description.php?product_id=<?php echo $row['id']; ?>" class="view-btn">Add to cart</a>
                    </div>
                </div>
                <div class="product-info">
                    <h3><?php echo $row['pname']; ?></h3>
                    <p class="product-category"><?php echo $row['pcategory']; ?></p>
                    <p class="product-price">RS <?php echo $row['pprice']; ?></p>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <h2 class="section-title">Why Choose Our Watches</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-gem"></i></div>
                <h3>Premium Materials</h3>
                <p>Handcrafted using the finest materials, including sapphire crystal and premium steel.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-cogs"></i></div>
                <h3>Swiss Movement</h3>
                <p>Precision-engineered Swiss movements ensuring exceptional accuracy and reliability.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                <h3>5-Year Warranty</h3>
                <p>Comprehensive warranty coverage for peace of mind with every purchase.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-truck"></i></div>
                <h3>Free Shipping</h3>
                <p>Complimentary worldwide shipping on all orders over RS1,000.</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <?php include 'footer.php'; ?>
</footer>

</body>
</html>
