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
    <div class="services-container">

        <div class="service-card" data-category="cleaning">
            <div class="card-img">
                <img src="https://img.freepik.com/free-photo/cleaning-service-concept_1_1150-15638.jpg?w=740"
                    alt="Home Cleaning">
            </div>
            <div class="card-content">
                <div class="rating"><i class="fas fa-star"></i> 4.8 (120 Reviews)</div>
                <h3>Home Deep Cleaning</h3>
                <p>Full home deep cleaning service with professional equipment.</p>
                <div class="card-footer">
                    <span class="price">Starts $50</span>
                    <a href="booking.php?service=cleaning" class="book-btn">Book Now</a>
                </div>
            </div>
        </div>

        <div class="service-card" data-category="electrical">
            <div class="card-img">
                <img src="https://img.freepik.com/free-photo/electrician-working-switchboard_1_1150-15638.jpg?w=740"
                    alt="Electrician">
            </div>
            <div class="card-content">
                <div class="rating"><i class="fas fa-star"></i> 4.9 (85 Reviews)</div>
                <h3>Electrical Repair</h3>
                <p>Fixing switchboards, fans, lights, and wiring issues.</p>
                <div class="card-footer">
                    <span class="price">Starts $20</span>
                    <a href="booking.php?service=electrical" class="book-btn">Book Now</a>
                </div>
            </div>
        </div>

        <div class="service-card" data-category="plumbing">
            <div class="card-img">
                <img src="https://img.freepik.com/free-photo/plumber-fixing-white-sink-pipe-with-adjustable-wrench_169016-143… alt="
                    Plumbing">
            </div>
            <div class="card-content">
                <div class="rating"><i class="fas fa-star"></i> 4.7 (90 Reviews)</div>
                <h3>Plumbing Service</h3>
                <p>Leakage repair, pipe fitting, and basin installation.</p>
                <div class="card-footer">
                    <span class="price">Starts $30</span>
                    <a href="booking.php?service=plumbing" class="book-btn">Book Now</a>
                </div>
            </div>
        </div>

        <div class="service-card" data-category="cleaning">
            <div class="card-img">
                <img src="https://img.freepik.com/free-photo/man-polishing-car-garage_1157-26053.jpg?w=740"
                    alt="Car Wash">
            </div>
            <div class="card-content">
                <div class="rating"><i class="fas fa-star"></i> 5.0 (200 Reviews)</div>
                <h3>Car Wash & Polish</h3>
                <p>Premium car foam wash and polishing at your doorstep.</p>
                <div class="card-footer">
                    <span class="price">Starts $40</span>
                    <a href="booking.php?service=carwash" class="book-btn">Book Now</a>
                </div>
            </div>
        </div>

        <div class="service-card" data-category="shifting">
            <div class="card-img">
                <img src="https://img.freepik.com/free-photo/delivery-concept-handsome-african-american-delivery-man-carrying… alt="
                    Shifting">
            </div>
            <div class="card-content">
                <div class="rating"><i class="fas fa-star"></i> 4.6 (50 Reviews)</div>
                <h3>House Shifting</h3>
                <p>Hassle-free house and office shifting service.</p>
                <div class="card-footer">
                    <span class="price">Custom Price</span>
                    <a href="booking.php?service=shifting" class="book-btn">Book Now</a>
                </div>
            </div>
        </div>

    </div>
</body>

</html>