<?php

session_start();

require_once '../db/db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../../Admin/php/login.php");
    exit();
}

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    header("Location: ../../Admin/php/dashboard.php");
    exit();
}

$username = $_SESSION['username'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$user_id = $user['id'];
$p_query = $conn->query("SELECT COUNT(*) as count FROM bookings WHERE user_id = $user_id AND status = 'pending'");
$pending_count = $p_query->fetch_assoc()['count'];

$a_query = $conn->query("SELECT COUNT(*) as count FROM bookings WHERE user_id = $user_id AND status = 'confirmed'");
$active_count = $a_query->fetch_assoc()['count'];

$c_query = $conn->query("SELECT COUNT(*) as count FROM bookings WHERE user_id = $user_id AND status = 'completed'");
$done_count = $c_query->fetch_assoc()['count'];

$recent_sql = "SELECT b.*, s.name as service_name FROM bookings b JOIN services s ON b.service_id = s.id WHERE b.user_id = $user_id ORDER BY b.booking_date DESC LIMIT 5";
$recent_bookings = $conn->query($recent_sql);

$page = isset($_GET['page']) ? $_GET['page'] : 'overview';
require_once '../html/dashboard-view.php';

?>