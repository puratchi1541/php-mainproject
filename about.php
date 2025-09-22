<!DOCTYPE html>
<html lang="en">

<?php
include_once('./config/config.php');
include_once('./head.php');
include_once('./header.php');
?>

<body>

    <!-- Hero Section with Parallax -->
    <section class="hero-parallax">
        <div class="hero-content">
            <h1>Our Legacy</h1>
            <p>Where Time Meets Excellence</p>
        </div>
    </section>

    <!-- Story Section with Timeline -->
    <section class="story-section">
        <div class="container">
            <h2 class="section-title">Our Journey</h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>1995</h3>
                        <p>The beginning of our story in a small Swiss workshop</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>2005</h3>
                        <p>Expansion to international markets</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>2015</h3>
                        <p>Launch of our signature collection</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>2023</h3>
                        <p>Celebrating excellence in watchmaking</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Craftsmanship Section -->
    <section class="craft-section">
        <div class="container">
            <div class="craft-grid">
                <div class="craft-image">
                    <img src="https://images.unsplash.com/photo-1523170335258-f5ed11844a49?auto=format&fit=crop&w=800&q=80"
                        alt="Craftsmanship">
                </div>
                <div class="craft-content">
                    <h2>Masterful Craftsmanship</h2>
                    <p>Each LuxTime watch is a testament to our commitment to excellence. Our master craftsmen combine
                        traditional techniques with modern innovation to create timepieces that are both beautiful and
                        precise.</p>
                    <div class="craft-stats">
                        <div class="stat-item">
                            <span class="stat-number">28</span>
                            <span class="stat-label">Years of Excellence</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">100+</span>
                            <span class="stat-label">Master Craftsmen</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">50k+</span>
                            <span class="stat-label">Happy Customers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section with Cards -->
    <section class="values-section">
        <div class="container">
            <h2 class="section-title">Our Core Values</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3>Excellence</h3>
                    <p>We pursue perfection in every detail, from design to craftsmanship.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Integrity</h3>
                    <p>We build lasting relationships through honesty and transparency.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>We embrace new ideas while honoring traditional watchmaking.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section with Hover Effects -->
    <section class="team-section">
        <div class="container">
            <h2 class="section-title">Meet Our Masters</h2>
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-image">
                        <img src="./images/about/b1.jpg"
                            alt="Team Member">
                    </div>
                    <div class="team-info">
                        <h3>James Wilson</h3>
                        <p>Master Watchmaker</p>
                        <div class="team-social">
                            <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class=""></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://img.freepik.com/free-photo/indian-woman-wearing-gray-blazer_53876-105016.jpg?ga=GA1.1.678935602.1731600610&semt=ais_items_boosted&w=740"
                            alt="Team Member">
                    </div>
                    <div class="team-info">
                        <h3>Sarah Chen</h3>
                        <p>Creative Director</p>
                        <div class="team-social">
                            <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class=""></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://img.freepik.com/free-photo/smiling-young-male-professional-standing-with-arms-crossed-while-making-eye-contact-against-isolated-background_662251-838.jpg?ga=GA1.1.678935602.1731600610&semt=ais_items_boosted&w=740"
                            alt="Team Member">
                    </div>
                    <div class="team-info">
                        <h3>Michael Rodriguez</h3>
                        <p>Head of Design</p>
                        <div class="team-social">
                            <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class=""></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    if (isset($_POST['submit'])) {
        // echo "<script>alert('Query submitted successfully!');</script>";
        $fullname = $_POST['name'];
        $email    = $_POST['email'];
        $message  = $_POST['questions'];

        // Enable error reporting for debugging
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $query = "INSERT INTO queries (fullname, email, message) VALUES ('$fullname', '$email', '$message')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('Query submitted successfully!');</script>";
        } else {
            echo "Error inserting data: " . mysqli_error($con);
        }
    }
    ?>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Get in Touch</h2>
                    <p>We'd love to hear from you. Reach out to us for any inquiries about our timepieces or to schedule
                        a private viewing.</p>
                    <div class="contact-details">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Luxury Ave, Iyer bungalow, Madurai-14</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+91 8248500502</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>info@luxtime.com</span>
                        </div>
                    </div>
                </div>


                <div class="contact-form">
                    <form action="./about.php" method="POST" id="contactForm">
                        <div class="form-group">
                            <input type="text" class="name" name="name" placeholder="Your Name" value="">
                            <span class="error-message name-error"></span>
                        </div>
                        <div class="form-group">
                            <input type="email" class="email" name="email" placeholder="Your Email" value="">
                            <span class="error-message email-error"></span>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Your Message" name="questions" class="message"></textarea>
                            <span class="error-message message-error"></span>
                        </div>
                        <input type="submit" class="submit-btn" name="submit" value="Send Message">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer  -->
     <footer class="footer">
     <?php
        include_once './footer.php';
    ?>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/about.js">
    </script>
</body>

</html>