<template>
    <!-- HEADER COMPONENT -->
    <div class="header">
        <div class="logo"></div>
        <div class="icon1" @click="toggleProfile"></div>

        <div id="app">
            <div class="icon2" @click="toggleHeart">
                <div class="icon2-inner" :class="{ 'pink-heart': isHeartVisible }"></div>

            </div>
        </div>


        <div class="icon3" @click="cartToggle">
            <div class="icon3-inner" :class="{ 'yellow-bag': isCartVisible }"></div>
        </div>

        <Link href="/mainpage" class="title">GLOW AND GRACE</Link>

        <div class="notification-icon"></div>
        <span class="notification-count">3</span>
        <div class="message-icon"></div>
        <span class="message-count">{{ favoritesCount || 0 }}</span>
        <div style="width:1440px;height:1px;background-position:center;background-image:url('assets/img/61558280-4a75-477e-8551-805447bd4a9a.png');background-size:cover;background-repeat:no-repeat;position:absolute;top:120px;left:0;z-index:216">
        </div>
    </div>


    <!-- PROFILE DROPDOWN -->
    <div v-show="isProfileVisible" class="main-container-8">
        <div class="rectangle-3-8"></div>
        <div class="rectangle-8">
            <div class="flex-column-ee-8">
                <span class="my-account-8">My Account</span>
                <div class="line-8"></div>
                <a href="/user" class="my-profile-8">My Profile</a>
                <a href="/order" class="my-orders-8">My Orders</a>
                <a href="/details" class="track-my-order-8">Track my Order</a>
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
            </div>
        </div>
    </div>




    <!-- FAVORITES DROPDOWN -->
    <div v-show="isHeartVisible" class="main-container-heart">
        <div class="rectangle-3-8"></div>
        <section class="rectangle-container-heart">
            <div class="rectangle-heart">
                <span class="my-carts-cart">My Favorites</span>

                <div v-for="(item, index) in favorites" :key="index" class="group-1-cart">
                    <div class="group-2-cart">
                        <div class="image-heart">
                            <img :src="item.image" alt="Product Image" class="favorite-item-image">
                        </div>
                        <span class="product-name-cart">{{ item.name }}</span>
                        <div class="delete" @click="removeFavorite(index)"></div>
                    </div>
                    <div class="group-3-cart">
                        <div class="group-4-cart">
                            <div class="group-5-cart">
                                <span class="currency-cart">{{ item.price }}</span>
                                <span class="number-cart">{{ item.quantity }}</span>
                                <span class="multiply-cart">X</span>
                            </div>
                        </div>
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
                            <img :src="item.image" >
                        </div>
                        <span class="product-name-cart">{{ item.name }}</span>
                        <div class="delete" @click="removeCartItem(index)"></div>
                    </div>
                    <div class="group-3-cart">
                        <div class="group-4-cart">
                            <div class="group-5-cart">
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


</template>

<script>
import '/resources/css/index.css';
import { useFavoritesStore } from '@/stores/favorites';
import { Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';


export default {
    name: 'MainHeaderComponent',
    components: {
        Link,
    },
    props: {
        favoritesCount: {
            type: Number,
            default: 0,
        }
    },

    data() {
        return {
            isHeartVisible: false,
            isCartVisible: false,
            isProfileVisible: false,

            favorites: [
                {
                    name: "SUNSILK Shampoo Smooth & Manageable 1L + 650ML Refill Pack",
                    price: "₱349",
                    quantity: 2,
                    image: '/assets/img/sunsilk.png'
                },
            ],

            cartItems: [
                {
                    name: "TRESEMME Keratin Smooth Anti-Frizz Shampoo 340ml",
                    price: "₱335",
                    quantity: 2,
                    image: '/assets/img/shampoo.png'
                },
            ]
        };
    },
    setup() {
        const favoritesStore = useFavoritesStore();

        return {
            favoritesCount: favoritesStore.favoritesCount,  // Bind favoritesCount to store
        };
    },
    methods: {
        fetchFavoritesCount() {
            this.$store.fetchFavoritesCount();
        },

        mounted() {
        this.fetchFavoritesCount();
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

        removeCartItem(index) {
            this.cartItems.splice(index, 1);
        },

        logout() {
            Inertia.post('/logout', {}, {
                onFinish: () => {
                    Inertia.visit('/');
                }
            });
        }
    }
};
</script>
