document.addEventListener("DOMContentLoaded", function () {
  const regForm = document.querySelector("form");

  if (regForm) {
    regForm.addEventListener("submit", function (e) {
      const password = document.querySelector('input[name="password"]').value;
      const confirm_pass = document.querySelector(
        'input[name="confirm_password"]',
      ).value;

      const strongRegex =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;

      if (!strongRegex.test(password)) {
        e.preventDefault();
        alert(
          "Password criteria not met!\n- At least 6 characters\n- One Uppercase & One Lowercase letter\n- One Number\n- One Special Character (@$!%*?&)",
        );
      } else if (password !== confirm_pass) {
        e.preventDefault();
        alert("Passwords do not match!");
      }
    });
  }
});
