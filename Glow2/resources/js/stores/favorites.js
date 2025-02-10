import { defineStore } from 'pinia';
import axios from 'axios';

export const useFavoritesStore = defineStore('favorites', {
    state: () => ({
        favoritesCount: 0,
    }),
    actions: {
        async fetchFavoritesCount() {
            try {
                // Make an API call to get the count of favorites
                const response = await axios.get('/api/favorites/count');  // Adjust this URL to your API endpoint

                // Check if the response data is valid and contains the expected properties
                if (response.data && typeof response.data.count !== 'undefined') {
                    this.favoritesCount = response.data.count;
                } else {
                    console.error('Invalid response format for favorites count:', response.data);
                    this.favoritesCount = 0;  // Default to 0 if the response is invalid
                }
            } catch (error) {
                console.error('Error fetching favorites count:', error);
                this.favoritesCount = 0;  // Default to 0 on error
            }
        },

        // Action to toggle the favorite status
        toggleFavorite(productId) {
            const index = this.favorites.indexOf(productId);
            if (index === -1) {
                this.favorites.push(productId); // Add to favorites
            } else {
                this.favorites.splice(index, 1); // Remove from favorites
            }
            this.favoritesCount = this.favorites.length; // Update the count after toggle
        },
    },
});
