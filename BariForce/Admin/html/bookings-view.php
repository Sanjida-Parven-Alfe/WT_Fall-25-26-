<!DOCTYPE html>
<html>

<head>
    <title>Manage Bookings - BariForce</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/bookings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include 'sidebar.php'; ?>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <span class="dashboard">Manage Bookings</span>
            </div>
            <div class="profile-details">
                <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="Admin">
                <span class="admin_name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </nav>

        <div class="home-content">

            <?php if (isset($msg)): ?>
                <div class="alert" style="padding: 15px; background: #d4edda; color: #155724; margin-bottom: 20px; border-radius: 5px;">
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>

            <div class="table-container">
                <h3 class="title">All Booking Requests</h3>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Service</th>
                            <th>Date & Time</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td>#<?php echo $row['id']; ?></td>
                                    <td>
                                        <?php echo htmlspecialchars($row['fullname']); ?><br>
                                        <small style="color:#888;"><?php echo $row['phone']; ?></small>
                                    </td>
                                    <td><?php echo htmlspecialchars($row['service_name']); ?></td>
                                    <td>
                                        <?php echo date('d M', strtotime($row['booking_date'])); ?><br>
                                        <small><?php echo $row['booking_time']; ?></small>
                                    </td>
                                    <td>৳ <?php echo $row['total_price']; ?></td>
                                    <td>
                                        <?php
                                        $color = 'orange';
                                        if ($row['status'] == 'confirmed') $color = 'green';
                                        if ($row['status'] == 'cancelled') $color = 'red';
                                        if ($row['status'] == 'completed') $color = 'blue';
                                        ?>
                                        <span style="color: <?php echo $color; ?>; font-weight:bold;">
                                            <?php echo ucfirst($row['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <form method="POST" action="" style="display:flex; gap:5px;">
                                            <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">

                                            <?php if ($row['status'] == 'pending'): ?>
                                                <button type="submit" name="status" value="confirmed" class="action-btn btn-confirm" title="Approve"><i class="fas fa-check"></i></button>
                                                <button type="submit" name="status" value="cancelled" class="action-btn btn-cancel" title="Reject"><i class="fas fa-times"></i></button>
                                            <?php elseif ($row['status'] == 'confirmed'): ?>
                                                <button type="submit" name="status" value="completed" class="action-btn btn-complete" title="Mark as Done"><i class="fas fa-check-double"></i> Done</button>
                                            <?php else: ?>
                                                <span style="color:#aaa;">-</span>
                                            <?php endif; ?>

                                            <input type="hidden" name="update_status" value="1">
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" style="text-align:center;">No bookings found.</td>
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