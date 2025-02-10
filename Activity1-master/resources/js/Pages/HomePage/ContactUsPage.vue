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
        <span class="contact-us-2">CONTACT US </span>
        <div class="flex-row">
            <div class="frame">
            <span class="fill-form"
            >Fill out our form and we will contact you within 24 hours.</span
            ><span class="emails">Emails: GlowNGrace@gmail.com</span>
                <div class="line"></div>
                <span class="address"
                >236 5th SE Avenue, New York NY10000, United States</span
                >
                <div class="frame-3">
                    <div class="frame-4">
                        <div class="icons-phone"><div class="vector"></div></div>
                        <span class="call-us">Call To Us</span>
                    </div>
                    <div class="frame-5"></div>
                    <div class="frame-6"></div>
                </div>
                <span class="available-days-week"
                >We are available 24/7, 7 days a week.</span
                ><span class="phone">Phone: +98767665454</span>
                <div class="line-7"></div>
                <div class="icons-mail"><div class="vector-8"></div></div>
                <span class="write-to-us">Write To US</span>
                <div class="icons-mail-9"></div>
                <div class="vector-a"></div>
                <span class="address-b">Address</span>
            </div>
            <div class="frame-c">
                <div class="frame-d">
                    <div class="frame-e">
                        <div class="placebox-info">
                            <input type="text" id="name" class="place-to-info-box" placeholder="Your Name *" />
                        </div>

                        <div class="placebox-info-f">
                            <input type="email" id="email" class="place-to-info-box-12" placeholder="Your Email *" />
                        </div>

                        <div class="placebox-info-13">
                            <input type="tel" id="phone" class="place-info-box" placeholder="Your Phone *" />
                        </div>
                    </div>

                    <div class="message-container">
                        <textarea id="message" class="place-info-box-17" placeholder="Enter your message"></textarea>
                    </div>

                    <div class="button-container">
                        <button class="button-18">Send Message</button>
                    </div>

                </div>
            </div>
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
    name: 'contact',
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

