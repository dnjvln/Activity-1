<script setup>
import { ref } from 'vue';
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

<style>
 
.min-h-screen {
    min-height: 100vh;
    position: relative;
}
</style>
