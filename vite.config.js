import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss', 'resources/js/app.js','resources/assets/css/style.css','public/bootstrap.min.css','public/bootstrap.min.js',
                'resources/assets/js/jquery.min.js','resources/assets/js/popper.js',
                'resources/assets/js/bootstrap.min.js','resources/assets/js/main.js','resources/sass/app.scss', 'resources/js/app.js','resources/add/vendors/iconfonts/mdi/css/materialdesignicons.min.css',
                'resources/add/vendors/css/vendor.bundle.base.css','resources/add/css/style.css','resources/add/js/off-canvas.js','resources/add/js/misc.js','resources/add/js/dashboard.js','resources/add2/vendor/@popperjs/core/dist/umd/popper.min.js',
                'resources/add/vendors/iconfonts/mdi/css/fontAwesome.min.css','resources/add/vendors/iconfonts/mdi/css/bx.min.css'
            ],
            refresh: true,
        }),
    ],
});
