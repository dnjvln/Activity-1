<template>
    <div class="main-container">
    <MainHeaderComponent />
    <NavbarComponent
        :haircareUrl="haircareUrl"
        :makeuprl="makeupUrl"
        :skincareUrl="skincareUrl"
    />

        <div class="image-container">
            <span class="background-image"></span>

            <span class="icon-left" @click="slideLeft"></span>
            <span class="icon-right" @click="slideRight"></span>

            <div class="sliding-wrapper">
                <img
                    v-if="isPrimaryVisible"
                    class="sliding-image"
                    :src="currentImageSrc"
                    :key="currentImageSrc"
                />
                <img
                    v-else
                    class="sliding-image"
                    :src="nextImageSrc"
                    :key="nextImageSrc"
                />
            </div>
        </div>




        <!-- SKINCARE -->
        <div class="text-container">
            <div class="text-left">
                <span class="text-part1">Grab the best deals on</span>
                <span class="text-part2"></span>
                <span class="text-highlight"> Skincare Products</span>
            </div>

            <div class="view-all-container">
                <span class="view-all-text">View All</span>
                <Link href="/skincare">
                    <div class="view-all-icon"></div>
                </Link>
            </div>
        </div>

        <div class="linebold-skincare"></div>


        <section class="product-section-skincare">
            <div
                class="product-container-products"
                v-for="product in skincareProducts"
                :key="product.id"
            >
                <div class="product-image-products">
                    <img :src="product.image_url || '/assets/img/placeholder.png'" alt="Product Image" />
                </div>
                <div class="product-title-products">{{ product.name }}</div>
                <div class="product-details-price">
                    <div class="product-price-products">₱{{ product.price }}</div>
                </div>
            </div>
        </section>



            <!-- HAIRCARE -->
            <div class="text-container-2">
                <div class="text-left-2">
                    <span class="text-part1-2">Top picks on</span>
                    <span class="text-part2-2"></span>
                    <span class="text-highlight-2"> Hair Care Products</span>
                </div>
                <div class="view-all-container-2">
                    <span class="view-all-text-2">View All</span>
                    <Link href="/haircare">
                        <div class="view-all-icon-2"></div>
                    </Link>
                </div>
            </div>

        <div class="linebold-haircare"></div>

        <section class="product-section-haircare">
            <div
                class="product-container-products"
                v-for="product in haircareProducts"
                :key="product.id"
            >
                <div class="product-image-products">
                    <img :src="product.image_url || '/assets/img/placeholder.png'" alt="Product Image" />
                </div>
                <div class="product-title-products">{{ product.name }}</div>
                <div class="product-details-price">
                    <div class="product-price-products">₱{{ product.price }}</div>
                </div>
            </div>
        </section>


            <!-- MAKEUP -->
            <div class="text-container-3">
                <div class="text-left-3">
                    <span class="text-part1-3">Featured</span>
                    <span class="text-part2-3"></span>
                    <span class="text-highlight-3"> Makeup Products</span>
                </div>
                <div class="view-all-container-3">
                    <span class="view-all-text-3">View All</span>
                    <Link href="/makeup">
                        <div class="view-all-icon-3"></div>
                    </Link>
                </div>
            </div>

        <div class="linebold-makeup"></div>

        <section class="product-section-makeup">
            <div
                class="product-container-products"
                v-for="product in makeupProducts"
                :key="product.id"
            >
                <div class="product-image-products">
                    <img :src="product.image_url || '/assets/img/placeholder.png'" alt="Product Image" />
                </div>
                <div class="product-title-products">{{ product.name }}</div>
                <div class="product-details-price">
                    <div class="product-price-products">₱{{ product.price }}</div>
                </div>
            </div>
        </section>

    </div>

    <FooterComponent
        :aboutUrl="aboutUrl"
        :homeUrl="homeUrl"
        :contactUrl="contactUrl"
    />

</template>

<script>
import '/resources/css/skincare.css';
import '/resources/css/index.css';
import '/resources/css/test.css';
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/vue3';
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';
import axios from 'axios';

export default defineComponent({
    name: 'MainPage',
    components: {
        MainHeaderComponent,
        FooterComponent,
        NavbarComponent,
        Link,
    },
    data() {
        return {
            aboutUrl: '/about',
            homeUrl: '/home',
            contactUrl: '/contact',
            haircareUrl: '/haircare',
            makeupUrl: '/makeup',
            skincareUrl: '/skincare',
            skincareProducts: [],
            haircareProducts: [],
            makeupProducts: [],

            currentImageIndex: 0,
            images: [
                '/assets/img/e8ee728669d3e8cfbbcdae043d3851e7caabcfc1.png',
                '/assets/img/slidingimage2.png'
            ],
            isPrimaryVisible: true,
        };
    },
    mounted() {
        axios
            .get('/mainpage/products')
            .then(response => {
                this.skincareProducts = response.data.skincareProducts;
                this.haircareProducts = response.data.haircareProducts;
                this.makeupProducts = response.data.makeupProducts;
            })
            .catch(error => {
                console.error("Failed to fetch products:", error);
            });
    },
    computed: {
        currentImageSrc() {
            return this.images[this.currentImageIndex];
        },
        nextImageSrc() {
            const nextIndex = (this.currentImageIndex + 1) % this.images.length;
            return this.images[nextIndex];
        },
    },
    methods: {
        slideLeft() {
            this.switchImage(-1);
        },
        slideRight() {
            this.switchImage(1);
        },
        switchImage(direction) {
            this.isPrimaryVisible = !this.isPrimaryVisible;

            setTimeout(() => {
                this.currentImageIndex =
                    (this.currentImageIndex + direction + this.images.length) % this.images.length;
                this.isPrimaryVisible = !this.isPrimaryVisible;
            }, 500);
        },
    },
});
</script>



<style scoped>

.product-section-skincare {
    position: absolute;
    top: 710px;
    left: 96px;
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.product-section-haircare {
    position: absolute;
    top: 1160px;
    left: 96px;
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.product-section-makeup {
    position: absolute;
    top: 1600px;
    left: 96px;
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.product-details-price {
    display: flex;
    justify-content: center;
    padding: 18px;
}

.product-container-products {
    border: 1px solid #b5b5b5;
    height: 280px;
    border-radius: 12px;
    width: 220px;
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s;
    position: relative;
    cursor: pointer;
    margin: 4px;
}

.product-container-products:hover {
    transform: scale(1.05);
}

.product-image-products {
    width: 100%;
    height: 160px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.product-image-products img {
    max-width: 80%;
    max-height: 80%;
}

.product-title-products {
    padding: 6px;
    font-family: Abel, var(--default-font-family);
    color: #731b81;
    font-size: 18px;
    font-weight: 400;
    line-height: 20px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    height: 47px;
}

.product-price-products {
    font-size: 20px;
    font-weight: bold;
    font-family: Poppins, var(--default-font-family);
    font-weight: 250;
    -webkit-text-stroke: 1px #ae52b0;
    color: #ae52b0;
}

</style>
