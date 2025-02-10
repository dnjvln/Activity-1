<template>
    <!-- HEADER COMPONENT -->
    <div class="header">
        <Link href="/mainpage" class="title">GLOW AND GRACE</Link>
        <div class="logo"></div>
        
        <div class="icons-adjust">
        <div class="icon1" @click="toggleProfile"></div>

        <div id="app">
            <div class="icon2" @click="toggleHeart">
                <div class="icon2-inner" :class="{ 'pink-heart': isHeartVisible }"></div>

            </div>
        </div>


        <div class="icon3" @click="cartToggle">
            <div class="icon3-inner" :class="{ 'yellow-bag': isCartVisible }"></div>
        </div>

    
        <div class="notification-icon"></div>
        <span class="message-icon"></span>
        <span class="notification-count">{{ cartCount || 0 }}</span>
        <span class="message-count">{{ reactiveFavoritesCount || 0}}</span>
        <div style="width:1440px;height:1px;background-position:center;background-image:url('assets/img/61558280-4a75-477e-8551-805447bd4a9a.png');background-size:cover;background-repeat:no-repeat;position:absolute;top:120px;left:0;z-index:216">
        </div>
    </div>
    </div>

    <div class="dropdown-adjust">
    <!-- PROFILE DROPDOWN -->
    <div v-show="isProfileVisible" class="main-container-8">
        <div class="rectangle-3-8"></div>
        <div class="rectangle-8">
            <div class="flex-column-ee-8">
                <span class="my-account-8">My Account</span>
                <div class="line-8"></div>
                <a :href="profileLink" class="my-profile-8">My Profile</a>
                <a href="/order" class="my-orders-8">My Orders</a>
                <a href="/details" class="track-my-order-8">Track my Order</a>
                <a href="/sellerproduct" class="upload-a-product" v-if="isSeller">My Products</a>
                <div class="line-1-8"></div>
                <Link href="/home" class="logout-8">
                    <button class="button-8"  @click="logout">
                        <span class="view-all-products-8">LOGOUT</span>
                    </button>
                </Link>
            </div>
            <div class="flex-column-fc-8">
          <div class="user-profile-icon-8"></div>
          <div class="box-8">
            <div class="icon-8"></div>
          </div>
          <div class="truck-8">
            <div class="truck-2-8"></div>
          </div>
          <div class="product-icon" v-if="isSeller">
            <div class="truck-2-8"></div>
          </div>
        </div>
      </div>
    </div>




    <!-- FAVORITES DROPDOWN -->
    <div v-show="isHeartVisible" class="main-container-heart">
        <div class="rectangle-3-8"></div>
        <section class="rectangle-container-heart">
            <div class="rectangle-heart">
                <span class="my-carts-cart">My Favorites</span>

                <div v-for="(item, index) in favorites.slice(0, 3)" :key="index" class="group-1-cart">
                    <div class="group-2-cart">
                        <div class="image-heart">
                            <img :src="item.image" alt="Product Image" class="favorite-item-image" />
                        </div>
                        <span class="product-name-cart">{{ item.name }}</span>
                        <div class="delete" @click="removeFavorite(item)"></div>
                    </div>
                </div>

                <Link href="/favorites" class="button-heart">
                    <span class="view-all-products-cart">View Favorites</span>
                </Link>
            </div>
        </section>
    </div>




    <!-- CARTS DROPDOWN -->
        <div v-if="isCartVisible" class="main-container-cart">
            <div class="rectangle-3-8"></div>
            <section class="rectangle-container">
                <div class="rectangle-cart">
                    <span class="my-carts-cart">My Carts</span>
                <div v-for="(item, index) in cartItems" :key="index" class="group-1-cart">
                    <div class="group-2-cart">
                        <div class="image-cart">
                            <img :src="item.image || '/assets/img/default-product.png'"
                                 :alt="item.name"
                                 class="cart-item-image">
                        </div>
                        <span class="product-name-cart">{{ item.name }}</span>
                        <div class="delete" @click="removeCartItem(item.id)"></div>
                    </div>
                    <div class="group-3-cart">
                        <div class="group-4-cart">
                            <div class="group-5-cart mt-20">
                                <span class="currency-cart">{{ item.price }}</span>
                                <span class="number-cart">{{ item.quantity }}</span>
                                <span class="multiply-cart">X</span>
                            </div>
                        </div>
                    </div>
                </div>
                <Link href="/carts" class="button-cart">
                    <span class="view-all-products-cart">View Cart</span>
                </Link>
            </div>
        </section>
    </div>
