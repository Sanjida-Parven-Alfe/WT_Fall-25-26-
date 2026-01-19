<!DOCTYPE html>
<html>
<head>
    <title>User Messages - BariForce</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/messages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    
    <?php include 'sidebar.php'; ?>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <span class="dashboard">User Support Messages</span>
            </div>
            <div class="profile-details">
                <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="Admin">
                <span class="admin_name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </nav>

        <div class="home-content">
            
            <?php if (isset($_GET['msg'])): ?>
                <?php if ($_GET['msg'] == 'deleted'): ?>
                    <div class="alert-success" style="padding: 15px; background: #d1e7dd; color: #0f5132; border-radius: 8px; margin-bottom: 20px;">
                        <i class="fas fa-check-circle"></i> Message deleted successfully!
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            
        </div>
    </section>

    <script src="../JS/dashboard.js"></script>
</body>
</html>