<?php
    // সেশন চেক (যদি আগে স্টার্ট না হয়ে থাকে)
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : "BariForce"; ?></title>
    
    <link rel="stylesheet" href="../CSS/<?php echo isset($css_file) ? $css_file : 'style.css'; ?>">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <nav class="navbar">
        <a href="home.php" class="logo">BariForce.</a>
        
        <div class="nav-links">
            <a href="home.php">Home</a>
            <a href="services.php">Services</a>
            <a href="apply-job.php">Join as Partner</a>
            
            <?php if(isset($_SESSION['username'])): ?>
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php" class="btn-primary">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php" class="btn-primary">Sign Up</a>
            <?php endif; ?>
        </div>
    </nav>