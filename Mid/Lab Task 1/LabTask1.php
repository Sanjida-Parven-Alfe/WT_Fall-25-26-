<!DOCTYPE html>
<html>
<head>
    <title>Registration Information</title>
</head>

<style>
    body{
        margin-left: 400px;
        margin-right: 400px;
    }


</style>

<body>

    <center><h1 style="color:red;  padding:10px; border:40px; border-bottom:2px solid red;">Student Registration Information</h1></center>
    <p style="font-size: larger;">First Name</p>
    <input type="text" style="width: 100%; height:30px;">

    <p style="font-size: larger;">Last Name</p>
    <input type="text" style="width: 100%; height:30px;">

    <p style="font-size: larger;">Student ID</p>
    <input type="text" style="width: 100%; height:30px;">

    <p style="font-size: larger;">Program/Major</p>
    <input type="text" style="width: 100%; height:30px;">

    <p style="font-size: larger;">Department</p>
    <select name="Department" id="dpt" style="width: 100%; height:30px;">
        <option value="Select">Select Department</option>
        <option value="CSE">CSE</option>
        <option value="EEE">EEE</option>
        <option value="BBA">BBA</option>
        <option value="English">English</option>
    </select>

    <p style="font-size: larger;">Phone</p>
    <input type="number" style="width: 100%; height:30px;">

    <p style="font-size: larger;">University Email</p>
    <input type="email" style="width: 100%; height:30px;">

    <p style="font-size: larger;">Create Password (min 8 character)</p>
    <input type="password" style="width: 100%; height:30px;">

    <p style="font-size: larger;">Confirm Password</p>
    <input type="password" style="width: 100%; height:30px;">

    <p style="font-weight:bold; font-size: larger;">Semester selection</p>
    <input type="radio" name="semester">Summer 2024
    <input type="radio" name="semester">Fall 2024
    <input type="radio" name="semester"> Spring 2025
    <input type="radio" name="semester"> Other/special Term

    <p style="font-size: larger;">Requested Credit Load (Max 15)</p>
    <input type="text" value="eg.,g or 12" style="width: 100%; height:30px;">

    <p>
        <input type="checkbox" style="font-size: larger;"> I require academic advising before final registration.
    </p>

    <h3 style="color:red; padding:10px; border:40px; border-bottom:2px solid red; font-size:x-large;">Course Selection</h3>

    <p>
        <input type="checkbox"> MATH 1021 (Calculus I)
        <input type="checkbox"> CS 2105 (Data Structures)
        <input type="checkbox"> ECON 1001 (Microeconomics)
        <input type="checkbox"> PHY 1102 (Physics Lab)
    </p>

    <p style="font-size: larger;">Comments/Special Requests</p>
    <input type="text" style="width: 100%; height:100px; ">

</body>
</html>