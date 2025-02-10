import './bootstrap';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { Favorites, ToggleCart, ToggleProfile } from './Pages/index.js';
import axios from 'axios';
import { createPinia } from 'pinia';

// Set up global axios configuration
axios.defaults.baseURL = 'http://127.0.0.1:3000';

// Get the CSRF token from the meta tag
const csrfTokenMetaTag = document.querySelector('meta[name="csrf-token"]');
if (csrfTokenMetaTag) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfTokenMetaTag.getAttribute('content');
} else {
    console.error('CSRF token meta tag not found!');
}

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        const pinia = createPinia();  // Initialize Pinia here

        const vueApp = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(pinia); // Use Pinia here

        // Register custom global components
        vueApp.component('Favorites', Favorites);
        vueApp.component('ToggleCart', ToggleCart);
        vueApp.component('ToggleProfile', ToggleProfile);

        vueApp.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
