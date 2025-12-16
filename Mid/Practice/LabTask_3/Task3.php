<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 03: Dark/Light Mode</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 50px;
            transition: 0.3s;
            background-color: white;
            color: black;
        }
        button { padding: 10px 20px; font-size: 16px; cursor: pointer; }
    </style>
</head>
<body id="mainBody">

    <h1 id="header">My Portfolio</h1>
    <p>Welcome to my website. This is a simple theme switcher example.</p>
    
    <button id="toggleBtn" onclick="toggleTheme()">Switch to Dark Mode</button>

    <script>
        var isDarkMode = false;

        function toggleTheme() {
            var body = document.getElementById("mainBody");
            var btn = document.getElementById("toggleBtn");

            if (isDarkMode) {
                
                body.style.backgroundColor = "white";
                body.style.color = "black";
                btn.innerHTML = "Switch to Dark Mode";
                isDarkMode = false;
            } else {
                // Switch to Dark Mode
                body.style.backgroundColor = "#333";
                body.style.color = "white";
                btn.innerHTML = "Switch to Light Mode";
                isDarkMode = true;
            }
        }
    </script>

</body>
</html>