import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/classic_algorithms/atbash.js',
                'resources/js/static/modal.js',
            ],
            refresh: true,
        }),
    ],
});
