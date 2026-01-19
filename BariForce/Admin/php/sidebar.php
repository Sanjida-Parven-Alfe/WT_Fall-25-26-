<!DOCTYPE html>
<html>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="fas fa-shield-alt"></i>
            <span class="logo_name">BariForce</span>
        </div>
        <ul class="nav-links">

            <li style="margin-top: auto;"> <a href="../../User/php/home.php">
                    <i class="fas fa-home"></i>
                    <span class="links_name">Back to Home</span>
                </a>
            </li>

            <li>
                <a href="dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                    <i class="fas fa-th-large"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="all-services.php">
                    <i class="fas fa-box-open"></i>
                    <span class="links_name">Services</span>
                </a>
            </li>
            <li>
                <a href="bookings.php">
                    <i class="fas fa-calendar-check"></i>
                    <span class="links_name">Bookings</span>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <i class="fas fa-users"></i>
                    <span class="links_name">Users</span>
                </a>
            </li>
            <li>
                <a href="job-requests.php">
                    <i class="fas fa-briefcase"></i>
                    <span class="links_name">Job Requests</span>
                </a>
            </li>
            <li>
                <a href="reviews.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'reviews.php' ? 'active' : ''; ?>">
                    <i class='fas fa-comments'></i>
                    <span class="links_name">Reviews</span>
                </a>
            </li>
            <li class="log_out">
                <a href="../../User/php/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
</body>

</html>