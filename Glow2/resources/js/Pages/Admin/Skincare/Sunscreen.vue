<template>
    <ProductList :subtype-id="3" title="Skincare Products List > Sunscreen" />
</template>

<script>
import ProductList from '@/Components/Admin/ProductList.vue';

export default {
    components: {
        ProductList,
    },
};
</script>
