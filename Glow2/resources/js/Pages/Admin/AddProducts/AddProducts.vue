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
                            <div class="text-wrapper-9">Create New Product</div>
                        </div>

                        <section class="add-product-container">
                            <div class="form-wrapper">
                                <form @submit.prevent="submitForm">
                                    <div class="form-group">
                                        <label for="product-name">Product Name:</label>
                                        <input type="text" id="product-name" class="input-field" v-model="productName" placeholder="Enter product name" />
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="product-type">Product Type:</label>
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" @click="toggleDropdown('type')">
                                                    <span>{{ selectedType || 'Not yet chosen' }}</span>
                                                    <img :class="{ rotated: isTypeDropdownOpen }" src="/assets/img/chevron-up.png" alt="Toggle" class="dropdown-arrow" />
                                                </div>
                                                <ul v-if="isTypeDropdownOpen" class="dropdown-menu">
                                                    <li @click="selectType('Skincare')">Skincare</li>
                                                    <li @click="selectType('Haircare')">Haircare</li>
                                                    <li @click="selectType('Makeup')">Makeup</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="form-group-subtype">
                                            <label for="product-subtype">Product Subtype:</label>
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" @click="toggleDropdown('subtype')">
                                                    <span>{{ selectedSubtypeName || 'Not yet chosen' }}</span>
                                                    <img :class="{ rotated: isSubtypeDropdownOpen }" src="/assets/img/chevron-up.png" alt="Toggle" class="dropdown-arrow" />
                                                </div>
                                                <ul v-if="isSubtypeDropdownOpen" class="dropdown-menu">
                                                    <li v-for="subtype in subtypes[selectedType]" :key="subtype.id" @click="selectSubtype(subtype)">
                                                        {{ subtype.name }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Image:</label>
                                        <div class="file-upload">
                                            <label for="image-upload" class="choose-file">Choose File</label>
                                            <input type="file" id="image-upload" ref="image" style="display: none;" accept="image/*" @change="handleFileUpload" />
                                            <span class="file-name long-rectangle">{{ fileName || 'No file chosen' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="text" id="price" class="input-field" v-model="price" placeholder="Enter price" />
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea id="description" class="textarea-field" v-model="description" placeholder="Enter product description"></textarea>
                                    </div>

                                    <div class="button-group">
                                        <button class="cancel-button">Cancel</button>
                                        <button type="submit" class="save-button">Save Product</button>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message Popup -->
    <div v-if="successMessage" class="success-popup">
        <p>{{ successMessage }}</p>
    </div>

    <!-- Error Message Popup -->
    <div v-if="errorMessage" class="error-popup">
        <p>{{ errorMessage }}</p>
    </div>

</template>

<script>
import AdminSidebar from '@/Components/Admin/AdminSidebar.vue';
import AdminProfile from "@/Components/Admin/AdminProfile.vue";
import axios from 'axios';

export default {
    components: {
        AdminProfile,
        AdminSidebar,
    },
    data() {
        return {
            productName: '',
            description: '',
            price: '',
            selectedType: null,
            selectedSubtype: null,
            selectedSubtypeName: '',
            fileName: '',
            selectedFile: null,
            isTypeDropdownOpen: false,
            isSubtypeDropdownOpen: false,
            subtypes: {
                Skincare: [
                    { id: 1, name: 'Cream' },
                    { id: 2, name: 'Moisturizer' },
                    { id: 3, name: 'Sunscreen' },
                    { id: 4, name: 'Toner' }
                ],
                Haircare: [
                    { id: 5, name: 'Conditioner' },
                    { id: 6, name: 'Dry Shampoo' },
                    { id: 7, name: 'Hairspray' },
                    { id: 8, name: 'Shampoo' }
                ],
                Makeup: [
                    { id: 9, name: 'Blushes' },
                    { id: 10, name: 'Concealers' },
                    { id: 11, name: 'Foundations' },
                    { id: 12, name: 'Lip Tints' }
                ]
            },
            successMessage: '',
            errorMessage: '',
        };
    },
    methods: {
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.fileName = file.name;
                this.selectedFile = file;
            } else {
                this.fileName = 'No file chosen';
            }
        },
        toggleDropdown(type) {
            if (type === 'type') {
                this.isTypeDropdownOpen = !this.isTypeDropdownOpen;
            } else if (type === 'subtype') {
                this.isSubtypeDropdownOpen = !this.isSubtypeDropdownOpen;
            }
        },
        selectType(type) {
            this.selectedType = type;
            this.isTypeDropdownOpen = false;
            this.selectedSubtype = null;
            this.selectedSubtypeName = '';
        },
        selectSubtype(subtype) {
            this.selectedSubtype = subtype.id;
            this.selectedSubtypeName = subtype.name;
            this.isSubtypeDropdownOpen = false;
        },
        async submitForm() {
            const formData = new FormData();
            formData.append('ProductName', this.productName || '');
            formData.append('Description', this.description || '');
            formData.append('Price', this.price || '0');
            formData.append('TypeID', this.getSelectedTypeId() || '');
            formData.append('SubTypeID', this.selectedSubtype || '');
            formData.append('image', this.selectedFile);

            if (this.selectedFile) {
                formData.append('image', this.selectedFile);
            }

            try {
                const response = await axios.post('/admin/products/store', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                });
                console.log('Product Created!', response.data);
                this.successMessage = 'Product created successfully!';
            } catch (error) {
                this.errorMessage = 'Failed to create product. Please try again.';
                this.clearMessageAfterTimeout();
            }
        },
        getSelectedTypeId() {
            const typeMap = {
                Skincare: 1,
                Haircare: 2,
                Makeup: 3,
            };
            return typeMap[this.selectedType] || null;
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
* {
    font-size: 20px;
}

.add-product-container {
    font-family: Arial;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    border-radius: 8px;
    width: 1000px;
    position: absolute;
    top: 80px;
    left: 1px;

}

.form-wrapper {
    width: 100%;
}

.form-group {
    margin-bottom: 25px;
}

.form-group-subtype {
    margin-bottom: 15px;
    position: absolute;
    left: 300px;
}

.dropdown {
    position: relative;
}

.dropdown-toggle {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
    cursor: pointer;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    z-index: 10;
    list-style: none;
    padding: 0;
}

.dropdown-menu li {
    padding: 10px 15px;
    cursor: pointer;
}

.dropdown-menu li:hover {
    background-color: #f0f0f0;
}

.dropdown-arrow {
    width: 12px;
    height: 12px;
    transition: transform 0.3s ease;
}

.dropdown-arrow.rotated {
    transform: rotate(180deg);
}



label {
    display: block;
    margin-bottom: 5px;
}

.input-field {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-row {
    display: flex;
    justify-content: space-between;
    gap: 15px;
}

.select-box span {
    color: #888;
}

.arrow-icon {
    width: 16px;
    height: 16px;
}

.file-upload {
    display: flex;
    align-items: center;
    gap: 10px;
}

.choose-file {
    background-color: #eee;
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    cursor: pointer;
    flex-shrink: 0;
}

.file-name.long-rectangle {
    display: inline-block;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    min-width: 200px;
    text-align: left;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    position: absolute;
    left:143px;
    top: 240px;
    width: 830px;
    height: 40px;
}

.file-name {
    margin-left: 10px;
    color: #888;
}

.textarea-field {
    font-family: Arial;
    width: 100%;
    height: 80px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
.button-group {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
    position: absolute;
    top: 520px;
    left: 730px;
}

.cancel-button {
    background-color: #ccc;
    color: #333;
    border: none;
    border-radius: 4px;
    padding: 10px 15px;
    cursor: pointer;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

.cancel-button:hover {
    background-color: #bbb;
}

.save-button {
    background-color: #8a2be2;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 15px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.save-button:hover {
    background-color: #6b1bb3;
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
