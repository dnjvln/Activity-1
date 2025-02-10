<template>

    <footer class="invisible-container">
        <span class="footer-title">GLOW AND GRACE</span>

        <div class="footer-links">
            <span class="footer-link-title">Links</span>
            <span class="footer-link-title">Follow Us</span>
        </div>

        <div class="footer-content">
            <div class="icon-container">
                <div class="icon"></div>
            </div>
            <span class="footer-text">Contact Us</span>
            <span class="footer-social">Facebook</span>
            <Link href="/home" class="footer-home">Home</Link>

        </div>

        <div class="footer-contact">
            <span class="footer-social-insta">Instagram</span>
            <Link href="/about" class="footer-about">About Us</Link>
            <div class="icon-2-container">
                <div class="icon-2"></div>
            </div>
            <span class="footer-call-text">Call Us</span>
        </div>

        <div class="footer-phone">
            <span class="phone-number">+1 202-918-2132</span>
            <div class="twitter-container">
                <div class="twitter-icon">
                    <div class="twitter-icon-inner"></div>
                </div>
                <span class="footer-social-twitter">Twitter</span>
            </div>
            <Link href="/contact" class="footer-contact-link">Contact Us</Link>
        </div>

        <div class="footer-line"></div>

        <span class="footer-copyright">© 2022 All rights reserved. Reliance Retail Ltd.</span>

        <div class="footer-icon"></div>

    </footer>

    <div class="background-image-5"></div>

</template>

<script setup>
import '/resources/css/index.css';
import { Link } from '@inertiajs/vue3';
defineProps(['homeUrl', 'aboutUrl', 'contactUrl']);
</script>


<style scoped>
.invisible-container {
    top: 610px;
    left: -55px;
    width: 100%;
    height: auto;
    background-color: transparent;
    z-index: 1000;
    padding: 20px;
    position: relative;
}


.background-image-5 {
    position: absolute;
    top: 2780px;
    left: -2px;
    width: 100%;
    height: 370px;
    background-image: url('./assets/img/footerbackground.png');
    background-repeat: no-repeat;
    background-size: cover;
    z-index: 1;
}
.footer-title {
    display:flex;
    width:288px;
    height:29px;
    justify-content:center;
    align-items:flex-start;
    font-family:Katibeh, var(--default-font-family);
    font-size:45px;
    font-weight:400;
    line-height:29px;
    color:#ffffff;
    position:relative;
    text-align:center;
    white-space:nowrap;
    z-index:242;
    margin:218px 0 0 108px;
}

.footer-links {
    display: flex;
    width: 274px;
    height: 20px;
    justify-content: space-between;
    align-items: center;
    position: relative;
    z-index: 208;
    margin: -8px 0 0 604px;
}

.footer-link-title {
    height: 20px;
    flex-shrink:0;
    font-family: Poppins, var(--default-font-family);
    font-size: 20px;
    font-weight: 250;
    line-height: 20px;
    color: #ffffff;
    position:relative;
    text-align:left;
    white-space: nowrap;
    z-index: 195;
    -webkit-text-stroke: 1px #ffffff;
}

.footer-content {
    width: 756px;
    height: 22px;
    position: relative;
    z-index: 212;
    margin: 23px 0 0 118px;
}

.icon-container{
    width:22px;
    height:22px;
    position:absolute;
    top:0;
    left:667px;
    overflow:hidden;
    z-index:212;
}
.icon{
    width:12.083px;
    height:20.333px;
    background-position:center;
    background-image:url('./assets/img/bad0b220-94e6-4f4e-bb9f-a52d6e2cabbf.png');
    background-size:100% 100%;
    background-repeat:no-repeat;
    position:relative;
    z-index:213;
    margin:0.83px 0 0 5.417px;
}

.footer-text {
    display: flex;
    height: 20px;
    justify-content:flex-start;
    align-items:flex-start;
    font-family:Poppins, var(--default-font-family);
    font-size: 20px;
    font-weight:250;
    line-height: 20px;
    color:#ffffff;
    position:absolute;
    top:1px;
    left:0;
    text-align:left;
    white-space: nowrap;
    z-index: 194;
    -webkit-text-stroke: 1px #ffffff;
}

.footer-social {
    display:flex;
    height:20px;
    justify-content:flex-start;
    align-items:flex-start;
    font-family: Abel, var(--default-font-family);
    font-size: 16px;
    font-weight: 400;
    line-height: 20px;
    color:#ffffff;
    position:absolute;
    top:1px;
    left:697px;
    text-align:left;
    white-space: nowrap;
    z-index: 209;
}

.footer-home{
    display: flex;
    height: 20px;
    justify-content: flex-start;
    align-items: flex-start;
    font-family: Abel, var(--default-font-family);
    font-size: 16px;
    font-weight: 400;
    line-height: 20px;
    color: #ffffff;
    position: absolute;
    top: 2px;
    left: 486px;
    text-align: left;
    white-space: nowrap;
    z-index: 200;
    text-decoration: none;
}

