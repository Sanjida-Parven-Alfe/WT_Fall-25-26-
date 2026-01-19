<?php require_once '../php/my-bookings.php'; ?>

<link rel="stylesheet" href="../CSS/my-bookings.css">

<div class="bookings-wrapper">
    <div class="header-title">
        <h2>My Bookings</h2>
        <a href="services.php" class="add-btn">+ Book New</a>
    </div>

    <?php if ($msg): ?>
        <div class="alert <?php echo $msg_type; ?>">
            <?php echo $msg; ?>
        </div>
    <?php endif; ?>

    <div class="booking-list-container">
        <?php if ($all_bookings->num_rows > 0): ?>
            <table class="booking-table">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Schedule</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $all_bookings->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <div class="service-info">
                                    <img src="<?php echo $row['image_url']; ?>" alt="Service">
                                    <span><?php echo htmlspecialchars($row['service_name']); ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="date-time">
                                    <span><?php echo date('d M, Y', strtotime($row['booking_date'])); ?></span>
                                    <small><?php echo $row['booking_time']; ?></small>
                                </div>
                            </td>
                            <td>
                                <?php 
                                    $statusClass = 'badge-pending';
                                    if($row['status'] == 'confirmed') $statusClass = 'badge-success';
                                    elseif($row['status'] == 'cancelled') $statusClass = 'badge-cancel';
                                    elseif($row['status'] == 'completed') $statusClass = 'badge-success';
                                ?>
                                <span class="badge <?php echo $statusClass; ?>">
                                    <?php echo ucfirst($row['status']); ?>
                                </span>
                            </td>
                            <td>৳ <?php echo number_format($row['total_price']); ?></td>
                            <td>
                                <?php if($row['status'] == 'pending'): ?>
                                    <form method="POST" action="dashboard.php?page=bookings" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                        <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_booking" class="btn-delete" title="Delete Booking">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <a href="invoice.php?booking_id=<?php echo $row['id']; ?>" class="btn-view" title="View Invoice">
                                        <i class="fas fa-file-alt"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-state">
                <img src="https://cdn-icons-png.flaticon.com/512/2748/2748558.png" alt="No Data">
                <h3>No Bookings Found</h3>
                <p>You haven't booked any services yet.</p>
            </div>
        <?php endif; ?>
    </div>
</div>