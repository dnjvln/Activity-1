<template>
    <div class="main-container">
        <MainHeaderComponent />
        <NavbarComponent
            :haircareUrl="haircareUrl"
            :homeUrl="homeUrl"
            :skincareUrl="skincareUrl"
        />
        <!-- PAGE TITLE CONTAINER -->
        <div class="main-container-2">
            <div class="flex-row">
                <div class="line"></div>
                <span class="title-holder">MY ORDERS</span>
                <div class="line-1"></div>
            </div>
        </div>


        <!-- CONTENTS -->


        <div class="main-container-orders">
            <div class="rectangle-orders">
                <div class="flex-column-fbe-orders">
        <span class="delivery-address-orders">Delivery Address</span
        ><span class="dianne-orders">{{ userData.name }}</span>
                </div>
                <span class="pine-lane-orders"
                >{{ userData.address }}</span>
                <Link href="/user" class="change-orders" style="text-decoration: none;">Change</Link>

            </div>
            <div class="rectangle-1-orders">
                <span class="choose-payment-method-orders">Choose Payment Method: </span>
                <div class="frame-orders">
                    <div class="radio-button-orders" @click="selectPaymentMethod('COD')">
                        <div class="ellipse-orders-1" :class="{ 'selected': selectedPaymentMethod === 'COD' }"></div>
                    </div>
                </div>
                <span class="cash-on-delivery-orders">Cash on delivery</span>
                <div class="frame-2-orders">
                    <div class="radio-button-orders" @click="selectPaymentMethod('card')">
                        <div class="ellipse-orders-2" :class="{ 'selected': selectedPaymentMethod === 'card' }"></div>
                    </div>
                </div>
                <span class="credit-debit-card-orders">Credit / Debit Card</span>
                <div class="image-orders"></div>
                <div class="image-7-orders"></div>
            </div>
            <button @click="submitOrder" class="button-orders">
                <span class="view-all-products-orders">ORDER NOW!</span>
            </button>
            <div class="rectangle-8-orders">
                <div class="flex-row-bdbd-orders">
                    <span class="quantity-orders">Quantity</span>
                    <span class="price-orders">Price</span>
                    <span class="subtotal-orders">Subtotal</span>
                </div>
                
                <div v-if="items && items.length > 0">
                    <div v-for="item in items" :key="item.id" class="flex-row-orders">
                        <div class="image-9-orders">
                            <img :src="item.image" :alt="item.name">
                        </div>
                        <span class="product-name-orders">{{ item.name }}</span>
                        <span class="quantity-a-orders">{{ item.quantity }}</span>
                        <span class="price-b-orders">₱{{ item.price }}</span>
                        <span class="total-price-orders">₱{{ (item.price * item.quantity).toFixed(2) }}</span>
                    </div>
                </div>
                <div v-else>
                    <p>No items selected for checkout</p>
                </div>
            </div>
            <span class="text-14-orders">Products Ordered</span>
            <div class="section-7-orders" v-if="items && items.length > 0">
                <span class="text-15-orders">₱{{ totalAmount }}</span>
            </div>
            <span class="text-16-orders">TOTAL PRICE: </span>
        </div>
    </div>
    <FooterComponent
        :aboutUrl="aboutUrl"
        :homeUrl="homeUrl"
        :contactUrl="contactUrl"
    />
</template>

<script>
import '/resources/css/order.css';
import '/resources/css/skincare.css';
import '/resources/css/index.css';
import {defineComponent} from 'vue';
import { Link } from '@inertiajs/vue3';
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';

