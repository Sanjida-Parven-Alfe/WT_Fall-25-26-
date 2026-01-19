<?php
session_start();
require_once '../db/db_connect.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    if ($_SESSION['username'] == getUsernameById($conn, $delete_id)) {
        header("Location: users.php?msg=self_delete_error");
        exit();
    }

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    
    if ($stmt->execute()) {
        header("Location: users.php?msg=deleted");
    } else {
        header("Location: users.php?msg=error");
    }
    exit();
}

function getUsernameById($conn, $id) {
    $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        return $row['username'];
    }
    return null;
}

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);

require_once '../html/users-view.php';
?>