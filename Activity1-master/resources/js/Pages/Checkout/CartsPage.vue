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
                <span class="title-holder">MY CARTS</span>
                <div class="line-1"></div>
            </div>

            <div class="all-container">
                <div class="cart-header-box">
                    <div class="cart-header">
                        <div class="header-item select-header">
                            <input
                                type="checkbox"
                                v-model="selectAll"
                                @change="toggleSelectAll"
                            >
                        </div>
                        <div class="header-item-product">Product</div>
                        <div class="header-item-price">Price</div>
                        <div class="header-item-quantity">Quantity</div>
                        <div class="header-item-subtotal">Subtotal</div>
                        <div class="header-item">Action</div>
                    </div>
                </div>

                <div class="cart-items-box">
                    <div v-for="item in cartItems" :key="item.id" class="cart-item">
                        <div class="item-box-checkbox">
                            <input type="checkbox" v-model="item.selected">
                        </div>
                        <div class="item-box product-info">
                            <img :src="item.image" :alt="item.name" class="product-image">
                            <p class="product-title">{{ item.name }}</p>
                        </div>
                        <div class="item-box item-price">₱{{ item.price }}</div>
                        <div class="item-box item-quantity">
                            <button @click="decrementQuantity(item)" class="quantity-btn">-</button>
                            <span>{{ item.quantity }}</span>
                            <button @click="incrementQuantity(item)" class="quantity-btn">+</button>
                        </div>
                        <div class="item-box item-subtotal">₱{{ calculateSubtotal(item) }}</div>
                        <div class="item-box item-action">
                            <button class="delete-btn" @click="removeCartItem(item.id)">
                                <img src="/assets/img/delete.png" alt="Delete" class="delete-icon">
                            </button>
                        </div>
                    </div>
                </div>

                <div class="cart-summary" v-if="cartItems.length > 0">
                    <div class="summary-row">
                        <span>Selected Items: {{ selectedItems.length }}</span>
                        <span>Total Amount: ₱{{ selectedTotalAmount }}</span>
                    </div>
                    <Link
                        :href="`/order?items=${encodeURIComponent(JSON.stringify(selectedItems))}&totalAmount=${selectedTotalAmount}`"
                        class="button-carts"
                        :class="{ 'disabled': selectedItems.length === 0 }"
                        preserve-scroll
                        method="get"
                    >
                        <span class="view-all-products-carts">CHECKOUT</span>
                    </Link>
                </div>

                <div v-else class="empty-cart">
                    <p>Your cart is empty</p>
                    <Link href="/mainpage" class="continue-shopping">
                        Continue Shopping
                    </Link>
                </div>
            </div>
        </div>


    </div>
    <FooterComponent
            :aboutUrl="aboutUrl"
            :homeUrl="homeUrl"
            :contactUrl="contactUrl"
        />
</template>

