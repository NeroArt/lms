import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/styles.css',
                'resources/js/scripts.js',
                'resources/css/app.css',
                'resources/js/seccion1.js',
                'resources/js/seccion2.js',
                'resources/js/seccion3.js',
                'resources/js/seccion3b.js',
                'resources/js/seccion3c.js',
                'resources/js/seccion3d.js',
                'resources/js/seccion4.js',
                'resources/js/seccion5.js',
                'resources/js/seccion6.js',
                'resources/js/seccion7a.js',
                'resources/js/seccion7b.js',
                'resources/js/seccion7c.js',
                'resources/js/seccion7d.js',
                'resources/js/seccion8a.js',
                'resources/js/seccion8b.js',
                'resources/js/seccion8c.js',
                'resources/js/seccion8d.js',
                'resources/js/seccion8e.js',
                'resources/js/seccion8f.js',
                'resources/js/seccion9a.js',
                'resources/js/seccion9b.js',
                'resources/js/seccion9c.js',
                'resources/js/seccion9d.js',
                'resources/js/seccion9e.js',
                'resources/js/seccion9f.js',
                'resources/js/seccion9g.js',
                'resources/js/seccion9h.js',
                'resources/js/seccion9i.js',
                'resources/js/seccion9j.js',
                'resources/js/seccion9k.js',
                
            ],
            refresh: true,
        }),
    ],
});
