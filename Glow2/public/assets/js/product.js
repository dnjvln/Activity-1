// DROPDOWNS 
document.addEventListener('DOMContentLoaded', function() {
    const chevron1 = document.querySelector('.chevron-up-uploaad');
    const dropdownContainer1 = document.querySelector('.dropdown-container-uploaad');
    const chevron2 = document.querySelector('.chevron-up-3-uploaad');
    const dropdownContainer2 = document.querySelector('.dropdown-container-2-uploaad');
    const rectangle1Text = document.querySelector('.rectangle-1-uploaad .rectangle-1-container');
    const rectangle2Text = document.querySelector('.rectangle-2-uploaad .rectangle-1-container');

    const itemsMap = {
        Skincare: ['Toner', 'Moisturizer', 'Cream', 'Cleanser', 'Sunscreen'],
        Makeup: ['Foundations', 'Concealer', 'Blushes', 'Lip Tints', 'Eye Shadows', 'Mascaras', 'Primers'],
        'Hair Care': ['Shampoo', 'Conditioner', 'Hair Oils & Serums', 'Dry Shampoo', 'Hairspray'],
    };

    // Event listener for the first dropdown
    chevron1.addEventListener('click', function(event) {
        event.stopPropagation();
        chevron1.classList.toggle('rotated');
        dropdownContainer1.classList.toggle('show');
        dropdownContainer2.classList.remove('show'); // Hide the second dropdown
        chevron2.classList.remove('rotated'); // Reset chevron for second dropdown
    });

    // Handle category selection from the first dropdown
    const categoryItems1 = document.querySelectorAll('.category-item-uploaad');
    categoryItems1.forEach(item => {
        item.addEventListener('click', function(event) {
            event.stopPropagation();
            const selectedCategory = this.textContent;
            
            // Update rectangle-1-uploaad with selected category
            rectangle1Text.textContent = selectedCategory;
            
            dropdownContainer2.innerHTML = ''; // Clear previous items

            itemsMap[selectedCategory].forEach(subItem => {
                const span = document.createElement('span');
                span.className = 'category-item-2-uploaad';
                span.textContent = subItem;
                dropdownContainer2.appendChild(span);
                
                // Add event listener for each sub-item
                span.addEventListener('click', function(e) {
                    e.stopPropagation(); // Prevent click from bubbling up
                    dropdownContainer2.classList.remove('show'); // Hide the second dropdown
                    chevron2.classList.remove('rotated'); // Reset chevron for second dropdown
                    
                    // Update rectangle-2-uploaad with selected sub-item
                    rectangle2Text.textContent = subItem;
                });
            });

            // Show the second dropdown
            dropdownContainer2.classList.add('show');
            chevron2.classList.add('rotated');
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        if (dropdownContainer1.classList.contains('show')) {
            chevron1.classList.remove('rotated');
            dropdownContainer1.classList.remove('show');
        }
        if (dropdownContainer2.classList.contains('show')) {
            chevron2.classList.remove('rotated');
            dropdownContainer2.classList.remove('show');
        }
    });
});









// ALERT MESSAGE POP UP 
document.addEventListener('DOMContentLoaded', function() {
    // Show alert when "Save Changes" button is clicked
    document.getElementById('saveChangesButton').addEventListener('click', function() {
        const alertContainer = document.querySelector('.alert-container-aleert');
        alertContainer.style.display = 'block'; // Always show the alert
    });

    // Close alert when "rectangle-2-aleert" button is clicked
    document.querySelector('.rectangle-2-aleert').addEventListener('click', function() {
        const alertContainer = document.querySelector('.alert-container-aleert');
        alertContainer.style.display = 'none'; // Hide the alert
    });

    // Close alert when "ok-aleert" span is clicked
    document.querySelector('.ok-aleert').addEventListener('click', function() {
        const alertContainer = document.querySelector('.alert-container-aleert');
        alertContainer.style.display = 'none'; // Hide the alert
    });
});





// ==============================================================






// CREATE-PRODUCT FILTER 

document.addEventListener('DOMContentLoaded', function() {
    const chevron1Small = document.querySelector('.chevron-up-small');
    const dropdownContainer1Small = document.querySelector('.dropdown-container-small');
    const chevron2Small = document.querySelector('.chevron-up-3-small');
    const dropdownContainer2Small = document.querySelector('.dropdown-container-2-small');

    const itemsMapSmall = {
        Skincare: ['Toner', 'Moisturizer', 'Cream', 'Cleanser', 'Sunscreen'],
        Makeup: ['Foundations', 'Concealer', 'Blushes', 'Lip Tints', 'Eye Shadows', 'Mascaras', 'Primers'],
        'Hair Care': ['Shampoo', 'Conditioner', 'Hair Oils & Serums', 'Dry Shampoo', 'Hairspray'],
    };

    // Event listener for the first dropdown
    chevron1Small.addEventListener('click', function(event) {
        event.stopPropagation();
        chevron1Small.classList.toggle('rotated');
        dropdownContainer1Small.classList.toggle('show');
        dropdownContainer2Small.classList.remove('show'); // Hide the second dropdown
        chevron2Small.classList.remove('rotated'); // Reset chevron for second dropdown
    });

    // Handle category selection from the first dropdown
    const categoryItems1Small = document.querySelectorAll('.category-item-small');
    categoryItems1Small.forEach(item => {
        item.addEventListener('click', function(event) {
            event.stopPropagation();
            const selectedCategorySmall = this.textContent;
            dropdownContainer2Small.innerHTML = ''; // Clear previous items

            // Update the first rectangle with the selected category
            const rectangle1ContainerSmall = document.querySelector('.rectangle-1-container-small');
            rectangle1ContainerSmall.textContent = selectedCategorySmall;

            itemsMapSmall[selectedCategorySmall].forEach(subItem => {
                const span = document.createElement('span');
                span.className = 'category-item-2-small';
                span.textContent = subItem;
                dropdownContainer2Small.appendChild(span);
                
                // Add event listener for each sub-item
                span.addEventListener('click', function(e) {
                    e.stopPropagation(); // Prevent click from bubbling up
                    dropdownContainer2Small.classList.remove('show'); // Hide the second dropdown
                    chevron2Small.classList.remove('rotated'); // Reset chevron for second dropdown
                    
                    // Update the second rectangle with the selected item
                    const rectangle2ContainerSmall = document.querySelector('.rectangle-2-container-small');
                    rectangle2ContainerSmall.textContent = subItem; // Update the second rectangle
                    console.log(`Selected: ${subItem}`); // Optional: Log the selection
                });
            });

            // Show the second dropdown
            dropdownContainer2Small.classList.add('show');
            chevron2Small.classList.add('rotated');
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        if (dropdownContainer1Small.classList.contains('show')) {
            chevron1Small.classList.remove('rotated');
            dropdownContainer1Small.classList.remove('show');
        }
        if (dropdownContainer2Small.classList.contains('show')) {
            chevron2Small.classList.remove('rotated');
            dropdownContainer2Small.classList.remove('show');
        }
    });
});



// ALERT POP UP SMALL VERSION 
// ALERT MESSAGE POP UP 
document.addEventListener('DOMContentLoaded', function() {
    // Show alert when "Save Changes" button is clicked
    document.getElementById('saveChangesButton').addEventListener('click', function() {
        const alertContainerSmall = document.querySelector('.alert-container-aleert-small');
        alertContainerSmall.style.display = 'block'; // Always show the alert
    });

    // Close alert when "rectangle-2-aleert" button is clicked
    document.querySelector('.rectangle-2-aleert-small').addEventListener('click', function() {
        const alertContainerSmall = document.querySelector('.alert-container-aleert-small');
        alertContainerSmall.style.display = 'none'; // Hide the alert
    });

    // Close alert when "ok-aleert" span is clicked
    document.querySelector('.ok-aleert-small').addEventListener('click', function() {
        const alertContainerSmall = document.querySelector('.alert-container-aleert-small');
        alertContainerSmall.style.display = 'none'; // Hide the alert
    });
});





// ACTIVE LINKS FOR THE SIDEBAR MENU 
document.addEventListener("DOMContentLoaded", function () {
  // Define an array of the anchor elements and their corresponding URLs
  const linkMap = [
    {
      element: document.querySelector(".edit-profile-uploadeed"),
      url: "../../Account/user/seller-user-profile.html"
    },
    {
      element: document.querySelector(".create-product-uploadeed"),
      url: "../../Account/seller/create-product.html"
    },
    {
      element: document.querySelector(".my-products-5-uploadeed"),
      url: "../../Account/user/seller-product.html" // Update this to the actual path for My Products
    }
  ];

  // Get the current URL path
  const currentPath = window.location.pathname;

  // Loop through each link and apply active or inactive class based on the current path
  linkMap.forEach((linkItem) => {
    if (currentPath.endsWith(linkItem.url)) {
      linkItem.element.classList.add("active-link");
    } else {
      linkItem.element.classList.add("inactive-link");
    }
  });
});





// UPLOAD IMAGE
function uploadImage() {
    document.getElementById('imageUpload').click();
}

document.getElementById('imageUpload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        console.log("Image selected:", file.name);
        // Add additional logic here, like displaying the image preview.
        const reader = new FileReader();
        reader.onload = function(e) {
            // Create an image element to display the uploaded image
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '100%'; // Set max width for the image
            img.style.marginTop = '20px'; // Add margin above the image
            
            // Append the image to the body or another container
            document.body.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
});
