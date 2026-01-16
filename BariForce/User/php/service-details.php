<?php

session_start();

require_once '../db/db_connect.php';



if (isset($_GET['id'])) {

    $service_id = $_GET['id'];

    $sql = "SELECT * FROM services WHERE id = $service_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $service = $result->fetch_assoc();

    } else {

        echo "Service not found!"; 

        exit();

    }

} else {

    

    header("Location: home.php");

    exit();

}

?>

<!DOCTYPE html>
<html>

<head>

    <title><?php echo htmlspecialchars($service['name']); ?> - BariForce</title>

    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/service-details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="service-hero"
        style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo $service['image_url']; ?>');">
        <div class="hero-content">
            <h1><?php echo htmlspecialchars($service['name']); ?></h1>
            <div class="rating-badge">
                <i class="fas fa-star"></i> <?php echo $service['rating']; ?> / 5.0 (120 Reviews)
            </div>
        </div>
    </div>

    <div class="details-container">
        <div class="details-wrapper">

            <div class="details-left">
                <div class="section-box">
                    <h2>Description</h2>
                    <p><?php echo nl2br(htmlspecialchars($service['description'])); ?></p>
                </div>

                <div class="section-box">
                    <h2>What's Included?</h2>
                    <ul class="feature-list">
                        <?php



                        $features = explode(',', $service['features']);

                        foreach ($features as $feature):

                            ?>
                            <li><i class="fas fa-check-circle"></i> <?php echo trim($feature); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
