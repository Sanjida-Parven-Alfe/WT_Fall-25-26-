<?php
$pass_msg = "";
$pass_msg_type = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    if ($current_pass === $user['password']) {
        if ($new_pass === $confirm_pass) {
            $pass_sql = "UPDATE users SET password=? WHERE id=?";
            $stmt = $conn->prepare($pass_sql);
            $stmt->bind_param("si", $new_pass, $user_id);

            if ($stmt->execute()) {
                $pass_msg = "Password changed successfully!";
                $pass_msg_type = "success";
                $user['password'] = $new_pass;
            } else {
                $pass_msg = "Database error!";
                $pass_msg_type = "error";
            }
        } else {
            $pass_msg = "New passwords do not match!";
            $pass_msg_type = "error";
        }
    } else {
        $pass_msg = "Incorrect current password!";
        $pass_msg_type = "error";
    }
}
?>