<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "1234") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header("Location: dashboard.php");
        exit();
    } elseif ($username == "user" && $password == "1234") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        header("Location: ../../User/php/home.php");
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - BariForce</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <a href="../../User/php/home.php" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
        <div class="login-box">
            <h2 style="color:#4A90E2; margin-bottom:10px;">BariForce.</h2>
            <p>Welcome back! Please login.</p>
            <form method="POST" action="">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
            <div class="links">
                <a href="#">Forgot Password?</a>
                <br>
                <span>New here? <a href="../../User/php/register.php" class="register-link">Create Account</a></span>
            </div>
        </div>
    </div>
</body>
</html>