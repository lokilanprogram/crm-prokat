import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  server: {
    host: '0.0.0.0',       // слушать все интерфейсы
    port: 5173,
    strictPort: true,
    cors: true,            // добавить CORS-заголовки
    hmr: {
      host: '5.129.203.40', // ваш внешний IP или домен
      protocol: 'ws',
      port: 5173,
    },
  },
  plugins: [
    laravel({
      input: ['resources/css/app.css','resources/js/app.js'],
      refresh: true,
    }),
  ],
});

