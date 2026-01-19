document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById('resume');
    const fileNameDisplay = document.getElementById('fileName');
    const fileError = document.getElementById('fileError');
    const joinForm = document.getElementById('joinForm');

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        
        if (file) {
            if (file.size > 5 * 1024 * 1024) {
                fileError.textContent = "File size must be less than 5MB.";
                fileInput.value = ""; 
                fileNameDisplay.textContent = "Choose a file (PDF, DOC, JPG)";
                return;
            }

            const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png'];
            if (!allowedTypes.includes(file.type)) {
                fileError.textContent = "Invalid file type. Only PDF, DOC, JPG allowed.";
                fileInput.value = "";
                fileNameDisplay.textContent = "Choose a file (PDF, DOC, JPG)";
                return;
            }

            fileNameDisplay.textContent = file.name;
            fileError.textContent = "";
            fileNameDisplay.style.color = "#2c3e50";
            fileNameDisplay.style.fontWeight = "600";
        } else {
            fileNameDisplay.textContent = "Choose a file (PDF, DOC, JPG)";
        }
    });

    joinForm.addEventListener('submit', function (event) {
        if (!fileInput.value) {
            event.preventDefault();
            fileError.textContent = "Please select a resume to upload.";
        }
    });
});