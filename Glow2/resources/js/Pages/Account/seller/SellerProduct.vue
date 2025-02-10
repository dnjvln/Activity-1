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
                <span class="title-holder"> MY PROFILE </span>
                <div class="line-1"></div>
            </div>
        </div>


        <!-- CONTENTS -->

        <div class="main-container-uploadeed">
            <div class="frame-uploadeed">
                <div class="flex-column-eb-uploadeed">
                    <span class="my-products-uploadeed">My Products</span>
                    <div class="containeeer">
                        <a href="../../Products/product.html" class="product-container-4">
                            <div class="skincare-4">
                                <div class="product-image-4"></div>
                                <div class="image-4" style="background: url('assets/img/3602343d94937316bafb2a60fd5331082653d243.png') no-repeat center; background-size: cover;"></div>
                                <div class="product-sub-container-4">
                                    <span class="product-title-4">KOJIE SAN Skin Lightening Pore Minimizing Toner 100ml</span>
                                    <div class="flex-row-5-4">
                                        <span class="price-7-4"></span>
                                        <span class="price-1-4">₱159</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex-column-ada-uploadeed">
                <Link href="/sellerprofile" class="edit-profile-uploadeed">Edit Profile</Link>
                <Link href="/sellerproduct" class="my-products-5-uploadeed">My Products</Link>
                <Link href="/sellercreate" class="create-product-uploadeed">Create Product</Link>
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
import '/resources/css/skincare.css';
import '/resources/css/index.css';
import '/resources/css/product.css';
import '/resources/css/seller-product.css';
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/vue3';
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';

export default defineComponent({
    name: 'SellerProduct',
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

