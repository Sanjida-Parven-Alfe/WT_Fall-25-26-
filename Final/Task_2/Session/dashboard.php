<?php
session_start();

if (!isset($_SESSION["username"]))
{
    header("Location:login.php");
    exit();
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<p>Welcome, <b><?php echo $_SESSION["username"]; ?></b></p>

<p>This page is only for logged-in users.</p>

<a href="index.php">Home</a><br><br>
<a href="logout.php">Logout</a>

</body>
</html>
