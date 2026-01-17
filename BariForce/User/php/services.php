<?php

session_start();
require_once '../db/db_connect.php';

$sql = "SELECT * FROM services";
$result = $conn->query($sql);

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

        <?php

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                ?>

                <div class="service-card" data-category="<?php echo strtolower($row['category']); ?>">

                    <div class="card-img">
                        <img src="<?php echo htmlspecialchars($row['image_url']); ?>"
                            alt="<?php echo htmlspecialchars($row['name']); ?>">
                    </div>

                    <div class="card-content">
                        <div class="rating">
                            <i class="fas fa-star"></i> <?php echo $row['rating']; ?> (100+ Reviews)
                        </div>

                        <h3><?php echo htmlspecialchars($row['name']); ?></h3>

                        <p><?php echo htmlspecialchars(substr($row['description'], 0, 80)) . '...'; ?></p>

                        <div class="card-footer">
                            <span class="price">Starts ৳<?php echo $row['base_price']; ?></span>

                            <a href="service-details.php?id=<?php echo $row['id']; ?>" class="book-btn">
                                View Details <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <?php
            }
        } else {

            echo "<p style='text-align:center; width:100%; color: #666;'>No services found available at the moment.</p>";
        }
        ?>

    </div>
    <?php include 'footer.php'; ?>

    <script src="../js/themeToggle.js"></script>
    <script src="../js/services.js"></script>

</body>

</html>