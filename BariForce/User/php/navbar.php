<?php
$pathPrefix = (strpos($_SERVER['REQUEST_URI'], 'Admin') !== false) ? '../../User/php/' : '';
?>

<!DOCTYPE html>
<html>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="home.php" class="logo">BariForce.</a>

            <div class="nav-links">
                <a href="home.php"
                    class="<?= basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active-link' : '' ?>">Home</a>
                <a href="services.php"
                    class="<?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active-link' : '' ?>">Services</a>
                <a href="offers.php"
                    class="<?= basename($_SERVER['PHP_SELF']) == 'offers.php' ? 'active-link' : '' ?>">Offers</a>

            </div>
            <div class="nav-right">
                <button onclick="toggleTheme()" class="theme-btn" title="Toggle Theme">
                    <i id="theme-icon" class="fas fa-moon"></i>
                </button>

                <?php if (isset($_SESSION['username'])): ?>
                    <a href="dashboard.php" class="nav-link">Dashboard</a>
                    <a href="logout.php" class="btn-logout">Logout</a>
                <?php else: ?>
                    <?php
                    $loginPath = (strpos($_SERVER['REQUEST_URI'], 'Admin') !== false) ? 'login.php' : '../../Admin/php/login.php';
                    ?>
                    <a href="../../Admin/php/login.php" class="nav-link">Login</a>
                    <a href="register.php" class="btn-signup">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</body>

</html>