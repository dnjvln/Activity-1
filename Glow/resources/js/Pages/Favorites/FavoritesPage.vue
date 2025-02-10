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
                <span class="title-holder">FAVORITES</span>
                <div class="line-1"></div>
            </div>
            <div class="rectangle-favorites">
                <div class="search-bar">
                    <div class="rectangle-2-favorites"><input class="group-input-favorites" placeholder="Search product..."  /></div>
                    <span class="search-product-favorites">Search Product: </span>
                </div>
            </div>


            <div class="productsholdercontainer-favorites">
                <div class="flex-row-ae">
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

                    <a href="../../Products/product.html" class="product-container-4">
                        <div class="skincare-4">
                            <div class="product-image-4"></div>
                            <div class="image-4" style="background: url('assets/img/41d8d8fd68dc5ea3f1342f7fd95dd7d92f880eaf.png') no-repeat center; background-size: cover;"></div>
                            <div class="product-sub-container-4">
                                <span class="product-title-4">Celeteque Dermo Science Hydration Moisturizer 100ml</span>
                                <div class="flex-row-5-4">
                                    <span class="price-7-4"></span>
                                    <span class="price-1-4">₱280</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="../../Products/product.html" class="product-container-4">
                        <div class="skincare-4">
                            <div class="product-image-4"></div>
                            <div class="image-4" style="background: url('assets/img/5ac0f2140504d6eb2fac77794fb6c7e1d0213e6b.png') no-repeat center; background-size: cover;"></div>
                            <div class="product-sub-container-4">
                                <span class="product-title-4">MYRA E Fresh Glow Glow Whitening Moisturizer 40ml</span>
                                <div class="flex-row-5-4">
                                    <span class="price-7-4"></span>
                                    <span class="price-1-4">₱318</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="../../Products/product.html" class="product-container-4">
                        <div class="skincare-4">
                            <div class="product-image-4"></div>
                            <div class="image-4" style="background: url('assets/img/d30c54415a820635c62b4dc5743d993a7d2bbce0.png') no-repeat center; background-size: cover;"></div>
                            <div class="product-sub-container-4">
                                <span class="product-title-4">BELO Sunexpert Dewy Essence Sunscreen SPF50 PA++++ 50ML</span>
                                <div class="flex-row-5-4">
                                    <span class="price-7-4"></span>
                                    <span class="price-1-4">₱450</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="../../Products/product.html" class="product-container-4">
                        <div class="skincare-4">
                            <div class="product-image-4"></div>
                            <div class="image-4" style="background: url('assets/img/3602343d94937316bafb2a60fd5331082653d243.png') no-repeat center; background-size: cover;"></div>
                            <div class="product-sub-container-4">
                                <span class="product-title-4">KOJIE SAN Skin Lightening Pore Minimizing Toner 100ml</span>
                                <div class="flex-row-5-4">
                                    <span class="price-7-4"></span>
                                    <span class="price-1-4">₱318</span>
                                </div>
                            </div>
                        </div>
                    </a>
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
import '/resources/css/skincare.css';
import '/resources/css/index.css'
import '/resources/css/favorites.css';
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import MainHeaderComponent from '@/Components/MainHeaderComponent.vue';
import FooterComponent from '@/Components/FooterComponent.vue';
import NavbarComponent from '@/Components/NavbarComponent.vue';

export default defineComponent({
    name: 'FavoritesPage',
    components: {
        MainHeaderComponent,
        FooterComponent,
        NavbarComponent,
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

