<!DOCTYPE html>
<html lang="en">

<?php
include_once('./config/config.php');
include_once('./head.php');
include_once('./header.php');
?>




<body>
<!-- 
    <section class="modal">
        <div class="popup">
            <img src="./images/home/modal.jpg" alt="LuxTime Popup Image">
            <button id="close-popup">X</button>
        </div>
    </section> -->

    <section>
        <div id="toast" class="toast">"Don’t miss out — new arrivals are waiting for you!"</div>
    </section>


    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Timeless Elegance</h1>
            <p>Discover Our Collection of Premium Timepieces</p>
            <a href="./product.php" class="btn">Explore Collection</a>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <h3>Premium Brands</h3>
                    <p>Curated selection of luxury timepieces</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10K+</div>
                    <h3>Happy Customers</h3>
                    <p>Satisfied watch enthusiasts worldwide</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">25+</div>
                    <h3>Years Experience</h3>
                    <p>Decades of horological expertise</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">99%</div>
                    <h3>Satisfaction Rate</h3>
                    <p>Exceptional customer service record</p>
                </div>
            </div>
        </div>
    </section>

<!-- Featured Products Section -->
<section class="featured" id="featured">
    <div class="container">
        <h2 class="section-title">Featured Collections</h2>
        <div class="product-grid">
            <?php
            $featuredQuery = "SELECT * FROM addproduct ORDER BY id DESC LIMIT 3";
            $featuredResult = mysqli_query($con, $featuredQuery);

            if($featuredResult && mysqli_num_rows($featuredResult) > 0){
                while($row = mysqli_fetch_assoc($featuredResult)){
            ?>
            <a href="description.php?product_id=<?php echo $row['id']; ?>">
                <div class="product-card">
                    <div class="product-image" style="background-image: url('./images/product/<?php echo $row['pimage']; ?>');"></div>
                    <div class="product-info">
                        <h3><?php echo $row['pname']; ?></h3>
                        <p><?php echo $row['pcategory']; ?></p>
                        <div class="product-price">RS <?php echo $row['pprice']; ?></div>
                    </div>
                </div>
            </a>
            <?php
                }
            } else {
                echo "<p>No featured products found.</p>";
            }
            ?>
        </div>
    </div>
</section>




    <!-- Carousel Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Craftsmanship Gallery</h2>
            <div class="carousel">
                <div class="carousel-slides">
                    <div class="carousel-slide slide-1"></div>
                    <div class="carousel-slide slide-2"></div>
                    <div class="carousel-slide slide-3"></div>
                    <div class="carousel-slide slide-4"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container">
            <h2 class="section-title">About LuxTime</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>For over two decades, LuxTime has been at the forefront of luxury timepiece curation. We
                        specialize in bringing together the world's most prestigious watch brands under one roof,
                        offering our discerning clientele access to exceptional craftsmanship and timeless design.</p>
                    <p>Our expertise spans from vintage collectors' pieces to cutting-edge contemporary designs. Each
                        watch in our collection is carefully selected for its quality, heritage, and ability to
                        transcend time itself.</p>
                    <a href="./about.html" class="btn">Learn More</a>
                </div>
                <div class="about-image"></div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-header">
                    <h3>What makes LuxTime watches special?</h3>
                    <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="accordion-content">
                    <p>LuxTime watches are handcrafted with precision using the finest materials, blending timeless
                        design with modern engineering.</p>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-header">
                    <h3>Do you offer international shipping?</h3>
                    <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="accordion-content">
                    <p>Yes, we ship our luxury timepieces worldwide with insured and trackable shipping partners.</p>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-header">
                    <h3>Can I book a private viewing?</h3>
                    <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="accordion-content">
                    <p>Absolutely. Contact us to schedule a personal appointment at one of our flagship stores or with a
                        concierge.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="footer">
    <?php 
    include 'footer.php'; 
    ?>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/script.js">
    </script>
</body>

</html>