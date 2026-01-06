<?php

include "db.php";

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $number = $_POST["number"];
    $dob = $_POST["dob"];
    $bloodGroup = $_POST["bloodGroup"];
    $email = $_POST["email"];

    if (empty($username) || empty($password) || empty($number) || empty($dob) || empty($bloodGroup) || empty($email)) {
        $error = "All the field must be fill_up";  // empty validation
    } else {
        $hassPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(username,password,email) VALUES ('$username', '$hassPassword', '$number','$dob', '$bloodGroup', '$email')";

        if ($conn->query($sql)) {
            $success = "Registration Complete you can do the login";
        } else {
            $error = "Error: ." . $conn->error;
        }
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
</head>

<body>
    <h1>Registration</h1>
    <form method="post" action="">
        Username: <input type="text" name="username"><br><br>
        Email: <input type="email" name="email"><br><br>
        phone_number: <input type="text" name="number"><br><br>
        dob: <input type="date" name="dob"><br><br>
        
        Blood Group:
        <select name="bloodGroup">
            <option value="">Select Group</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>
        <br><br>
        
        Password: <input type="password" name="password"><br><br>
        <input type="submit" value="Register">
    </form>

    <p style="color:green;"><?php echo $success; ?></p>
    <p style="color:red;"><?php echo $error; ?></p>
</body>

</html>