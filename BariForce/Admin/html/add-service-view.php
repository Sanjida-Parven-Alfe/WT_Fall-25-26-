<!DOCTYPE html>
<html>

<head>
    <title>Add New Service - BariForce</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/add-service.css">
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
                <span class="dashboard">Add Service</span>
            </div>

            <div class="profile-details">
                <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="Admin">
                <span class="admin_name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </nav>

        <div class="home-content">

            <div class="form-container">
                <h2 class="form-title">Create New Service</h2>

                <?php if (!empty($msg)): ?>
                    <p class="error-msg"><?php echo $msg; ?></p>
                <?php endif; ?>

                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="input-group">
                        <label>Service Name</label>
                        <input type="text" name="name"
                            value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"
                            placeholder="e.g. Sofa Cleaning" required>
                    </div>

                    <div class="input-group">
                        <label>Category</label>
                        <select name="category" required>
                            <option value="" disabled selected>Select Category</option>
                            <option value="cleaning" <?php if (isset($_POST['category']) && $_POST['category'] == 'cleaning') echo 'selected'; ?>>Cleaning</option>
                            <option value="electrical" <?php if (isset($_POST['category']) && $_POST['category'] == 'electrical') echo 'selected'; ?>>Electrical</option>
                            <option value="plumbing" <?php if (isset($_POST['category']) && $_POST['category'] == 'plumbing') echo 'selected'; ?>>Plumbing</option>
                            <option value="moving" <?php if (isset($_POST['category']) && $_POST['category'] == 'moving') echo 'selected'; ?>>Moving</option>
                            <option value="painting" <?php if (isset($_POST['category']) && $_POST['category'] == 'painting') echo 'selected'; ?>>Painting</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label>Base Price (Tk)</label>
                        <input type="number" name="price"
                            value="<?php echo isset($_POST['price']) ? htmlspecialchars($_POST['price']) : ''; ?>"
                            placeholder="e.g. 500" required>
                    </div>

                    <div class="input-group">
                        <label>Description</label>
                        <textarea name="description" rows="4" placeholder="Write details about the service..." required><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
                    </div>

                    <div class="input-group">
                        <label>Service Image</label>

                        <div id="previewContainer" style="display: none; margin-bottom: 10px;">
                            <img id="previewImage" class="preview-img" src="" alt="Preview">
                        </div>

                        <input type="file" name="image" id="imageInput" accept="image/*" required>
                    </div>

                    <button type="submit" class="submit-btn">Add Service</button>
                </form>
            </div>
        </div>
    </section>

    <script src="../JS/dashboard.js"></script>
    <script src="../JS/add-service.js"></script>

</body>

</html>