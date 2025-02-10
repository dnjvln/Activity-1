<template>
    <ProductList :subtype-id="2" title="Skincare Products List > Moisturizers" />
</template>

<script>
import ProductList from '@/Components/Admin/ProductList.vue';

export default {
    components: {
        ProductList,
    },
};
</script>
