<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - BariForce</title>

    <link rel="stylesheet" href="../CSS/dashboard.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include 'sidebar.php'; ?>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="fas fa-bars sidebarBtn"></i>
                <span class="dashboard">Dashboard Overview</span>
            </div>

            <div class="profile-details">
                <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="Admin">
                <span class="admin_name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </nav>

        <div class="home-content">

            <div class="overview-boxes">
                <div class="box box1">
                    <div class="right-side">
                        <div class="box-topic">Total Users</div>
                        <div class="number"><?php echo $total_users; ?></div>
                        <div class="indicator">
                            <i class="fas fa-arrow-up"></i>
                            <span class="text">Active Clients</span>
                        </div>
                    </div>
                    <i class="fas fa-users cart"></i>
                </div>

                <div class="box box2">
                    <div class="right-side">
                        <div class="box-topic">Services</div>
                        <div class="number"><?php echo $total_services; ?></div>
                        <div class="indicator">
                            <i class="fas fa-arrow-up"></i>
                            <span class="text">In Categories</span>
                        </div>
                    </div>
                    <i class="fas fa-box cart"></i>
                </div>

                <div class="box box3">
                    <div class="right-side">
                        <div class="box-topic">Pending Orders</div>
                        <div class="number"><?php echo $pending_bookings; ?></div>
                        <div class="indicator">
                            <i class="fas fa-clock"></i>
                            <span class="text">Action Needed</span>
                        </div>
                    </div>
                    <i class="fas fa-clipboard-list cart"></i>
                </div>

                <div class="box box4">
                    <div class="right-side">
                        <div class="box-topic">Total Earnings</div>
                        <div class="number">৳ <?php echo number_format($total_earnings); ?></div>
                        <div class="indicator">
                            <i class="fas fa-chart-line"></i>
                            <span class="text">Revenue</span>
                        </div>
                    </div>
                    <i class="fas fa-wallet cart"></i>
                </div>
            </div>

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Recent Activity</div>
                    <div class="sales-details">
                        <div class="empty-state">
                            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" alt="No Data" width="60">
                            <p>No recent activities found.</p>
                        </div>
                    </div>
                    <div class="button">
                        <a href="bookings.php">See All Bookings</a>
                    </div>
                </div>

                <div class="top-sales box">
                    <div class="title">Top Service</div>
                    <ul class="top-sales-details">
                        <li>
                            <a href="#">
                                <img src="https://img.freepik.com/free-photo/cleaning-service-concept_1_1150-15638.jpg" alt="">
                                <span class="product">Deep Cleaning</span>
                            </a>
                            <span class="price">৳ 500</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <script src="../JS/dashboard.js"></script>

</body>

</html>