<!DOCTYPE html>
<html>

<body>
    <aside class="sidebar">
        <div class="profile-section">
            <div class="img-box">
                <img src="<?php echo !empty($user['image']) ? $user['image'] : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png'; ?>"
                    alt="User">
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
                <a href="dashboard.php"
                    class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                    <i class="fas fa-th-large"></i> Overview
                </a>
            </li>
            <li>
                <a href="dashboard.php?page=bookings"
                    class="nav-link <?php echo $page == 'bookings' ? 'active' : ''; ?>">
                    <i class="fas fa-calendar-check"></i> My Bookings
                </a>
            </li>
            <li>
                <a href="dashboard.php?page=profile" class="nav-link">
                    <i class="fas fa-user-edit"></i> Edit Profile
                </a>
            </li>
            <li>
                <a href="dashboard.php?page=password" class="nav-link">
                    <i class="fas fa-lock"></i> Change Password
                </a>
            </li>
            <li>
                <a href="dashboard.php?page=support" class="nav-link">
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
</body>

</html>