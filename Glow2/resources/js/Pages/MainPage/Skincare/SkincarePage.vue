<template>
    <div class="main-container">
        <MainHeaderComponent :favoritesCount="favoritesStore.favoritesCount" />

        <NavbarComponent
            :haircareUrl="haircareUrl"
            :homeUrl="homeUrl"
            :skincareUrl="skincareUrl"
        />
        <div class="main-container-2">
            <div class="flex-row">
                <div class="line"></div>
                <span class="title-holder">SKINCARE PRODUCTS</span>
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

            <FilterComponent category="Skincare" />
        </div>

        <section class="product-section-products">
            <div class="product-container-products" v-for="product in products" :key="product.id">
                <div class="product-image-products">
                    <img :src="product.image" alt="Product Image">
                </div>
                <div class="product-title-products">{{ product.name }}</div>
                <div class="product-details-products">
                    <img
                        :src="product.is_favorited ? '/assets/img/heart-color.png' : '/assets/img/heart.png'"
                        alt="Favorite Icon"
                        @click="toggleFavorite(product)"
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
import axios from 'axios';
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';
import FilterComponent from '@/Components/UI/FilterComponent.vue';
import { useFavoritesStore } from '@/stores/favorites';

export default defineComponent({
    name: 'SkincarePage',
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
        };
    },
    setup() {
        const favoritesStore = useFavoritesStore();  // Access the store here

        // Fetch products and update the list
        const products = ref([]);

        const fetchProducts = async () => {
            try {
                const response = await axios.get('/api/products', {
                    params: { type_id: 1 },
                });
                products.value = response.data;
                const favoriteResponse = await axios.get('/api/favorites');  // Get a list of favorited products
                const favoritedProductIds = favoriteResponse.data.map(p => p.product_id);

                products.value.forEach(product => {
                    product.is_favorited = favoritedProductIds.includes(product.id);
                });
            } catch (error) {
                console.error('Error fetching products:', error);
            }
        };

        // Toggle favorite status and update count
        const toggleFavorite = async (product) => {
            const wasFavorited = product.is_favorited;

            // Toggle the favorite status locally
            product.is_favorited = !product.is_favorited;

            // Update favorites count based on the new state
            if (product.is_favorited) {
                favoritesStore.favoritesCount += 1;
            } else {
                favoritesStore.favoritesCount -= 1;
            }

            try {
                // Make the API call to persist the favorite state
                const response = await axios.post('/api/favorites/toggle', { product_id: product.id });

                // Check the response to ensure it was successful
                if (response.data.status !== 'added' && response.data.status !== 'removed') {
                    // If something went wrong, revert the changes
                    product.is_favorited = wasFavorited;

                    // Adjust favorites count back to the original value
                    if (product.is_favorited) {
                        favoritesStore.favoritesCount += 1;
                    } else {
                        favoritesStore.favoritesCount -= 1;
                    }
                }
            } catch (error) {
                console.error('Error toggling favorite:', error);
                // Revert the changes if there is an error
                product.is_favorited = wasFavorited;

                if (product.is_favorited) {
                    favoritesStore.favoritesCount += 1;
                } else {
                    favoritesStore.favoritesCount -= 1;
                }
            }
        };


        // Fetch products when component is mounted
        onMounted(() => {
            fetchProducts();
        });

        return {
            products,
            favoritesStore,  // Expose the store
            toggleFavorite,
        };
    },
});
</script>


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
