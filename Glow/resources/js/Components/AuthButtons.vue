<template>
    <div class="auth-button">
        <div class="auth-button-item">
            <Link href="/SignupPage.vue" class="button-text sign-up">Sign Up</Link>
        </div>
        <div class="auth-button-item">
            <Link href="/LoginPage.vue" class="button-text login">Login</Link>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: 'AuthButtons',
    components: {
        Link,
    },
};
</script>

<style scoped>
.auth-button {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    gap: 16px;
    position: absolute;
    width: 240px;
    height: 40px;
    top: 31px;
    left: 971px;
    z-index: 10;
}

.auth-button-item {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    padding: 12px;
    border-radius: 8px;
    overflow: hidden;
    transition: background 0.3s ease;
    cursor: pointer;
}

.auth-button-item.login {
    background: #E7A3F2;
    border: 1px solid #731c82;
}

.auth-button-item.login .button-text {
    color: #731c82;
}

.auth-button-item.login:hover {
    background: #E7A3F2;
}

.auth-button-item.sign-up {
    background: rgba(255, 151, 238, 0);
}

.auth-button-item.sign-up .button-text {
    color: #731C82;
}

.auth-button-item.sign-up:hover {
    background: #F3CCF9;
}

.auth-button-item.sign-up:hover .button-text {
    color: #731c82;
}

.auth-button-item a {
    text-decoration: none;
}

.button-text {
    font-family: Inter, var(--default-font-family);
    font-size: 16px;
    font-weight: 400;
    line-height: 16px;
    white-space: nowrap;
    transition: color 0.3s ease;
}

</style>
