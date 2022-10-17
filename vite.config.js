import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/bootstrap.css",
                "resources/js/jquery-1.12.1.js",
                "resources/js/popper.js",
            ],
            refresh: true,
        }),
    ],
});