<script>
import { defineComponent, ref, computed, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import axios from 'axios';
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';
import '/resources/css/skincare.css';
import '/resources/css/index.css';
import '/resources/css/carts.css';

export default defineComponent({
    name: 'CartsPage',
    components: {
        MainHeaderComponent,
        FooterComponent,
        NavbarComponent,
        Link,
    },

    setup() {
        const cartItems = ref([]);
        const selectAll = ref(false);

        const urls = {
            aboutUrl: '/about',
            homeUrl: '/home',
            contactUrl: '/contact',
            haircareUrl: '/haircare',
            makeupUrl: '/makeup',
            skincareUrl: '/skincare',
        };

        const selectedItems = computed(() => {
            return cartItems.value.filter(item => item.selected);
        });

        const selectedTotalAmount = computed(() => {
            return selectedItems.value
                .reduce((sum, item) => sum + (parseFloat(item.price) * item.quantity), 0)
                .toFixed(2);
        });

        const fetchCartItems = async () => {
            try {
                const response = await axios.get('/api/cart');
                cartItems.value = response.data.map(item => ({
                    id: item.id,
                    name: item.product.name,
                    price: item.product.price,
                    quantity: item.quantity,
                    image: item.product.image ? `/storage/${item.product.image}` : '/assets/img/default-product.png',
                    selected: false
                }));
            } catch (error) {
                console.error('Error fetching cart items:', error);
            }
        };

        const toggleSelectAll = () => {
            cartItems.value.forEach(item => {
                item.selected = selectAll.value;
            });
        };

        const calculateSubtotal = (item) => {
            return (parseFloat(item.price) * item.quantity).toFixed(2);
        };

        const removeCartItem = async (cartId) => {
            try {
                await axios.delete(`/api/cart/${cartId}`);
                await fetchCartItems();
            } catch (error) {
                console.error('Error removing cart item:', error);
            }
        };

        const incrementQuantity = async (item) => {
            try {
                await axios.post('/api/cart/update-quantity', {
                    order_id: item.id,
                    quantity: item.quantity + 1
                });
                item.quantity++;
            } catch (error) {
                console.error('Error updating quantity:', error);
            }
        };

        const decrementQuantity = async (item) => {
            if (item.quantity > 1) {
                try {
                    await axios.post('/api/cart/update-quantity', {
                        order_id: item.id,
                        quantity: item.quantity - 1
                    });
                    item.quantity--;
                } catch (error) {
                    console.error('Error updating quantity:', error);
                }
            }
        };

        onMounted(fetchCartItems);

        return {
            ...urls,
            cartItems,
            selectAll,
            selectedItems,
            selectedTotalAmount,
            calculateSubtotal,
            removeCartItem,
            incrementQuantity,
            decrementQuantity,
            toggleSelectAll,
        };
    },
});
</script>

<style scoped>
.cart-header {
    display: flex;
    padding: 15px;
    font-weight: bold;
}

.header-item {
    flex: 1;
    text-align: center;
}

.select-header {
    flex: 0.5;
}

.cart-item {
    display: flex;
    align-items: center;
    padding: 15px;
    border-bottom: 1px solid #eee;
}


.item-box {
    flex: 1;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins', sans-serif;
    font-size: 20px;
}

.item-box-checkbox {
    flex: 0.5;
    text-align: center;
}

.product-info {
    flex: 1;
    display: flex;
    align-items: center;
    text-align: left;
}

.product-image {
    width: 80px;
    height: 80px;
    object-fit: contain;
    flex-shrink: 0;
    margin-right: 15px;
}

.header-item-product{
    width: 270px;
    text-align: center;
}

.header-item-price{
    width: 100px;
    text-align: center;
}

.header-item-quantity{
    width: 260px;
    text-align: center;
}

.header-item-subtotal{
    width: 100px;
    text-align: center;
}

.product-title {
    margin: 0;
    width: 150px;
    flex: 1;
    display: flex;
    align-items: center;
    font-size: 18px;
}

.quantity-btn {
    padding: 5px 10px;
    margin: 0 5px;
    border: 1px solid #ddd;
    background: white;
    cursor: pointer;
    border-radius: 4px;
}

.quantity-btn:hover {
    background: #f5f5f5;
}

.delete-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px;
}

.delete-icon {
    width: 20px;
    height: 20px;
}

.cart-summary {
   margin: 20px 0 20px 860px;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 5px;
    max-width: 400px;
    width: 90%;
     font-family: 'Poppins', sans-serif; 
}

.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    font-size: 16px;
    padding: 0 10px;
}

.button-carts {
    width: 50%;
    max-width: 300px;
    margin: 0 auto;
    padding: 10px;
    background: #FFDA5B;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: block;
    text-align: center;
}

.button-carts:disabled {
    background: #ccc;
    cursor: not-allowed;
}

.button-carts:not(:disabled):hover {
    background: #e6c352;
}

.empty-cart {
    text-align: right;
    padding: 40px;
}

.view-all-products-carts {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
}

.continue-shopping {
    display: inline-block;
    padding: 10px 20px;
    background: #FFDA5B;
    color: black;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 15px;
}

.continue-shopping:hover {
    background: #e6c352;
}

.button-carts.disabled {
    background: #ccc;
    pointer-events: none;
}

</style>
