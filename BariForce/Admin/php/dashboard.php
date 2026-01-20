<?php
session_start();
require_once '../db/db_connect.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$user_query = $conn->query("SELECT COUNT(*) as count FROM users WHERE role='user'");
$total_users = $user_query->fetch_assoc()['count'];

$service_query = $conn->query("SELECT COUNT(*) as count FROM services");
$total_services = $service_query->fetch_assoc()['count'];

$booking_res = $conn->query("SELECT COUNT(*) as count FROM bookings WHERE status='pending'");
$pending_bookings = ($booking_res) ? $booking_res->fetch_assoc()['count'] : 0;

$earning_res = $conn->query("SELECT SUM(total_price) as total FROM bookings WHERE status='completed'");
$row = ($earning_res) ? $earning_res->fetch_assoc() : ['total' => 0];
$total_earnings = $row['total'] ?? 0;

require_once '../html/dashboard-view.php';
