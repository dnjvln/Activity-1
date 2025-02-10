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
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Delivery Address</th>
                                <th>Total Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td class="name-cell">1</td>
                                <td class="description-title">1234 Pine Lane, Brgy. Jefferson, Surigao City, Washington
                                    (Pob.), Surigao City, Mindanao, Surigao Del Norte 8401</td>
                                <td>₱1030</td>
                                <td>Cash on Delivery</td>
                                <td>Pending</td>

                                <td>
                                    <img src="/adminimg/Trash-2.png" alt="Delete" class="delete-button" onclick="deleteRow(this)">
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="name-cell">2</td>
                                <td class="description-title">1234 Pine Lane, Brgy. Jefferson, Surigao City, Washington
                                    (Pob.), Surigao City, Mindanao, Surigao Del Norte 8401</td>
                                <td>₱2580</td>
                                <td>Credit/Debit Card</td>
                                <td>Ordered</td>

                                <td>
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


table {
    width: 90%;
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

.product-image {
    width: 100px;
    height:100px;
}

.fda-image {
    width: 100px;
    height: auto;
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

.name-link {
    color: inherit;
    text-decoration: none;
    position: relative;
    display: inline-block;
}

td.name-cell {
    position: relative;
    overflow: hidden;
    transition: background-color 0.3s ease;
}

</style>
