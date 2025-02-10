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

        <div class="maluoykawauth">
            <div class="account-creation">
                <span class="account-title">Create an Account</span>

                <div class="form-grid">
                    <!-- Left Column -->
                    <div class="form-column">
                        <!-- Full Name Input -->
                        <div class="input-container">
                            <img src="/assets/img/name.png" alt="Full Name" class="input-icon" />
                            <input
                                class="input-field"
                                type="text"
                                placeholder="Full Name"
                                v-model="form.name"
                                required
                                autofocus
                            />
                            <span class="error-message" v-if="form.errors.name">{{ form.errors.name }}</span>
                        </div>

                        <!-- Username Input -->
                        <div class="input-container">
                            <img src="/assets/img/name.png" alt="Username" class="input-icon" />
                            <input
                                class="input-field"
                                type="text"
                                placeholder="Username"
                                v-model="form.username"
                                required
                            />
                            <span class="error-message" v-if="form.errors.username">{{ form.errors.username }}</span>
                        </div>

                        <!-- Address Input -->
                        <div class="input-container">
                            <img src="/assets/img/address.png" alt="Address" class="input-icon" />
                            <textarea
                                class="input-field"
                                placeholder="Address"
                                v-model="form.address"
                                rows="3"
                            ></textarea>
                            <span class="error-message" v-if="form.errors.address">{{ form.errors.address }}</span>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="form-column">
                        <!-- Email Input -->
                        <div class="input-container">
                            <img src="/assets/img/email.png" alt="Email" class="input-icon" />
                            <input
                                class="input-field"
                                type="email"
                                placeholder="Email"
                                v-model="form.email"
                                required
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

                        <!-- Confirm Password Input -->
                        <div class="input-container">
                            <img src="/assets/img/password.png" alt="Confirm Password" class="input-icon" />
                            <input
                                class="input-field"
                                type="password"
                                placeholder="Confirm Password"
                                v-model="form.password_confirmation"
                                required
                            />
                            <span class="error-message" v-if="form.errors.password_confirmation">{{ form.errors.password_confirmation }}</span>
                        </div>
                    </div>
                </div>

                <!-- Sign Up Button -->
                <button class="signup-container" @click.prevent="submit">
                    <span>Sign Up</span>
                </button>

                <div class="login-prompt">
                    <span class="login-prompt-text">Already have an account?</span>
                    <Link :href="loginUrl"><span class="login-link">Login</span></Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import '/resources/css/home.css';
import '/resources/css/signup.css';
import { defineComponent } from 'vue';
import HeaderComponent from '@/Components/UI/HeaderComponent.vue';
import { Link, useForm } from '@inertiajs/vue3';

export default defineComponent({
    name: 'signuppage',
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
            username: '',
            name: '',
            email: '',
            address: '',
            password: '',
            password_confirmation: '',
        });

        const submit = () => {
            form.post(route('register'), {
                onFinish: () => form.reset('password', 'password_confirmation'),
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
            submit,
        };
    }
});
</script>
