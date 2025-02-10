<template>
    <div class="main-container">
        <MainHeaderComponent />
        <NavbarComponent
            :haircareUrl="haircareUrl"
            :makeupUrl="makeupUrl"
            :skincareUrl="skincareUrl"
        />
        <div class="main-container-2">
            <div class="flex-row">
                <div class="line"></div>
                <span class="title-holder">MAKEUP PRODUCTS</span>
                <div class="line-1"></div>
            </div>
            <div class="rectangle">
                <div class="rectangle-2"><input class="group-input" placeholder="Search product..."  /></div>
                <span class="search-product">Search Product: </span>
                <span class="filter">Filter</span>
                <div class="filtering"><div class="vector"></div></div>

                <div class="chevron-down">
                    <div class="icon"></div>
                </div>
                <img src="/assets/img/chevron-down-img.png" class="chevron-image">

            </div>

            <!-- FILTER -->
            <div class="filter-container-makeup">
                <div class="group-1-makeup">
                    <a class="foundations" href="foundations.html">Foundations</a>
                    <div class="number-4-makeup">10</div>
                </div>

                <div class="group-2-makeup">
                    <a class="concealers" href="concealers.html">Concealers</a>
                    <div class="number-15-makeup">10</div>
                </div>

                <div class="group-3-makeup">
                    <a class="blushes" href="blushes.html">Blushes</a>
                    <div class="number-30-makeup">10</div>
                </div>

                <div class="group-4-makeup">
                    <a class="lip-tints" href="lip-tints.html">Lip Tints</a>
                    <div class="number-10-makeup">10</div>
                </div>

                <div class="group-5-makeup">
                    <a class="eyeshadows" href="eyeshadows.html">Eyeshadows</a>
                    <div class="rectangle-20-makeup">10</div>
                </div>

                <div class="group-6-makeup">
                    <a class="mascaras" href="mascaras.html">Mascaras</a>
                    <div class="rectangle-20-makeup">10</div>
                </div>

                <div class="group-7-makeup">
                    <a class="primers" href="primers.html">Primers</a>
                    <div class="rectangle-20-makeup">10</div>
                </div>
            </div>


            <div class="productsholdercontainer-makeup">
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
                                    <div class="heart-4">
                                        <div class="heart-image"></div>
                                    </div>
                                    <div class="shopping-cart-4">
                                        <div class="shopping-cart-image"></div>
                                    </div>
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
                                    <div class="heart-4">
                                        <div class="heart-image"></div>
                                    </div>
                                    <div class="shopping-cart-4">
                                        <div class="shopping-cart-image"></div>
                                    </div>
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
                                    <div class="heart-4">
                                        <div class="heart-image"></div>
                                    </div>
                                    <div class="shopping-cart-4">
                                        <div class="shopping-cart-image"></div>
                                    </div>
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
                                    <div class="heart-4">
                                        <div class="heart-image"></div>
                                    </div>
                                    <div class="shopping-cart-4">
                                        <div class="shopping-cart-image"></div>
                                    </div>
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
                                    <div class="heart-4">
                                        <div class="heart-image"></div>
                                    </div>
                                    <div class="shopping-cart-4">
                                        <div class="shopping-cart-image"></div>
                                    </div>
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
import '/resources/css/index.css';
import '/resources/css/makeup.css';
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import MainHeaderComponent from '@/Components/MainHeaderComponent.vue';
import FooterComponent from '@/Components/FooterComponent.vue';
import NavbarComponent from '@/Components/NavbarComponent.vue';

export default defineComponent({
    name: 'MakeupPage',
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
