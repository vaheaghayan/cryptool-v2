import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/static/modal.js',
                'resources/js/forum/main.js',
                'resources/js/classic_algorithms/atbash.js',
                'resources/js/classic_algorithms/vigenere.js',
                'resources/js/classic_algorithms/caesar.js',
                'resources/js/cryptographic_algorithms/des.js',
                'resources/js/cryptographic_algorithms/aes.js',
                'resources/js/cryptographic_algorithms/rsa.js',
                'resources/js/hash_algorithms/md5.js',
                'resources/js/comment.js',
            ],
            refresh: true,
        }),
    ],
});
