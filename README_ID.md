# 🏥 Sistem Diagnosis Kesehatan Mental Berbasis Expert System

Aplikasi web untuk diagnosis awal kesehatan mental menggunakan teknologi **Expert System** dengan metode **Backward Chaining**. Sistem ini dirancang untuk membantu pengguna mendapatkan informasi awal tentang kondisi kesehatan mental mereka berdasarkan gejala yang dialami.

## 🎯 Fitur Utama

### 1. **Module Diagnosis (Public)**
- 🔍 **Kuis Interaktif**: Pengguna dapat memilih gejala yang dialami
- 📊 **Analisis Cerdas**: Sistem menganalisis gejala menggunakan expert system rules
- 📈 **Hasil Detail**: Menampilkan diagnosis utama dengan persentase kecocokan dan diagnosis alternatif
- 📋 **Riwayat**: Melihat riwayat diagnosis yang telah dilakukan

### 2. **Admin Panel (Protected)**
- 🔐 **Authentication**: Login admin dengan username dan password
- 👨‍⚕️ **Manage Gejala**: CRUD (Create, Read, Update, Delete) data gejala
- 💊 **Manage Penyakit**: CRUD data penyakit beserta deskripsi, solusi obat, dan solusi lainnya
- 🔗 **Manage Rules**: CRUD aturan/rules yang menghubungkan gejala dengan penyakit
- 📊 **Manage Riwayat**: Melihat dan menghapus riwayat diagnosis
- 📈 **Dashboard**: Statistik dan overview sistem

## 📋 Data Sistem

### Penyakit yang Tersedia:
1. **P01** - Depresi Mayor
2. **P02** - Gangguan Kecemasan Umum
3. **P03** - Gangguan Panik
4. **P04** - Fobia Sosial
5. **P05** - Skizofrenia
6. **P06** - Gangguan Bipolar
7. **P07** - Gangguan Obsesif Kompulsif (OCD)
8. **P08** - PTSD (Gangguan Stress Pasca Trauma)
9. **P09** - Gangguan Kepribadian
10. **P10** - Gangguan Substansi

### Gejala:
Sistem memiliki 20 gejala yang terkait dengan penyakit-penyakit di atas, dari gejala G01 hingga G20.

### Rules:
Lebih dari 50 rules yang menghubungkan gejala-gejala dengan penyakit untuk menghasilkan diagnosis yang akurat.

## 🛠️ Teknologi

- **Framework**: Laravel 11
- **Database**: MySQL/MariaDB (atau SQLite untuk development)
- **Frontend**: Bootstrap 5
- **Backend**: PHP 8+
- **Authentication**: Laravel Built-in Auth
- **Algorithm**: Expert System - Backward Chaining dengan Similarity Matching

## 🚀 Instalasi & Setup

### Prasyarat
- PHP 8.1+
- Composer
- MySQL/MariaDB (atau SQLite)
- Node.js (optional, untuk asset compilation)

### Langkah-Langkah

1. **Clone Repository**
   ```bash
   cd d:\Documents\Laravel\mental-health-id
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi Database**
   Edit file `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=gangguanmental
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run Migrations & Seeders**
   ```bash
   php artisan migrate:fresh --seed
   ```
   
   Atau gunakan script batch yang disediakan:
   ```bash
   run_migrations.bat
   ```

6. **Build Assets**
   ```bash
   npm run build
   ```

7. **Jalankan Development Server**
   ```bash
   php artisan serve
   ```
   
   Atau gunakan script batch:
   ```bash
   run_server.bat
   ```
   
   Server akan berjalan di: **http://localhost:8000**

## 🔓 Login Credentials

Setelah seeding, gunakan credentials berikut untuk login admin:

```
Email: admin@example.com
Password: admin123
```

## 📱 Struktur Aplikasi

