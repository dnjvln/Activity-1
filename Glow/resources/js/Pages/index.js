
// NAVBAR BUTTONS BOUNCE ANIMATION

export function initializeBounceAnimation() {
    document.querySelectorAll('.button').forEach(button => {
        button.addEventListener('click', function () {
            this.classList.add('bounce');

            this.addEventListener(
                'animationend',
                () => {
                    this.classList.remove('bounce');
                },
                { once: true }
            );
        });
    });
}

// PROFILE POP-UP
export const ToggleProfile = {
    data() {
        return {
            isProfileVisible: false,
        };
    },
    methods: {
        toggleProfile() {
            this.isProfileVisible = !this.isProfileVisible;
        },
    },
    template: `
        <div class="icon1" @click="toggleProfile"></div>
    `,
};
//FAVORITES POP-UP
export const Favorites = {
    data() {
        return {
            isHeartVisible: false,
        };
    },
    methods: {
        toggleHeart() {
            this.isHeartVisible = !this.isHeartVisible;
        },
    },
    template: `
    <div class="icon2" @click="toggleHeart">
      <div class="icon2-inner" :class="{ 'pink-heart': isHeartVisible }"></div>
    </div>
  `,
};

// CART DROPDOWN
export const ToggleCart = {
    data() {
        return {
            isCartVisible: false,
        };
    },
    methods: {
        cartToggle() {
            this.isCartVisible = !this.isCartVisible;
        },
    },
    template: `
    <div class="icon3" @click="cartToggle">
      <div class="icon3-inner" :class="{ 'yellow-bag': isCartVisible }"></div>
    </div>
  `,
};




// SLIDING IMAGE
let currentImage = 0;
const images = [
    '/assets/img/e8ee728669d3e8cfbbcdae043d3851e7caabcfc1.png',
    '/assets/img/image2.png'
];

function slideLeft() {
    currentImage = currentImage === 0 ? images.length - 1 : currentImage - 1;
    return images[currentImage];
}

function slideRight() {
    currentImage = (currentImage + 1) % images.length;
    return images[currentImage];
}

// Export the functions
export { slideLeft, slideRight };

