<!DOCTYPE html>
<html>

<head>
    <title>Manage Users - BariForce</title>

    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/users.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include 'sidebar.php'; ?>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <span class="dashboard">Manage Users</span>
            </div>

            <div class="profile-details">
                <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="Admin">
                <span class="admin_name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </nav>

        <div class="home-content">

            <?php if (isset($_GET['msg'])): ?>
                <?php if ($_GET['msg'] == 'deleted'): ?>
                    <div class="alert success">User deleted successfully!</div>
                <?php elseif ($_GET['msg'] == 'self_delete_error'): ?>
                    <div class="alert error">You cannot delete your own account!</div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="table-container">
                <h3 class="table-title">Registered Users</h3>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email & Phone</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td>#<?php echo $row['id']; ?></td>

                                    <td>
                                        <div class="user-info">
                                            <img src="<?php echo !empty($row['image']) ? $row['image'] : 'https://cdn-icons-png.flaticon.com/512/149/149071.png'; ?>" alt="User">
                                            <span><?php echo htmlspecialchars($row['fullname']); ?></span>
                                        </div>
                                    </td>

                                    <td>@<?php echo htmlspecialchars($row['username']); ?></td>

                                    <td>
                                        <?php echo htmlspecialchars($row['email']); ?> <br>
                                        <small><?php echo htmlspecialchars($row['phone']); ?></small>
                                    </td>

                                    <td>
                                        <?php if ($row['role'] == 'admin'): ?>
                                            <span class="badge admin">Admin</span>
                                        <?php else: ?>
                                            <span class="badge user">User</span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <a href="users.php?delete_id=<?php echo $row['id']; ?>" class="btn-delete" title="Delete User">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align:center;">No users found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="../JS/dashboard.js"></script>
    <script src="../JS/users.js"></script>

</body>

</html>