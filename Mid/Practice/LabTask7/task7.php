<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 07: Style Control</title>
    <style>
        #textBlock {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            font-size: 16px;
            background-color: white;
            text-align: left;
        }
        button { margin: 5px; padding: 8px; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Dynamic Style Control Panel</h2>

    <div id="textBlock">
        This is a sample paragraph. You can change my style using the buttons below.
    </div>
    <br>

    <button onclick="changeBg()">Change Background Color</button>
    <button onclick="increaseFont()">Increase Font Size</button>
    <button onclick="centerText()">Center Text</button>
    <button onclick="resetStyle()">Reset Style</button>

    <script>
        var box = document.getElementById("textBlock");
        var currentFontSize = 16;

        function changeBg() {
            // Random light color
            var colors = ["#ffcccc", "#ccffcc", "#ccccff", "#ffffcc"];
            var randomColor = colors[Math.floor(Math.random() * colors.length)];
            box.style.backgroundColor = randomColor;
        }

        function increaseFont() {
            currentFontSize += 2;
            box.style.fontSize = currentFontSize + "px";
        }

        function centerText() {
            box.style.textAlign = "center";
        }

        function resetStyle() {
            box.style.backgroundColor = "white";
            box.style.textAlign = "left";
            currentFontSize = 16;
            box.style.fontSize = "16px";
        }
    </script>

</body>
</html>