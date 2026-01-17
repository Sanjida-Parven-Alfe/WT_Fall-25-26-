<?php
session_start();
require_once '../db/db_connect.php';


if (!isset($_SESSION['username'])) {
    header("Location: ../../Admin/php/login.php");
    exit();
}


$username = $_SESSION['username'];
$user_query = $conn->query("SELECT * FROM users WHERE username = '$username'");
$user = $user_query->fetch_assoc();
$user_id = $user['id'];

if (!isset($_GET['service_id'])) {
    header("Location: services.php");
    exit();
}

$service_id = $_GET['service_id'];
$qty = isset($_GET['qty']) ? (int) $_GET['qty'] : 1;

$service_res = $conn->query("SELECT * FROM services WHERE id = $service_id");
$service = $service_res->fetch_assoc();
$total_calculated = $service['base_price'] * $qty;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $address = $_POST['address'];
    $final_qty = $_POST['final_qty'];
    $final_price = $_POST['final_price'];


    $stmt = $conn->prepare("INSERT INTO bookings (user_id, service_id, booking_date, booking_time, address, quantity, total_price, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("iisssid", $user_id, $service_id, $date, $time, $address, $final_qty, $final_price);

    if ($stmt->execute()) {
        $last_id = $stmt->insert_id;

        header("Location: invoice.php?booking_id=$last_id");
        exit();
    } else {
        echo "<script>alert('Booking Failed! Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Checkout - BariForce</title>

    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="booking-wrapper">

        <div class="page-header">
            <h1><i class="fas fa-shopping-bag"></i> Secure Checkout</h1>
            <p>Complete your booking to get expert service</p>
        </div>
        <form method="POST" action="" class="checkout-grid">

            <div class="form-section">

                <div class="input-card">
                    <h3><span class="step">1</span> Schedule Service</h3>
                    <div class="row">
                        <div class="input-group">
                            <label>Select Date</label>
                            <input type="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="input-group">
                            <label>Preferred Time</label>
                            <select name="time" required>
                                <option value="">Select a Slot</option>
                                <option value="09:00 AM - 11:00 AM">Morning (9 AM - 11 AM)</option>
                                <option value="12:00 PM - 02:00 PM">Noon (12 PM - 2 PM)</option>
                                <option value="04:00 PM - 06:00 PM">Afternoon (4 PM - 6 PM)</option>
                                <option value="07:00 PM - 09:00 PM">Evening (7 PM - 9 PM)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="input-card">
                    <h3><span class="step">2</span> Location Details</h3>
                    <div class="input-group">
                        <label>Service Address</label>
                        <textarea name="address" rows="3" required placeholder="House No, Road, Area..."
                            class="addr-box"><?php echo htmlspecialchars($user['address'] ?? ''); ?></textarea>
                    </div>
                    <div class="info-badge">
                        <i class="fas fa-phone-alt"></i> We will contact you at: <strong>
                            <?php echo $user['mobile'] ?? 'N/A'; ?>
                        </strong>
                    </div>
                </div>
                <div class="input-card">
                    <h3><span class="step">3</span> Payment Method</h3>
                    <div class="payment-methods">
                        <label class="pay-option selected">
                            <input type="radio" name="payment" value="cod" checked>
                            <div class="pay-content">
                                <i class="fas fa-money-bill-wave icon"></i>
                                <span>Cash After Service</span>
                            </div>
                            <i class="fas fa-check-circle check-icon"></i>
                        </label>

                        <label class="pay-option disabled">
                            <input type="radio" name="payment" value="bkash" disabled>
                            <div class="pay-content">
                                <i class="fas fa-credit-card icon"></i>
                                <span>Online Payment <small>(Coming Soon)</small></span>
                            </div>
                        </label>
                    </div>
                </div>

            </div>

            <div class="summary-section">
                <div class="summary-card">
                    <h3>Order Summary</h3>

                    <div class="service-preview">
                        <img src="<?php echo $service['image_url']; ?>" alt="Service Image">
                        <div class="svc-info">
                            <h4>
                                <?php echo $service['name']; ?>
                            </h4>
                            <span class="category-tag">
                                <?php echo strtoupper($service['category']); ?>
                            </span>
                        </div>
                    </div>
                    <div class="price-breakdown">
                        <div class="line-item">
                            <span>Base Price</span>
                            <span>৳ <?php echo number_format($service['base_price'], 2); ?></span>
                        </div>
                        <div class="line-item">
                            <span>Quantity / Unit</span>
                            <span>x <?php echo $qty; ?></span>
                        </div>
                        <div class="line-item discount">
                            <span>Platform Fee</span>
                            <span>৳ 0.00</span>
                        </div>
                        <div class="divider"></div>
                        <div class="line-item total">
                            <span>Total Payable</span>
                            <span class="amount">৳ <?php echo number_format($total_calculated, 2); ?></span>
                        </div>
                    </div>

                    <input type="hidden" name="final_qty" value="<?php echo $qty; ?>">
                    <input type="hidden" name="final_price" value="<?php echo $total_calculated; ?>">

                    <button type="submit" class="confirm-btn">
                        Confirm Booking <i class="fas fa-arrow-right"></i>
                    </button>

                    <p class="security-note"><i class="fas fa-shield-alt"></i> SSL Secured Checkout</p>
                </div>
            </div>

        </form>
    </div>

    <?php include 'footer.php'; ?>
    <script src="../js/themeToggle.js"></script>


</body>

</html>