<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Result System</h2>
        <input type="text" id="name" placeholder="Enter Name">
        <input type="number" id="marks" placeholder="Enter Marks">
        <button onclick="addStudent()">Add Result</button>
        <p id="msg"></p>
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody id="tableBody"></tbody>
        </table>

        <script src="script.js"></script>
    </body>
</html>
