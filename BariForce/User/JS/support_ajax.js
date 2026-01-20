document.addEventListener("DOMContentLoaded", function () {
  const supportForm = document.getElementById("ajaxSupportForm");

  if (supportForm) {
    supportForm.addEventListener("submit", function (e) {
      e.preventDefault();

      let formData = new FormData(this);
      let responseBox = document.getElementById("responseMsg");

      fetch("../php/support_handler.php", {
        method: "POST",
        body: formData,
      })
        .then((res) => {
          if (!res.ok) throw new Error("Network response was not ok");
          return res.json();
        })
        .then((data) => {
          responseBox.style.display = "block";
          responseBox.innerText = data.msg;

          if (data.status === "success") {
            responseBox.style.background = "#d4edda";
            responseBox.style.color = "#155724";
            responseBox.style.border = "1px solid #c3e6cb";
            document.getElementById("msg_body").value = "";
          } else {
            responseBox.style.background = "#f8d7da";
            responseBox.style.color = "#721c24";
            responseBox.style.border = "1px solid #f5c6cb";
          }
        })
        .catch((err) => {
          console.error("Error:", err);
          responseBox.style.display = "block";
          responseBox.innerText =
            "Something went wrong! Please check connection.";
          responseBox.style.background = "#fff3cd";
          responseBox.style.color = "#856404";
        });
    });
  }
});
