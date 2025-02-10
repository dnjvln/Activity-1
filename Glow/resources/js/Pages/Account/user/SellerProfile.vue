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

        <div class="main-container-accountss-seller">
            <div class="frame-accountss">
                <span class="edit-profile-accountss">Edit Your Profile</span>
                <div class="image-accountss"></div>
                <div class="flex-row-cc-accountss">
                    <button class="rectangle-accountss"></button
                    ><span class="set-profile-accountss">Set Profile</span>
                </div>
                <div class="flex-row-adf-accountss">
                    <div class="frame-1-accountss">
                        <span class="full-name-accountss">Full Name</span>
                        <div class="placebox-info-accountss">
                            <div class="section-2-accountss"></div>
                            <input class="Input-accountss"  placeholder="Dianne"/>
                        </div>
                    </div>
                    <div class="section-3-accountss">
                        <span class="text-5-accountss">Username</span>
                        <div class="section-4-accountss">
                            <div class="box-2-accountss"></div>
                            <input class="Input-2-accountss" placeholder="Javellana"/>
                        </div>
                    </div>
                </div>
                <div class="wrapper-3-accountss">
                    <div class="box-3-accountss">
                        <span class="email-accountss">Email</span>
                        <div class="placebox-info-2-accountss">
                            <div class="place-to-info-box-accountss"></div>
                            <input class="placebox-info-input-accountss" placeholder="dianne@gmail.com"/>
                        </div>
                    </div>
                    <div class="frame-3-accountss">
                        <span class="address-accountss">Address</span>
                        <div class="placebox-info-4-accountss">
                            <div class="place-to-info-box-6-accountss"></div>
                            <input class="placebox-info-input-7-accountss" placeholder="123 Main St, Springfield, IL 62701, USA" />
                        </div>
                    </div>
                </div>
                <div class="flex-row-c-accountss">
                    <div class="frame-8-accountss">
                        <div class="frame-9-accountss">
                            <span class="password-changes-accountss">Password Changes</span>
                            <div class="placebox-info-a-accountss">
                                <div class="place-to-info-box-c-accountss"></div>
                                <input class="placebox-info-input-d-accountss" placeholder="Current Password"/>
                            </div>
                        </div>
                        <div class="placebox-info-e-accountss">
                            <div class="place-to-info-box-10-accountss"></div>
                            <input class="placebox-info-input-11-accountss" placeholder="New Password"/>
                        </div>
                    </div>
                    <div class="frame-12-accountss"></div>
                </div>
                <div class="flex-row-e-accountss">

                    <button class="button-13-accountss">
                        <span class="view-all-products-14-accountss">Save Changes</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="flex-column-ada-seller">
            <Link href="/sellerprofile" class="edit-profile-seller"> Edit Profile</Link>
            <Link href="/sellerproduct" class="my-products-5-seller">My Products</Link>
                <Link href="/sellercreate" class="create-product-seller">Create Product</Link>
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
import '/resources/css/user.css';
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import MainHeaderComponent from '@/Components/MainHeaderComponent.vue';
import FooterComponent from '@/Components/FooterComponent.vue';
import NavbarComponent from '@/Components/NavbarComponent.vue';

export default defineComponent({
    name: 'SellerProfile',
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

