<template>
    <ProductList :subtype-id="5" title="Haircare Products List > Conditioner" />
</template>

<script>
import ProductList from '@/Components/Admin/ProductList.vue';

export default {
    components: {
        ProductList,
    },
};
</script>
