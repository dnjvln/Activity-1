document.querySelector('.chevron-down').addEventListener('click', function() {
    const filterContainer = document.querySelector('.filter-container');

    // Check if the filter container is currently visible
    const isVisible = filterContainer.classList.contains('show');

    // Toggle rotation class
    this.classList.toggle('rotate', !isVisible); // Add/remove rotation class

    // Show or hide the filter container
    filterContainer.classList.toggle('show'); // Toggle the filter container visibility
});




// ACTIVATE HEART FOR FAVORITES AND CART FOR ADD TO CARTS COLOR
document.addEventListener("DOMContentLoaded", function () {
    // Get elements for all heart and shopping cart images
    const heartImages = document.querySelectorAll(".heart-image");
    const shoppingCartImages = document.querySelectorAll(".shopping-cart-image");
    const messageCount = document.querySelector(".message-count");
    const notificationCount = document.querySelector(".notification-count");

    // Update count function
    function updateCount(countElement, isAdding) {
        let count = parseInt(countElement.textContent, 10);
        countElement.textContent = isAdding ? count + 1 : Math.max(0, count - 1); // Ensure count doesn't go below 0
    }

    // Loop through each heart image and set up click event
    heartImages.forEach((heartImage) => {
        heartImage.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent link behavior
            const isActive = heartImage.classList.toggle("active"); // Toggle the class
            updateCount(messageCount, isActive); // Update the message count based on state
        });
    });

    // Loop through each shopping cart image and set up click event
    shoppingCartImages.forEach((shoppingCartImage) => {
        shoppingCartImage.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent link behavior
            const isActive = shoppingCartImage.classList.toggle("active"); // Toggle the class
            updateCount(notificationCount, isActive); // Update the notification count based on state
        });
    });
});

