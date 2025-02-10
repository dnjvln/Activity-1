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
                            <div class="text-wrapper-9">Orders List</div>
                        </div>

                        <!-- CONTENT -->
                        <table id="productTable">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>User ID</th>
                                    <th>Product ID</th>
                                    <th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Delivery Address</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="order in orders" :key="order.id">
                                    <td>{{ order.id }}</td>
                                    <td>{{ order.user_id }}</td>
                                    <td>{{ order.product_id }}</td>
                                    <td>{{ order.quantity }}</td>
                                    <td>₱{{ calculateTotal(order) }}</td>
                                    <td>{{ order.status === 'Ordered' ? order.delivery_address : 'NULL' }}</td>
                                    <td>{{ order.status === 'Ordered' ? order.payment_method : 'NULL' }}</td>
                                    <td>
                                        <span :class="['status-badge', order.status]">
                                            {{ order.status === 'PendingOrder' ? 'In Cart' : 'Ordered' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button @click="deleteOrder(order.id)" class="delete-btn">
                                            <img src="/adminimg/Trash-2.png" alt="Delete" class="delete-button">
                                        </button>
                                    </td>
                                    <td>
                                        <Link 
                                            :href="route('admin.orders.details', { id: order.id })" 
                                            class="view-details-btn"
                                        >
                                            View Details
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="overlap-4">
                            <div class="rectangle-4"></div>
                            <div class="page">
                                Page {{ currentPage }} of {{ totalPages }}
                            </div>
                        </div>
                        <div class="pages-footer">
                            <div class="text-wrapper-23">Results {{ orders.length }}</div>
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
import { defineComponent, ref, onMounted, onUnmounted } from 'vue';
import axios from 'axios';
import { Link, router } from '@inertiajs/vue3';

export default defineComponent({
    components: {
        AdminProfile,
        AdminSidebar,
        Link,
    },

    setup() {
        const orders = ref([]);
        const currentPage = ref(1);
        const totalPages = ref(1);

        const fetchOrders = async () => {
            try {
                const response = await axios.get('/api/admin/orders');
                orders.value = response.data.map(order => ({
                    id: order.id,
                    user_id: order.user_id,
                    product_id: order.product_id,
                    quantity: order.quantity || 0,
                    total_amount: order.total_amount || 0,
                    status: order.status || 'PendingOrder',
                    delivery_address: order.delivery_address || 'No address provided',
                    payment_method: order.payment_method || 'Not selected'
                }));
                console.log('Fetched orders:', orders.value); // Debug log
            } catch (error) {
                console.error('Error fetching orders:', error);
                if (error.response?.status === 403) {
                    window.location.href = '/login';
                }
            }
        };

        const calculateTotal = (order) => {
            return order.total_amount ? parseFloat(order.total_amount).toFixed(2) : '0.00';
        };

        const updateOrderStatus = async (order) => {
            try {
                await axios.put(`/api/admin/orders/${order.id}/status`, {
                    status: order.status
                });
                // Show success notification if you have a notification system
            } catch (error) {
                console.error('Error updating order status:', error);
                // Revert the status change in the UI
                await fetchOrders();
            }
        };

        const deleteOrder = async (orderId) => {
            if (!confirm('Are you sure you want to delete this order?')) return;
            
            try {
                await axios.delete(`/api/admin/orders/${orderId}`);
                orders.value = orders.value.filter(order => order.id !== orderId);
            } catch (error) {
                console.error('Error deleting order:', error);
            }
        };

        onMounted(() => {
            fetchOrders();
            const interval = setInterval(fetchOrders, 5000); 
            onUnmounted(() => clearInterval(interval));
        });

        return {
            orders,
            currentPage,
            totalPages,
            calculateTotal,
            updateOrderStatus,
            deleteOrder
        };
    }
});
</script>

<style scoped>
.background {
    position: relative;
    z-index: 1;
}

#productTable {
    position: absolute;
    top: 80px;
    left: -25px;
    z-index: 2;
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}


th, td {
    padding: 12px;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
}

.product-cell {
    text-align: center;
    width:20px;
}

.product-thumbnail {
    width: 50px;
    height: 50px;
    object-fit: contain;
    border-radius: 4px;
}

.delete-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 4px;
}

.delete-btn:hover {
    opacity: 0.8;
}

.status-badge {
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 14px;
}

.PendingOrder {
    background-color: #FFF3CD;
    color: #856404;
}

.Ordered {
    background-color: #D4EDDA;
    color: #155724;
}
</style>