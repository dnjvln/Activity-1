<template>
    <img
        :class="['chevron-down', { rotate: isVisible }]"
        src="/assets/img/chevron-up.png"
        alt="Dropdown"
        @click="toggleFilter"
    />

    <!-- Filter container -->
    <div :class="['filter-container', { show: isVisible }]">
        <div v-for="filter in filters" :key="filter.name" :class="filter.groupClass">
            <Link
                :href="`/${category.toLowerCase()}/${filter.name.toLowerCase().replace(' ', '-')}`"
                :class="filter.class"
            >{{ filter.name }}</Link>
            <div :class="filter.countClass">{{ filter.count }}</div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3'; // Import Link component

const props = defineProps({
    category: {
        type: String,
        required: true,
    },
});

const isVisible = ref(false);

function toggleFilter() {
    isVisible.value = !isVisible.value;
}

const filters = computed(() => {
    const filterOptions = {
        Skincare: [
            { name: 'Toner', count: 5, groupClass: 'group-1', class: 'subtype1', countClass: 'number1' },
            { name: 'Moisturizer', count: 5, groupClass: 'group-2', class: 'subtype2', countClass: 'number2' },
            { name: 'Cream', count: 5, groupClass: 'group-3', class: 'subtype3', countClass: 'number3' },
            { name: 'Sunscreen', count: 5, groupClass: 'group-4', class: 'subtype4', countClass: 'number4' },
        ],
        Makeup: [
            { name: 'Foundations', count: 5, groupClass: 'group-1', class: 'subtype1', countClass: 'number1' },
            { name: 'Concealers', count: 5, groupClass: 'group-2', class: 'subtype2', countClass: 'number2' },
            { name: 'Blushes', count: 5, groupClass: 'group-3', class: 'subtype3', countClass: 'number3' },
            { name: 'Lip Tints', count: 5, groupClass: 'group-4', class: 'subtype4', countClass: 'number4' },
        ],
        Haircare: [
            { name: 'Shampoo', count: 5, groupClass: 'group-1', class: 'subtype1', countClass: 'number1' },
            { name: 'Conditioner', count: 5, groupClass: 'group-2', class: 'subtype2', countClass: 'number2' },
            { name: 'Dry Shampoo', count: 5, groupClass: 'group-3', class: 'subtype3', countClass: 'number3' },
            { name: 'Hairspray', count: 5, groupClass: 'group-4', class: 'subtype4', countClass: 'number4' },
        ],
    };
    return filterOptions[props.category] || [];
});
</script>




<style scoped>
/* FILTER ROTATE */
.chevron-down {
    position: absolute;
    top: 104px;
    left: 210px;
    cursor: pointer;
    transition: transform 0.6s;
    z-index: 5;
}

.rotate {
    transform: rotate(180deg);
}

.filter-container {
    display: none;
}

.filter-container.show {
    display: block;
    overflow: hidden;
}

.filter-container,
.filter-container * {
    box-sizing: border-box;
}

input,
select,
textarea,
button {
    outline: 0;
}

.filter-container {
    position: absolute;
    display: none;
    background-image: url('./assets/img/rectangle-4.png');
    background-size: 100% 90%; /* Stretch the image to fill the container */
    background-position: center;
    background-repeat: no-repeat;
    padding: 5px;
    width: 245px;
    height: 190px;
    margin: 0 auto;
    border-radius: 20px;
    z-index: 5;
    top: 140px;
    left: 100px;
}


.filter-container a {
    text-decoration: none;
    color: inherit;
}

.filter-container a:hover {
    text-decoration: none;
}

.group-1 {
    position: relative;
    width: 183.365px;
    height: 30px;
    margin: 18px 0 0 31px;
    z-index: 1;

}

.subtype1 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 30px;
    color: #731c82;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 30px;
    text-align: left;
    white-space: nowrap;
    z-index: 2;
}

.number1 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
    position: absolute;
    width: 75.648px;
    height: 30px;
    top: 0;
    left: 107.717px;
    color: #731c82;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 30px;
    text-align: right;
    white-space: nowrap;
    z-index: 3;
}

.group-2 {
    position: relative;
    width: 183.648px;
    height: 30px;
    margin: 12px 0 0 31px;
    z-index: 4;
}

.subtype2 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 30px;
    top: 0;
    left: 0;
    color: #731c82;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 30px;
    text-align: left;
    white-space: nowrap;
    z-index: 5;
}

.number2 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
    position: absolute;
    width: 75.648px;
    height: 30px;
    top: 0;
    left: 108px;
    color: #731c82;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 30px;
    text-align: right;
    white-space: nowrap;
    z-index: 6;
}

.group-3 {
    position: relative;
    width: 183.365px;
    height: 30px;
    margin: 14px 0 0 31px;
    z-index: 13;
}

.subtype3 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 30px;
    top: 0;
    left: 0;
    color: #731c82;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 30px;
    text-align: left;
    white-space: nowrap;
    z-index: 14;
}

.number3 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
    position: absolute;
    width: 75.648px;
    height: 30px;
    top: 0;
    left: 107.717px;
    color: #731c82;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 30px;
    text-align: right;
    white-space: nowrap;
    z-index: 15;
}

.rectangle-20 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
    position: absolute;
    width: 75.648px;
    height: 30px;
    top: 0;
    left: 107.717px;
    color: #731c82;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 30px;
    text-align: right;
    white-space: nowrap;
    z-index: 12;
}

.group-4 {
    position: relative;
    width: 183.365px;
    height: 30px;
    margin: 13px 0 0 31px;
    z-index: 7;
}

.subtype4 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 30px;
    top: 0;
    left: 0;
    color: #731c82;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 30px;
    text-align: left;
    white-space: nowrap;
    z-index: 8;
}


.number4 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
    position: absolute;
    width: 75.648px;
    height: 30px;
    top: 0;
    left: 107.717px;
    color: #731c82;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 30px;
    text-align: right;
    white-space: nowrap;
    z-index: 9;
}


.group-1, .group-2, .group-3, .group-4 {
    position: relative;
    width: 183.365px;
    height: 30px;
    margin: 10px 0 0 31px;
    padding: 5px 0;
    z-index: 1;
    transition: background-color 0.3s;
}

.group-1:hover,
.group-2:hover,
.group-3:hover,
.group-4:hover {
    background-color: rgba(255, 221, 250, 0.7);
}

a {
    text-decoration: none;
    color: #731c82;
    padding: 5px 10px;
}

.subtype1, .subtype2, .subtype3, .subtype4 {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    position: absolute;
    height: 30px;
    top: 0;
    left: 0;
    color: inherit;
    font-family: Abel, var(--default-font-family);
    font-size: 25px;
    font-weight: 400;
    line-height: 30px;
    text-align: left;
    white-space: nowrap;
    z-index: 2;
}


</style>
