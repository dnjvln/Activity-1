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


        <div class="main-container-uploaad">
            <div class="frame-uploaad">
                <span class="upload-product-uploaad">Upload a Product!</span>
                <div class="flex-row-de-uploaad">
                    <input class="rectangle-uploaad"><div></div>
                    <span class="product-name-uploaad">Product Name:</span>
                </div>
                <div class="flex-row-uploaad">
                    <div class="rectangle-1-uploaad">
                        <span class="rectangle-1-container">Not yet chosen</span>
                        <div class="chevron-up-uploaad"><div class="icon-uploaad"></div></div>
                    </div>
                    <div class="rectangle-2-uploaad">
                        <span class="rectangle-2-container">Not yet chosen</span>
                        <div class="chevron-up-3-uploaad"><div class="icon-4-uploaad"></div></div>
                    </div>
                    <span class="product-subtype-uploaad">Product Subtype:</span>
                    <span class="product-type-uploaad">Product Type:</span>
                </div>
                <div class="flex-row-c-uploaad">
                    <div class="rectangle-5-uploaad">
                        <button class="button-small" onclick="uploadImage()"></button>
                        <input type="file" id="imageUpload" style="display: none;" accept="image/*" />
                    </div>
                    <span class="choose-file-uploaad">Choose file</span>
                    <span class="no-file-chosen-uploaad">No file chosen</span>
                </div>
                <div class="flex-row-eb-uploaad">
                    <input class="rectangle-6-uploaad"><div></div>
                    <span class="price-uploaad">Price:</span>
                </div>
                <div class="flex-row-7-uploaad">
                    <input class="rectangle-8-uploaad"><div></div>
                    <span class="description-uploaad">Description: </span>
                </div>
                <div class="flex-row-b-uploaad">
                    <div class="rectangle-a-uploaad">
                        <button class="button-small" onclick="uploadImage()"></button>
                        <input type="file" id="imageUpload" style="display: none;" accept="image/*" />
                    </div>
                    <span class="fda-approved-uploaad">FDA Approved:</span>
                    <span class="choose-file-c-uploaad">Choose file</span>
                    <span class="no-file-chosen-d-uploaad">No file chosen</span>
                </div>
                <div class="flex-row-ac-uploaad">
                    <a href="../../Account/user/user.html" class="cancel-uploaad">Cancel</a>
                    <button class="button-e-uploaad" id="saveChangesButton">
                        <span class="view-all-products-uploaad">Save Changes</span>
                    </button>
                </div>
            </div>
            <span class="image-uploaad">Image:</span>
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
import {Link} from '@inertiajs/inertia-vue3';
import MainHeaderComponent from '@/Components/MainHeaderComponent.vue';
import FooterComponent from '@/Components/FooterComponent.vue';
import NavbarComponent from '@/Components/NavbarComponent.vue';

export default defineComponent({
    name: 'UserCreate',
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

