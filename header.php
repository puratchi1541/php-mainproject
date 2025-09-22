<?php
session_start();
$server = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar">
    <div class="nav-container">
        <a href="./index.php" class="logo"><i class="fas fa-clock"></i> LuxTime</a>

        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <ul class="nav-menu">
            <li><a href="./index.php" class="nav-link <?php if($server=='index.php') echo 'active'; ?>">Home</a></li>
            <li><a href="./product.php" class="nav-link <?php if($server=='product.php') echo 'active'; ?>">Products</a></li>
            <li><a href="./about.php" class="nav-link <?php if($server=='about.php') echo 'active'; ?>">About</a></li>
        </ul>

        <div class="nav-right">
            <?php if(isset($_SESSION['username'])): ?>
                <span class="username">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="./logout.php" class="btn-logout"></i> Logout</a>
            <?php else: ?>
                <a href="./login.php" class="btn-logout"></i> Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
