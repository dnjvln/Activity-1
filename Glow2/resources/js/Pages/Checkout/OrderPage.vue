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
        ><span class="dianne-orders">Dianne (0912345678)</span>
                </div>
                <span class="pine-lane-orders"
                >1234 Pine Lane, Brgy. Jefferson, Surigao City, Washington <br> (Pob.),
        Surigao City, Mindanao, Surigao Del Norte 8401</span>
                <Link href="/user" class="change-orders" style="text-decoration: none;">Change</Link>

            </div>
            <div class="rectangle-1-orders">
                <span class="choose-payment-method-orders">Choose Payment Method: </span>
                <div class="frame-orders">
                    <div class="radio-button-orders" id="button1">
                        <div class="ellipse-orders-1"></div></div>
                </div>
                <span class="cash-on-delivery-orders">Cash on delivery</span>
                <div class="frame-2-orders">
                    <div class="frame-3-orders">
                        <div class="frame-4-orders">
                            <div class="radio-button-orders" id="button2">
                                <div class="ellipse-orders-2"></div></div>
                        </div>
                    </div>
                </div>
                <span class="credit-debit-card-orders">Credit / Debit Card</span>
                <div class="image-orders"></div>
                <div class="image-7-orders"></div>
            </div>
            <Link href="/details" class="button-orders">
                <span class="view-all-products-orders">ORDER NOW!</span>
            </Link>
            <div class="rectangle-8-orders">
                <div class="flex-row-bdbd-orders">
                    <span class="quantity-orders">Quantity</span><span class="price-orders">Price</span
                ><span class="subtotal-orders">Subtotal</span>
                </div>
                <div class="flex-row-orders">
                    <div class="image-9-orders"></div>
                    <span class="tresemme-keratin-smooth-orders"
                    >TRESEMME Keratin Smooth Anti-Frizz Shampoo 340ml | Shampoo &
          Conditioner</span
                    ><span class="quantity-a-orders">2</span><span class="price-b-orders">₱335</span
                ><span class="total-price-orders">₱670</span>
                </div>
                <div class="flex-row-b-orders">
                    <div class="image-c-orders"></div>
                    <span class="text-10-orders"
                    >Garnier Micellar Water with Argan Oil (125ml/400mL) - Waterproof
          Makeup Remover, Facial Cleanser</span
                    ><span class="text-11-orders">1</span><span class="text-12-orders">₱360</span
                ><span class="text-13-orders">₱360</span>
                </div>
            </div>
            <span class="text-14-orders">Products Ordered</span>
            <div class="section-7-orders"><span class="text-15-orders">₱1030</span></div>
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
        };
    },
});
</script>

