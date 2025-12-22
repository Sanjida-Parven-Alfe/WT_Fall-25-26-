<?php
session_start();
if (isset($_SESSION["username"]))
{
    header("Location:dashboard.php");
    exit();
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$user=$_POST["username"];
$pass=$_POST["password"];

if ($user=="admin" && $pass=="1234")
{

    $_SESSION["username"] = $user;
    header("Location:dashboard.php");
    exit();
}
else{

    $error="Invalid Id and pass";
}

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="post">
    <input type="text" name="username" placeholder="Username"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <input type="submit" value="Login">
</form>

<p style="color:red;">
    <?php if (isset($error)) echo $error; ?>
</p>

</body>
</html>
