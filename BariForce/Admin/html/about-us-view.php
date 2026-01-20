<!DOCTYPE html>
<html>
<head>
    <title>About Us - BariForce</title>
    <link rel="stylesheet" href="../../User/CSS/navbar.css">
    <link rel="stylesheet" href="../../User/CSS/footer.css">
    <link rel="stylesheet" href="../CSS/about-us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include '../../User/php/navbar.php'; ?>

    <main class="about-container">
        <section class="about-section">
            <div class="about-image-grid">
                <div class="main-img-wrapper">
                    <img src="https://img.freepik.com/free-photo/plumber-working-client-s-home_23-2150990665.jpg" class="about-img-1" alt="Plumber">
                </div>
                <div class="sub-img-wrapper">
                    <img src="https://img.freepik.com/free-photo/repairman-fixing-air-conditioner-wall_23-2148817036.jpg" class="about-img-2" alt="AC Service">
                </div>
            </div>

            <div class="about-content">
                <span class="sub-title">ABOUT US</span>
                <h2>We make handyman service for your home</h2>
                <p>
                    BariForce is your trusted partner for all home maintenance needs. From plumbing and electrical work to AC repair and cleaning, we provide verified experts at your doorstep with affordable pricing.
                </p>
                
                <div class="feature-check-list">
                    <div class="check-item"><i class="fas fa-check-circle"></i> Professional Worker</div>
                    <div class="check-item"><i class="fas fa-check-circle"></i> Trusted Company</div>
                    <div class="check-item"><i class="fas fa-check-circle"></i> Best Quality Materials</div>
                    <div class="check-item"><i class="fas fa-check-circle"></i> Affordable Price</div>
                </div>

                <a href="../../User/php/services.php" class="learn-more-btn">Learn More</a>
            </div>
        </section>
    </main>

    <?php include '../../User/php/footer.php'; ?>

    <script src="../../User/js/themeToggle.js"></script>
</body>
</html>