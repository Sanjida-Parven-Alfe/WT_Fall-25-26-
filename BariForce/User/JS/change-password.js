document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("passForm");
  const newPass = document.getElementById("new_pass");
  const confirmPass = document.getElementById("confirm_pass");
  const errorText = document.getElementById("matchError");
  const strongRegex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{6,}$/;

  if (form) {
    form.addEventListener("submit", function (e) {
      if (!strongRegex.test(passVal)) {
        e.preventDefault();
        errorText.textContent =
          "Password must be 6+ chars with Uppercase, Lowercase, Number & Special Char!";
        newPass.style.borderColor = "#e74c3c";
      } else if (newPass.value !== confirmPass.value) {
        e.preventDefault();
        errorText.textContent = "Passwords do not match!";
        newPass.style.borderColor = "#e74c3c";
        confirmPass.style.borderColor = "#e74c3c";
      } else {
        errorText.textContent = "";
        newPass.style.borderColor = "#e1e4e8";
        confirmPass.style.borderColor = "#e1e4e8";
      }
    });
  }
});
