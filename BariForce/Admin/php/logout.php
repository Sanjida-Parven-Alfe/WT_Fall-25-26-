<?php
session_start();
session_unset();
session_destroy();

header("Location: ../../User/php/home.php");
exit();
?>