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
                        <div class="header-item select-header"></div>
                        <div class="header-item">Product</div>
                        <div class="header-item">Price</div>
                        <div class="header-item">Quantity</div>
                        <div class="header-item">Subtotal</div>
                        <div class="header-item">Action</div>
                    </div>
                </div>

                <div class="cart-items-box">
                    <div class="cart-item">
                        <div class="item-box-checkbox-1">
                        </div>
                        <div class="item-box product-info">
                            <img src="/assets/img/shampoo.png" alt="Product Image" class="product-image-1">
                            <p class="product-title">TRESEMME Keratin Smooth Anti-Frizz Shampoo 340ml | Shampoo & Conditioner</p>
                        </div>
                        <div class="item-box item-price">₱335</div>
                        <div class="item-box item-quantity">2</div>
                        <div class="item-box item-subtotal">₱670</div>
                        <div class="item-box item-action">
                            <button class="delete-btn"></button>
                        </div>
                    </div>

                    <div class="cart-item">
                        <div class="item-box-checkbox-2">
                        </div>
                        <div class="item-box product-info">
                            <img src="/assets/img/garnier-micellar.png" alt="Product Image" class="product-image-2">
                            <p class="product-title">Garnier Micellar Water with Argan Oil (125ml/400ml) - Waterproof Makeup Remover, Facial Cleanser</p>
                        </div>
                        <div class="item-box item-price">₱360</div>
                        <div class="item-box item-quantity">1</div>
                        <div class="item-box item-subtotal">₱360</div>
                        <div class="item-box item-action">
                            <button class="delete-btn"></button>
                        </div>
                    </div>

                    <div class="cart-item">
                        <div class="item-box-checkbox-3">
                        </div>
                        <div class="item-box product-info">
                            <img src="/assets/img/eyelashes.png" alt="Product Image" class="product-image-3">
                            <p class="product-title">Black Mascara Three-Dimensional Curling Thick Anti-Smudge</p>
                        </div>
                        <div class="item-box item-price">₱69</div>
                        <div class="item-box item-quantity">1</div>
                        <div class="item-box item-subtotal">₱69</div>
                        <div class="item-box item-action">
                            <button class="delete-btn"></button>
                        </div>
                    </div>
                </div>

                <Link href="/order" class="button-carts">
                    <span class="view-all-products-carts">ORDER NOW!</span>
                </Link>
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
import { Link } from '@inertiajs/vue3';
import '/resources/css/skincare.css';
import '/resources/css/index.css'
import '/resources/css/carts.css';
import { defineComponent } from 'vue';
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';

export default defineComponent({
    name: 'CartsPage',
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

<style scoped>

.checkout-btn {
    width: 140px;
    padding: 10px 15px;
    background-color: #FFDA5B;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    color: black !important;
    cursor: pointer;
    text-align: center;
    font-family: Abel, var(--default-font-family);
    justify-content: center;
    gap: 10px;
    margin: -10px 0 0 1200px;
    z-index: 100;
    text-decoration: none;
}


.checkout-btn:hover {
    background-color: rgb(204, 173, 50)
}
</style>
