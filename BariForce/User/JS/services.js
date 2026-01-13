function filterServices() {
  let input = document.getElementById("searchInput").value.toLowerCase();
  let cards = document.getElementsByClassName("service-card");
  for (let i = 0; i < cards.length; i++) {
    let title = cards[i].querySelector("h3").innerText.toLowerCase();

    if (title.includes(input)) {
      cards[i].style.display = "block";
    } else {
      cards[i].style.display = "none";
    }
  }
}

function filterCategory(category) {
  let cards = document.getElementsByClassName("service-card");
  let buttons = document.getElementsByClassName("filter-btn");

  for (let btn of buttons) {
    btn.classList.remove("active");
  }

  event.target.classList.add("active");

  for (let i = 0; i < cards.length; i++) {
    let cat = cards[i].getAttribute("data-category");
    if (category === "all" || cat === category) {
      cards[i].style.display = "block";
    } 
    else {
      cards[i].style.display = "none";
    }
  }
}
