<template>
    <div>
        <MainHeaderComponent />
        <FooterComponent />
        <HeaderComponent />
        <NavbarComponent />
    </div>
</template>

<script>
import MainHeaderComponent from './Components/MainHeaderComponent.vue';
import HeaderComponent from './Components/HeaderComponent.vue';
import FooterComponent from "./Components/FooterComponent.vue";
import NavbarComponent from "@/Components/NavbarComponent.vue";

export default {
    components: {
        NavbarComponent,
        FooterComponent,
        MainHeaderComponent,
        HeaderComponent,
    },
};
</script>