export default defineComponent({
    name: 'OrderPage',
    props: {
        items: {
            type: Array,
            required: true,
            default: () => []
        },
        totalAmount: {
            type: [String, Number],
            required: true,
            default: '0.00'
        }
    },
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
            selectedPaymentMethod: 'COD',
            userData: {
                name: '',
                phone: '',
                address: ''
            }
        };
    },
    mounted() {
        this.fetchUserData();
        console.log('Received items:', this.items);
        console.log('Received total:', this.totalAmount);
    },
    methods: {
        async fetchUserData() {
            try {
                const response = await axios.get('/api/user/address');
                this.userData = {
                    name: response.data.name,
                    address: response.data.address
                };
            } catch (error) {
                console.error('Error fetching user data:', error);
                this.userData = {
                    name: 'Error loading name',
                    address: 'Error loading address'
                };
                
                if (error.response?.status === 401) {
                    // Redirect to login if not authenticated
                    window.location.href = '/login';
                }
            }
        },
        selectPaymentMethod(method) {
            this.selectedPaymentMethod = method;
        },
        async submitOrder() {
            if (!this.selectedPaymentMethod) {
                alert('Please select a payment method');
                return;
            }

            try {
                const orderData = {
                    order_ids: this.items.map(item => item.id),
                    delivery_address: this.userData.address,
                    payment_method: this.selectedPaymentMethod
                };

                console.log('Submitting order with data:', orderData); // Debug log

                const response = await axios.post('/cart/checkout', orderData);
                
                if (response.data.success) {
                    // Show success message
                    this.showSuccessMessage('Product Ordered!');
                    // Redirect after 3 seconds
                    setTimeout(() => {
                        window.location.href = '/mainpage';
                    }, 3000);
                }
            } catch (error) {
                console.error('Error submitting order:', error.response?.data || error);
                alert('Failed to submit order: ' + (error.response?.data?.error || 'Unknown error'));
            }
        },

        showSuccessMessage(message) {
            const successDiv = document.createElement('div');
            successDiv.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background-color: #4CAF50;
                color: white;
                padding: 15px 25px;
                border-radius: 5px;
                z-index: 1000;
                animation: fadeInOut 3s forwards;
            `;
            successDiv.textContent = message;
            document.body.appendChild(successDiv);

            setTimeout(() => {
                document.body.removeChild(successDiv);
            }, 3000);
        }
    }
});
</script>

<style scoped>
.rectangle-8-orders {
    position: absolute;
    width: 1194.176px;
    height: 483px;
    top: 235px;
    left: 4.403px;
    background: #ffffff;
    border: 2px solid #313031;
    z-index: 8;
}

.flex-row-bdbd-orders {
    position: relative;
    width: 504.619px;
    height: 39px;
    margin: 36px 0 0 641.122px;
    z-index: 32;
}

.quantity-orders {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    position: absolute;
    width: 111.844px;
    height: 39px;
    top: 0;
    left: 0;
    color: #000000;
    font-family: Abel, var(--default-font-family);
    font-size: 28px;
    font-weight: 400;
    line-height: 35.684px;
    text-align: center;
    white-space: nowrap;
    z-index: 30;
}

.price-orders {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    position: absolute;
    width: 111.844px;
    height: 39px;
    top: 0;
    left: 184.939px;
    color: #000000;
    font-family: Abel, var(--default-font-family);
    font-size: 28px;
    font-weight: 400;
    line-height: 35.684px;
    text-align: center;
    white-space: nowrap;
    z-index: 31;
}

.subtotal-orders {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    position: absolute;
    width: 145.309px;
    height: 39px;
    top: 0;
    left: 359.31px;
    color: #000000;
    font-family: Abel, var(--default-font-family);
    font-size: 28px;
    font-weight: 400;
    line-height: 35.684px;
    text-align: center;
    white-space: nowrap;
    z-index: 32;
}

.flex-row-orders {
    position: relative;
    width: 1086.793px;
    min-height: 126px;
    margin: 43px 0 0 41.391px;
    z-index: 34;
}

.image-9-orders {
    position: absolute;
    width: 167.326px;
    height: 126px;
    top: 50%;
    transform: translateY(-50%);
    left: 0;
    z-index: 33;
    display: flex;
    align-items: center;
    justify-content: center;
}

.image-9-orders img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.product-name-orders {
    position: absolute;
    left: 200px;
    top: 12px;
    width: 400px;
    color: #000000;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 1.2;
    white-space: normal;
    word-wrap: break-word;
    z-index: 25;
}

.quantity-a-orders {
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
    position: absolute;
    width: 28.181px;
    height: 39px;
    top: 48px;
    left: 627.031px;
    color: #000000;
    font-family: Abel, var(--default-font-family);
    font-size: 28px;
    font-weight: 400;
    line-height: 35.684px;
    text-align: right;
    white-space: nowrap;
    z-index: 26;
}

.price-b-orders {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    position: absolute;
    width: 111.627px;
    height: 23.473px;
    top: 52px;
    left: 784.859px;
    color: #000000;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 23.473px;
    text-align: center;
    white-space: nowrap;
    z-index: 19;
}

.total-price-orders {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    position: absolute;
    width: 111.627px;
    height: 23.473px;
    top: 52px;
    left: 975.166px;
    color: #000000;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 23.473px;
    text-align: center;
    white-space: nowrap;
    z-index: 24;
}

.ellipse-orders-1 {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: url('/assets/img/empty-circle.png') no-repeat center;
    background-size: 100% 100%;
    z-index: 22;
    cursor: pointer;
}

.ellipse-orders-1.selected {
    background: url('/assets/img/colored-circle.png') no-repeat center;
    background-size: 100% 100%;
}

.ellipse-orders-2 {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: url('/assets/img/empty-circle.png') no-repeat center;
    background-size: 100% 100%;
    z-index: 22;
    cursor: pointer;
}

.ellipse-orders-2.selected {
    background: url('/assets/img/colored-circle.png') no-repeat center;
    background-size: 100% 100%;
}

@keyframes fadeInOut {
    0% { opacity: 0; transform: translateY(-20px); }
    15% { opacity: 1; transform: translateY(0); }
    85% { opacity: 1; transform: translateY(0); }
    100% { opacity: 0; transform: translateY(-20px); }
}
</style>

