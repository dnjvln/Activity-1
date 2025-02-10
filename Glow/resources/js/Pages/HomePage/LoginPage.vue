<template>
    <div class="main-container">
        <header-component
            :signup-url="signupUrl"
            :login-url="loginUrl"
            :about-url="aboutUrl"
            :home-url="homeUrl"
            :contact-url="contactUrl"
            :mainpage-url="mainpageUrl"
        />

        <div class="form-container">
            <span class="welcome-message">Welcome Back!</span>
            <div class="input-container">
                <img src="/assets/img/email.png" alt="Email" class="input-icon" />
                <input class="input-field" type="text" placeholder="Email" />
            </div>
            <div class="input-container">
                <img src="/assets/img/password.png" alt="Password" class="input-icon" />
                <input class="input-field" type="password" placeholder="Password" />
            </div>


                <div class="login-container">
                    <span>Log In</span>
                    <Link :href="mainpageUrl"></Link>
                </div>

            <button class="or-login">Or login in With</button>
            <div class="social-login">
                <a href="https://accounts.google.com.ph/" target="_blank">
                    <img src="/assets/img/google.png" alt="Google" class="social-login-icon" />
                </a>
            </div>
            <div class="footer">
                <span class="footer-text">Don’t have an account?</span>
                <Link :href="signupUrl"><span class="footer-link">Sign Up</span></Link>
            </div>

        </div>
    </div>
</template>


<script>
import '/resources/css/home.css';
import '/resources/css/login.css';
import { defineComponent } from 'vue';
import HeaderComponent from '@/Components/HeaderComponent.vue';
import {Link} from "@inertiajs/inertia-vue3";

export default defineComponent({
    name: 'LoginPage',
    components: {
        Link,
        HeaderComponent
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
