<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 08: Smart Form</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input, select { padding: 5px; width: 200px; }
        #rollField, #deptField { display: none; } /* Initially hidden */
    </style>
</head>
<body>

    <h2>Smart Registration Form</h2>

    <div class="form-group">
        <label>Select User Type:</label>
        <select id="userType" onchange="toggleFields()">
            <option value="">-- Select --</option>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select>
    </div>

    <div id="rollField" class="form-group">
        <label>Roll Number:</label>
        <input type="text" placeholder="Enter Roll">
    </div>

    <div id="deptField" class="form-group">
        <label>Department:</label>
        <input type="text" placeholder="Enter Department">
    </div>

    <script>
        function toggleFields() {
            var type = document.getElementById("userType").value;
            var rollDiv = document.getElementById("rollField");
            var deptDiv = document.getElementById("deptField");

            // Reset both to hidden first
            rollDiv.style.display = "none";
            deptDiv.style.display = "none";

            if (type === "student") {
                rollDiv.style.display = "block";
            } else if (type === "teacher") {
                deptDiv.style.display = "block";
            }
        }
    </script>

</body>
</html>