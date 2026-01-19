<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Service - BariForce</title>

    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/form-style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include 'sidebar.php'; ?>

    <section class="home-section">
        <nav>
            <a href="all-services.php" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back
            </a>

            <div class="sidebar-button">
                <span class="dashboard">Edit Service</span>
            </div>


            <div class="profile-details">
                <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="Admin">
                <span class="admin_name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </nav>

        <div class="home-content">

            <div class="form-container">
                <h2 class="form-title">Update Service Details</h2>

                <?php if (!empty($msg)): ?>
                    <p class="error-msg"><?php echo $msg; ?></p>
                <?php endif; ?>

                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="input-group">
                        <label>Service Name</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($service['name']); ?>" required>
                    </div>

                    <div class="input-group">
                        <label>Category</label>
                        <select name="category" required>
                            <option value="cleaning" <?php if ($service['category'] == 'cleaning') echo 'selected'; ?>>Cleaning</option>
                            <option value="electrical" <?php if ($service['category'] == 'electrical') echo 'selected'; ?>>Electrical</option>
                            <option value="plumbing" <?php if ($service['category'] == 'plumbing') echo 'selected'; ?>>Plumbing</option>
                            <option value="moving" <?php if ($service['category'] == 'moving') echo 'selected'; ?>>Moving</option>
                            <option value="painting" <?php if ($service['category'] == 'painting') echo 'selected'; ?>>Painting</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label>Base Price (Tk)</label>
                        <input type="number" name="price" value="<?php echo $service['base_price']; ?>" required>
                    </div>

                    <div class="input-group">
                        <label>Description</label>
                        <textarea name="description" rows="4" required><?php echo htmlspecialchars($service['description']); ?></textarea>
                    </div>

                    <div class="input-group">
                        <label>Service Image</label>
                        <br>
                        <img src="<?php echo htmlspecialchars($service['image_url']); ?>" id="previewImage" class="preview-img" alt="Current Image">
                        <br><br>

                        <input type="file" name="image" id="imageInput" accept="image/*">
                        <small>Leave empty to keep current image</small>
                        <input type="hidden" name="current_image" value="<?php echo $service['image_url']; ?>">
                    </div>

                    <button type="submit" class="submit-btn">Update Service</button>
                </form>
            </div>
        </div>
    </section>

    <script src="../JS/dashboard.js"></script>

    <script src="../JS/edit-service.js"></script>

</body>

</html>