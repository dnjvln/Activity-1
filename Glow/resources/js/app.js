import '../css/home.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { Favorites, ToggleCart, ToggleProfile } from './Pages/index.js';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,

    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue')
        ),

    setup({ el, App, props, plugin }) {
        const vueApp = createApp({ render: () => h(App, props) }) // Define vueApp here
            .use(plugin);

        vueApp.component('Favorites', Favorites);
        vueApp.component('ToggleCart', ToggleCart);
        vueApp.component('ToggleProfile', ToggleProfile);
        vueApp.mount(el);
    },
});
