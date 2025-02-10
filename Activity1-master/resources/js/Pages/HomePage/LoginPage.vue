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

        <div class="maluoykawauth-login">
            <div class="form-container">
                <span class="welcome-message">Welcome Back!</span>

                <!-- Email Input -->
                <div class="input-container">
                    <img src="/assets/img/email.png" alt="Email" class="input-icon" />
                    <input
                        class="input-field"
                        type="email"
                        placeholder="Email"
                        v-model="form.email"
                        required
                        autofocus
                    />
                    <span class="error-message" v-if="form.errors.email">{{ form.errors.email }}</span>
                </div>

                <!-- Password Input -->
                <div class="input-container">
                    <img src="/assets/img/password.png" alt="Password" class="input-icon" />
                    <input
                        class="input-field"
                        type="password"
                        placeholder="Password"
                        v-model="form.password"
                        required
                    />
                    <span class="error-message" v-if="form.errors.password">{{ form.errors.password }}</span>
                </div>

                <!-- Login Button -->
                <button class="login-container" @click.prevent="submit">
                    <span>Log In</span>
                </button>



                <div class="footer">
                    <span class="footer-text">Don’t have an account?</span>
                    <Link :href="signupUrl"><span class="footer-link">Sign Up</span></Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import '/resources/css/home.css';
import '/resources/css/login.css';
import { defineComponent } from 'vue';
import HeaderComponent from '@/Components/UI/HeaderComponent.vue';
import { Link, useForm } from '@inertiajs/vue3';

export default defineComponent({
    name: 'loginpage',
    components: {
        Link,
        HeaderComponent
    },
    setup() {
        const signupUrl = route('signuppage');
        const loginUrl = route('loginpage');
        const aboutUrl = route('about');
        const homeUrl = route('home');
        const contactUrl = route('contact');
        const mainpageUrl = route('mainpage');

        const form = useForm({
            email: '',
            password: '',
            remember: false,
        });

        const submit = () => {
            form.post(route('login'), {
                onFinish: () => form.reset('password'),
            });
        };

        return {
            signupUrl,
            loginUrl,
            aboutUrl,
            homeUrl,
            contactUrl,
            mainpageUrl,
            form,
            submit
        };
    }
});
</script>
