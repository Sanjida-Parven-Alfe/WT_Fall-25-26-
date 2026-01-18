<?php
session_start();
require_once '../../User/db/db_connect.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $conn->query("DELETE FROM services WHERE id = $id");
    header("Location: all-services.php?msg=deleted");
    exit();
}

$sql = "SELECT * FROM services ORDER BY id DESC";
$result = $conn->query($sql);

require_once '../html/all-services-view.php';
?>