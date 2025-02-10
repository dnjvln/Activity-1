<template>
    <ProductList :subtype-id="7" title="Haircare Products List > Hair Spray" />
</template>

<script>
import ProductList from '@/Components/Admin/ProductList.vue';

export default {
    components: {
        ProductList,
    },
};
</script>
