<!DOCTYPE html>
<html>
<head>
    <title>Manage Services - BariForce</title>
    
    <link rel="stylesheet" href="../CSS/dashboard.css">
    
    <link rel="stylesheet" href="../CSS/services.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    
    <?php include 'sidebar.php'; ?>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <span class="dashboard">Manage Services</span>
            </div>
            
            <a href="add-service.php" class="add-btn">
                <i class="fas fa-plus"></i> Add New Service
            </a>

            <div class="profile-details">
                <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="Admin">
                <span class="admin_name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </nav>

        <div class="home-content">
            
            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i> Service deleted successfully!
                </div>
            <?php endif; ?>

            <div class="services-grid">
                
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="service-card">
                            <div class="card-image">
                                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="Service Image">
                                <span class="category-badge"><?php echo ucfirst($row['category']); ?></span>
                            </div>
                            
                            <div class="card-details">
                                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                                <p><?php echo substr(htmlspecialchars($row['description']), 0, 60) . '...'; ?></p>
                                
                                <div class="card-footer">
                                    <span class="price">৳ <?php echo $row['base_price']; ?></span>
                                    <div class="actions">
                                        <a href="edit-service.php?id=<?php echo $row['id']; ?>" class="btn-edit" title="Edit Service">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <a href="all-services.php?delete_id=<?php echo $row['id']; ?>" class="btn-delete" title="Delete Service">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="no-data">
                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" alt="No Data" width="60">
                        <p>No services found. Click "Add New Service" to create one.</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <script src="../JS/dashboard.js"></script>
    
    <script src="../JS/services.js"></script>

</body>
</html>