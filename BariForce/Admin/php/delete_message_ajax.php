<?php
require_once '../db/db_connect.php';
header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM support_tickets WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Message deleted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Could not delete from database"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid Request"]);
}
exit();
