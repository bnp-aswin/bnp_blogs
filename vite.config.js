import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/scss/app.scss",
                "resources/js/jquery-1.12.1.js",
                "resources/js/popper.js",
            ],
            refresh: true,
        }),
    ],
});
