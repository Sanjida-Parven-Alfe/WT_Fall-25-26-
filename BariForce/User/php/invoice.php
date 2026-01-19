<?php
session_start();
require_once '../db/db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../../Admin/php/login.php");
    exit();
}

if (!isset($_GET['booking_id'])) {
    header("Location: home.php");
    exit();
}

$booking_id = $_GET['booking_id'];

$sql = "SELECT b.*, s.name as service_name, u.fullname, u.email, u.phone, u.address as user_address 
        FROM bookings b 
        JOIN services s ON b.service_id = s.id 
        JOIN users u ON b.user_id = u.id 
        WHERE b.id = $booking_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Invoice not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice #<?php echo $booking_id; ?> - BariForce</title>

    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/invoice.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="invoice-container">
        <div class="invoice-card">

            <div class="invoice-header">
                <div class="company-info">
                    <h1>BariForce.</h1>
                    <p>Your Trusted Home Service Partner</p>
                </div>
                <div class="invoice-meta">
                    <h3>INVOICE</h3>
                    <p>ID: <strong>#BF-<?php echo str_pad($data['id'], 4, '0', STR_PAD_LEFT); ?></strong></p>
                    <p>Date: <?php echo date('d M, Y'); ?></p>
                    <p>Status: <span
                            class="badge <?php echo $data['status']; ?>"><?php echo ucfirst($data['status']); ?></span>
                    </p>
                </div>
            </div>

            <div class="invoice-body">
                <div class="bill-to">
                    <h4>Bill To:</h4>
                    <p><strong><?php echo htmlspecialchars($data['fullname']); ?></strong></p>
                    <p><?php echo htmlspecialchars($data['address']); ?></p>
                    <p>Phone: <?php echo htmlspecialchars($data['phone']); ?></p>
                    <p>Email: <?php echo htmlspecialchars($data['email']); ?></p>
                </div>

                <div class="service-date">
                    <h4>Service Schedule:</h4>
                    <p><i class="far fa-calendar-alt"></i>
                        <?php echo date('d M, Y', strtotime($data['booking_date'])); ?></p>
                    <p><i class="far fa-clock"></i> <?php echo $data['booking_time']; ?></p>
                </div>
            </div>

            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Service Description</th>
                        <th>Category</th>
                        <th>Qty</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($data['service_name']); ?></td>
                        <td>Service Charge</td>
                        <td><?php echo $data['quantity']; ?></td>
                        <td class="text-right">৳ <?php echo number_format($data['total_price'], 2); ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td class="text-right amount">৳ <?php echo number_format($data['total_price'], 2); ?></td>
                    </tr>
                </tfoot>
            </table>

            <div class="invoice-footer">
                <p>Thank you for choosing BariForce!</p>
                <div class="action-buttons">
                    <button onclick="window.print()" class="btn-print"><i class="fas fa-print"></i> Print
                        Invoice</button>
                    <a href="home.php" class="btn-home">Go to Home</a>
                </div>
            </div>

        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="../js/themeToggle.js"></script>

</body>

</html>