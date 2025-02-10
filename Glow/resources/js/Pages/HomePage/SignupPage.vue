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
        <div class="account-creation">
            <span class="account-title">Create an Account</span>
            <div class="input-container">
                <img src="/assets/img/name.png" alt="Full Name" class="input-icon" />
                <input class="input-field" type="text" placeholder="Full Name" />
            </div>
            <div class="input-container">
                <img src="/assets/img/email.png" alt="Email" class="input-icon" />
                <input class="input-field" type="text" placeholder="Email" />
            </div>
            <div class="input-container">
                <img src="/assets/img/password.png" alt="Password" class="input-icon" />
                <input class="input-field" type="text" placeholder="Password" />
            </div>

                <div class="signup-container">
                    <span>Sign Up</span>
                    <Link :href="mainpageUrl"></Link>
                </div>

            <div class="login-prompt">
                <span class="login-prompt-text">Already have an account?</span>
                <Link :href="loginUrl"><span class="login-link">Login</span></Link>
            </div>
        </div>
    </div>
</template>

<script>
import '/resources/css/home.css';
import '/resources/css/signup.css';
import { defineComponent } from 'vue';
import HeaderComponent from '@/Components/HeaderComponent.vue';
import {Link} from "@inertiajs/inertia-vue3";

export default defineComponent({
    name: 'SignupPage',
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


