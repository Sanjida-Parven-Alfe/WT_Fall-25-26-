<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 09: Interactive Portfolio</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; transition: 0.3s; }
        nav { background: #333; padding: 10px; color: white; }
        nav a { color: white; margin-right: 15px; text-decoration: none; cursor: pointer; font-weight: bold; }
        .container { padding: 20px; }
        .section { display: none; } 
        .active { display: block; }
        
        
        .dark-mode { background-color: #222; color: #ddd; }
        .dark-mode nav { background: #555; }
        
        input, textarea { width: 100%; margin-bottom: 10px; padding: 8px; }
        .error { color: red; font-size: 0.9em; }
    </style>
</head>
<body id="body">

    <nav>
        <a onclick="showSection('home')">Home</a>
        <a onclick="showSection('projects')">Projects</a>
        <a onclick="showSection('contact')">Contact</a>
        <button onclick="toggleTheme()" style="float: right;">Toggle Theme</button>
    </nav>

    <div class="container">
        
    
        <div id="home" class="section active">
            <h2 id="greeting">Hello!</h2>
            <p>Welcome to my interactive portfolio.</p>
        </div>

     
        <div id="projects" class="section">
            <h2>My Projects</h2>
            <ul>
                <li>Web Design</li>
                <li>JavaScript Apps</li>
                <li>Database Management</li>
            </ul>
        </div>

        <!-- Contact Section -->
        <div id="contact" class="section">
            <h2>Contact Me</h2>
            <form onsubmit="return validateContact()">
                <label>Name:</label>
                <input type="text" id="cName">
                <span id="nameErr" class="error"></span>

                <label>Email:</label>
                <input type="text" id="cEmail">
                <span id="emailErr" class="error"></span>

                <label>Message (Min 10 chars):</label>
                <textarea id="cMsg"></textarea>
                <span id="msgErr" class="error"></span>
                <br>
                <button type="submit">Send Message</button>
            </form>
            <p id="successMsg" style="color: green;"></p>
        </div>

    </div>

    <script>
        // 1. Time-Based Greeting
        var hour = new Date().getHours();
        var greetingText = "Good Morning";
        if (hour >= 12 && hour < 18) greetingText = "Good Afternoon";
        else if (hour >= 18) greetingText = "Good Evening";
        document.getElementById("greeting").innerHTML = greetingText + ", Welcome!";

        // 2. Section Toggling
        function showSection(sectionId) {
            // Hide all sections
            var sections = document.getElementsByClassName("section");
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = "none";
            }
            // Show selected section
            document.getElementById(sectionId).style.display = "block";
        }

        // 3. Theme Switcher
        function toggleTheme() {
            var body = document.getElementById("body");
            if (body.classList.contains("dark-mode")) {
                body.classList.remove("dark-mode");
            } else {
                body.classList.add("dark-mode");
            }
        }

        // 4. Contact Form Validation
        function validateContact() {
            var name = document.getElementById("cName").value;
            var email = document.getElementById("cEmail").value;
            var msg = document.getElementById("cMsg").value;
            var valid = true;

            document.getElementById("nameErr").innerHTML = "";
            document.getElementById("emailErr").innerHTML = "";
            document.getElementById("msgErr").innerHTML = "";
            document.getElementById("successMsg").innerHTML = "";

            if (name === "") {
                document.getElementById("nameErr").innerHTML = "Name is required";
                valid = false;
            }
            if (email.indexOf("@") === -1) {
                document.getElementById("emailErr").innerHTML = "Invalid email";
                valid = false;
            }
            if (msg.length < 10) {
                document.getElementById("msgErr").innerHTML = "Message too short";
                valid = false;
            }

            if (valid) {
                document.getElementById("successMsg").innerHTML = "Message Sent Successfully!";
            }
            return false;
        }
    </script>

</body>
</html>