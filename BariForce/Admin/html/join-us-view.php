<!DOCTYPE html>
<html>
<head>
    <title>Join BariForce Team</title>
    
    <link rel="stylesheet" href="../../User/CSS/navbar.css">
    <link rel="stylesheet" href="../../User/CSS/footer.css">
    
    <link rel="stylesheet" href="../CSS/join-us.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include '../../User/php/navbar.php'; ?>

    <section class="join-container">
        <div class="join-card">
            <div class="card-header">
                <h2>Start Your Career</h2>
                <p>Join BariForce and become a hero!</p>
            </div>

            <?php if ($msg): ?>
                <div class="alert <?php echo $msg_type; ?>">
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data" id="joinForm">
                
                <div class="form-group">
                    <label>Applying For</label>
                    <div class="select-wrapper">
                        <select name="position" id="position" required>
                            <option value="" disabled selected>Select a Position</option>
                            <option value="Cleaner">Professional Cleaner</option>
                            <option value="Electrician">Expert Electrician</option>
                            <option value="Plumber">Plumber</option>
                            <option value="Painter">Painter</option>
                            <option value="Mover">Mover & Packer</option>
                        </select>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label>Upload Resume / CV</label>
                    <div class="file-upload">
                        <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx,.jpg,.png" required>
                        <div class="file-dummy">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span id="fileName">Choose a file (PDF, DOC, JPG)</span>
                        </div>
                    </div>
                    <small id="fileError" class="error-text"></small>
                </div>

                <button type="submit" class="btn-submit">Submit Application</button>
            </form>
        </div>
    </section>

    <script src="../JS/join-us.js"></script>
    <script src="../../User/js/themeToggle.js"></script>

    <?php include '../../User/php/footer.php'; ?>
    
</body>
</html>