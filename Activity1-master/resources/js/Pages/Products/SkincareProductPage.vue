<template>
    <div class="main-container" v-if="product">
        <MainHeaderComponent :favoritesCount="favoritesStore.favoritesCount" ref="headerComponent" />
        
        <NavbarComponent
            :haircareUrl="haircareUrl"
            :homeUrl="homeUrl"
            :skincareUrl="skincareUrl"
        />

        <div class="main-container-2">
            <div class="flex-row">
                <div class="line"></div>
                <span class="title-holder">{{ product.subtype.name }} PRODUCT</span>
                <div class="line-1"></div>
            </div>

            <div class="product-details">
                <div class="product-image-container">
                    <img :src="product.image" :alt="product.name" class="image-product">
                </div>

                <div class="product-info">
                    <h1 class="product-title">{{ product.name }}</h1>
                    <div class="price-section">
                        <span class="price">₱{{ product.price }}</span>
                    </div>
                    
                    <div class="quantity-section">
                        <button @click="decreaseQuantity" class="quantity-btn">-</button>
                        <span class="quantity">{{ quantity }}</span>
                        <button @click="increaseQuantity" class="quantity-btn">+</button>
                    </div>

                    <div class="action-buttons">
                        <button class="add-to-cart-btn" @click="addToCart">
                            Add To Cart
                            <img src="/assets/img/shopping-cart.png" alt="Cart" class="cart-icon">
                        </button>
                        
                        <button class="favorite-btn" @click="toggleFavorite">
                            {{ product.is_favorited ? 'Remove from Favorites' : 'Add to Favorites' }}
                            <i :class="['fas', product.is_favorited ? 'fa-heart' : 'fa-heart-o']"></i>
                        </button>
                        
                        <button class="buy-now-btn" @click="buyNow">
                            Buy Now
                        </button>
                    </div>

                    <div class="product-description">
                        <h2>Product Description</h2>
                        <div v-html="formattedDescription"></div>
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            <div class="related-products" v-if="product.related_products?.length">
                <h2>Related {{ product.subtype.name }} Products</h2>
                <div class="related-products-grid">
                    <div v-for="relatedProduct in product.related_products" 
                         :key="relatedProduct.id"
                         class="related-product-card"
                         @click="viewProduct(relatedProduct.id)">
                        <img :src="relatedProduct.image" :alt="relatedProduct.name">
                        <h3>{{ relatedProduct.name }}</h3>
                        <p>₱{{ relatedProduct.price }}</p>
                    </div>
                </div>
            </div>
        </div>

        <FooterComponent
            :aboutUrl="aboutUrl"
            :homeUrl="homeUrl"
            :contactUrl="contactUrl"
        />
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import axios from 'axios';
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import { useFavoritesStore } from '@/stores/favorites';

export default defineComponent({
    name: 'SkincareProductPage',
    components: {
        MainHeaderComponent,
        NavbarComponent,
        FooterComponent,
    },
    props: {
        productId: {
            type: [Number, String],
            required: true
        }
    },
    data() {
        return {
            product: null,
            quantity: 1,
            isLoading: true,
            error: null,
            homeUrl: '/home',
            haircareUrl: '/haircare',
            skincareUrl: '/skincare',
            aboutUrl: '/about',
            contactUrl: '/contact',
        };
    },
    setup() {
        const favoritesStore = useFavoritesStore();
        return { favoritesStore };
    },
    computed: {
        formattedDescription() {
            return this.product?.description?.replace(/\n/g, '<br>');
        }
    },
    methods: {
        async fetchProductDetails() {
            try {
                const response = await axios.get(`/api/product-details/${this.productId}`);
                this.product = response.data;
                this.isLoading = false;
            } catch (error) {
                console.error('Error fetching product details:', error);
                this.error = 'Failed to load product details';
                this.isLoading = false;
            }
        },
        increaseQuantity() {
            this.quantity++;
        },
        decreaseQuantity() {
            if (this.quantity > 1) {
                this.quantity--;
            }
        },
        async addToCart() {
            try {
                await axios.post('/api/cart/add', {
                    product_id: this.product.id,
                    quantity: this.quantity
                });
                
                this.$notify?.({
                    type: 'success',
                    text: 'Product added to cart successfully!'
                });
            } catch (error) {
                console.error('Error adding to cart:', error);
                this.$notify?.({
                    type: 'error',
                    text: 'Failed to add product to cart'
                });
            }
        },
        async toggleFavorite() {
            try {
                await axios.post('/api/favorites/toggle', {
                    product_id: this.product.id
                });
                this.product.is_favorited = !this.product.is_favorited;
                
                // Update favorites count in the store
                if (this.product.is_favorited) {
                    this.favoritesStore.incrementCount();
                } else {
                    this.favoritesStore.decrementCount();
                }
            } catch (error) {
                console.error('Error toggling favorite:', error);
            }
        },
        viewProduct(productId) {
            router.visit(`/products/${productId}`);
        },
        buyNow() {
            router.post('/cart/prepare-order', {
                products: [{
                    id: this.product.id,
                    quantity: this.quantity
                }]
            });
        }
    },
    mounted() {
        this.fetchProductDetails();
    }
});
</script>

<style scoped>
.main-container {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.main-container-2 {
    flex: 1;
    padding: 2rem;
}

.product-details {
    display: flex;
    gap: 2rem;
    margin-top: 2rem;
}

.product-image-container {
    flex: 0 0 40%;
}

.image-product {
    width: 100%;
    max-width: 400px;
    height: auto;
    object-fit: contain;
}

.product-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.product-title {
    font-size: 2rem;
    color: #731b81;
    font-weight: bold;
}

.price {
    font-size: 1.5rem;
    color: #ae52b0;
    font-weight: bold;
}

.quantity-section {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.quantity-btn {
    padding: 0.5rem 1rem;
    border: 1px solid #731b81;
    background: white;
    color: #731b81;
    cursor: pointer;
    border-radius: 4px;
}

.quantity {
    font-size: 1.2rem;
    min-width: 40px;
    text-align: center;
}

.action-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.action-buttons button {
    padding: 0.8rem 1.5rem;
    border-radius: 4px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: bold;
}

.add-to-cart-btn {
    background: #731b81;
    color: white;
    border: none;
}

.favorite-btn {
    background: white;
    color: #731b81;
    border: 1px solid #731b81;
}

.buy-now-btn {
    background: #ae52b0;
    color: white;
    border: none;
}

.product-description {
    margin-top: 2rem;
}

.product-description h2 {
    color: #731b81;
    margin-bottom: 1rem;
}

.related-products {
    margin-top: 3rem;
}

.related-products h2 {
    color: #731b81;
    margin-bottom: 1.5rem;
}

.related-products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1.5rem;
}

.related-product-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 1rem;
    cursor: pointer;
    transition: transform 0.2s;
}

.related-product-card:hover {
    transform: scale(1.05);
}

.related-product-card img {
    width: 100%;
    height: 150px;
    object-fit: contain;
    margin-bottom: 0.5rem;
}

.related-product-card h3 {
    color: #731b81;
    font-size: 1.1rem;
    margin-bottom: 0.5rem;
}

.related-product-card p {
    color: #ae52b0;
    font-weight: bold;
}

.cart-icon {
    width: 20px;
    height: 20px;
}

.flex-row {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.line, .line-1 {
    flex: 1;
    height: 1px;
    background: #731b81;
}

.title-holder {
    color: #731b81;
    font-size: 1.5rem;
    font-weight: bold;
    white-space: nowrap;
}
</style>

