document.addEventListener("DOMContentLoaded", function () {
    
    const deleteButtons = document.querySelectorAll(".btn-delete");

    deleteButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            const isConfirmed = confirm("Are you sure you want to delete this user? All their bookings and data will also be removed!");
            
            if (!isConfirmed) {
                event.preventDefault();
            }
        });
    });
});