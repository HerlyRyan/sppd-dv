# Dokumentasi Project Laravel

## Instalasi

1. Clone repositori:
    ```
    git clone https://github.com/HerlyRyan/sppd-dv
    cd sppd-dv
    ```

2. Instal dependensi:
    ```
    composer install
    npm install
    ```

3. Siapkan environment:
    ```
    cp .env.example .env
    php artisan key:generate
    ```

4. Konfigurasi database di file `.env`:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=username_anda
    DB_PASSWORD=password_anda
    ```

5. Jalankan migrasi:
    ```
    php artisan migrate
    ```

6. Mulai server pengembangan:
    ```
    php artisan serve
    npm run dev
    ```