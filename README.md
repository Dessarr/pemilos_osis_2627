# 🗳️ PEMILIHAN KETUA & WAKIL OSIS 2025

Aplikasi web lengkap untuk pemilihan ketua dan wakil OSIS menggunakan Laravel 12 + Livewire 3 + MySQL.

## ✨ FITUR

### 👨‍🎓 Fitur Siswa
- ✅ Login dengan NIS dan password (NIS)
- ✅ Melihat daftar kandidat/paslon
- ✅ Detail visi & misi kandidat
- ✅ Voting dengan token 12 digit
- ✅ Halaman sukses dengan animasi confetti
- ✅ Validasi real-time

### 👨‍💼 Fitur Admin
- ✅ Dashboard dengan statistik real-time
- ✅ Pie Chart: Perbandingan suara paslon
- ✅ Bar Chart: Vote per hari
- ✅ Tabel voting dengan search & pagination
- ✅ Export PDF (Browsershot)
- ✅ Export CSV
- ✅ Reset semua data voting

## 🚀 QUICK START

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env`:
```env
DB_DATABASE=db_pemilos_osis
DB_USERNAME=root
DB_PASSWORD=[your_password]
```

### 3. Database Setup
```bash
php artisan migrate
php artisan db:seed
```

### 4. Build & Run
```bash
npm run build
php artisan serve
```

Akses: http://localhost:8000

## 🔐 LOGIN

**Siswa:**
- NIS: `100001` - `100050`
- Password: `100001` (sama dengan NIS)

**Admin:**
- Username: `admin`
- Password: `admin123`

## 📋 REQUIREMENTS

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL
- Extension PHP: pdo_mysql, mbstring, openssl

## 🛠️ TECH STACK

- **Backend:** Laravel 12
- **Frontend:** Livewire 3, Alpine.js, TailwindCSS
- **Charts:** ApexCharts
- **PDF Export:** Browsershot
- **Database:** MySQL
- **Font:** Poppins

## 🎨 TEMA WARNA

- Background: `#dedede` (60%)
- Primary: `#4551ff` (30%)
- Accent: `#ffd45e` (10%)

## 📁 STRUKTUR DATABASE

- `siswa` - Data siswa (NIS, nama, kelas, has_voted)
- `kandidat` - Data kandidat/paslon (nama, visi, misi)
- `tokens` - Token voting (1000 token random)
- `votes` - Data voting (NIS, kandidat_id, token, waktu)

## 📖 DOKUMENTASI LENGKAP

Lihat file [DEPLOY.md](DEPLOY.md) untuk panduan deploy lengkap.

## 📝 LISENSI

MIT License
