<?php
$msg = "";
$msg_type = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $fullname = $_POST['fullname'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $update_sql = "UPDATE users SET fullname=?, mobile=?, address=? WHERE id=?";
    $stmt = $conn->prepare($update_sql);

    if ($stmt) {
        $stmt->bind_param("sssi", $fullname, $mobile, $address, $user_id);

        if ($stmt->execute()) {
            $msg = "Profile updated successfully!";
            $msg_type = "success";
            
            $user['fullname'] = $fullname;
            $user['mobile'] = $mobile;
            $user['address'] = $address;
        } else {
            $msg = "Error updating profile.";
            $msg_type = "error";
        }
        $stmt->close();
    } else {
        $msg = "Database error.";
        $msg_type = "error";
    }
}
?>