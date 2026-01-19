<!DOCTYPE html>
<html>
<head>
    <title>Manage Reviews - BariForce</title>
    
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/reviews.css"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    
    <?php include 'sidebar.php'; ?>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <span class="dashboard">User Feedback</span>
            </div>
            <div class="profile-details">
                <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="Admin">
                <span class="admin_name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </nav>

        <div class="home-content">
            
            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
                <div class="alert-success">Review deleted successfully!</div>
            <?php endif; ?>

            <div class="review-grid">
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="review-card">
                            <div class="card-header">
                                <div class="user-details">
                                    <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="User">
                                    <div>
                                        <h4><?php echo htmlspecialchars($row['fullname']); ?></h4>
                                        <small>Service: <?php echo htmlspecialchars($row['service_name']); ?></small>
                                    </div>
                                </div>
                                <div class="rating">
                                    <?php 
                                    for($i = 0; $i < 5; $i++) {
                                        if($i < $row['rating']) {
                                            echo '<i class="fas fa-star filled"></i>';
                                        } else {
                                            echo '<i class="far fa-star empty"></i>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <i class="fas fa-quote-left quote-icon"></i>
                                <p>"<?php echo htmlspecialchars($row['comment']); ?>"</p>
                            </div>

                            <div class="card-footer">
                                <span class="date">
                                    <i class="far fa-clock"></i> 
                                    <?php echo date('d M, Y', strtotime($row['created_at'])); ?>
                                </span>
                                
                                <a href="reviews.php?delete_id=<?php echo $row['id']; ?>" class="btn-delete" title="Delete Review">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="no-data">No reviews found yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <script src="../JS/dashboard.js"></script>
    <script src="../JS/reviews.js"></script>

</body>
</html>