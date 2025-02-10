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
                <section class="small-container-small">
                    <div class="main-container-small">
                        <div class="frame-small">
                            <div class="flex-row-de-small">
                                <input class="rectangle-small"><div></div>
                                <span class="product-name-small">Product Name:</span>
                            </div>
                            <div class="flex-row-small">
                                <div class="rectangle-1-small">
                                    <span class="rectangle-1-container-small">Not yet chosen</span>
                                    <div class="chevron-up-small"><div class="icon-small"></div></div>
                                </div>
                                <div class="rectangle-2-small">
                                    <span class="rectangle-2-container-small">Not yet chosen</span>
                                    <div class="chevron-up-3-small"><div class="icon-4-small"></div></div>
                                </div>
                                <span class="product-subtype-small">Product Subtype:</span>
                                <span class="product-type-small">Product Type:</span>
                            </div>
                            <div class="flex-row-c-small">
                                <div class="rectangle-5-small">
                                    <button class="button-small" onclick="uploadImage()"></button>
                                    <input type="file" id="imageUpload" style="display: none;" accept="image/*" />
                                </div>
                                <span class="choose-file-small">Choose file</span>
                                <span class="no-file-chosen-small">No file chosen</span>
                            </div>
                            <div class="flex-row-eb-small">
                                <input class="rectangle-6-small"><div></div>
                                <span class="price-small">Price:</span>
                            </div>
                            <div class="flex-row-7-small">
                                <input class="rectangle-8-small"><div></div>
                                <span class="description-small">Description: </span>
                            </div>
                            <div class="flex-row-b-small">
                                <div class="rectangle-a-small">
                                    <button class="button-small" onclick="uploadImage()"></button>
                                    <input type="file" id="imageUpload" style="display: none;" accept="image/*" />
                                </div>
                                <span class="fda-approved-small">FDA Approved:</span>
                                <span class="choose-file-c-small">Choose file</span>
                                <span class="no-file-chosen-d-small">No file chosen</span>
                            </div>
                            <div class="flex-row-ac-small">
                                <button class="button-e-small" id="saveChangesButton">
                                    <span class="view-all-products-small">Save Changes</span>
                                </button>
                            </div>
                        </div>
                        <span class="image-small">Image:</span>
                    </div>
                </section>

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
import {defineComponent} from 'vue';
import { Link } from '@inertiajs/vue3';
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';

export default defineComponent({
    name: 'SellerCreate',
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
.flex-column-ada-uploadeed {
    position: absolute;
    width: 244px;
    height: 136px;
    top: 47px;
    left: 0;
    font-size: 0px;
    z-index: 5;
}
.flex-column-ada-uploadeed a {
    text-decoration: none;
    color: inherit;
    transition: color 0.3s ease;
}

.flex-column-ada-uploadeed a:hover {
    color: #bf68ce;
}

.flex-column-ada-uploadeed .create-product-uploadeed {
    color: #bf68ce;
}


</style>
