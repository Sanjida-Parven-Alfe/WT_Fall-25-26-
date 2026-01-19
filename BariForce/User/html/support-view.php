<link rel="stylesheet" href="../CSS/support.css">

<div class="content-wrapper">
    <div class="section-header">
        <h2>Contact Support</h2>
        <p>Need help? Send us a message.</p>
    </div>

    <?php if ($sup_msg): ?>
        <div class="alert <?php echo $sup_msg_type; ?>">
            <?php echo $sup_msg; ?>
        </div>
    <?php endif; ?>

    <div class="form-container">
        <form method="POST" action="dashboard.php?page=support">
            <div class="input-group">
                <label>Subject</label>
                <select name="subject" required>
                    <option value="General Inquiry">General Inquiry</option>
                    <option value="Booking Issue">Booking Issue</option>
                    <option value="Payment Issue">Payment Issue</option>
                    <option value="Complaint">Complaint</option>
                </select>
            </div>
            <div class="input-group">
                <label>Message</label>
                <textarea name="message" rows="5" placeholder="Describe your issue..." required></textarea>
            </div>
            <button type="submit" name="send_support" class="btn-support">Send Message</button>
        </form>
    </div>

    <div class="support-info">
        <div class="info-item">
            <i class="fas fa-phone-alt"></i>
            <span>+880 1234 567890</span>
        </div>
        <div class="info-item">
            <i class="fas fa-envelope"></i>
            <span>support@bariforce.com</span>
        </div>
    </div>
</div>