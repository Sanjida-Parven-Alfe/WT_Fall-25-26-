function validateForm() {
            var name = document.getElementById("fullname").value;
            var email = document.getElementById("email").value;
            var pass = document.getElementById("password").value;
            var confPass = document.getElementById("confirmPass").value;
            var phone = document.getElementById("phone").value;

            // Reset errors
            document.getElementById("nameError").innerHTML = "";
            document.getElementById("emailError").innerHTML = "";
            document.getElementById("passError").innerHTML = "";
            document.getElementById("confError").innerHTML = "";
            document.getElementById("phoneError").innerHTML = "";
            document.getElementById("successMessage").innerHTML = "";

            var isValid = true;

            if(name === "") {
                document.getElementById("nameError").innerHTML = "Name cannot be empty";
                isValid = false;
            }

            // Simple email check
            if(email.indexOf("@") === -1 || email.indexOf(".") === -1) {
                document.getElementById("emailError").innerHTML = "Invalid email format";
                isValid = false;
            }

            if(pass.length < 6) {
                document.getElementById("passError").innerHTML = "Password must be at least 6 chars";
                isValid = false;
            }

            if(pass !== confPass) {
                document.getElementById("confError").innerHTML = "Passwords do not match";
                isValid = false;
            }

            if(isNaN(phone) || phone === "") {
                document.getElementById("phoneError").innerHTML = "Phone must be digits only";
                isValid = false;
            }

            if(isValid) {
                document.getElementById("successMessage").innerHTML = "Registration Successful!";
            }

            return false; // Prevent reload
        }