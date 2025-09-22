<!DOCTYPE html>
<html lang="en">

<?php
include_once('./config/config.php');
include_once('./head.php');
include_once('./header.php');
?>



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
            <div class="filter-container">
                <div class="filter-group">
                    <label for="category">Category</label>
                    <select id="category" class="filter-select">
                        <option value="all">All Categories</option>
                        <option value="dress">Dress Watches</option>
                        <option value="sports">Sports Watches</option>
                        <option value="diving">Diving Watches</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="price">Price Range</label>
                    <select id="price" class="filter-select">
                        <option value="all">All Prices</option>
                        <option value="under-1000">Under RS 1,000</option>
                        <option value="1000-5000">RS 1,000 - RS 5,000</option>
                        <option value="over-5000">Over RS 5,000</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="sort">Sort By</label>
                    <select id="sort" class="filter-select">
                        <option value="featured">Featured</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="newest">Newest First</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Categories -->
    <section class="categories-section">
        <div class="container">
            <h2 class="section-title">Browse by Category</h2>
            <div class="categories-grid">
                <div class="category-card">
                    <img src="./images/product/bbc1.jpg" alt="Dress Watches">
                    <div class="category-content">
                        <h3>Dress Watches</h3>
                    </div>
                </div>
                <div class="category-card">
                    <img src="./images/product/bbc2.jpg" alt="Sports Watches">
                    <div class="category-content">
                        <h3>Sports Watches</h3>
                    </div>
                </div>
                <div class="category-card">
                    <img src="./images/product/bbc3.jpg" alt="Diving Watches">
                    <div class="category-content">
                        <h3>Diving Watches</h3>
                    </div>
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
                $query = "SELECT * FROM addproduct ORDER BY id DESC";
                $result = mysqli_query($con, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/product.js"></script>
</body>

</html>
