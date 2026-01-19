<?php
session_start();
require_once '../db/db_connect.php';

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: dashboard.php");
    } else {
        header("Location: ../../User/php/home.php");
    }
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'admin') {
            header("Location: dashboard.php");
        } else {
            header("Location: ../../User/php/home.php");
        }
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

    <link rel="stylesheet" href="../../User/CSS/navbar.css">
    <link rel="stylesheet" href="../../User/CSS/footer.css">

    <link rel="stylesheet" href="../CSS/login.css?v=2">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include '../../User/php/navbar.php'; ?>

    <div class="login-container">
        <div class="login-box">
            <h2>Welcome Back</h2>
            <p>Please login to your account</p>

            <form method="POST" action="">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <?php if ($error): ?>
                    <p class="error-msg"><?php echo $error; ?></p>
                <?php endif; ?>

                <button type="submit" class="login-btn">Login</button>
            </form>

            <div class="links">
                <a href="#">Forgot Password?</a>
                <br>
                <span>New here? <a href="../../User/php/register.php" class="register-link">Create Account</a></span>
            </div>
        </div>
    </div>

    <?php include '../../User/php/footer.php'; ?>
    <script src="../../User/js/themeToggle.js"></script>

</body>

</html>