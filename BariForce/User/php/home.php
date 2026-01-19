<?php session_start();
require_once '../db/db_connect.php';

$sql = "SELECT * FROM services ORDER BY rating DESC LIMIT 3";
$result = $conn->query($sql); ?>

<!DOCTYPE html>
<html>

<head>
    <title>BariForce - Expert Home Services</title>

    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <section class="hero">
        <div class="hero-text">
            <h1>Expert Home Services <br> at Your <span>Doorstep</span></h1>
            <p>Need a professional cleaner, electrician, or driver? BariForce connects you with verified experts
                instantly. Safe, secure, and reliable service.</p>

            <div class="cta-buttons">
                <a href="services.php" class="btn-primary">Book a Service</a>
                <a href="login.php" class="btn-secondary">Sign In <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="hero-image">
            <img src="../images/hero-banner.png" alt="Home Service Animation">
        </div>
    </section>

    <section class="section-container categories">
        <div class="section-header">
            <h2>Explore Categories</h2>
            <p>Select a category to find the right service for you</p>
        </div>

        <div class="category-grid">
            <a href="services.php?cat=cleaning" class="cat-card">
                <div class="icon-box"><i class="fas fa-broom"></i></div>
                <span>Cleaning</span>
            </a>
            <a href="services.php?cat=electrical" class="cat-card">
                <div class="icon-box"><i class="fas fa-bolt"></i></div>
                <span>Electrical</span>
            </a>
            <a href="services.php?cat=plumbing" class="cat-card">
                <div class="icon-box"><i class="fas fa-faucet"></i></div>
                <span>Plumbing</span>
            </a>
            <a href="services.php?cat=ac" class="cat-card">
                <div class="icon-box"><i class="fas fa-wind"></i></div>
                <span>AC Repair</span>
            </a>
            <a href="services.php?cat=painting" class="cat-card">
                <div class="icon-box"><i class="fas fa-paint-roller"></i></div>
                <span>Painting</span>
            </a>
            <a href="services.php?cat=shifting" class="cat-card">
                <div class="icon-box"><i class="fas fa-truck-loading"></i></div>
                <span>Shifting</span>
            </a>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="../js/themeToggle.js"></script>

</body>

</html>