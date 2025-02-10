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
                                <th>ID</th>
                                <th>Products Ordered</th>
                                <th>Quantity</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Status Update</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td class="name-cell">1</td>
                                <td class="description-title">2</td>
                                <td class="orderdate">May 10, 2024</td>
                                <td>Pickup</td>
                                <td>May 14 14:56 - Your parcel has been received by the sorting center</td>
                                <td class="action-buttons">
                                    <img src="/adminimg/Group-1000006000.png" alt="Edit" class="edit-button">
                                    <img src="/adminimg/Trash-2.png" alt="Delete" class="delete-button" onclick="deleteRow(this)">
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="name-cell">2</td>
                                <td class="description-title">4</td>
                                <td class="orderdate">May 20, 2024</td>
                                <td>Shipping</td>
                                <td>Jun 5 14:56 - Your parcel is on the way to Logistics Facility</td>
                                <td class="action-buttons">
                                    <img src="/adminimg/Group-1000006000.png" alt="Edit" class="edit-button">
                                    <img src="/adminimg/Trash-2.png" alt="Delete" class="delete-button" onclick="deleteRow(this)">
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

export default {
    components: {
        AdminProfile,
        AdminSidebar,
        Link,
    },
    props: {
        users: Array,
    },
    methods: {
        async deleteUser(userId) {
            try {
                await this.$inertia.delete(`/users/${userId}`, {}, {
                    preserveScroll: true,
                });

                this.users = this.users.filter(user => user.id !== userId);
            } catch (error) {
                console.error('Error deleting user:', error);
            }
        }
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
</style>
