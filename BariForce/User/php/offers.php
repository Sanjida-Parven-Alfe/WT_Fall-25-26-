<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>

    <title>Exclusive Offers - BariForce</title>

    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/offers.css">
    <link rel="stylesheet" href="../CSS/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="offer-header">
        <h1>Exclusive Deals & Discounts</h1>
        <p>Save big on your favorite home services. Grab the codes now!</p>
    </div>

    <div class="offers-container">

        <div class="offer-card gradient-blue">
            <div class="offer-icon"><i class="fas fa-gift"></i></div>
            <div class="offer-details">
                <span class="badge">New User</span>
                <h3>Flat 20% OFF</h3>
                <p>Get flat 20% off on your first booking of any service.</p>
                <div class="coupon-box">
                    <span id="code1" class="code-text">WELCOME20</span>
                    <button onclick="copyCode('code1', this)" class="copy-btn">Copy Code</button>
                </div>
                <small>Valid till: 30th Jan 2026</small>
            </div>
        </div>

        <div class="offer-card gradient-green">
            <div class="offer-icon"><i class="fas fa-broom"></i></div>
            <div class="offer-details">
                <span class="badge">Cleaning</span>
                <h3>Save $10</h3>
                <p>Save $10 on Home Deep Cleaning service above $100.</p>
                <div class="coupon-box">
                    <span id="code2" class="code-text">CLEAN10</span>
                    <button onclick="copyCode('code2', this)" class="copy-btn">Copy Code</button>
                </div>
                <small>Valid till: 15th Feb 2026</small>
            </div>
        </div>

        <div class="offer-card gradient-purple">
            <div class="offer-icon"><i class="fas fa-bolt"></i></div>
            <div class="offer-details">
                <span class="badge">Weekend Deal</span>
                <h3>15% Discount</h3>
                <p>Get 15% discount on Electrical & Plumbing services this weekend.</p>
                <div class="coupon-box">
                    <span id="code3" class="code-text">WEEKEND15</span>
                    <button onclick="copyCode('code3', this)" class="copy-btn">Copy Code</button>
                </div>
                <small>Expiring Soon!</small>
            </div>
        </div>

        <div class="offer-card gradient-orange">
            <div class="offer-icon"><i class="fas fa-mobile-alt"></i></div>
            <div class="offer-details">
                <span class="badge">App Only</span>
                <h3>Free Service Charge</h3>
                <p>Zero service charge on orders via our upcoming mobile app.</p>
                <div class="coupon-box">
                    <span id="code4" class="code-text">APPFREE</span>
                    <button onclick="copyCode('code4', this)" class="copy-btn">Copy Code</button>
                </div>
                <small>Coming Soon</small>
            </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>

    <script src="../js/themeToggle.js"></script>

    <script src="../js/offers.js"></script>


</body>

</html>