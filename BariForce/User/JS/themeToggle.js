function toggleTheme() {
  var body = document.body;

  body.classList.toggle("dark-mode");

  var icon = document.getElementById("theme-icon");

  if (body.classList.contains("dark-mode")) {
    icon.classList.remove("fa-moon");
    icon.classList.add("fa-sun");
  } else {
    icon.classList.remove("fa-sun");
    icon.classList.add("fa-moon");
  }
}