.footer-contact {
    width: 758px;
    height: 31px;
    position: relative;
    z-index: 210;
    margin: 14px 0 0 119px;
}

.footer-social-insta{
    display:flex;
    height:20px;
    justify-content:flex-start;
    align-items:flex-start;
    font-family:Abel, var(--default-font-family);
    font-size:16px;
    font-weight:400;
    line-height:20px;
    color:#ffffff;
    position:absolute;
    top:0;left:696px;
    text-align:left;
    white-space:nowrap;
    z-index:210;
}

.footer-about{
    display: flex;
    height: 20px;
    justify-content: flex-start;
    align-items: flex-start;
    font-family: Abel, var(--default-font-family);
    font-size: 16px;
    font-weight: 400;
    line-height: 20px;
    color: #ffffff;
    position: absolute;
    top: 1px;
    left: 485px;
    text-align: left;
    white-space: nowrap;
    z-index: 201;
    text-decoration: none;
}


.icon-2-container{
    width:19px;
    height:17px;
    position:absolute;
    top:2px;
    left:669px;
    overflow:hidden;
    z-index:190;
}

.icon-2{
    width:17.833px;
    height:16.167px;
    background-position:center;
    background-image:url('./assets/img/a0639c15-9624-4467-9a38-f61971d2a834.png');
    background-size:100% 100%;
    background-repeat:no-repeat;
    position:relative;
    z-index:191;
    margin:0.42px 0 0 0.58px;
}



.footer-call-text {
    display:flex;
    height:20px;
    justify-content:flex-start;
    align-items:flex-start;
    font-family:HK Grotesk, var(--default-font-family);
    font-size:16px;
    font-weight:500;
    line-height:20px;
    color:#ffffff;
    position:absolute;
    top:8px;
    left:35px;
    text-align:left;
    white-space:nowrap;
    z-index:199;
}

.footer-phone {
    width: 705px;
    height: 26px;
    position: relative;
    z-index: 211;
    margin: -1px 0 0 154px;
}

.phone-number {
    display:flex;
    height:20px;
    justify-content:flex-start;
    align-items:flex-start;
    font-family:HK Grotesk, var(--default-font-family);
    font-size:16px;
    font-weight:600;
    line-height:20px;
    color:#ffffff;
    position:absolute;
    top:0;
    left:0;
    text-align:left;
    white-space:nowrap;
    z-index:198;
}

.twitter-icon{
    width:22px;
    height:19px;
    flex-shrink:0;
    position:relative;
    overflow:hidden;
    z-index:192;
}


.twitter-icon-inner{
    width:22px;
    height:16.206px;
    background-position:center;
    background-image:url('./assets/img/6c57973a-3ac3-4eb8-b226-23d16a625228.png');
    background-size:100% 100%;
    background-repeat:no-repeat;
    position:relative;
    z-index:193;
    margin:1.367px 0 0 0;
}

.twitter-container{
    display:flex;
    width:71px;
    height:26px;
    justify-content:space-between;
    align-items:center;
    position:absolute;
    top:0;
    left:634px;
    z-index:211;
}

.footer-social-twitter{
    height:20px;
    flex-shrink:0;
    font-family:Abel, var(--default-font-family);
    font-size:16px;
    font-weight:400;
    line-height:20px;
    color:#ffffff;
    position:relative;
    text-align:left;
    white-space:nowrap;
    z-index:211;
}



.footer-line {
    width: 1200px;
    height: 1px;
    background-image: url('/assets/img/footerline.png');
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
    z-index: 196;
    margin: 45px 0 0 108px;
}

.footer-copyright {
    display:block;
    height:20px;
    font-family:Abel, var(--default-font-family);
    font-size:20px;
    font-weight:400;
    line-height:20px;
    color:#ffffff;
    position:relative;
    text-align:left;
    white-space:nowrap;
    z-index:214;
    margin:30px 0 0 501px;
}

.footer-icon {
    width: 23px;
    height: 20px;
    background-image: url('./assets/img/9affc5d4-8a75-4e7c-b9e3-80eccb108d72.png');
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    position: absolute;
    top: 67%;
    left: 9.7%;
    z-index: 1000;
}

.footer-contact-link{
    display: flex;
    height: 20px;
    justify-content: flex-start;
    align-items: flex-start;
    font-family: Abel, var(--default-font-family);
    font-size: 16px;
    font-weight: 400;
    line-height: 20px;
    color: #ffffff;
    position: absolute;
    top: 6px;
    left: 450px;
    text-align: left;
    white-space: nowrap;
    z-index: 202;
    text-decoration: none;
}
</style>
