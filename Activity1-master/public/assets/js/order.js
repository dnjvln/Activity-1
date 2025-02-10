// TOGGLE PAYMENT METHOD CHECK CIRCLE
const button1 = document.getElementById('button1');
const button2 = document.getElementById('button2');

function toggleCircle(button, isChecked) {
    const ellipse = button.querySelector('div');
    if (isChecked) {
        ellipse.style.backgroundImage = "url(images/colored-circle.png)";
    } else {
        ellipse.style.backgroundImage = "url(images/empty-circle.png)";
    }
}

button1.addEventListener('click', function() {
    toggleCircle(button1, true);  
    toggleCircle(button2, false); 
});

button2.addEventListener('click', function() {
    toggleCircle(button2, true);  
    toggleCircle(button1, false); 
});




// POP UP CREDIT AND DEBIT CARD INFORMATION
document.addEventListener("DOMContentLoaded", function() {
    // Show the card form when button2 is clicked
    document.getElementById("button2").addEventListener("click", function() {
        // Change images of radio buttons
        document.querySelector('.ellipse-orders-1').style.backgroundImage = "url(images/empty-circle.png)";
        document.querySelector('.ellipse-orders-2').style.backgroundImage = "url(images/colored-circle.png)";
        
        // Show the card form container
        document.getElementById("cardFormContainer").style.display = "block";
    });

    // Hide the card form when button1 is clicked
    document.getElementById("button1").addEventListener("click", function() {
        document.getElementById("cardFormContainer").style.display = "none";
    });

    // Hide the card form when the Cancel button is clicked
    document.querySelector('.rectangle-cancel-cards').addEventListener("click", function() {
        document.getElementById("cardFormContainer").style.display = "none";
    });

    // Hide the card form when the Submit button is clicked
    document.querySelector('.rectangle-submit-cards').addEventListener("click", function() {
        // You can add logic for form submission here
        document.getElementById("cardFormContainer").style.display = "none";
    });
});


