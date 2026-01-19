document.addEventListener("DOMContentLoaded", function () {
    
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');
    const previewContainer = document.getElementById('previewContainer');

    if (imageInput && previewImage) {
        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = "block"; 
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = "none";
            }
        });
    }
});