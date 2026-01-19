<?php
session_start();

require_once '../db/db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php?msg=Please_login_to_apply");
    exit();
}

if ($_SESSION['role'] !== 'user') {

    echo "<script>alert('You are already a team member!'); window.location.href='../../User/php/home.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];
$msg = "";
$msg_type = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $position = $_POST['position'];

    if (!empty($_FILES['resume']['name'])) {

        $target_dir = "../../User/uploads/resumes/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_name = time() . "_" . basename($_FILES["resume"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $allowed_types = ['pdf', 'doc', 'docx', 'jpg', 'png'];

        if (in_array($file_type, $allowed_types)) {
            if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {

                $stmt = $conn->prepare("INSERT INTO job_requests (user_id, position_name, resume_file, status) VALUES (?, ?, ?, 'pending')");
                $stmt->bind_param("iss", $user_id, $position, $file_name);

                if ($stmt->execute()) {
                    $msg = "Application submitted successfully! Admin will review it.";
                    $msg_type = "success";
                } else {
                    $msg = "Database Error: " . $conn->error;
                    $msg_type = "error";
                }
            } else {
                $msg = "File upload failed.";
                $msg_type = "error";
            }
        } else {
            $msg = "Only PDF, DOC & Image files are allowed.";
            $msg_type = "error";
        }
    } else {
        $msg = "Please upload your resume.";
        $msg_type = "error";
    }
}

require_once '../html/join-us-view.php';
