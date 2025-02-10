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
                            <div class="text-wrapper-9">Pending Sellers List</div>
                        </div>

                        <!-- CONTENT -->
                        <table id="productTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>FDA Approved Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="product in productsList" :key="product.id">
                                <td>{{ product.id }}</td>
                                <td>{{ product.seller_name }}</td>
                                <td>{{ product.name }}</td>
                                <td>
                                    <img :src="product.image_url" alt="Product Image" class="product-image" />
                                </td>
                                <td>{{ product.price }}</td>
                                <td>{{ product.description }}</td>
                                <td>
                                    <img :src="product.fda_image_url" alt="FDA Image" class="fda-image" />
                                </td>
                                <td class="action-button">
                                    <img @click="approveProduct(product.id)" src="/adminimg/colored_checkbox.png" alt="Approved" class="row-checkbox">
                                    <img @click="rejectProduct(product.id)" src="/adminimg/Trash-2.png" alt="Delete" class="delete-button"/>
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
import { Link } from '@inertiajs/vue3';
import AdminProfile from "@/Components/Admin/AdminProfile.vue";
import axios from 'axios';

export default {
    components: {
        AdminProfile,
        AdminSidebar,
        Link,
    },
    props: {
        products: {
            type: Array,
            default: () => [],
        },
    },
    data() {
        return {
            successMessage: '',
            errorMessage: '',
            productsList: [...this.products],
        };
    },
    methods: {
        async approveProduct(productId) {
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                await axios.patch(`/admin/products/${productId}/approve`, null, {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },
                });
                this.productsList = this.productsList.filter(product => product.id !== productId);
                this.successMessage = 'Product approved successfully!';
                this.clearMessageAfterTimeout();
            } catch (error) {
                console.error('Failed to approve product:', error);
                this.errorMessage = 'Failed to approve product. Please try again.';
                this.clearMessageAfterTimeout();
            }
        },
        async rejectProduct(productId) {
            if (!confirm('Are you sure you want to delete this product?')) {
                return;
            }

            try {
                await axios.delete(`/products/delete/${productId}`);
                this.productsList = this.productsList.filter(product => product.id !== productId);
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
    },
};
</script>


<style scoped>


table {
    width: 90%;
    border-collapse: collapse;
    margin-top: 20px;
    position: absolute;
    top: 80px;
    left: 25px;
    font-family: Arial, sans-serif;
    font-size:14px;
}

th, td {
    padding: 8px;
    text-align: center;
}

.product-image {
    width: 100px;
    height:100px;
}

.fda-image {
    width: 100px;
    height: auto;
}

.action-button{
    width: 100px;
}

.row-checkbox, .delete-button {
    cursor: pointer;
    width: 20px;
    height: 20px;
}

.delete-button {
    margin: 0 5px;
}

.description-title {
    width: 200px;
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
