
document.addEventListener("DOMContentLoaded", function () {
  
    const currentLocation = window.location.href;
   
    
    const menuItems = document.querySelectorAll(".nav-link");
 
    
    menuItems.forEach((item) => {
        if (item.href === currentLocation) {
            item.classList.add("active"); 
        } else {
            item.classList.remove("active");
        }
    });
});