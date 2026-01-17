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
    <aside class="sidebar">
        <div class="profile-section">
            <div class="img-box">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User">
            </div>
            <h3>
                <?php echo htmlspecialchars($user['fullname']); ?>
            </h3>
            <p>User Dashboard</p>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="home.php" class="nav-link home-btn">
                    <i class="fas fa-arrow-left"></i> Back to Home
                </a>
            </li>

            <li class="menu-spacer"></li>

            <li>
                <a href="#" class="nav-link active">
                    <i class="fas fa-th-large"></i> Overview
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="fas fa-calendar-check"></i> My Bookings
                </a>
            </li>
            <li>
                <a href="profile.php" class="nav-link">
                    <i class="fas fa-user-edit"></i> Edit Profile
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="fas fa-lock"></i> Change Password
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="fas fa-headset"></i> Support
                </a>
            </li>
        </ul>

        <div class="logout-section">
            <a href="logout.php" class="logout-link">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
    <main class="main-content">

        <div class="welcome-banner">
            <div class="banner-text">
                <h1>Hello,
                    <?php echo htmlspecialchars($user['username']); ?>! 👋
                </h1>
                <p>Welcome back to your service dashboard.</p>
            </div>
            <button class="new-service-btn">+ New Service</button>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="icon-box pending-icon"><i class="fas fa-clock"></i></div>
                <div class="stat-info">
                    <h2>02</h2>
                    <p>Pending</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="icon-box active-icon"><i class="fas fa-tools"></i></div>
                <div class="stat-info">
                    <h2>01</h2>
                    <p>Active</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="icon-box done-icon"><i class="fas fa-check-circle"></i></div>
                
                <div class="stat-info">
                 
                <h2>05</h2>
                 
                    <p>Done</p>
                
                </div>
            <
            div>
        </div>
        <div class="table-section">
                <div class="table-header">
                    <h3>Recent Activity</h3>
                    <a href="#">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="fas fa-broom service-icon"></i> Home Cleaning</td>
                            <td>15 Jan, 2026</td>
                            <td><span class="badge badge-pending">Pending</span></td>
                            <td>৳ 500</td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-bolt service-icon"></i> Electrical Repair</td>
                            <td>10 Jan, 2026</td>
                            <td><span class="badge badge-success">Completed</span></td>
                            <td>৳ 350</td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-paint-roller service-icon"></i> Wall Painting</td>
                            <td>05 Jan, 2026</td>
                            <td><span class="badge badge-cancel">Cancelled</span></td>
                            <td>৳ 0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
 
        </main>
    </div>
 
    <?php include 'footer.php'; ?>
   
    <script src="../JS/dashboard.js"></script>
    <script src="../js/themeToggle.js"></script>
 
</body>
</html>