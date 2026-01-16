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
    <aside class="sidebar">
        <div class="profile-section">
            <div class="img-box">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User">
            </div>
            <h3>
                <?php echo htmlspecialchars($user['fullname']); ?>
            </h3>
            <p>Edit Profile</p>
        </div>

        <ul class="nav-menu">
            <li><a href="home.php" class="nav-link home-btn"><i class="fas fa-arrow-left"></i> Back to Home</a></li>
            <li class="menu-spacer"></li>
            <li><a href="dashboard.php" class="nav-link"><i class="fas fa-th-large"></i> Overview</a></li>
            <li><a href="#" class="nav-link"><i class="fas fa-calendar-check"></i> My Bookings</a></li>
            <li><a href="profile.php" class="nav-link active"><i class="fas fa-user-edit"></i> Edit Profile</a></li>
            <li><a href="#" class="nav-link"><i class="fas fa-headset"></i> Support</a></li>
        </ul>

        <div class="logout-section">
            <a href="logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </aside>
</body>

</html>