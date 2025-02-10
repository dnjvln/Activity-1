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
                <span class="title-holder">MAKEUP PRODUCTS</span>
                <div class="line-1"></div>
            </div>
            <div class="rectangle">
                <div class="rectangle-2">
                    <input class="group-input" placeholder="Search product..." />
                </div>
                <span class="search-product">Search Product: </span>
                <span class="filter">Filter</span>
                <span class="chosen-filter">Foundations</span>
                <div class="filtering"><div class="vector"></div></div>
            </div>

            <FilterComponent category="Makeup" />
        </div>

        <section class="product-section-products">
            <div class="product-container-products" v-for="product in products" :key="product.id">
                <div class="product-image-products">
                    <img :src="product.image || '/path/to/default-image.jpg'" alt="Product Image">
                </div>
                <div class="product-title-products">{{ product.name }}</div>
                <div class="product-details-products">
                    <img src="/assets/img/heart.png" alt="Heart Icon">
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
import '/resources/css/skincare.css';
import '/resources/css/index.css';
import { defineComponent, ref, onMounted } from 'vue';
import axios from 'axios'; // Ensure axios is installed
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';
import FilterComponent from '@/Components/UI/FilterComponent.vue';

export default defineComponent({
    name: 'Foundations',
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
    props: {
        subtype_id: {
            type: Number,
            required: true,
        },
    },
    methods: {
        async fetchProducts() {
            try {
                const response = await axios.get("api/fetch", {
                    params: {
                        subtype_id: this.subtype_id,
                    },
                });
                this.products = response.data;
            } catch (error) {
                console.error(
                    "Error fetching products:",
                    error.response?.data || error.message
                );
            }
        },
    },
    mounted() {
        this.fetchProducts();
    },
});
</script>


<style scoped>

.chosen-filter {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 30px;
    top: 35px;
    left: 250px;
    color: #000000;
    font-family: Poppins, var(--default-font-family);
    font-size: 20px;
    font-weight: 400;
    line-height: 30px;
    text-align: left;
    white-space: nowrap;
    z-index: 68;
}

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
