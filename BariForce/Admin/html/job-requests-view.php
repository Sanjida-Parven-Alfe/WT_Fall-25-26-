<!DOCTYPE html>
<html>
<head>
    <title>Job Requests - BariForce</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="../CSS/users.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    
    <?php include 'sidebar.php'; ?>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <span class="dashboard">Job Applications</span>
            </div>
            <div class="profile-details">
                <img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="Admin">
                <span class="admin_name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </nav>

        <div class="home-content">
            
            <?php if (isset($_GET['msg'])): ?>
                <?php if ($_GET['msg'] == 'promoted'): ?>
                    <div class="alert success">User approved and promoted to Employee!</div>
                <?php elseif ($_GET['msg'] == 'rejected'): ?>
                    <div class="alert error">Application rejected.</div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="table-container">
                <h3 class="table-title">Pending Applications</h3>
                
                <table>
                    <thead>
                        <tr>
                            <th>Applicant</th>
                            <th>Applied For</th>
                            <th>Contact</th>
                            <th>Resume/CV</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <strong><?php echo htmlspecialchars($row['fullname']); ?></strong>
                                </td>
                                <td><?php echo htmlspecialchars($row['position_name']); ?></td>
                                <td>
                                    <?php echo htmlspecialchars($row['email']); ?><br>
                                    <small><?php echo htmlspecialchars($row['phone']); ?></small>
                                </td>
                                <td>
                                    <a href="../../User/uploads/resumes/<?php echo $row['resume_file']; ?>" target="_blank" class="btn-view">
                                        <i class="fas fa-eye"></i> View CV
                                    </a>
                                </td>
                                <td>
                                    <?php 
                                        $statusClass = 'badge';
                                        if($row['status']=='approved') $statusClass .= ' admin';
                                        else if($row['status']=='rejected') $statusClass .= ' btn-delete'; 
                                        else $statusClass .= ' user';
                                    ?>
                                    <span class="<?php echo $statusClass; ?>"><?php echo ucfirst($row['status']); ?></span>
                                </td>
                                <td>
                                    <?php if($row['status'] == 'pending'): ?>
                                        <a href="job-requests.php?action=approve&id=<?php echo $row['id']; ?>&user_id=<?php echo $row['user_id']; ?>" 
                                           class="btn-approve" title="Approve & Make Employee"
                                           onclick="return confirm('Are you sure? This user will become an Employee.');">
                                            <i class="fas fa-check"></i>
                                        </a>

                                        <a href="job-requests.php?action=reject&id=<?php echo $row['id']; ?>&user_id=<?php echo $row['user_id']; ?>" 
                                           class="btn-reject" title="Reject Application"
                                           onclick="return confirm('Reject this application?');">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    <?php else: ?>
                                        <span style="color:#aaa;">-</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="6" style="text-align:center;">No job requests found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="../JS/dashboard.js"></script>
</body>
</html>