<?php
session_start();
require_once '../db/db_connect.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        header("Location: reviews.php?msg=deleted");
    } else {
        header("Location: reviews.php?msg=error");
    }
    exit();
}

$sql = "SELECT r.*, u.fullname, s.name as service_name 
        FROM reviews r
        JOIN users u ON r.user_id = u.id
        JOIN services s ON r.service_id = s.id
        ORDER BY r.created_at DESC";

$result = $conn->query($sql);

require_once '../html/reviews-view.php';
