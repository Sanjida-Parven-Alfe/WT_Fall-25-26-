<?php

session_start();
require_once '../db/db_connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $date = date('Y-m-d H:i:s');

    if (empty($message)) {
        echo json_encode(["status" => "error", "msg" => "Message cannot be empty!"]);
        exit();
    }

    $sql = "INSERT INTO support_tickets (user_id, subject, message, status, created_at) VALUES (?, ?, ?, 'pending', ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $subject, $message, $date);

    if ($stmt->execute()) {

        echo json_encode(["status" => "success", "msg" => "Message sent successfully! We will contact you soon."]);
    } else {
        echo json_encode(["status" => "error", "msg" => "Failed to send message. Database error."]);
    }
} else {
    echo json_encode(["status" => "error", "msg" => "Invalid Request Method"]);
}
exit();
?>