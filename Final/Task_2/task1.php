<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Session</title>
</head>

<body>

    <h3>Login</h3>

    <?php
    $name = "";
    $nameerror = "";

    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: task1.php");
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameerror = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            $_SESSION["name"] = $name;
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        return $data;
    }
    ?>
    <?php if (isset($_SESSION["name"])): ?>
        <h3>Welcome, <?php echo $_SESSION["name"]; ?></h3>
        <a href="?logout=true">Logout</a>

    <?php else: ?>
        <form method="post" action="">
            Name: <input type="text" name="name" value="<?php echo $name; ?>">
            <span style="color:red;"><?php echo $nameerror; ?></span>
            <br><br>
            <input type="submit" name="login" value="Login">
        </form>

    <?php endif; ?>

</body>

</html>