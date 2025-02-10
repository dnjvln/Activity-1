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




// SWITCH FROM EMPTY CHECKBOX TO FILLED CHECKBOX
// Select all the checkboxes
const checkboxes = document.querySelectorAll('.cart-item .item-box-checkbox-1, .cart-item .item-box-checkbox-2, .cart-item .item-box-checkbox-3');

// Loop through each checkbox
checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('click', function() {
        // Check the current image source
        const img = this.querySelector('img');
        const currentSrc = img.src;

        // Change the image based on the checkbox state
        if (currentSrc.includes('empty-checkbox.png')) {
            img.src = '../../Checkout/images/checked-checkbox.png'; // Set to checked image
        } else {
            img.src = '../../Checkout/images/empty-checkbox.png'; // Set back to empty image
        }
    });
});



// DELETE ITEMS
// Select all delete buttons
const deleteButtons = document.querySelectorAll('.delete-btn');

// Loop through each delete button and add a click event listener
deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Get the cart item (parent element of the button)
        const cartItem = this.closest('.cart-item');

        // Check if the cart item exists and remove it from the DOM
        if (cartItem) {
            console.log('Removing item:', cartItem); // Log the item being removed
            cartItem.remove();
        } else {
            console.log('Cart item not found.'); // Log if the item was not found
        }
    });
});


  