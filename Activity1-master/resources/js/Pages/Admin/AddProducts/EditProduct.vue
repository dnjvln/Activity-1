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
                            <div class="text-wrapper-9">Edit Product</div>
                        </div>

                        <div class="edit-product">
                            <form @submit.prevent="submitForm" class="edit-product-form">
                                <div class="form-group">
                                    <label for="name">Product Name:</label>
                                    <input type="text" id="name" v-model="form.name" required />
                                </div>

                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" id="image" @change="handleImageChange" />
                                    <img v-if="imagePreview" :src="imagePreview" alt="Product Image Preview" class="image-preview" />
                                </div>

                                <div class="form-group">
                                    <label for="price">Price:</label>
                                    <input type="number" id="price" v-model="form.price" required />
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea id="description" v-model="form.description"></textarea>
                                </div>

                                <div class="form-actions">
                                    <button type="button" @click="cancelEdit">Cancel</button>
                                    <button type="submit">Save</button>
                                </div>
                            </form>
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
    components: { AdminSidebar, AdminProfile },
    props: { productId: { type: Number, required: true } },
    data() {
        return {
            form: { name: '', price: '', description: '', image: null },
            imagePreview: null,
        };
    },
    mounted() {
        this.fetchProduct();
    },
    methods: {
        async fetchProduct() {
            try {
                const response = await axios.get(`/api/products/${this.productId}`);
                const product = response.data;
                
                this.form = {
                    name: product.name,
                    price: product.price,
                    description: product.description,
                    image: null
                };
                
                if (product.image) {
                    this.imagePreview = product.image;
                }
            } catch (error) {
                console.error('Error fetching product data:', error);
                alert('Failed to fetch product data. Please try again.');
            }
        },

        async submitForm() {
            try {
                const formData = new FormData();
                formData.append('name', this.form.name);
                formData.append('price', this.form.price);
                formData.append('description', this.form.description);
                if (this.form.image instanceof File) {
                    formData.append('image', this.form.image);
                }

                await axios.post(`/api/products/${this.productId}/update`, formData, {
                    headers: { 'Content-Type': 'multipart/form-data' },
                });

                alert('Product updated successfully!');
                this.$inertia.visit('/admin/products');
            } catch (error) {
                console.error('Error updating product:', error);
                alert('Failed to update product.');
            }
        },

        handleImageChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.image = file;
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },

        cancelEdit() {
            this.$inertia.visit('/products');
        },
    },
};
</script>







<style scoped>

* {
    font-size: 20px;
}

.edit-product {
    font-family: Arial;
    padding: 20px;
    max-width: 1000px;
    width: 100%;
    position: absolute;
    top: 100px;
    left: 500px;
    transform: translateX(-50%);
    border-radius: 10px;
    z-index: 1000;
}


.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 2px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 10px 20px;
    background-color: #3dc648;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="button"] {
    background-color: #ccc;
}

button[type="submit"]:hover, button[type="button"]:hover {
    background-color: #2b9e34;
}

.image-preview {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin-top: 10px;
}

.edit-product textarea {
    font-family: Arial;
    height: 150px;  /* Adjust the height of the description textarea */
    padding: 10px;
    font-size: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: 100%;
    resize: vertical;  /* Allow vertical resizing if needed */
}

.edit-product .form-actions {
    display: flex;                /* Use Flexbox for alignment */
    justify-content: flex-end;    /* Align the buttons to the right */
    gap: 20px;                    /* Add space between the buttons */
}

.edit-product .form-actions button {
    padding: 10px 20px;           /* Adjust padding for buttons */
    background-color: #3dc648;    /* Green background */
    color: white;                 /* White text */
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.edit-product .form-actions button[type="button"] {
    background-color: #ccc;       /* Gray background for Cancel button */
}

.edit-product .form-actions button:hover {
    background-color: #2b9e34;    /* Darker green on hover */
}

.edit-product .form-actions button[type="button"]:hover {
    background-color: #999;       /* Darker gray on hover for Cancel */
}
</style>
