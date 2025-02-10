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
                            <div class="text-wrapper-9">Users List</div>
                        </div>

                    <div class="button-container-user">
                       <Link href="/add-users" class="add-user-button-user">Add new User</Link>
                    </div>


                        <!-- CONTENT -->
                        <table id="productTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{ user.id }}</td>
                                <td>{{ user.username }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.address }}</td>

                                <td :class="{
        'role-admin': user.role === 'admin',
        'role-seller': user.role === 'Seller',
        'role-pending-seller': user.role === 'PendingSeller',
        'role-customer': user.role === 'user'
    }">
                                    {{ user.role === 'admin'
                                    ? 'Admin'
                                    : user.role === 'Seller'
                                        ? 'Seller'
                                        : user.role === 'PendingSeller'
                                            ? 'PendingSeller'
                                            : 'Customer' }}
                                </td>


                                <td class="action-container">
                                    <Link :href="`/edit-users/${user.id}`">
                                        <img src="/adminimg/Group-1000006000.png" alt="Edit" class="edit-button" />
                                    </Link>
                                    <img src="/adminimg/Trash-2.png" alt="Delete" class="delete-button" @click="deleteUser(user.id)" />
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
import AdminProfile from '@/Components/Admin/AdminProfile.vue';
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        AdminSidebar,
        AdminProfile,
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

.role-admin {
    color: #7979ff;
    font-weight: bold;
}

.role-customer {
    color: #3dc648;
    font-weight: bold;
}

.role-seller {
    color: #bb7ded;
    font-weight: bold;
}

.role-pending-seller {
    color: #fda6fd;
    font-weight: bold;
}



.add-user-button-user {
    display: inline-block;
    padding: 10px 10px;
    background-color: #CF93FF;
    color: black;
    text-decoration: none;
    border-radius: 5px;
    font-size: 14px;
    font-family: Arial, sans-serif;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-user-button-user:hover {
    background-color: #ca69ff;
}

.button-container-user {
    position: absolute;
    top: 5px;
    left: 120px;
}


table {
    width: 98%;
    border-collapse: collapse;
    margin-top: 20px;
    position: absolute;
    top: 90px;
    left: 20px;
    font-family: Arial, sans-serif;
    font-size: 17px;
}

th, td {
    padding: 8px;
    text-align: center;
}


.product-image {
    width: 100px;
    height: 100px;
}

.fda-image {
    width: 100px; /* Change as needed */
    height: auto; /* Maintains aspect ratio */
}

.edit-button, .delete-button {
    cursor: pointer; /* Changes cursor to pointer for better UX */
    width: 25px; /* Adjust width for images */
    height: 25px; /* Adjust height for images */
}

.edit-button, .delete-button {
    margin: 0 9px; /* Space between images */
}

.action-container {
    width: 200px;
}

.description-title {
    width: 200px;
}


.action-container a {
    text-decoration: none; /* Remove underline from the link */
}

.action-container img {
    vertical-align: middle; /* Aligns images vertically within the flex container */
}





</style>
