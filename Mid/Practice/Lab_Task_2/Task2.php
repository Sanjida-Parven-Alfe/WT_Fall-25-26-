<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 02: Image Slider</title>
    <style>
        img { width: 400px; height: 300px; border: 2px solid black; }
        button { margin-top: 10px; padding: 10px; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Travel Destination Slider</h2>

    <img id="sliderImage" src="" alt="Travel Image">
    <br>
    
    <button onclick="prevImage()">Previous</button>
    <button onclick="nextImage()">Next</button>

    <script>
        
        var images = [
            "https://wallpapers.com/images/featured/kakashi-hatake-pictures-meka9numthx0pe6z.jpg",
            "https://w0.peakpx.com/wallpaper/345/540/HD-wallpaper-kakashi-hatake-blue-neon-lights-naruto-characters-artwork-sharingan-hatake-kakashi-manga-samurai-naruto.jpg",
            "https://wallpapercave.com/wp/wp10820588.jpg"
        ];

        var currentIndex = 0;
        var imgElement = document.getElementById("sliderImage");

        // প্রথম ছবি লোড করা
        imgElement.src = images[currentIndex];

        function showImage() {
            imgElement.src = images[currentIndex];
        }

        function nextImage() {
            currentIndex++;
            if (currentIndex >= images.length) {
                currentIndex = 0; // Loop back to start
            }
            showImage();
        }

        function prevImage() {
            currentIndex--;
            if (currentIndex < 0) {
                currentIndex = images.length - 1; // Loop to end
            }
            showImage();
        }

        // Automatic slideshow every 3 seconds
        setInterval(nextImage, 3000);

    </script>
</body>
</html>