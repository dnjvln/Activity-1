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
                            <div class="text-wrapper-9">Order Details List</div>
                        </div>

                        <!-- CONTENT -->
                        <table id="productTable">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product ID</th>
                                    <th>Quantity</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Status Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="detail in orderDetails" :key="detail.id">
                                    <td>{{ detail.order_id }}</td>
                                    <td>{{ detail.product_id }}</td>
                                    <td>{{ detail.quantity }}</td>
                                    <td>{{ formatDate(detail.created_at) }}</td>
                                    <td>
                                        <select 
                                            v-model="detail.status"
                                            @change="updateStatus(detail.id, detail.status)"
                                            class="status-select"
                                        >
                                            <option value="Pickup">Pickup</option>
                                            <option value="Shipping">Shipping</option>
                                            <option value="Delivery">Delivery</option>
                                        </select>
                                    </td>
                                    <td class="description-cell">
                                        {{ detail.status_description }}
                                        <img 
                                            src="/adminimg/Group-1000006000.png" 
                                            alt="Edit" 
                                            class="edit-button"
                                            @click="openEditModal(detail.id, detail.status_description)"
                                        >
                                    </td>
                                    <td>
                                        <img 
                                            src="/adminimg/Trash-2.png" 
                                            alt="Delete" 
                                            class="delete-button" 
                                            @click="deleteOrderDetail(detail.id)"
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div v-if="showEditModal" class="modal-overlay">
        <div class="modal-content">
            <h3>Edit Status Description</h3>
            <textarea 
                v-model="editingDescription"
                rows="4"
                class="description-textarea"
            ></textarea>
            <div class="modal-buttons">
                <button @click="updateDescription" class="save-btn">Save</button>
                <button @click="showEditModal = false" class="cancel-btn">Cancel</button>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import AdminSidebar from '@/Components/Admin/AdminSidebar.vue';
import AdminProfile from '@/Components/Admin/AdminProfile.vue';
import axios from 'axios';

export default {
    components: {
        AdminSidebar,
        AdminProfile
    },

    props: {
        orderId: {
            type: [String, Number],
            required: true
        }
    },

    setup(props) {
        const orderDetails = ref([]);
        const showEditModal = ref(false);
        const editingDescription = ref('');
        const currentDetailId = ref(null);

        const formatDate = (dateString) => {
            return new Date(dateString).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        };

        const fetchOrderDetails = async () => {
            try {
                const response = await axios.get(`/api/orders/${props.orderId}/details`);
                orderDetails.value = response.data;
            } catch (error) {
                console.error('Error fetching order details:', error);
            }
        };

        const updateStatus = async (id, status) => {
            try {
                await axios.put(`/api/order-details/${id}/status`, { status });
            } catch (error) {
                console.error('Error updating status:', error);
            }
        };

        const openEditModal = (id, description) => {
            currentDetailId.value = id;
            editingDescription.value = description;
            showEditModal.value = true;
        };

        const updateDescription = async () => {
            try {
                await axios.put(`/api/order-details/${currentDetailId.value}/description`, {
                    status_description: editingDescription.value
                });
                
                const detail = orderDetails.value.find(d => d.id === currentDetailId.value);
                if (detail) {
                    detail.status_description = editingDescription.value;
                }
                
                showEditModal.value = false;
            } catch (error) {
                console.error('Error updating description:', error);
            }
        };

        const deleteOrderDetail = async (id) => {
            if (!confirm('Are you sure you want to delete this order detail?')) return;
            
            try {
                await axios.delete(`/api/order-details/${id}`);
                orderDetails.value = orderDetails.value.filter(detail => detail.id !== id);
            } catch (error) {
                console.error('Error deleting order detail:', error);
            }
        };

        onMounted(fetchOrderDetails);

        return {
            orderDetails,
            showEditModal,
            editingDescription,
            formatDate,
            updateStatus,
            openEditModal,
            updateDescription,
            deleteOrderDetail
        };
    }
};
</script>

<style scoped>
.edit-button, .delete-button {
    cursor: pointer;
    width: 25px;
    height: 25px;
}

.edit-button, .delete-button {
    margin: 0 9px;
}

table {
    width: 95%;
    border-collapse: collapse;
    margin-top: 20px;
    position: absolute;
    top: 80px;
    left: 35px;
    font-family: Arial, sans-serif;
    font-size:17px;
}

th, td {
    padding: 8px;
    text-align: center;
}


.description-title {
    width: 100px;
}

.orderdate {
    width: 200px;
}

.action-buttons {
    width: 200px;
}

.status-select {
    padding: 6px;
    border-radius: 4px;
    border: 1px solid #ddd;
    width: 100px;
}

.description-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-content {
    background: white;
    padding: 20px;
    border-radius: 8px;
    width: 400px;
}

.description-textarea {
    width: 100%;
    margin: 10px 0;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.modal-buttons {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.save-btn, .cancel-btn {
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
}

.save-btn {
    background-color: #4CAF50;
    color: white;
    border: none;
}

.cancel-btn {
    background-color: #f44336;
    color: white;
    border: none;
}
</style>