</div>



</template>

<script>
import '/resources/css/index.css';
import { Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import axios from 'axios';
import { useFavoritesStore } from '@/stores/favorites';
import { onMounted, computed } from 'vue';

export default {
    name: 'MainHeaderComponent',
    components: {
        Link,
    },
    data() {
        return {
            isHeartVisible: false,
            isCartVisible: false,
            isProfileVisible: false,

            favorites: [],

            cartItems: [],
            cartCount: 0,
        };
    },
    computed: {
        reactiveFavoritesCount() {
            return this.favoritesStore.favoritesCount > 0
                ? this.favoritesStore.favoritesCount
                : null;
        },
        profileLink() {
            const userRole = this.$page.props.auth.user?.role;
            return userRole === 'Seller' ? '/sellerprofile' : '/user';
        },
        isSeller() {
            return this.$page.props.auth.user?.role === 'Seller';
        },
    },
    mounted() {
        this.favoritesStore.fetchFavoritesCount();
        this.fetchCartItems();
        this.updateCartCount();
    },
    setup() {
        const favoritesStore = useFavoritesStore();

        return {
            favoritesStore,
        };
    },
    methods: {
        async fetchFavorites() {
            try {
                const response = await axios.get('/api/favorite-products');
                this.favoritesStore.favorites = response.data;
                this.favorites = response.data;
            } catch (error) {
                console.error('Error fetching favorites:', error.response?.data || error.message);
            }
        },
        async removeFavorite(item) {
            try {
                await axios.post('/api/favorites/toggle', { product_id: item.id });
                // Update the favorites list and count
                this.favoritesStore.favorites = this.favoritesStore.favorites.filter(fav => fav.id !== item.id);
                this.favoritesStore.favoritesCount = this.favoritesStore.favorites.length;
            } catch (error) {
                console.error('Error removing favorite:', error.response?.data || error.message);
            }
        },
        toggleHeart() {
            this.isHeartVisible = !this.isHeartVisible;
        },
        cartToggle() {
            this.isCartVisible = !this.isCartVisible;
        },
        toggleProfile() {
            this.isProfileVisible = !this.isProfileVisible;
        },
        logout() {
            Inertia.post('/logout', {}, {
                onFinish: () => {
                    Inertia.visit('/');
                }
            });
        },
        async fetchCartItems() {
            try {
                const response = await axios.get('/api/cart');
                this.cartItems = response.data.map(item => ({
                    id: item.id,
                    name: item.product.name,
                    price: `₱${item.product.price}`,
                    quantity: item.quantity,
                    image: item.product.image ? `/storage/${item.product.image}` : '/assets/img/default-product.png'
                }));
            } catch (error) {
                console.error('Error fetching cart items:', error);
            }
        },

        async updateCartCount() {
            try {
                const response = await axios.get('/api/cart/count');
                this.cartCount = response.data.count;
            } catch (error) {
                console.error('Error updating cart count:', error);
            }
        },

        async removeCartItem(cartId) {
            try {
                await axios.delete(`/api/cart/${cartId}`);
                await this.fetchCartItems();
                await this.updateCartCount();
            } catch (error) {
                console.error('Error removing cart item:', error);
            }
        },
    },
};
</script>

<style scoped>
.dropdown-adjust{
    position: absolute;
    left: -100px;
}
.icons-adjust{
    position: absolute;
    left: -60px;
}
.delete {
    cursor: pointer;
    width: 20px;
    height: 20px;
    background-image: url('/assets/img/delete.png');
    background-size: contain;
    background-repeat: no-repeat;
    transition: transform 0.2s ease;
}

.delete:hover {
    transform: scale(1.1);
}

.image-cart {
    width: 90px;
    height: 90px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
    border-radius: 4px;
}

.cart-item-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 4px;
}
 
.group-2-cart {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px;
}

.product-name-cart {
    flex: 1;
    font-size: 14px; /* Optional: adjust text size if needed */
    margin-left: 4px;
}
</style>


