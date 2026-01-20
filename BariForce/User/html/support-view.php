<!DOCTYPE html>
<html>

<body>
    <link rel="stylesheet" href="../CSS/support.css">

    <div class="content-wrapper">
        <div class="section-header">
            <h2>Contact Support</h2>
            <p>Need help? Send us a message.</p>
        </div>

        <div id="responseMsg"
            style="display:none; padding:15px; border-radius:8px; margin-bottom:20px; font-weight: 500;"></div>

        <div class="form-container">
            <form id="ajaxSupportForm">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
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
                    <textarea name="message" id="msg_body" rows="5" placeholder="Describe your issue..."
                        required></textarea>
                </div>

                <button type="submit" class="btn-support">Send Message</button>
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

    <script src="../js/support_ajax.js"></script>
</body>

</html>