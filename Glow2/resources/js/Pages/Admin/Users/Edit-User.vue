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
                            <div class="text-wrapper-9">Edit User</div>
                        </div>

    <div class="edit-user-page">
        <div class="form-container">
            <form @submit.prevent="submitForm">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" v-model="form.name" placeholder="Enter full name" required />
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" v-model="form.username" placeholder="Enter username" required />
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" v-model="form.address" placeholder="Enter address" required />
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" v-model="form.email" placeholder="Enter email" required />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" v-model="form.password" placeholder="Enter password" />
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" v-model="form.role" required>
                        <option value="admin">Admin</option>
                        <option value="Seller">Seller</option>
                        <option value="Pending Seller">Pending Seller</option>
                        <option value="user">Customer</option>
                    </select>
                </div>

                <div class="button-container">
                    <button type="submit" class="submit-button">Save Changes</button>
                    <Link href="/users" class="cancel-button">Cancel</Link>
                </div>
            </form>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import '/resources/admincss/index.css';
import AdminProfile from "@/Components/Admin/AdminProfile.vue";
import AdminSidebar from '@/Components/Admin/AdminSidebar.vue';
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        AdminProfile,
        AdminSidebar,
        Link,
    },
    props: {
        userId: Number,
    },
    data() {
        return {
            form: {
                name: '',
                username: '',
                address: '',
                email: '',
                password: '',
                role: 'user',
                seller_status: false,
            },
        };
    },
    mounted() {
        this.fetchUser();
    },
    methods: {
        async fetchUser() {
            try {
                const response = await axios.get(`/api/users/${this.userId}`);
                this.form = {
                    name: response.data.name,
                    username: response.data.username,
                    address: response.data.address,
                    email: response.data.email,
                    role: response.data.role,
                    seller_status: response.data.seller_status || false,
                    password: '',
                };
            } catch (error) {
                console.error('Error fetching user data:', error);
            }
        },
        async submitForm() {
            try {
                await this.$inertia.put(`/users/${this.userId}`, this.form);
                this.$inertia.visit('/users');
            } catch (error) {
                console.error('Error updating user:', error);
            }
        },
    },
};
</script>

<style scoped>
.edit-user-page {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f5f5f5;
    padding: 20px;
    font-family: "Roboto-Medium", Helvetica;
}

.form-container {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    max-width: 400px;
    width: 100%;
    position: absolute;
    top: 70px;
    left: 300px;
}

h2 {
    margin-bottom: 20px;
    text-align: center;
    font-size: 34px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 16px;
    color: #555;
}

input, select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}

input:focus, select:focus {
    border-color: #007bff;
}

.button-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}

.submit-button, .cancel-button {
    padding: 10px 20px;
    font-size: 14px;
    text-align: center;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.submit-button {
    background-color: #007bff;
    color: #fff;
}

.cancel-button {
    background-color: #ccc;
    color: #333;
    text-decoration: none;
}

.submit-button:hover {
    background-color: #0056b3;
}

.cancel-button:hover {
    background-color: #aaa;
}
</style>
