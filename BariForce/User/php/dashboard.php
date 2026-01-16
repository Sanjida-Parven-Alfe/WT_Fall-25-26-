<?php
session_start();
require_once '../db/db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../../Admin/php/login.php");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
   
    <title>User Dashboard - BariForce</title>

    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <div class="dashboard-wrapper"></div>


</body>

</html>