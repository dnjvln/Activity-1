<template>
    <section class="rectangle-white" :class="{ 'is-loaded': isLoaded }">
        <div class="navbar">
            <div class="button-container">
                <div v-for="(link, index) in links"
                     :key="index"
                     :class="['button', `button${index + 1}`]">
                    <div class="button-content">
                        <Link :href="link.href" class="button-text">{{ link.text }}</Link>
                    </div>
                </div>
            </div>
            <div class="divider-line"></div>
        </div>
    </section>
</template>

<script setup>
import '/resources/css/product-details.css';
import { ref, onMounted, nextTick } from 'vue';
import { Link } from '@inertiajs/vue3';
import { initializeBounceAnimation } from '/resources/js/Pages/index';

// Add a loading state
const isLoaded = ref(false);
defineProps(['haircareUrl', 'makeupUrl', 'skincareUrl']);

const links = ref([
    { text: 'Hair Care', href: '/haircare' },
    { text: 'Makeup', href: '/makeup' },
    { text: 'Skincare', href: '/skincare' },
]);

onMounted(() => {
    nextTick(() => {
        isLoaded.value = true;
        initializeBounceAnimation();
    });
});
</script>

<style scoped>
.navbar {
    z-index: 15;
    top: 123px;
    left: -20px;
    position: fixed;
    width: 100%;
    display: flex;
    justify-content: center;
}

.button-container {
    position: relative;
    width: 100%;
    max-width: 1440px;
    margin: 0 auto;
}

.rectangle-white {
    width: 100%;
    height: 67px;
    background-color: #ffffff;
    z-index: 10;
    top: 118px;
    left: 0;
    position: fixed;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.rectangle-white.is-loaded {
    opacity: 1;
}

/* Replace the long div with a proper class */
.divider-line {
    width: 1440px;
    height: 1px;
    background-image: url('/assets/img/75ef183b-96da-4dc4-848a-fdf62ed6c3ed.png');
    background-size: cover;
    background-repeat: no-repeat;
    position: absolute;
    top: 62px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 600;
}

.button {
    display: flex;
    width: 147px;
    height: 38px;
    flex-direction: column;
    gap: 8px;
    justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
    background-color: #c670d4;
    border-radius: 100px;
    position: absolute;
    top: 12px;
    overflow: hidden;
    box-shadow: 0 4px 4px 0 rgba(12, 12, 13, 0.05);
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.button:hover {
    background-color: #FF97EE;
    transform: scale(1.05);
}

.button1 {
    left: 639px;
    top: 10px;
    z-index: 228;
}

.button2 {
    left: 863px;
    z-index: 233;
}

.button3 {
    left: 407px;
    z-index: 238;
}

.button-content {
    display: flex;
    min-width: 0;
    min-height: 0;
    padding: 10px 24px;
    gap: 8px;
    justify-content: center;
    align-items: center;
    align-self: stretch;
    flex-grow: 1;
    flex-shrink: 0;
    flex-basis: 0;
    flex-wrap: nowrap;
    position: relative;
}

.button-text {
    height: 20px;
    flex-shrink: 0;
    font-family: Poppins, var(--default-font-family);
    font-size: 15px;
    font-weight: 500;
    color: #ffffff;
    text-align: center;
    white-space: nowrap;
    text-decoration: none;
}

.bounce {
    animation: bounce 0.5s ease;
}

@keyframes bounce {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
}
</style>

