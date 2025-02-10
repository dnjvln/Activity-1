// PLUS AND MINUS COUNT 
let count = 2; // initial count

function increaseCount() {
  count++;
  updateDisplay();
}

function decreaseCount() {
  if (count > 1) {
    count--;
    updateDisplay();
  }
}

function updateDisplay() {
  document.getElementById("count-display").textContent = count;
}



// ADD TO CART, ADD TO FAVORITES, AND BUY NOW FUNCTION 
let cartCount = 3;
let favoritesCount = 3;

function addToCart() {
    cartCount++; // Increment the cart count
    document.querySelector('.notification-count').innerText = cartCount; // Update the displayed count
}

function addToFavorites() {
    favoritesCount++; // Increment the favorites count
    document.querySelector('.message-count').innerText = favoritesCount; // Update the displayed count
}



function addToCart() {
    cartCount++;
    document.querySelector('.notification-count').innerText = cartCount;

    // Add bounce effect
    const cartButton = document.querySelector('.rectangle-b-product');
    cartButton.classList.add('bounce');
    setTimeout(() => cartButton.classList.remove('bounce'), 600); // Remove bounce class after animation duration
}

function addToFavorites() {
    favoritesCount++;
    document.querySelector('.message-count').innerText = favoritesCount;

    // Add bounce effect
    const favoritesButton = document.querySelector('.rectangle-c-product');
    favoritesButton.classList.add('bounce');
    setTimeout(() => favoritesButton.classList.remove('bounce'), 600); // Remove bounce class after animation duration
}

function buyNow() {
    // Add bounce effect
    const buyNowButton = document.querySelector('.rectangle-e-product');
    buyNowButton.classList.add('bounce');
    setTimeout(() => buyNowButton.classList.remove('bounce'), 600); // Remove bounce class after animation duration

    // Redirect to the Buy Now link after the animation
    setTimeout(() => {
        window.location.href = 'Project File/Checkout/order/order.html';
    }, 600); // Delay redirection to allow bounce animation to finish
}
