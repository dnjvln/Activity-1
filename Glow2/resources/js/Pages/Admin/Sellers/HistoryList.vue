<template>
    <AdminSidebar />
    <div class="SELLERS">
        <div class="dashboard">
            <div class="overlap-wrapper">
                <div class="overlap">
                    <AdminProfile />

                    <div class="overlap-2">
                        <div class="widget">
                            <div class="background"></div>
                            <div class="text-wrapper-9">Approved Sellers List > {{ sellerName }}</div>
                        </div>

                        <!-- CONTENT -->
                        <table id="productTable">
                            <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="product in products" :key="product.id">
                                <td class="product-id">{{ product.id }}</td>
                                <td>{{ product.name }}</td>
                                <td>
                                    <img
                                        :src="product.image ? `/storage/${product.image}` : '/default-image.jpg'"
                                        alt="Product Image"
                                        class="product-image"
                                    />
                                </td>
                                <td class="price">₱ {{ product.price }}</td>
                                <td>{{ product.description }}</td>
                            </tr>
                            </tbody>
                        </table>
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
        AdminSidebar,
        AdminProfile,
    },
    data() {
        return {
            products: [],
            sellerName: '',
        };
    },
    methods: {
        async fetchSellerHistory() {
            try {
                const response = await axios.get(`/api/sellers/${this.$page.props.userId}/history`);
                console.log('Response Data:', response.data);  // Log response data
                this.products = response.data; // This should contain the products
            } catch (error) {
                console.error('Failed to fetch seller history:', error);
                this.errorMessage = 'Failed to fetch seller history.';
            }
        },


        async fetchSellerName() {
            try {
                // Fetch the seller's name using the userId passed from the route
                const response = await axios.get(`/api/users/${this.$page.props.userId}`);
                this.sellerName = response.data.name;
            } catch (error) {
                console.error('Failed to fetch seller name:', error);
            }
        },
    },
    mounted() {
        this.fetchSellerHistory(); // Fetch seller's products on component mount
        this.fetchSellerName(); // Fetch seller's name
    },
};
</script>


<style scoped>

.product-image {
    width: 100px;
    height: 100px;
    object-fit: cover;
}

.price {
    width: 100px;
}

table {
    width: 90%;
    border-collapse: collapse;
    margin-top: 20px;
    position: absolute;
    top: 80px;
    left: 25px;
    font-family: Arial, sans-serif;
    font-size: 14px;
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
