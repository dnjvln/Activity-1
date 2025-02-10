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
        <div class="main-container-accountss">
            <div class="frame-accountss">
                <span class="edit-profile-accountss">Edit Your Profile</span>
                <div class="image-accountss"></div>
                <div class="flex-row-cc-accountss">
                    <button class="rectangle-accountss"></button>
                    <span class="set-profile-accountss">Set Profile</span>
                </div>
                <div class="flex-row-adf-accountss">
                    <div class="frame-1-accountss">
                        <span class="full-name-accountss">Full Name</span>
                        <div class="placebox-info-accountss">
                            <div class="section-2-accountss"></div>
                            <input class="Input-accountss" v-model="user.name" placeholder="Full Name" />
                        </div>
                    </div>
                    <div class="section-3-accountss">
                        <span class="text-5-accountss">Username</span>
                        <div class="section-4-accountss">
                            <div class="box-2-accountss"></div>
                            <input class="Input-2-accountss" v-model="user.username" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="wrapper-3-accountss">
                    <div class="box-3-accountss">
                        <span class="email-accountss">Email</span>
                        <div class="placebox-info-2-accountss">
                            <div class="place-to-info-box-accountss"></div>
                            <input class="placebox-info-input-accountss" v-model="user.email" placeholder="Email" />
                        </div>
                    </div>
                    <div class="frame-3-accountss">
                        <span class="address-accountss">Address</span>
                        <div class="placebox-info-4-accountss">
                            <div class="place-to-info-box-6-accountss"></div>
                            <input class="placebox-info-input-7-accountss" v-model="user.address" placeholder="Address" />
                        </div>
                    </div>
                </div>

                <div class="flex-row-e-accountss">
                    <button class="button-accountss">
                        <Link href="/usercreate" class="view-all-products-accountss">Become a Seller!</Link>
                    </button>
                    <button class="button-13-accountss" @click="saveChanges">
                        <span class="view-all-products-14-accountss">Save Changes</span>
                    </button>
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
import '/resources/css/user.css';
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/vue3';
import MainHeaderComponent from '@/Components/UI/MainHeaderComponent.vue';
import FooterComponent from '@/Components/UI/FooterComponent.vue';
import NavbarComponent from '@/Components/UI/NavbarComponent.vue';

export default defineComponent({
    name: 'user',
    props: {
        user: {
            type: Object,
            required: true,
        },
    },
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
            newPassword: '',
        };
    },
    watch: {
        user: {
            immediate: true,
            handler(newUser) {
                if (newUser) {
                    console.log('User data updated:', newUser);
                    // Add any necessary actions when user data changes
                }
            },
        },
    },
    methods: {
        saveChanges() {
            // Send updated user data to the server
            this.$inertia.post('/update-profile', {
                name: this.user.name,
                username: this.user.username,
                email: this.user.email,
                address: this.user.address,
            }).then(() => {
                alert('Profile updated successfully!');
            }).catch((error) => {
                console.error(error);
                alert('Failed to save changes. Please try again.');
            });
        },
        changePassword() {
            if (!this.newPassword) {
                alert('New password is required.');
                return;
            }

            this.$inertia.post('/change-password', {
                new_password: this.newPassword,
            }).then(() => {
                this.newPassword = '';
                alert('Password changed successfully!');
            }).catch((error) => {
                console.error(error);
                alert('Failed to change password. Please try again.');
            });
        },
    },
});
</script>
