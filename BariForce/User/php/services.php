<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title>All Services - BariForce</title>

    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/services.css">
    <link rel="stylesheet" href="../CSS/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="service-header">
        <h1>Our Professional Services</h1>
        <p>Choose from a wide range of home services</p>

        <div class="search-container">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Search for services (e.g. Cleaning, AC Repair)..."
                onkeyup="filterServices()">
        </div>
    </div>

    <div class="filter-buttons">
        <button class="filter-btn active" onclick="filterCategory('all')">All</button>
        <button class="filter-btn" onclick="filterCategory('cleaning')">Cleaning</button>
        <button class="filter-btn" onclick="filterCategory('electrical')">Electrical</button>
        <button class="filter-btn" onclick="filterCategory('plumbing')">Plumbing</button>
        <button class="filter-btn" onclick="filterCategory('shifting')">Shifting</button>
    </div>
</body>

</html>