<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Sistem Pakar Diagnosis Gangguan Kesehatan Mental

Proyek ini adalah aplikasi web sistem pakar yang dibangun menggunakan Laravel untuk membantu mendiagnosis gangguan kesehatan mental berdasarkan gejala yang dialami pengguna.

## Panduan Instalasi dan Setup

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan lokal Anda setelah melakukan `git clone`.

### Prasyarat

- PHP >= 8.1
- Composer
- Node.js & NPM
- Web Server (misalnya Apache, Nginx) atau cukup gunakan `php artisan serve`
- Database (MySQL)

### Langkah-langkah Instalasi

1.  **Clone Repository**

    ```bash
    git clone <URL_REPOSITORY_ANDA>
    cd mental-health-id
    ```

2.  **Install Dependensi**

    Install semua dependensi PHP dan JavaScript yang dibutuhkan.

    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Lingkungan (Environment)**

    Salin berkas `.env.example` menjadi `.env` dan buat kunci aplikasi baru.

    ```bash
    # Untuk Windows
    copy .env.example .env

    # Untuk macOS / Linux
    # cp .env.example .env

    php artisan key:generate
    ```

4.  **Konfigurasi Database**

    Buka berkas `.env` dan atur koneksi database Anda.

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=user_database_anda
    DB_PASSWORD=password_anda
    ```

    Anda memiliki dua pilihan untuk menyiapkan struktur dan data awal database:

    **Opsi A: Migrasi & Seeder (Direkomendasikan)**

    Jalankan perintah berikut untuk membuat semua tabel dan mengisinya dengan data awal (gejala, penyakit, aturan).

    ```bash
    php artisan migrate --seed
    ```

    **Opsi B: Impor dari Berkas SQL**

    Jika Anda lebih suka mengimpor langsung, Anda bisa menggunakan berkas `gangguanmental.sql` yang tersedia.

    a. Buat database baru di server database Anda.
    b. Impor berkas `gangguanmental.sql` ke dalam database yang baru saja Anda buat menggunakan alat bantu database seperti phpMyAdmin, DBeaver, atau command line.

5.  **Build Aset Front-end**

    Compile aset CSS dan JavaScript.

    ```bash
    npm run dev
    ```

6.  **Jalankan Server**

    Terakhir, jalankan server pengembangan Laravel.

    ```bash
    php artisan serve
    ```

    Aplikasi sekarang akan berjalan dan dapat diakses di `http://127.0.0.1:8000`.

---

## Lisensi

Proyek ini menggunakan lisensi [MIT license](https://opensource.org/licenses/MIT).