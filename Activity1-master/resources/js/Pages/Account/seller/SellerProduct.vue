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
                        <!-- Display products in a grid -->
                        <div class="products-grid">
                            <div v-for="product in products" :key="product.id" class="product-container-4">
                                <div class="skincare-4">
                                    <div class="product-image-4">
                                        <img :src="product.image" :alt="product.name" class="image-4" 
                                             onerror="this.src='/path/to/default-image.jpg'"/>
                                    </div>
                                    <div class="product-sub-container-4">
                                        <span class="product-title-4">{{ product.name }}</span>
                                        <div class="flex-row-5-4">
                                            <span class="price-1-4">₱{{ product.price }}</span>
                                        </div>
                                        <div class="approval-status">
                                            {{ product.is_fda_approved ? 'FDA Approved' : 'Pending Approval' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-column-ada-product">
                <Link href="/sellerprofile" class="edit-profile-uploadeed">Edit Profile</Link>
                <Link href="/sellerproduct" class="my-products-5-uploadeed">My Products</Link>
                <Link href="/sellercreate" class="create-product-uploadeed">Create Product</Link>
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
import '/resources/css/skincare.css';
import '/resources/css/index.css';
import '/resources/css/product.css';
import '/resources/css/seller-product.css';
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/vue3';
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';
import axios from 'axios';

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
            products: [],
        };
    },
    mounted() {
        this.fetchProducts();
    },
    methods: {
        async fetchProducts() {
            try {
                const response = await axios.get('/api/seller/products');
                this.products = response.data;
            } catch (error) {
                console.error('Error fetching products:', error);
            }
        }
    }
});
</script>

<style scoped>
.flex-column-ada-product {
    position: absolute;
    width: 244px;
    height: 136px;
    top: 47px;
    left: 0;
    font-size: 12px;
    z-index: 5;
    font-family: 'Poppins', sans-serif;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
    padding: 20px;
    font-family: 'Poppins', sans-serif;
    text-align: center;
}

.product-container-4 {
    border: 1px solid #eee;
    border-radius: 8px;
    padding: 10px;
    transition: transform 0.2s;
    font-family: 'Poppins', sans-serif;
}

.product-container-4:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.image-4 {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 4px;
}

.product-title-4 {
    font-size: 14px;
    font-weight: 500;
    margin: 8px 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.price-1-4 {
    font-weight: bold;
    color: #bf68ce;
}

.approval-status {
    font-size: 12px;
    color: #666;
    margin-top: 5px;
}

.flex-column-ada-product a {
    text-decoration: none;
    color: inherit;
    transition: color 0.3s ease;
}

.flex-column-ada-product a:hover {
    color: #bf68ce;
}

.flex-column-ada-product .my-products-5-uploadeed {
    color: #bf68ce;
}
</style>
