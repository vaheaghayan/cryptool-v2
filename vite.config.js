import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/profile.css',
                'resources/css/language-switcher.css',
                'resources/css/category-switcher.css',
                'resources/css/status.css',
                'resources/css/comment.css',
                'resources/css/forum.css',
                'resources/css/conversation.css',
                'resources/js/app.js',
                'resources/js/static/modal.js',
                'resources/js/forum/main.js',
                'resources/js/conversation/main.js',
                'resources/js/classic_algorithms/atbash.js',
                'resources/js/classic_algorithms/vigenere.js',
                'resources/js/classic_algorithms/caesar.js',
                'resources/js/symmetric_algorithms/des.js',
                'resources/js/symmetric_algorithms/aes.js',
                'resources/js/asymmetric_algorithms/rsa.js',
                'resources/js/hash_algorithms/md5.js',
                'resources/assets/js/gform.js',
                'resources/assets/js/auth/register.js',
                'resources/assets/js/auth/login.js',
                'resources/assets/js/auth/forgot-password.js',
                'resources/assets/js/auth/password-reset.js',

                'resources/downloaded/css/w3.css',
                'resources/downloaded/css/font.css',
                'resources/downloaded/css/font2.css',
                'resources/downloaded/css/font-awesome.css',
                'resources/downloaded/css/bootstrap.min.css',
                'resources/downloaded/js/jquery3.6.0.js',
                'resources/downloaded/js/popper.min.js',
                'resources/downloaded/js/bootstrap.min.js',
            ],
            refresh: true,
        }),
    ],
});
