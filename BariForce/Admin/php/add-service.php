<?php
session_start();
require_once '../../User/db/db_connect.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$msg = "";
$msg_type = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $image_url = "../../Admin/uploads/default_service.png"; 

    if (!empty($_FILES['image']['name'])) {
 
        $upload_dir = "../uploads/"; 
        
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $upload_dir . $file_name;
       
        $db_path = "../../Admin/uploads/" . $file_name;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_url = $db_path; 
            } else {
                $msg = "Error uploading image.";
                $msg_type = "error";
            }
        } else {
            $msg = "Only JPG, JPEG, PNG & WEBP files are allowed.";
            $msg_type = "error";
        }
    }

    if (empty($msg) || $msg_type != "error") {
        $stmt = $conn->prepare("INSERT INTO services (name, category, description, base_price, image_url) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssds", $name, $category, $description, $price, $image_url);

        if ($stmt->execute()) {

            header("Location: all-services.php?msg=added");
            exit();
        } else {
            $msg = "Database Error: " . $conn->error;
            $msg_type = "error";
        }
    }
}

require_once '../html/add-service-view.php';
?>