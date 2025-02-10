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
                            <div class="text-wrapper-9">Add New User</div>
                        </div>
                        <div class="add-user-container">
                            <form class="add-user-form" @submit.prevent="handleSubmit">
                                <div class="input-group">
                                    <label for="full-name">Full Name:</label>
                                    <input
                                        type="text"
                                        id="full-name"
                                        v-model="form.name"
                                        placeholder="Enter full name"
                                        required
                                    />
                                </div>

                                <div class="input-group">
                                    <label for="user-name">User Name:</label>
                                    <input
                                        type="text"
                                        id="user-name"
                                        v-model="form.username"
                                        placeholder="Enter username"
                                        required
                                    />
                                </div>

                                <div class="input-group">
                                    <label for="email">Email:</label>
                                    <input
                                        type="email"
                                        id="email"
                                        v-model="form.email"
                                        placeholder="Enter email"
                                        required
                                    />
                                </div>

                                <div class="input-group">
                                    <label for="address">Address:</label>
                                    <input
                                        type="text"
                                        id="address"
                                        v-model="form.address"
                                        placeholder="Enter address"
                                    />
                                </div>

                                <div class="input-group">
                                    <label for="password">Password:</label>
                                    <input
                                        type="password"
                                        id="password"
                                        v-model="form.password"
                                        placeholder="Enter password"
                                        required
                                    />
                                </div>

                                <div class="input-group">
                                    <label for="password-confirmation">Confirm Password:</label>
                                    <input
                                        type="password"
                                        id="password-confirmation"
                                        v-model="form.password_confirmation"
                                        placeholder="Confirm password"
                                        required
                                    />
                                </div>


                                <div class="input-group">
                                    <label for="role">Role:</label>
                                    <select id="role" v-model="form.role">
                                        <option v-for="role in roles" :key="role.value" :value="role.value">
                                            {{ role.label }}
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" class="submit-btn">Add User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AdminProfile from "@/Components/Admin/AdminProfile.vue";
import AdminSidebar from "@/Components/Admin/AdminSidebar.vue";

export default {
    components: { AdminSidebar, AdminProfile },
    data() {
        return {
            form: {
                name: '',
                username: '',
                email: '',
                address: '',
                password: '',
                role: 'user', // Default role set to Customer
            },
            roles: [
                { value: 'user', label: 'Customer' },
                { value: 'seller', label: 'Seller' },
                { value: 'admin', label: 'Admin' },
            ],
        };
    },
    methods: {
        async handleSubmit() {
            try {
                const response = await this.$inertia.post('/users', this.form);
                console.log('User added:', response);
                this.$inertia.visit('/users');
            } catch (error) {
                console.error('Error adding user:', error);
                alert('Failed to add user. Please check your inputs.');
            }
        }
    }
};
</script>

<style scoped>
.add-user-container {
    position: absolute;
    top: 52%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 600px;
    width: 100%;
    padding: 20px;
    border-radius: 8px;
    z-index: 9999;
}



.add-user-form {
    display: flex;
    flex-direction: column;
}

.input-group {
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
    font-family: "Roboto-Medium", Helvetica;
}

.input-group label {
    font-weight: bold;
    margin-bottom: 5px;
}

.input-group input,
.input-group select {
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-family: "Roboto-Medium", Helvetica;
}

.submit-btn {
    background-color: #CF93FF;
    color: black;
    padding: 10px 15px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-family: "Roboto-Medium", Helvetica;
}

.submit-btn:hover {
    background-color: #8e3bd3;
}
</style>
