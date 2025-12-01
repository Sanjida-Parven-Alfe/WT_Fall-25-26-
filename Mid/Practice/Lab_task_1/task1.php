<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 01: Registration</title>

    <link rel="stylesheet" href="task1.css">
</head>
<body>

    <h2>Student Portal Signup</h2>
    
    <form onsubmit="return validateForm()">
        <label>Full Name:</label>
        <input type="text" id="fullname">
        <span id="nameError" class="error"></span>

        <label>Email:</label>
        <input type="text" id="email">
        <span id="emailError" class="error"></span>

        <label>Password (Min 6 chars):</label>
        <input type="password" id="password">
        <span id="passError" class="error"></span>

        <label>Confirm Password:</label>
        <input type="password" id="confirmPass">
        <span id="confError" class="error"></span>

        <label>Phone Number:</label>
        <input type="text" id="phone">
        <span id="phoneError" class="error"></span>

        <br>
        <button type="submit">Register</button>
    </form>

    <h3 id="successMessage" style="color: green;"></h3>

    <script src="task1.js">
        
    </script>

</body>
</html>