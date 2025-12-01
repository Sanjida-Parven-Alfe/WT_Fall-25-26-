<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 05: Text Analyzer</title>
    <style>
        textarea { width: 300px; height: 100px; }
        .result-box { margin-top: 20px; border: 1px solid #ccc; padding: 10px; width: 300px; }
    </style>
</head>
<body>

    <h2>Text Analysis Tool</h2>
    <textarea id="inputText" placeholder="Paste your text here..."></textarea>
    <br>
    <button onclick="analyzeText()">Analyze Text</button>

    <div id="results" class="result-box" style="display:none;">
        <p><strong>Total Characters:</strong> <span id="charCount">0</span></p>
        <p><strong>Total Words:</strong> <span id="wordCount">0</span></p>
        <p><strong>Reversed Text:</strong> <br> <span id="reversedText"></span></p>
    </div>

    <script>
        function analyzeText() {
            var text = document.getElementById("inputText").value.trim();
            
            if (text === "") {
                alert("Please enter some text first.");
                return;
            }

            // Character Count
            var charCount = text.length;

            // Word Count (Splitting by spaces)
            var words = text.split(" ");
            // Filter out empty strings caused by multiple spaces
            var realWords = 0;
            for(var i=0; i<words.length; i++) {
                if(words[i] !== "") {
                    realWords++;
                }
            }

            // Reverse Text
            var reversed = text.split("").reverse().join("");

            // Display Results
            document.getElementById("charCount").innerHTML = charCount;
            document.getElementById("wordCount").innerHTML = realWords;
            document.getElementById("reversedText").innerHTML = reversed;
            
            document.getElementById("results").style.display = "block";
        }
    </script>

</body>
</html>