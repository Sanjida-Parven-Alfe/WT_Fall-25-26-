<?php
session_start();
require_once '../db/db_connect.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $booking_id = $_POST['booking_id'];
    $new_status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE bookings SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $new_status, $booking_id);
    
    if ($stmt->execute()) {
        $msg = "Booking status updated to " . ucfirst($new_status);
        $msg_type = "success";
    } else {
        $msg = "Failed to update status!";
        $msg_type = "error";
    }
}

$sql = "SELECT b.*, u.fullname, u.phone, s.name as service_name 
        FROM bookings b
        JOIN users u ON b.user_id = u.id
        JOIN services s ON b.service_id = s.id
        ORDER BY b.booking_date DESC";
$result = $conn->query($sql);

require_once '../html/bookings-view.php';
?>