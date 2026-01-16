<?php

session_start();

require_once '../db/db_connect.php';

// লগইন চেক

if (!isset($_SESSION['username'])) {

    header("Location: ../../Admin/php/login.php");

    exit();

}

$username = $_SESSION['username'];

$msg = "";

$msg_type = "";

// ডাটা আপডেট করার লজিক

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fullname = $_POST['fullname'];

    $email = $_POST['email'];

    $phone = $_POST['phone']; // ডাটাবেসে phone কলাম থাকতে হবে

    $address = $_POST['address']; // ডাটাবেসে address কলাম থাকতে হবে

    // Update Query

    $update_sql = "UPDATE users SET fullname=?, email=?, phone=?, address=? WHERE username=?";

    $stmt = $conn->prepare($update_sql);

    $stmt->bind_param("sssss", $fullname, $email, $phone, $address, $username);

    if ($stmt->execute()) {

        $msg = "Profile updated successfully!";

        $msg_type = "success";

    } else {

        $msg = "Something went wrong!";

        $msg_type = "error";

    }

}

// বর্তমান ডাটা আনা

$sql = "SELECT * FROM users WHERE username = '$username'";

$result = $conn->query($sql);

$user = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Profile - BariForce</title>

    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <div class="dashboard-wrapper"></div>
</body>

</html>