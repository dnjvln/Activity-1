<template>
    <AdminSidebar />
    <div class="SELLERS">
        <!-- Success Message Popup -->
        <div v-if="successMessage" class="success-popup">
            <p>{{ successMessage }}</p>
        </div>

        <!-- Error Message Popup -->
        <div v-if="errorMessage" class="error-popup">
            <p>{{ errorMessage }}</p>
        </div>

        <div class="dashboard">
            <div class="overlap-wrapper">
                <div class="overlap">
                    <AdminProfile />

                    <div class="overlap-2">
                        <div class="widget">
                            <div class="background"></div>
                            <div class="text-wrapper-9">Approved Sellers List</div>
                        </div>

                        <!-- CONTENT -->
                        <table id="approvedSellerTable">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Full Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr
                                v-for="seller in sellers"
                                :key="seller.id"
                                @mouseenter="hoveredRow = seller.id"
                                @mouseleave="hoveredRow = null"
                                @click="goToHistory(seller.id)"
                                class="seller-row"
                            >
                                <td class="user-id">{{ seller.id }}</td>
                                <td class="full-name">
                                    <span>{{ seller.name }}</span>
                                    <span v-if="hoveredRow === seller.id" class="hover-text">Click to view history</span>
                                </td>
                                <td class="action-button">
                                    <img
                                        @click.stop="demoteUser(seller.id)"
                                        src="/adminimg/Trash-2.png"
                                        alt="Demote to Customer"
                                        class="delete-button"
                                    />
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="overlap-4">
                            <div class="rectangle-4"></div>
                            <div class="page">
                                Page&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4
                            </div>
                        </div>
                        <div class="pages-footer">
                            <div class="text-wrapper-23">Results 2 to 100</div>
                            <img class="chevron-right-3" src="/adminimg/chevron-right.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import '/resources/admincss/index.css';
import AdminSidebar from '@/Components/Admin/AdminSidebar.vue';
import AdminProfile from "@/Components/Admin/AdminProfile.vue";
import axios from 'axios';

export default {
    components: {
        AdminProfile,
        AdminSidebar,
    },
    data() {
        return {
            sellers: [],
            hoveredRow: null,
            successMessage: '',
            errorMessage: '',
        };
    },
    methods: {
        async fetchApprovedSellers() {
            try {
                const response = await axios.get('/admin/sellers/approved'); // API endpoint for fetching approved sellers
                this.sellers = response.data; // Set the fetched sellers data
            } catch (error) {
                console.error('Failed to fetch approved sellers:', error);
                this.errorMessage = 'Failed to fetch approved sellers. Please try again.';
                this.clearMessageAfterTimeout();
            }
        },
        goToHistory(userId) {
            // Redirect to the HistoryList page with the seller's ID
            this.$inertia.get(`/historylist/${userId}`);
        },
        async demoteUser(userId) {
            if (!confirm('Are you sure you want to demote this seller to a customer?')) {
                return;
            }

            try {
                // Call the API to demote the seller
                await axios.patch(`/admin/users/${userId}/demote`);
                this.sellers = this.sellers.filter(seller => seller.id !== userId); // Remove from the list
                this.successMessage = 'Seller successfully demoted to Customer!';
                this.clearMessageAfterTimeout();
            } catch (error) {
                console.error('Failed to demote user:', error);
                this.errorMessage = 'Failed to demote user. Please try again.';
                this.clearMessageAfterTimeout();
            }
        },
        clearMessageAfterTimeout() {
            setTimeout(() => {
                this.successMessage = '';
                this.errorMessage = '';
            }, 3000);
        },
    },
    mounted() {
        this.fetchApprovedSellers(); // Fetch approved sellers on component mount
    },
};
</script>



<style scoped>

.full-name {
    width: 700px;
}

.user-id {
    width: 100px;
}

.seller-row {
    cursor: pointer;
    transition: background-color 0.2s;
}

.seller-row:hover {
    background-color: #e0cbf3;
}

.hover-text {
    display: block;
    font-size: 0.9rem;
    color: #000000;
    margin-top: 5px;
    font-style: italic;
}

table {
    width: 90%;
    border-collapse: collapse;
    margin-top: 20px;
    position: absolute;
    top: 80px;
    left: 25px;
    font-family: Arial, sans-serif;
    font-size: 18px;
}

th, td {
    padding: 20px;
    text-align: center;
}

.action-button {
    width: 100px;
}

.delete-button {
    cursor: pointer;
    width: 20px;
    height: 20px;
}

.delete-button {
    margin: 0 5px;
}

.success-popup {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #3dc648;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    z-index: 1000;
}

.error-popup {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #e74c3c;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    z-index: 1000;
}

</style>
