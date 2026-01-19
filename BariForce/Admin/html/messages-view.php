<!DOCTYPE html>
<html>
<head>
    <title>User Messages - BariForce</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/messages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    
    <?php include 'sidebar.php'; ?>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <span class="dashboard">User Support Messages</span>
            </div>
            <div class="profile-details">
                <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="Admin">
                <span class="admin_name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </nav>

        <div class="home-content">
            
            <?php if (isset($_GET['msg'])): ?>
                <?php if ($_GET['msg'] == 'deleted'): ?>
                    <div class="alert-success" style="padding: 15px; background: #d1e7dd; color: #0f5132; border-radius: 8px; margin-bottom: 20px;">
                        <i class="fas fa-check-circle"></i> Message deleted successfully!
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="message-container">
                <table class="message-table">
                    <thead>
                        <tr>
                            <th>User Info</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td class="user-info">
                                        <strong><?php echo htmlspecialchars($row['fullname']); ?></strong><br>
                                        <small><?php echo htmlspecialchars($row['email']); ?></small><br>
                                        <small><?php echo htmlspecialchars($row['phone']); ?></small>
                                    </td>
                                    <td>
                                        <span class="badge-subject"><?php echo htmlspecialchars($row['subject']); ?></span>
                                    </td>
                                    <td class="msg-text">
                                        <?php echo nl2br(htmlspecialchars($row['message'])); ?>
                                    </td>
                                    <td><?php echo date('d M, Y', strtotime($row['created_at'])); ?></td>
                                    <td>
                                        <a href="mailto:<?php echo $row['email']; ?>" class="btn-reply" title="Reply">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                        <a href="messages.php?delete_id=<?php echo $row['id']; ?>" class="btn-delete" 
                                           onclick="return confirm('Are you sure you want to delete this message?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="empty-state">
                                    <i class="fas fa-envelope-open" style="font-size: 3rem; color: #ccc;"></i>
                                    <p>No messages found from users.</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="../JS/dashboard.js"></script>
</body>
</html>