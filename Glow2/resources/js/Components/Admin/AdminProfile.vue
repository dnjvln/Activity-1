<template>
        <div class="overlap-group">
            <div class="div"></div>
            <div class="text-wrapper">Administrator</div>
            <div class="rectangle-3"></div>
            <div class="text-wrapper-2">{{ adminName }}</div>
            <img class="user-profile-icon" src="/adminimg/user-profile-icon-free-vector-1.png" />
        </div>
</template>

<script>
import '/resources/admincss/index.css';
import { ref, onMounted } from 'vue';
import axios from 'axios';

export default {
    name: 'AdminProfile',
    setup() {
        const adminName = ref('');

        onMounted(async () => {
            try {
                const response = await axios.get('/api/admin-profile'); // Fetch admin info
                adminName.value = response.data.name; // Set admin name dynamically
            } catch (error) {
                console.error('Failed to fetch admin profile:', error);
            }
        });

        return {
            adminName,
        };
    },
};
</script>

