# <div align="center">📊 Dashboard Penjualan – Laravel 12</div>

<div align="center">
Aplikasi web sederhana untuk menampilkan dashboard penjualan.  
Dibangun menggunakan Laravel 12 dan di-*deploy* menggunakan Railway.
</div>

---

## 📦 **Instalasi Proyek Secara Lokal**

### 🔧 **1. Clone Repository**

```bash
git clone https://github.com/fakhrizafathur/dashboard-penjualan.git
```

### 📁 **2. Install Dependencies**

```bash
composer install
```

### ⚙️ **3. Buat File Environment**

```bash
cp .env.example .env
```

Sesuaikan konfigurasi database lokal:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 🔑 **4. Generate App Key**

```bash
php artisan key:generate
```

### 🗄️ **5. Migrasi Database**

```bash
php artisan migrate
```

### ▶️ **6. Jalankan Server Lokal**

```bash
php artisan serve
```

Aplikasi lokal dapat diakses melalui:
👉 **http://127.0.0.1:8000/dashboard**

---

## 🌐 **Akses Aplikasi yang Telah di-Hosting**

Aplikasi dapat diakses melalui Railway pada URL berikut:

### <div align="center">🔗 **https://dashboard-penjualan-production.up.railway.app/dashboard**</div>

Tidak ada proses login — pengguna langsung diarahkan ke halaman **Dashboard Penjualan**.

---

## 📂 **Struktur Proyek (Ringkas)**

```
project/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
│   ├── css/
│   └── index.php
├── resources/
│   └── views/
├── routes/
│   └── web.php
└── ...
```

---

## 🚀 **Deployment Menggunakan Railway**

-   Proyek menggunakan **Dockerfile custom**
-   ENV yang digunakan:

```env
APP_URL=https://dashboard-penjualan-production.up.railway.app
```

-   Setelah deploy, lakukan migrasi dengan:

```bash
railway run php artisan migrate --force
```

---

## 📝 **Lisensi**

Proyek ini bebas digunakan untuk kebutuhan belajar dan pengembangan.
