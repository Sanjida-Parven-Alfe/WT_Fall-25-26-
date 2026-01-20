document.addEventListener("DOMContentLoaded", function () {
  const body = document.body;
  const icon = document.getElementById("theme-icon");
  const savedTheme = localStorage.getItem("theme");

  if (savedTheme === "dark") {
    body.classList.add("dark-mode");
    if (icon) {
      icon.classList.remove("fa-moon");
      icon.classList.add("fa-sun");
    }
  }
});

function toggleTheme() {
  const body = document.body;
  const icon = document.getElementById("theme-icon");

  body.classList.toggle("dark-mode");

  let theme = body.classList.contains("dark-mode") ? "dark" : "light";

  let date = new Date();
  date.setTime(date.getTime() + 30 * 24 * 60 * 60 * 1000);
  let expires = "expires=" + date.toUTCString();

  document.cookie = "theme=" + theme + ";" + expires + ";path=/";

  localStorage.setItem("theme", theme);

  if (theme === "dark") {
    if (icon) {
      icon.classList.remove("fa-moon");
      icon.classList.add("fa-sun");
    }
  } else {
    if (icon) {
      icon.classList.remove("fa-sun");
      icon.classList.add("fa-moon");
    }
  }
}
