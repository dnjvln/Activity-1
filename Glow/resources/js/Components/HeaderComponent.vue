<template>
    <header>
        <div class="logo-container">
            <img src="/assets/img/logo.png" alt="Logo" class="logo" />
        </div>
        <div class="gradient"></div>
        <div class="rectangle"></div>
        <div class="image-removebg-preview"></div>
        <div class="auth-button">
            <div class="auth-button-item">
                <Link :href="signupUrl"><span class="button-text sign-up">Sign Up</span></Link>
            </div>
            <div class="auth-button-item">
                <Link :href="loginUrl"><span class="button-text login">Login</span></Link>
            </div>
        </div>
        <span class="glow-and-grace">GLOW AND GRACE</span>
        <div class="button-group">
            <Link :href="aboutUrl" class="nav-button">About</Link>
            <Link :href="homeUrl" class="nav-button">Home</Link>
            <Link :href="contactUrl" class="nav-button">Contact</Link>
        </div>

    </header>
</template>

<script>
import '/resources/css/home.css';
import {defineComponent, toRefs} from 'vue';
import {Link} from '@inertiajs/inertia-vue3';

export default defineComponent({
    name: 'HeaderComponent',
    props: {
        signupUrl: String,
        loginUrl: String,
        aboutUrl: String,
        homeUrl: String,
        contactUrl: String,
    },
    setup(props) {
        const {signupUrl, loginUrl, aboutUrl, homeUrl, contactUrl} = toRefs(props);
        return {signupUrl, loginUrl, aboutUrl, homeUrl, contactUrl};
    },
    components: {Link},
});
</script>

