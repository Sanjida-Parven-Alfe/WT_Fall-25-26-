<?php
$msg = "";
$msg_type = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_booking'])) {
    $booking_id = $_POST['booking_id'];

    
    $check_sql = "SELECT * FROM bookings WHERE id = ? AND user_id = ? AND status = 'pending'";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ii", $booking_id, $user_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        
        $delete_sql = "DELETE FROM bookings WHERE id = ?";
        $del_stmt = $conn->prepare($delete_sql);
        $del_stmt->bind_param("i", $booking_id);
        
        if ($del_stmt->execute()) {
            $msg = "Booking deleted successfully!";
            $msg_type = "success";
        } else {
            $msg = "Error deleting booking.";
            $msg_type = "error";
        }
    } else {
        $msg = "Invalid request or booking is not pending.";
        $msg_type = "error";
    }
}


$booking_sql = "SELECT b.*, s.name as service_name, s.image_url 
                FROM bookings b 
                JOIN services s ON b.service_id = s.id 
                WHERE b.user_id = ? 
                ORDER BY b.booking_date DESC";

$booking_stmt = $conn->prepare($booking_sql);
$booking_stmt->bind_param("i", $user_id);
$booking_stmt->execute();
$all_bookings = $booking_stmt->get_result();
?>