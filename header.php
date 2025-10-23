<?php
session_start();
$server = basename($_SERVER['PHP_SELF']);
?>


<nav class="navbar">
    <div class="nav-container">
        <!-- Logo -->
        <a href="./index.php" class="logo"><i class="fas fa-clock"></i> LuxTime</a>

        <!-- Hamburger for Mobile -->
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <!-- Navigation Menu -->
        <ul class="nav-menu">
            <li><a href="./index.php" class="nav-link <?php if($server=='index.php') echo 'active'; ?>">Home</a></li>
            <li><a href="./product.php" class="nav-link <?php if($server=='product.php') echo 'active'; ?>">Products</a></li>
            <li><a href="./about.php" class="nav-link <?php if($server=='about.php') echo 'active'; ?>">About</a></li>

            <!-- User Section -->
          <li class="nav-user">
    <?php
    // detect if header is being rendered for an admin area page
    $requestPath = $_SERVER['PHP_SELF'] ?? '';
    $inAdminArea = (strpos($requestPath, '/admin/') !== false) || (strpos($_SERVER['REQUEST_URI'] ?? '', '/admin/') !== false);

    // Show admin session only when inside admin area and admin is logged in
    if ($inAdminArea && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) : ?>
        <span class="username">Hello, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Admin'); ?></span>
        <a href="./logout.php" class="btn-logout">Logout</a>
    <?php elseif(isset($_SESSION['role']) && $_SESSION['role']==='user' && !empty($_SESSION['is_user'])): ?>
        <span class="username">Hello, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?></span>
        <a href="./logout.php" class="btn-logout">Logout</a>
    <?php else: ?>
        <a href="./login.php" class="btn-logout">Login</a>
    <?php endif; ?>
</li>

        </ul>
    </div>
</nav>
