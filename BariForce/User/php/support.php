<?php
$sup_msg = "";
$sup_msg_type = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send_support'])) {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO support_tickets (user_id, subject, message, status, created_at) VALUES (?, ?, ?, 'pending', ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $subject, $message, $date);

    if ($stmt->execute()) {
        $sup_msg = "Message sent successfully! We will contact you soon.";
        $sup_msg_type = "success";
    } else {
        $sup_msg = "Failed to send message.";
        $sup_msg_type = "error";
    }
}
?>