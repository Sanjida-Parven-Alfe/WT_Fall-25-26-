<!DOCTYPE html>
<html>

<head>

    <title>User Dashboard - BariForce</title>

    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <div class="dashboard-wrapper">

        <?php include 'sidebar.php'; ?>

        <main class="main-content">
            <?php

            if ($page == 'profile') {
                include 'edit-profile-view.php';
            } elseif ($page == 'password') {
                include 'change-password-view.php';
            } elseif ($page == 'support') {
                include 'support-view.php';
            } elseif ($page == 'bookings') {
                include 'my-bookings-view.php';
            } else {
                ?>

                <div class="welcome-banner">
                    <div class="banner-text">
                        <h1>Hello, <?php echo htmlspecialchars($user['username']); ?>! 👋</h1>
                        <p>Welcome back to your service dashboard.</p>
                    </div>
                    <a href="services.php" class="new-service-btn">+ New Service</a>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="icon-box pending-icon"><i class="fas fa-clock"></i></div>
                        <div class="stat-info">
                            <h2><?php echo str_pad($pending_count, 2, '0', STR_PAD_LEFT); ?></h2>
                            <p>Pending</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="icon-box active-icon"><i class="fas fa-tools"></i></div>
                        <div class="stat-info">
                            <h2><?php echo str_pad($active_count, 2, '0', STR_PAD_LEFT); ?></h2>
                            <p>Active</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="icon-box done-icon"><i class="fas fa-check-circle"></i></div>
                        <div class="stat-info">
                            <h2><?php echo str_pad($done_count, 2, '0', STR_PAD_LEFT); ?></h2>
                            <p>Completed</p>
                        </div>
                    </div>
                </div>

                <div class="table-section">
                    <div class="table-header">
                        <h3>Recent Activity</h3>
                       
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
                            <?php if ($recent_bookings->num_rows > 0): ?>
                                <?php while ($row = $recent_bookings->fetch_assoc()): ?>
                                    <tr>
                                        <td>
                                            <i class="fas fa-wrench service-icon"></i>
                                            <?php echo htmlspecialchars($row['service_name']); ?>
                                        </td>
                                        <td><?php echo date('d M, Y', strtotime($row['booking_date'])); ?></td>
                                        <td>
                                            <?php

                                            $statusClass = 'badge-pending';
                                            if ($row['status'] == 'confirmed')
                                                $statusClass = 'badge-success';
                                            elseif ($row['status'] == 'cancelled')
                                                $statusClass = 'badge-cancel';
                                            elseif ($row['status'] == 'completed')
                                                $statusClass = 'badge-success';
                                            ?>
                                            <span class="badge <?php echo $statusClass; ?>">
                                                <?php echo ucfirst($row['status']); ?>
                                            </span>
                                        </td>
                                        <td>৳ <?php echo number_format($row['total_price']); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" style="text-align:center; color:#888; padding: 20px;">
                                        No bookings found. <a href="services.php">Book a service now!</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            <?php } ?>
        </main>
    </div>
    <script src="../JS/dashboard.js"></script>

</body>

</html>