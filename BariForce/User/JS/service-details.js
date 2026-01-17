
const basePrice = parseFloat(document.getElementById("base-price").value);
let quantity = 1;

function updatePrice(change) {
  quantity += change;

  
  if (quantity < 1) {
    quantity = 1;
  }

  
  document.getElementById("qty").innerText = quantity;

 
  const total = basePrice * quantity;
  document.getElementById("total-price").innerText = "৳ " + total;

 
  const bookBtn = document.getElementById("book-btn");
  
  const urlParams = new URLSearchParams(window.location.search);
  const serviceId = urlParams.get("id");

 
  bookBtn.href = `booking.php?service_id=${serviceId}&qty=${quantity}&total=${total}`;
}