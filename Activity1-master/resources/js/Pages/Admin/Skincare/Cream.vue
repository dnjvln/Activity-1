<template>
    <ProductList :subtype-id="1" title="Skincare Products List > Cream" />
</template>

<script>
import ProductList from '@/Components/Admin/ProductList.vue';

export default {
    components: {
        ProductList,
    },
};
</script>
