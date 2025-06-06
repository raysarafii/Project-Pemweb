<div align="center">
  <img src="https://path-to-your/logo.png" alt="NutriTrack Logo" width="150"/>

  <h1 align="center">NutriTrack - Pelacak Gula & Kalori</h1>

  <p align="center">
    Aplikasi web modern untuk membantu pengguna melacak asupan gula dan kalori harian, dengan fitur pengecekan nutrisi otomatis untuk mendukung gaya hidup sehat.
  </p>

  <p align="center">
    <img src="https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel">
    <img src="https://img.shields.io/badge/Vue.js-3.x-4FC08D?style=for-the-badge&logo=vue.js" alt="Vue.js">
    <img src="https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=for-the-badge&logo=php" alt="PHP">
    <img src="https://img.shields.io/badge/License-MIT-blue.svg?style=for-the-badge" alt="License">
  </p>
</div>

---

## 📖 Tentang Proyek

**NutriTrack** adalah sebuah Single Page Application (SPA) yang dibangun untuk memberikan solusi mudah bagi pengguna dalam mengelola pola makan. Proyek ini memungkinkan pencatatan konsumsi makanan/minuman harian dan menyediakan informasi nutrisi (gula dan kalori) secara otomatis melalui integrasi dengan API eksternal. Tujuannya adalah membangun kesadaran akan pilihan makanan yang lebih cerdas dan seimbang.

### ✨ Fitur Utama

* 👤 **Autentikasi Pengguna**: Sistem registrasi dan login yang aman.
* 📝 **Pencatatan Asupan**: Form input untuk mencatat makanan, gula, kalori, dan waktu konsumsi.
* 🤖 **Cek Nutrisi Otomatis**: Fitur untuk mengecek kadar gula & kalori makanan secara otomatis menggunakan API eksternal ( SDA).
* 📊 **Dashboard Pengguna**: Halaman utama untuk melihat ringkasan data (konsep).
* 🌐 **Halaman Landing**: Halaman depan yang informatif dengan section FAQ, Testimoni, dan Program.

### 🛠️ Teknologi yang Digunakan

* **Backend**: Laravel 10
* **Frontend**: Vue.js 3 (Composition API)
* **Styling**: Tailwind CSS
* **Database**: MySQL / MariaDB
* **Development Tool**: Vite

---

### ⚙️ Instalasi

1.  **Install Dependensi Backend**
    Gunakan Composer untuk menginstall semua package PHP yang dibutuhkan.
    ```bash
    composer install
    ```

2.  **Buat File Environment**
    Salin file `.env.example` menjadi `.env`. File ini berisi semua konfigurasi environment proyek Anda.
    ```bash
    cp .env.example .env
    ```

3.  **Generate Application Key**
    Setiap aplikasi Laravel membutuhkan kunci enkripsi yang unik.
    ```bash
    php artisan key:generate
    ```

4.  **Migrasi Database**
    Jalankan migrasi untuk membuat semua tabel yang diperlukan di database Anda.
    ```bash
    php artisan migrate
    ```

5.  **Install Dependensi Frontend**
    Gunakan npm untuk menginstall semua package JavaScript yang dibutuhkan.
    ```bash
    npm install
    ```

---

## 🏃 Menjalankan Aplikasi

Aplikasi ini terdiri dari dua bagian: backend Laravel dan frontend Vite. Anda perlu menjalankan keduanya secara bersamaan di dua terminal terpisah.

1.  **Jalankan Server Backend Laravel**
    Terminal ini akan menjalankan server PHP pada port 8000.
    ```bash
    php artisan serve
    ```

2.  **Jalankan Server Frontend Vite**
    Buka terminal **baru** dan jalankan perintah ini untuk kompilasi aset frontend dan *hot-reloading*.
    ```bash
    npm run dev
    ```

Setelah kedua server berjalan, buka browser Anda dan akses: **http://localhost:8000**

Selamat! Aplikasi NutriTrack Anda sekarang sudah berjalan secara lokal. 🚀
