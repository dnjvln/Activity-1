import { defineStore } from 'pinia';
import axios from 'axios';

export const useFavoritesStore = defineStore('favorites', {
    state: () => ({
        favoritesCount: 0,
    }),
    actions: {
        async fetchFavoritesCount() {
            try {
                const response = await axios.get('/api/favorites/count');
                this.favoritesCount = response.data.count || 0;
            } catch (error) {
                console.error('Error fetching favorites count:', error);
                this.favoritesCount = 0;
            }
        },

        toggleFavorite(productId) {
            const index = this.favorites.indexOf(productId);
            if (index === -1) {
                this.favorites.push(productId);
            } else {
                this.favorites.splice(index, 1);
            }
            this.favoritesCount = this.favorites.length;
        },
    },
});
