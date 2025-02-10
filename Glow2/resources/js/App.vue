<template>
    <div>
        <MainHeaderComponent />
        <FooterComponent />
        <HeaderComponent />
        <NavbarComponent />
        <FilterComponent />
        <AdminSidebar />
        <AdminProfile />
        <ProductList />
    </div>
</template>

<script>
import MainHeaderComponent from './Components/UI/MainHeaderComponent.vue';
import HeaderComponent from './Components/UI/HeaderComponent.vue';
import FooterComponent from "./Components/UI/FooterComponent.vue";
import NavbarComponent from "@/Components/UI/NavbarComponent.vue";
import FilterComponent from "@/Components/UI/FilterComponent.vue";
import AdminSidebar from "@/Components/Admin/AdminSidebar.vue";
import AdminProfile from "@/Components/Admin/AdminProfile.vue";
import ProductList from "@/Components/Admin/ProductList.vue";

export default {
    components: {
        NavbarComponent,
        FooterComponent,
        MainHeaderComponent,
        HeaderComponent,
        FilterComponent,
        AdminSidebar,
        AdminProfile,
        ProductList,
    },
};
</script>
