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
import { Link } from '@inertiajs/vue3';

export default {
    name: 'AuthButtons',
    components: {
        Link,
    },
};
</script>
