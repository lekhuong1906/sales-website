import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { readdirSync } from 'fs';
import path from 'path';

const getJsFiles = (folderPath) => {
    return readdirSync(folderPath)
        .filter(file => file.endsWith('.js')) // Lọc file có đuôi .js
        .map(file => path.join(folderPath, file)); // Tạo đường dẫn đầy đủ
};

export default defineConfig({
    server: {
        host: true,
        port: 5173,
        hmr: {
            host: '127.0.0.1',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                ...getJsFiles('resources/js/admin'), 
                ...getJsFiles('resources/js/home')
            ],
            refresh: true,
        }),
    ],
});