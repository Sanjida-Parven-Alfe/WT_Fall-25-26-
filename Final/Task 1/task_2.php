<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head><title>Session Login</title></head>
<body>

<?php

$name = "";
$nameerror = "";

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

?>


</body>
</html>