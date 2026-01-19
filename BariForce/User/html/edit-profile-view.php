<link rel="stylesheet" href="../CSS/edit-profile.css">

<div class="content-wrapper">
    <div class="section-header">
        <h2>Edit Profile</h2>
    </div>

    <?php if ($msg): ?>
        <div class="alert <?php echo $msg_type; ?>">
            <?php echo $msg; ?>
        </div>
    <?php endif; ?>

    <div class="form-container">
        <form method="POST" action="dashboard.php?page=profile">
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>" required>
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled class="disabled">
            </div>
            <div class="input-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile"
                    value="<?php echo htmlspecialchars($user['mobile'] ?? $user['phone'] ?? ''); ?>" required>
            </div>

            <div class="input-group">
                <label>Address</label>
                <textarea name="address" rows="3"
                    required><?php echo htmlspecialchars($user['address'] ?? $user['location'] ?? ''); ?></textarea>
            </div>
            <button type="submit" name="update_profile" class="btn-primary">Save Changes</button>
        </form>
    </div>
</div>
<script src="../js/edit-profile.js"></script>