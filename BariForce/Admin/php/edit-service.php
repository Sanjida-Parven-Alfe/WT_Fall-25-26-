<?php
session_start();
require_once '../db/db_connect.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: all-services.php");
    exit();
}

$id = $_GET['id'];
$msg = "";
$msg_type = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $image_url = $_POST['current_image'];

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
            }
        } else {
            $msg = "Only JPG, JPEG, PNG & WEBP allowed.";
        }
    }

    if (empty($msg)) {
        $stmt = $conn->prepare("UPDATE services SET name=?, category=?, description=?, base_price=?, image_url=? WHERE id=?");
        $stmt->bind_param("sssdsi", $name, $category, $description, $price, $image_url, $id);

        if ($stmt->execute()) {
            header("Location: all-services.php?msg=updated");
            exit();
        } else {
            $msg = "Database Error: " . $conn->error;
            $msg_type = "error";
        }
    }
}

$stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$service = $stmt->get_result()->fetch_assoc();

if (!$service) {
    echo "Service not found!";
    exit();
}

require_once '../html/edit-service-view.php';
