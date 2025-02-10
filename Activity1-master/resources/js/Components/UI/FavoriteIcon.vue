<template>
    <img
        :src="isFavorited ? '/assets/img/heart-color.png' : '/assets/img/heart.png'"
        alt="Favorite Icon"
        @click="toggleFavorite"
    />
</template>

<script>
import { ref, onMounted } from 'vue';
import {useFavoritesStore} from '@/stores/favorites';

export default {
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const favoritesStore = useFavoritesStore();
        const isFavorited = ref(false);

        const updateFavoriteState = () => {
            // Check if the current product is in the global favorites list
            isFavorited.value = favoritesStore.favorites.includes(props.product.id);
        };

        const fetchFavoriteStatus = async () => {
            try {
                // Ensure the store has updated data from the backend
                await favoritesStore.fetchFavorites();
                updateFavoriteState();
            } catch (error) {
                console.error('Error fetching favorite status:', error);
            }
        };

        const toggleFavorite = async () => {
            try {
                await favoritesStore.toggleFavorite(props.product.id);
                updateFavoriteState();
            } catch (error) {
                console.error('Error toggling favorite:', error);
            }
        };

        onMounted(fetchFavoriteStatus);

        return {
            toggleFavorite,
            isFavorited,
        };
    },
};
</script>
