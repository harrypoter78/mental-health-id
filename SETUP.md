# 🚀 Quick Start Guide

Panduan cepat untuk memulai Sistem Diagnosis Kesehatan Mental.

## ⚡ 5 Menit Setup

### Step 1: Buka Terminal/Command Prompt

```bash
cd d:\Documents\Laravel\mental-health-id
```

### Step 2: Install Dependencies (First Time Only)

```bash
composer install
npm install
```

### Step 3: Setup Database

**Opsi A - Gunakan MySQL:**
1. Buat database baru di MySQL:
   ```sql
   CREATE DATABASE gangguanmental;
   ```

2. Edit `.env` sesuai konfigurasi MySQL Anda

3. Run migrations dan seeders:
   ```bash
   php artisan migrate:fresh --seed
   ```

**Opsi B - Gunakan SQLite (Lebih Mudah):**
1. Edit `.env`:
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=/full/path/to/database.sqlite
   ```

2. Run migrations dan seeders:
   ```bash
   php artisan migrate:fresh --seed
   ```

### Step 4: Build Assets

```bash
npm run build
```

### Step 5: Jalankan Server

```bash
php artisan serve
```

**Server siap di**: http://localhost:8000 ✅

---

## 🖱️ Using Batch Scripts (Windows Only)

### Setup Database
Double-click: `run_migrations.bat`

### Run Server
Double-click: `run_server.bat`

---

## 📝 First Time Access

### Kunjungi Website
1. Buka browser: **http://localhost:8000**
2. Klik "Diagnosis" untuk mulai diagnosa

### Login Admin
1. Klik "Login Admin" di navbar
2. Gunakan credentials:
   ```
   Email: admin@example.com
   Password: admin123
   ```

---

## ✅ Troubleshooting

### Error: "php command not found"
- **Solusi**: Pastikan PHP sudah di PATH
- Di Windows, buka `php -v` untuk test

### Error: "SQLSTATE[HY000]: General error: 1 near..."
- **Solusi**: Database belum di-setup
- Jalankan: `php artisan migrate:fresh --seed`

### Port 8000 sudah digunakan
- **Solusi**: Gunakan port lain
- ```bash
  php artisan serve --port=8001
  ```

### Blank Page / 500 Error
- **Solusi**: Generate APP_KEY
- ```bash
  php artisan key:generate
  ```

---

## 📦 Apa yang Sudah Included

✅ 10 jenis penyakit mental
✅ 20 gejala lengkap
✅ 50+ expert system rules
✅ Admin panel dengan CRUD
✅ Authentication sistem
✅ Responsive Bootstrap UI
✅ Sample data untuk testing

---

## 🎮 Test Diagnosis

### Gejala untuk Depresi Mayor (P01):
- Merasa sedih berkepanjangan
- Kehilangan minat pada aktivitas
- Perubahan nafsu makan
- Gangguan tidur
- Kelelahan atau kurang energi

### Gejala untuk Gangguan Panik (P03):
- Panik atau takut tiba-tiba
- Jantung berdebar/sesak napas
- Kelelahan atau kurang energi
- Menghindari situasi tertentu
- Kecemasan berlebihan

---

## 🔧 Commands Penting

```bash
# Reset database
php artisan migrate:fresh

# Reset database + seed
php artisan migrate:fresh --seed

# Lihat routes
php artisan route:list

# Clear cache
php artisan cache:clear

# Maintenance mode
php artisan down
php artisan up
```

---

## 📁 File Structure

```
mental-health-id/
├── app/                      # Aplikasi code
├── database/                 # Migrations & seeders
├── resources/views/          # Templates
├── routes/web.php           # Routes
├── .env                     # Environment config
├── run_migrations.bat       # Setup database
├── run_server.bat           # Jalankan server
└── README_ID.md             # Full documentation
```

---

## 🎯 Next Steps

1. ✅ Setup aplikasi
2. ✅ Test diagnosis sebagai user
3. ✅ Login admin panel
4. ✅ Explore gejala, penyakit, rules
5. ✅ Tambah data baru jika diperlukan

---

## 💡 Tips

- **Backup Database**: Copy `database.sqlite` atau export MySQL database
- **Custom Data**: Gunakan admin panel untuk tambah gejala/penyakit baru
- **Export Data**: Semua data bisa diexport dari database

---

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Bootstrap Documentation](https://getbootstrap.com/docs)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [SQLite Documentation](https://www.sqlite.org/docs.html)

---

**Selamat menikmati! 🎉**
