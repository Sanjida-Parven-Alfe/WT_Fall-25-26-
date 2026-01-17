document.addEventListener("DOMContentLoaded", function () {
  const currentLocation = window.location.href;
  const menuItems = document.querySelectorAll(".nav-link");

  menuItems.forEach((item) => {
    if (item.href === currentLocation) {
      menuItems.forEach((link) => link.classList.remove("active"));

      item.classList.add("active");
    }
  });
});
