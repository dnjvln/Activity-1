<template>
    <ProductList :subtype-id="10" title="Makeup Products List > Concealers" />
</template>

<script>
import ProductList from '@/Components/Admin/ProductList.vue';

export default {
    components: {
        ProductList,
    },
};
</script>
