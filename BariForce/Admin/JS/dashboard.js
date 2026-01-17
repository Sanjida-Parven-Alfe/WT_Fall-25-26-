let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");

sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("fa-bars", "fa-arrow-right");
  }else{
    sidebarBtn.classList.replace("fa-arrow-right", "fa-bars");
  }
}