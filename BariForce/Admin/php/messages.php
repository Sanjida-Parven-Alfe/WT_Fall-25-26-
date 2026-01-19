<?php
session_start();
require_once '../../User/db/db_connect.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM support_tickets WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        header("Location: messages.php?msg=deleted");
    } else {
        header("Location: messages.php?msg=error");
    }
    exit();
}

$sql = "SELECT s.*, u.fullname, u.email, u.phone 
        FROM support_tickets s 
        JOIN users u ON s.user_id = u.id 
        ORDER BY s.created_at DESC";
$result = $conn->query($sql);

require_once '../html/messages-view.php';
