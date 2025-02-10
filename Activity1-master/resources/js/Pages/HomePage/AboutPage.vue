<template>
    <div class="main-container">
        <header-component
            :signup-url="signupUrl"
            :login-url="loginUrl"
            :about-url="aboutUrl"
            :home-url="homeUrl"
            :contact-url="contactUrl"
        />

        <div class="maluoykaw">
        <span class="about-us-2">ABOUT US</span>
        <div class="flex-row-f">
            <div class="rectangle-3"></div>
            <span class="glow-and-grace-4"
            >Glow and Grace is an online beauty store created for women who want
            to look and feel their best. We offer a wide range of skincare, hair
            care, and makeup products, carefully selected to help you discover
            your perfect beauty routine. Whether you're looking for everyday
            essentials or luxury treatments, we provide high-quality products
            that suit all skin types and beauty needs. With easy browsing and
            fast delivery, Glow and Grace makes it simple to find everything you
            need to enhance your natural beauty.<br /><br />
            In addition to shopping, Glow and Grace also allows users to become
            sellers on our platform. Beauty enthusiasts and professionals can
            easily sign up to showcase their own beauty products, reaching a
            wider audience and growing their business. Our platform offers a
            user-friendly seller interface, where sellers can upload products,
            manage their inventory, and track sales with ease. This feature
            ensures that our community not only has access to a wide range of
            beauty products but also offers a space for entrepreneurs to thrive
            in the beauty industry.</span
            >
        </div>
    </div>
    </div>
</template>

<script>
import '/resources/css/home.css';
import '/resources/css/about&contact.css';
import { defineComponent } from 'vue';
import HeaderComponent from '@/Components/UI/HeaderComponent.vue';

export default defineComponent({
    name: 'about',
    components: {
        HeaderComponent
    },
    setup() {
        const signupUrl = route('signuppage');
        const loginUrl = route('loginpage');
        const aboutUrl = route('about');
        const homeUrl = route('home');
        const contactUrl = route('contact');

        return {
            signupUrl,
            loginUrl,
            aboutUrl,
            homeUrl,
            contactUrl
        };
    }
});
</script>
