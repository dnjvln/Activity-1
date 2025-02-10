<template>
    <div class="main-container">
    <MainHeaderComponent />
    <NavbarComponent
        :haircareUrl="haircareUrl"
        :makeuprl="makeupUrl"
        :skincareUrl="skincareUrl"
    />
        <div class="image-container">
            <span class="background-image"></span>
            <span class="icon-left" onclick="slideLeft()"></span>
            <span class="icon-right" onclick="slideRight()"></span>
            <div class="sliding-wrapper">
                <img id="sliding-image" src='assets/img/e8ee728669d3e8cfbbcdae043d3851e7caabcfc1.png' />
            </div>
        </div>



        <!-- SKINCARE -->
        <div class="text-container">
            <div class="text-left">
                <span class="text-part1">Grab the best deals on</span>
                <span class="text-part2"></span>
                <span class="text-highlight"> Skincare Products</span>
            </div>

            <div class="view-all-container">
                <span class="view-all-text">View All</span>
                <Link href="/skincare">
                    <div class="view-all-icon"></div>
                </Link>
            </div>
        </div>


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


            <!-- HAIRCARE -->
            <div class="text-container-2">
                <div class="text-left-2">
                    <span class="text-part1-2">Top picks on</span>
                    <span class="text-part2-2"></span>
                    <span class="text-highlight-2"> Hair Care Products</span>
                </div>
                <div class="view-all-container-2">
                    <span class="view-all-text-2">View All</span>
                    <Link href="/haircare">
                        <div class="view-all-icon-2"></div>
                    </Link>
                </div>
            </div>

        <div class="flex-row-ae-haircare">
            <a href="../../Products/product.html" class="product-container-4">
                <div class="skincare-4">
                    <div class="product-image-4"></div>
                    <div class="image-4" style="background: url('assets/img/bcc3745b92847647b03302f9d40445f26ce34dc5.png') no-repeat center; background-size: cover;"></div>
                    <div class="product-sub-container-4">
                        <span class="product-title-4">DOVE Dermacare Scalp Moisture Shampoo 320ML BUY 1 GET 2</span>
                        <div class="flex-row-5-4">
                            <span class="price-7-4"></span>
                            <span class="price-1-4">₱518</span>
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
                            <span class="price-1-4">₱140</span>
                        </div>
                    </div>
                </div>
            </a>

            <a href="../../Products/product.html" class="product-container-4">
                <div class="skincare-4">
                    <div class="product-image-4"></div>
                    <div class="image-4" style="background: url('assets/img/f0cac6e8f3d282365c4542fe2ac7a0c01de9aaab.png') no-repeat center; background-size: cover;"></div>
                    <div class="product-sub-container-4">
                        <span class="product-title-4">VITRESS Hair Cuticle Coat Classic 50ml</span>
                        <div class="flex-row-5-4">
                            <span class="price-7-4"></span>
                            <span class="price-1-4">₱116</span>
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
                            <span class="price-1-4">₱225</span>
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
                            <span class="price-1-4">₱159</span>
                        </div>
                    </div>
                </div>
            </a>
            </div>

            <!-- MAKEUP -->
            <div class="text-container-3">
                <div class="text-left-3">
                    <span class="text-part1-3">Featured</span>
                    <span class="text-part2-3"></span>
                    <span class="text-highlight-3"> Makeup Products</span>
                </div>
                <div class="view-all-container-3">
                    <span class="view-all-text-3">View All</span>
                    <Link href="/makeup">
                        <div class="view-all-icon-3"></div>
                    </Link>
                </div>
            </div>

        <div class="flex-row-ae-makeup">
            <a href="../../Products/product.html" class="product-container-4">
                <div class="skincare-4">
                    <div class="product-image-4"></div>
                    <div class="image-4" style="background: url('assets/img/bcc3745b92847647b03302f9d40445f26ce34dc5.png') no-repeat center; background-size: cover;"></div>
                    <div class="product-sub-container-4">
                        <span class="product-title-4">DOVE Dermacare Scalp Moisture Shampoo 320ML BUY 1 GET 2</span>
                        <div class="flex-row-5-4">
                            <span class="price-7-4"></span>
                            <span class="price-1-4">₱518</span>
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
                            <span class="price-1-4">₱140</span>
                        </div>
                    </div>
                </div>
            </a>

            <a href="../../Products/product.html" class="product-container-4">
                <div class="skincare-4">
                    <div class="product-image-4"></div>
                    <div class="image-4" style="background: url('assets/img/f0cac6e8f3d282365c4542fe2ac7a0c01de9aaab.png') no-repeat center; background-size: cover;"></div>
                    <div class="product-sub-container-4">
                        <span class="product-title-4">VITRESS Hair Cuticle Coat Classic 50ml</span>
                        <div class="flex-row-5-4">
                            <span class="price-7-4"></span>
                            <span class="price-1-4">₱116</span>
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
                            <span class="price-1-4">₱225</span>
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
                            <span class="price-1-4">₱159</span>
                        </div>
                    </div>
                </div>
            </a>
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
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import MainHeaderComponent from '@/Components/MainHeaderComponent.vue';
import FooterComponent from '@/Components/FooterComponent.vue';
import NavbarComponent from '@/Components/NavbarComponent.vue';

export default defineComponent({
    name: 'MainPage',
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
