<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h1>Student Registration</h1>

    <p>Full Name:</p>
    <input type="text" id="fullName">

    <p>Email:</p>
    <input type="email" id="email">

    <p>Password:</p>
    <input type="password" id="password">

    <p>Confirm Password:</p>
    <input type="password" id="confirmPass">

    <p><input type="submit" value="Register"></p> 

    <div id="studentError">  </div>
    <div id="studentOutput"> </div>

    <h1>Course Registration</h1>

    <p>Course Name:</p>
    <input type="text" id="courseName">
    <p> <input type="submit" value="Add Course"> </p>

    <div id="courseError"></div>
    <div id="courseOutput"></div>

    <script>
        // Student Validation
        function studentRegister () {
            let name = document.getElementById("fullName").value.trim();
            let email = document.getElementById("email").value.trim();
            let pass = document.getElementById("password").value.trim();
            let cpass = document.getElementById("confirmPass").value.trim();
        }

    </script>
</body>
</html>