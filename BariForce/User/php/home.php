<?php session_start(); 
require_once '../db/db_connect.php'; 

$sql = "SELECT * FROM services ORDER BY rating DESC LIMIT 3";
$result = $conn->query($sql);?>

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
            <img src="https://img.freepik.com/free-vector/cleaning-service-concept-illustration_114360-98.jpg?w=740"
                alt="Home Service Animation">
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="../js/themeToggle.js"></script>

</body>

</html>