```
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── DiagnosisController.php    # Logika diagnosis
│   │       └── AdminController.php         # Logika admin panel
│   └── Models/
│       ├── User.php
│       ├── Gejala.php
│       ├── Penyakit.php
│       ├── Rule.php
│       └── Riwayat.php
├── database/
│   ├── migrations/                        # Schema database
│   └── seeders/                           # Data awal (seeds)
├── resources/
│   ├── views/
│   │   ├── app.blade.php                 # Layout utama
│   │   ├── diagnosis_*.blade.php         # Views diagnosis
│   │   └── admin_*.blade.php             # Views admin
│   └── css/
│       └── app.css
├── routes/
│   └── web.php                           # Route definitions
├── storage/                              # File storage
├── vendor/                               # Dependencies
├── run_migrations.bat                    # Script migrations
└── run_server.bat                        # Script server
```

## 🔄 Algoritma Diagnosis

Sistem menggunakan **Expert System** dengan metode **Backward Chaining**:

1. **Backward Chaining**: Sistem mulai dari tujuan (penyakit) dan bekerja mundur untuk menemukan gejala
2. **Similarity Matching**: Menghitung persentase kecocokan berdasarkan jumlah gejala yang cocok
3. **Ranking**: Menampilkan penyakit dengan persentase kecocokan tertinggi sebagai diagnosis utama

### Contoh Proses:
```
User Input: Merasa sedih, Kehilangan minat, Kurang energi
                        ↓
         Cek Rule Database
                        ↓
      Cocok dengan Penyakit:
      - Depresi Mayor (3/9 gejala = 33%)
      - PTSD (3/5 gejala = 60%)
                        ↓
        Urutkan & Tampilkan Hasil
```

## 🔐 Keamanan

- ✅ Password hashing dengan bcrypt
- ✅ CSRF protection on all forms
- ✅ Authentication middleware pada admin routes
- ✅ Input validation pada semua endpoints
- ✅ SQL injection protection via Eloquent ORM

## 📝 API Routes

### Public Routes
- `GET /` - Halaman utama
- `GET /diagnosis/kuis` - Halaman kuis diagnosis
- `POST /diagnosis/proses` - Proses diagnosis
- `GET /diagnosis/riwayat` - Lihat riwayat

### Admin Routes (Protected)
- `GET /admin/dashboard` - Dashboard admin
- `GET /admin/gejala` - List gejala
- `GET /admin/penyakit` - List penyakit
- `GET /admin/rule` - List rules
- `GET /admin/riwayat` - List riwayat

### Authentication
- `GET /login` - Halaman login
- `POST /login` - Proses login
- `POST /logout` - Logout

## 🧪 Testing

Untuk menjalankan tests:
```bash
php artisan test
```

## 📚 Dokumentasi Model

### User Model
```php
- id
- name
- email
- password
- remember_token
- email_verified_at
- created_at
- updated_at
```

### Gejala Model
```php
- id_gejala (PK)
- kode_gejala (Unique)
- nama_gejala
```

### Penyakit Model
```php
- id_penyakit (PK)
- kode_penyakit (Unique)
- nama_penyakit
- deskripsi
- solusi_obat
- solusi_lain
```

### Rule Model
```php
- id_rule (PK)
- kode_rule
- kode_penyakit (FK)
- kode_gejala (FK)
```

### Riwayat Model
```php
- id_riwayat (PK)
- nama_pasien
- nama_penyakit
- tanggal
```

## ⚠️ Disclaimer

**Penting**: Aplikasi ini hanya untuk tujuan edukasi dan referensi awal. Hasil diagnosis dari sistem ini **BUKAN** merupakan diagnosis medis yang resmi. 

**Selalu konsultasikan dengan profesional kesehatan mental yang bersertifikat untuk diagnosis dan treatment yang akurat.**

## 📞 Support

Untuk pertanyaan atau masalah teknis, silakan buat issue di repository ini.

## 📄 License

Project ini tersedia di bawah license MIT.

---

**Dibuat dengan ❤️ untuk membantu kesehatan mental**

*Last Updated: 2026-05-13*
