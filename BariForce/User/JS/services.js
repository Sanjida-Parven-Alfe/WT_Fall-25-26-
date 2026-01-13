function filterServices() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let cards = document.getElementsByClassName('service-card');
    for (let i = 0; i < cards.length; i++) {
        let title = cards[i].querySelector('h3').innerText.toLowerCase();
        
        if (title.includes(input)) {
            cards[i].style.display = "block";

        }
         else {
            cards[i].style.display = "none";
        }
    }
}
