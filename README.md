# 📘 Laravel Book Management App

Aplikasi ini merupakan aplikasi Laravel sederhana yang dibuat sebagai bagian dari **Tes Teknikal di PT Fan Integrasi Teknologi**. Aplikasi ini dirancang untuk mengelola buku bacaan, di mana pengguna dapat mempublikasikan, memperbarui, dan menghapus buku milik mereka. Halaman publik (guest page) dapat diakses oleh siapa saja tanpa perlu login, dan menampilkan daftar buku yang telah dipublikasikan oleh pengguna terdaftar. Pengguna yang login memiliki akses penuh untuk mengelola buku mereka sendiri.

---

## 🚀 Fitur Aplikasi

### 🔐 Autentikasi
Menyediakan sistem login, registrasi, verifikasi email, dan reset password menggunakan Laravel Breeze.
- Registrasi dan login pengguna.
- Verifikasi email sebelum dapat mengakses fitur utama.
- Reset password via email.
- Middleware `auth` dan `verified` digunakan untuk melindungi halaman-halaman penting.

### 📊 Dashboard
Halaman pribadi untuk pengguna yang sudah login.
- Menampilkan total buku yang dipublikasikan oleh pengguna.
- Menampilkan rata-rata rating dari semua buku pengguna.

### 📚 Manajemen Buku
Fitur utama untuk mengelola koleksi buku.
- CRUD (Create, Read, Update, Delete) buku.
- Atribut buku:
  - Judul
  - Penulis
  - Deskripsi
  - Thumbnail (gambar cover)
  - Rating (1–5)
- Upload gambar menggunakan Laravel Filesystem.
- Filter buku berdasarkan:
  - Judul
  - Penulis
  - Tanggal upload
  - Rating

### 👤 Manajemen Pengguna (Admin Only)
Fitur admin untuk mengelola data pengguna.
- Menampilkan daftar pengguna beserta:
  - Nama
  - Email
  - Status verifikasi email
- Filter pengguna berdasarkan:
  - Nama
  - Email
  - Status verifikasi

### 🌐 Halaman Tamu (Guest Page)
Halaman publik yang menampilkan semua buku.
- Akses tanpa login.
- Filter buku berdasarkan:
  - Judul
  - Penulis
  - Tanggal upload
  - Rating

### 🧪 Pengujian Otomatis
Pengujian aplikasi menggunakan PHPUnit.
- Unit Test dan Feature Test untuk:
  - Autentikasi pengguna
  - Operasi CRUD buku

---

## 🛠 Teknologi yang Digunakan

- Laravel 12
- Laravel Breeze (Autentikasi & Verifikasi Email)
- Tailwind CSS (Styling)
- PostgreSQL
- Laravel Filesystem (Upload file)
- PHPUnit (Testing)

---

## 📦 Library Pihak Ketiga

- **Laravel Breeze**: Autentikasi dan verifikasi email
- **Google SMTP / Mailtrap**: Pengiriman email verifikasi dan reset password
- **Tailwind CSS**: Framework CSS utility-first

---

## ⭐ Fitur Tambahan

- Total buku pengguna ditampilkan pada halaman dashboard
- Rata-rata rating buku pengguna pada halaman dashboard
- Validasi form dan feedback error menggunakan Laravel Validation
- Penyimpanan gambar cover buku di `storage/books`

---

## ⚙️ Instalasi

1. **Clone repositori ini**
   ```bash
   git clone https://github.com/dwyudistira/yudistira_fdtest.git
   cd yudistira_fdtest

2. **Install dependencies**
   ```bash
   composer install
   npm install && npm run dev
   ```
3. ***Salin file environment**
    ```bash
    cp .env.example .env
    ```
4. ***Atur koneksi database di .env***
    ```bash
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=yudistira_fdtest
    DB_USERNAME=username
    DB_PASSWORD=password
    ```
5. ***Generate app key & migrasi***
    ```bash
    php artisan key:generate
    php artisan migrate
    ```
6. ***Konfigurasi Mailtrap (Testing Email)***
    ```bash 
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.googlemail.com
    MAIL_PORT=587
    MAIL_USERNAME=your_email@gmail.com
    MAIL_PASSWORD=your_app_password
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=your_email@gmail.com
    MAIL_FROM_NAME="Laravel Book App"
    ```
7. ***Link Storage & Jalankan Server Laravel***
    ```bash
    php artisan storage:link
    php artisan serve   
    ```