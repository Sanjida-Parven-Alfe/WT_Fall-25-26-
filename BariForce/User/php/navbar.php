<?php
$isInAdmin = (strpos($_SERVER['SCRIPT_NAME'], '/Admin/php/') !== false);

if ($isInAdmin) {
    $pathPrefix = "../../User/php/";
    $loginPath = "login.php";
    $joinUsPath = "join-us.php";
} else {
    $pathPrefix = "";
    $loginPath = "../../Admin/php/login.php";
    $joinUsPath = "../../Admin/php/join-us.php";
}
$dashboardLink = $pathPrefix . "dashboard.php";

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    if ($isInAdmin) {

        $dashboardLink = "dashboard.php";
    } else {

        $dashboardLink = "../../Admin/php/dashboard.php";
    }
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
                    <?php if($_SESSION['role'] == 'user'): ?>
                        <a href="<?php echo $joinUsPath; ?>" class="btn-signup">Join Team</a>
                    <?php endif; ?>
                    <a href="<?php echo $pathPrefix; ?>logout.php" class="btn-logout">Logout</a>
                <?php else: ?>
                    <a href="<?php echo $loginPath; ?>" class="nav-link">Login</a>
                  <a href="<?php echo $joinUsPath; ?>" class="btn-signup">Join Us</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</body>

</html>