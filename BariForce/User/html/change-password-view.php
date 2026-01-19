<link rel="stylesheet" href="../CSS/change-password.css">

<div class="content-wrapper">
    <div class="section-header">
        <h2>Change Password</h2>
    </div>

    <?php if ($pass_msg): ?>
        <div class="alert <?php echo $pass_msg_type; ?>">
            <?php echo $pass_msg; ?>
        </div>
    <?php endif; ?>

    <div class="form-container">
        <form method="POST" action="dashboard.php?page=password" id="passForm">
            <div class="input-group">
                <label>Current Password</label>
                <input type="password" name="current_pass" required>
            </div>
            <div class="input-group">
                <label>New Password</label>
                <input type="password" name="new_pass" id="new_pass" required>
            </div>
            <div class="input-group">
                <label>Confirm New Password</label>
                <input type="password" name="confirm_pass" id="confirm_pass" required>
            </div>
            <small id="matchError" class="error-text"></small>
            <button type="submit" name="change_password" class="btn-dark">Update Password</button>
        </form>
    </div>
</div>
<script src="../js/change-password.js"></script>