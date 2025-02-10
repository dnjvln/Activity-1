import { reactive } from 'vue';

export const eventBus = reactive({
    favoritesCount: 0,
    favorites: [],
});
