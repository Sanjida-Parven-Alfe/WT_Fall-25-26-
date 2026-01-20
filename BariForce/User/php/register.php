<?php
session_start();
require_once '../db/db_connect.php';
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $strongRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{6,}$/';
    $confirm_pass = $_POST['confirm_password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format! Please use a valid email (e.g., name@example.com).";
    } else if (!preg_match($strongRegex, $password)) {

        $error = "Password must be at least 6 characters long and include uppercase, lowercase, number, and a special character.";
    } else if ($password !== $confirm_pass) {
        $error = "Passwords do not match!";
    } else {
        $checkSQL = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = $conn->query($checkSQL);

        if ($result->num_rows > 0) {
            $error = "Username or Email already exists!";
        } else {
            $sql = "INSERT INTO users (fullname, username, email, password, role) 
                    VALUES ('$fullname', '$username', '$email', '$password', 'user')";
            if ($conn->query($sql) === TRUE) {
                $success = "Registration Successful! You can now login.";
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }


}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Create Account - BariForce</title>

    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/register.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="register-container">
        <div class="register-box">
            <h2>Create Account</h2>
            <p>Join BariForce community today</p>

            <form method="POST" action="">
                <div class="input-group">
                    <i class="fas fa-id-card"></i>
                    <input type="text" name="fullname" placeholder="Full Name" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-check-circle"></i>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>

                <?php if ($error): ?>
                    <p class="error-msg"><?php echo $error; ?></p>
                <?php endif; ?>

                <?php if ($success): ?>
                    <p class="success-msg"><?php echo $success; ?> <a href="../../Admin/php/login.php">Login here</a></p>
                <?php endif; ?>

                <button type="submit" class="register-btn">Sign Up</button>
            </form>

            <div class="links">
                <span>Already have an account? <a href="../../Admin/php/login.php" class="login-link">Login</a></span>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="../js/themeToggle.js"></script>

    <script src="../js/register_validation.js"></script>

</body>

</html>