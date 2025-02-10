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
                            <div class="text-wrapper-9">{{ title }}</div>
                        </div>

                        <!-- CONTENT -->
                        <table id="productTable">
                            <thead>
                            <tr class="contents-width">
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="product in products" :key="product.id" class="contents-width">
                                <td>{{ product.id }}</td>
                                <td class="description-title">{{ product.name }}</td>
                                <td>
                                    <img :src="product.image_url"
                                         alt="Product Image"
                                         class="product-image">
                                </td>

                                <td class="price">₱ {{ product.price }}</td>
                                <td class="description-subtitle">{{ product.description }}</td>
                                <td class="action-container">
                                    <img src="/adminimg/Group-1000006000.png"
                                         alt="Edit"
                                         class="edit-button"
                                         @click="goToEditPage(product.id)">
                                    <img src="/adminimg/Trash-2.png"
                                         alt="Delete"
                                         class="delete-button"
                                         @click="deleteProduct(product.id)">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!-- Success Message Popup -->
                        <div v-if="successMessage" class="success-popup">
                            <p>{{ successMessage }}</p>
                        </div>

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
import AdminSidebar from '@/Components/Admin/AdminSidebar.vue';
import AdminProfile from "@/Components/Admin/AdminProfile.vue";
import axios from 'axios';

export default {
    components: {
        AdminSidebar,
        AdminProfile,
    },
    props: {
        subtypeId: {
            type: Number,
            required: true,
        },
        title: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            products: [],
            successMessage: null,
        };
    },
    methods: {
        async fetchProducts() {
            try {
                const response = await axios.get(`/api/products/subtype/${this.subtypeId}`);
                this.products = response.data;
            } catch (error) {
                console.error('Failed to fetch products:', error);
            }
        },
        async fetchFDAProducts() {
            try {
                const response = await axios.get(`/api/products/fda-products`, {
                    params: { subtype_id: this.subtypeId }, // Pass subtypeId as a query parameter
                });
                this.products = response.data; // Populate the products array with FDA-approved or admin-created products
                console.log('Fetched FDA products:', this.products);
            } catch (error) {
                console.error('Failed to fetch FDA products:', error);
            }
        },
        async deleteProduct(productId) {
            try {
                await axios.delete(`/products/${productId}`);
                this.products = this.products.filter(product => product.id !== productId);
                this.successMessage = 'Product deleted successfully!';
                this.clearMessageAfterTimeout();
            } catch (error) {
                console.error('Failed to delete product:', error);
                this.errorMessage = 'Failed to delete product. Please try again.';
                this.clearMessageAfterTimeout();
            }
        },
        clearMessageAfterTimeout() {
            setTimeout(() => {
                this.successMessage = '';
                this.errorMessage = '';
            }, 3000);
        },
        goToEditPage(productId) {
            this.$inertia.get(`/products/${productId}/edit`);
        },
    },
    mounted() {
        this.fetchFDAProducts();
    },
};
</script>



<style scoped>

.success-popup {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #f35b81;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    font-size: 16px;
}

table {
    width: 95%;
    border-collapse: collapse;
    margin-top: 20px;
    position: absolute;
    top: 80px;
    left: 10px;
    font-family: Arial, sans-serif;
    font-size:14px;
    z-index: 2;
}

th, td {
    padding: 13px;
    text-align: center;
}


.product-image {
    width: 100px;
    height:100px;
}


.edit-button, .delete-button {
    cursor: pointer;
    width: 25px;
    height: 25px;
}

.edit-button, .delete-button {
    margin: 0 9px;
}

.action-container{
    width: 300px;
}

.description-title {
    width: 520px;
}

.description-subtitle{
    width: 930px;
}


.price{
    width: 220px;
}

.action-container a {
    text-decoration: none;
}

.action-container img {
    vertical-align: middle;
}

</style>
