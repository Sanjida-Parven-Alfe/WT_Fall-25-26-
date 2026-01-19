<?php
session_start();
require_once '../db/db_connect.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['action']) && isset($_GET['id']) && isset($_GET['user_id'])) {
    
    $request_id = $_GET['id'];
    $user_id = $_GET['user_id'];
    $action = $_GET['action']; 

    if ($action == 'approve') {

        $updateUser = $conn->prepare("UPDATE users SET role = 'employee' WHERE id = ?");
        $updateUser->bind_param("i", $user_id);
        $updateUser->execute();

        $updateJob = $conn->prepare("UPDATE job_requests SET status = 'approved' WHERE id = ?");
        $updateJob->bind_param("i", $request_id);
        
        if ($updateJob->execute()) {
            header("Location: job-requests.php?msg=promoted");
        } else {
            header("Location: job-requests.php?msg=error");
        }
    } 
    elseif ($action == 'reject') {
        $stmt = $conn->prepare("UPDATE job_requests SET status = 'rejected' WHERE id = ?");
        $stmt->bind_param("i", $request_id);
        $stmt->execute();
        header("Location: job-requests.php?msg=rejected");
    }
    exit();
}

$sql = "SELECT j.*, u.fullname, u.email, u.phone 
        FROM job_requests j
        JOIN users u ON j.user_id = u.id
        ORDER BY j.request_date DESC";
$result = $conn->query($sql);

require_once '../html/job-requests-view.php';
?>