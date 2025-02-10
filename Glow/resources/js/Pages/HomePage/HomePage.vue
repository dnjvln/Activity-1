<template>
    <div class="main-container">
        <header-component
            :signup-url="signupUrl"
            :login-url="loginUrl"
            :about-url="aboutUrl"
            :home-url="homeUrl"
            :contact-url="contactUrl"
        />

        <span class="radiance-meets-elegance">“Where Radiance Meets Elegance”</span>
        <span class="high-quality-products">
            Discover a curated selection of high-quality Makeup, Haircare, and Skincare products designed to elevate your beauty routine, inspire confidence, and ensure authenticity!
        </span>

            <button class="button">
                <Link :href="mainpageUrl" class="no-underline">
                    <span class="shop-now">SHOP NOW!</span>
                </Link>
            </button>

        <div class="makeup"></div>
        <div class="skincare"></div>
        <div class="haircare"></div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import HeaderComponent from '@/Components/HeaderComponent.vue';

export default defineComponent({
    name: 'HomePage',
    components: {
        HeaderComponent,
        Link,
    },
    setup() {
        const signupUrl = route('signup');
        const loginUrl = route('login');
        const aboutUrl = route('about');
        const homeUrl = route('home');
        const contactUrl = route('contact');
        const mainpageUrl = route('mainpage');

        return {
            signupUrl,
            loginUrl,
            aboutUrl,
            homeUrl,
            contactUrl,
            mainpageUrl
        };
    }
});
</script>
