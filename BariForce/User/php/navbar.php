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
        </div>
    </nav>
</body>

</html>