Dashboard Penjualan – Laravel 12

Aplikasi Dashboard Penjualan berbasis Laravel 12, digunakan untuk menampilkan data penjualan dalam bentuk tabel dan grafik. Aplikasi ini berjalan tanpa fitur autentikasi—pengguna langsung diarahkan ke halaman dashboard.

Aplikasi ini juga telah berhasil dideploy menggunakan Railway.

🚀 Instalasi Proyek Secara Lokal

Ikuti langkah berikut untuk menjalankan project di lingkungan lokal Anda.

1. Clone Repository
   git clone https://github.com/fakhrizafathur/dashboard-penjualan.git
   cd dashboard-penjualan

2. Install Dependencies
   composer install

Jika menggunakan Vite atau asset build:

npm install
npm run build

3. Copy File Environment
   cp .env.example .env

4. Generate App Key
   php artisan key:generate

5. Konfigurasi Database

Edit .env dengan data lokal Anda:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dashboard_penjualan
DB_USERNAME=root
DB_PASSWORD=

6. Jalankan Migrasi & Seeder

Jika Anda menggunakan seeder:

php artisan migrate --seed

Jika tidak menggunakan seeder:

php artisan migrate

7. Jalankan Server Lokal
   php artisan serve

Akses aplikasi melalui:
👉 http://127.0.0.1:8000/dashboard

🌐 Mengakses Aplikasi yang Telah Dideploy (Railway)

Aplikasi dapat diakses di:

👉 https://dashboard-penjualan-production.up.railway.app/dashboard

Tidak ada proses login — pengguna langsung melihat dashboard.

⚙️ Teknologi yang Digunakan

Laravel 12

PHP 8.2

MySQL

Apache (Docker via Railway)

Railway Hosting

Composer

NPM (jika menggunakan asset builder)

🐳 Deployment via Docker (Opsional)

Aplikasi dapat dijalankan menggunakan Docker menggunakan Dockerfile berikut:

FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
 git \
 curl \
 libpng-dev \
 libonig-dev \
 libxml2-dev \
 zip \
 unzip \
 default-mysql-client \
 && rm -rf /var/lib/apt/lists/\*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN a2enmod rewrite headers

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . .

RUN mkdir -p storage/framework/cache/data \
 && mkdir -p storage/logs \
 && mkdir -p bootstrap/cache \
 && chmod -R 777 storage \
 && chmod -R 777 bootstrap/cache

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html

RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]

✨ Fitur Aplikasi

Menampilkan data penjualan dalam bentuk tabel

Menampilkan grafik penjualan

Pagination

Responsive UI

Tidak ada login (langsung ke dashboard)

📁 Struktur Direktori (Singkat)
app/
bootstrap/
config/
database/
public/
resources/
routes/

📞 Kontak

Jika butuh update README, dokumentasi API, atau ingin menambahkan fitur baru, beri tahu saja.
Fathur Fakhriza
