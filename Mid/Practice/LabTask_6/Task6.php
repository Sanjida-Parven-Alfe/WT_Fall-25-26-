<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 06: Digital Clock</title>
    <style>
        body { text-align: center; margin-top: 100px; font-family: 'Courier New', Courier, monospace; }
        #clock { font-size: 50px; font-weight: bold; border: 2px solid #333; display: inline-block; padding: 20px; border-radius: 10px; background: #f4f4f4; }
    </style>
</head>
<body>

    <h2>Digital Clock Widget</h2>
    <div id="clock">Loading...</div>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var ampm = "AM";

       
            if (hours >= 12) {
                ampm = "PM";
                if (hours > 12) hours = hours - 12;
            }
            if (hours === 0) hours = 12;

           
            if (hours < 10) hours = "0" + hours;
            if (minutes < 10) minutes = "0" + minutes;
            if (seconds < 10) seconds = "0" + seconds;

            var timeString = hours + ":" + minutes + ":" + seconds + " " + ampm;
            
            document.getElementById("clock").innerHTML = timeString;
        }

      
        setInterval(updateClock, 1000);
        
        // Call immediately to avoid delay
        updateClock();
    </script>

</body>
</html>