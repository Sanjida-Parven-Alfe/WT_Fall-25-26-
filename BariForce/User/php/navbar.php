<?php
$isInAdmin = (strpos($_SERVER['SCRIPT_NAME'], '/Admin/php/') !== false);

if ($isInAdmin) {
    $pathPrefix = "../../User/php/";
    $loginPath = "login.php"; 
} else {
    $pathPrefix = "";
    $loginPath = "../../Admin/php/login.php";
}
?>

<!DOCTYPE html>
<html>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="<?php echo $pathPrefix; ?>home.php" class="logo">BariForce.</a>

            <div class="nav-links">
                <a href="<?php echo $pathPrefix; ?>home.php"
                    class="<?= basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active-link' : '' ?>">Home</a>
                <a href="<?php echo $pathPrefix; ?>services.php"
                    class="<?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active-link' : '' ?>">Services</a>
                <a href="<?php echo $pathPrefix; ?>offers.php"
                    class="<?= basename($_SERVER['PHP_SELF']) == 'offers.php' ? 'active-link' : '' ?>">Offers</a>

            </div>
            <div class="nav-right">
                <button onclick="toggleTheme()" class="theme-btn" title="Toggle Theme">
                    <i id="theme-icon" class="fas fa-moon"></i>
                </button>

                <?php if (isset($_SESSION['username'])): ?>
                    <a href="<?php echo $pathPrefix; ?>dashboard.php" class="nav-link">Dashboard</a>
                    <a href="<?php echo $pathPrefix; ?>logout.php" class="btn-logout">Logout</a>
                <?php else: ?>
                    <a href="<?php echo $loginPath; ?>" class="nav-link">Login</a>
                    <a href="<?php echo $pathPrefix; ?>register.php" class="btn-signup">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</body>

</html>