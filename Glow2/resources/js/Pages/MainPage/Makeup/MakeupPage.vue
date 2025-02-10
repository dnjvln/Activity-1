<template>
    <div class="main-container">
        <MainHeaderComponent />
        <NavbarComponent
            :haircareUrl="haircareUrl"
            :homeUrl="homeUrl"
            :skincareUrl="skincareUrl"
        />
        <div class="main-container-2">
            <div class="flex-row">
                <div class="line"></div>
                <span class="title-holder">MAKEUP PRODUCTS</span>
                <div class="line-1"></div>
            </div>
            <div class="rectangle">
                <div class="rectangle-2">
                    <input class="group-input" placeholder="Search product..." />
                </div>
                <span class="search-product">Search Product: </span>
                <span class="filter">Filter</span>
                <div class="filtering"><div class="vector"></div></div>
            </div>

            <FilterComponent category="Makeup" />
        </div>

        <section class="product-section-products">
            <div class="product-container-products" v-for="product in products" :key="product.id">
                <div class="product-image-products">
                    <img :src="product.image || '/path/to/default-image.jpg'" alt="Product Image">
                </div>
                <div class="product-title-products">{{ product.name }}</div>
                <div class="product-details-products">
                    <img
                        :src="product.is_favorited ? '/assets/img/heart-color.png' : '/assets/img/heart.png'"
                        alt="Favorite Icon"
                        @click="toggleFavorite(product.id)"
                    />
                    <div class="product-price-products">₱{{ product.price }}</div>
                    <img src="/assets/img/shopping-cart.png" alt="Cart Icon">
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
import { defineComponent, ref, onMounted } from 'vue';
import axios from 'axios'; // Ensure axios is installed
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';
import FilterComponent from '@/Components/UI/FilterComponent.vue';

export default defineComponent({
    name: 'MakeupPage',
    components: {
        MainHeaderComponent,
        FooterComponent,
        NavbarComponent,
        FilterComponent,
    },
    data() {
        return {
            aboutUrl: '/about',
            homeUrl: '/home',
            contactUrl: '/contact',
            haircareUrl: '/haircare',
            makeupUrl: '/makeup',
            skincareUrl: '/skincare',
            products: [],
            favoritesCount: 0,
        };
    },
    methods: {
        async fetchProducts() {
            try {
                const response = await axios.get('/api/products', {
                    params: { type_id: 3 },
                });

                this.products = response.data;
                this.favoritesCount = response.data.favoritesCount;
                this.initializeFavoritesFromLocalStorage();
            } catch (error) {
                console.error('Error fetching products:', error);
            }
        },
        initializeFavoritesFromLocalStorage() {
            const savedFavorites = JSON.parse(localStorage.getItem('favorites') || '{}');

            this.products.forEach((product) => {
                if (savedFavorites[product.id]) {
                    product.is_favorited = savedFavorites[product.id];
                }
            });
        },

        toggleFavorite(productId) {
            const product = this.products.find(p => p.id === productId);
            if (product) {
                product.is_favorited = !product.is_favorited;
                this.favoritesCount = this.products.filter(p => p.is_favorited).length;
                this.saveFavoritesToLocalStorage();
            }
        },

        saveFavoritesToLocalStorage() {
            const favorites = {};
            this.products.forEach((product) => {
                if (product.is_favorited) {
                    favorites[product.id] = true;
                } else {
                    favorites[product.id] = false;
                }
            });
            localStorage.setItem('favorites', JSON.stringify(favorites));
        }
    },

    mounted() {
        this.fetchProducts();
    }
});
</script>

<style scoped>

<style scoped>

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
