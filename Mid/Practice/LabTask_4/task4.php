<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 04: Student Management</title>
    <style>
        table { width: 50%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        input { margin: 5px; padding: 5px; }
    </style>
</head>
<body>

    <h2>Student Management System</h2>

    <input type="text" id="name" placeholder="Name">
    <input type="text" id="roll" placeholder="Roll">
    <input type="text" id="dept" placeholder="Department">
    <button onclick="addStudent()">Add Student</button>
    <p id="error" style="color: red;"></p>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Roll</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="studentTable">
        
        </tbody>
    </table>

    <script>
        function addStudent() {
            var name = document.getElementById("name").value;
            var roll = document.getElementById("roll").value;
            var dept = document.getElementById("dept").value;
            var error = document.getElementById("error");

            if (name === "" || roll === "" || dept === "") {
                error.innerHTML = "All fields are required!";
                return;
            }
            error.innerHTML = "";

            var table = document.getElementById("studentTable");
            
           
            var newRow = `
                <tr>
                    <td>${name}</td>
                    <td>${roll}</td>
                    <td>${dept}</td>
                    <td><button onclick="deleteRow(this)">Delete</button></td>
                </tr>
            `;

            table.innerHTML += newRow;

        }

      
        function deleteRow(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>

</body>
</html>