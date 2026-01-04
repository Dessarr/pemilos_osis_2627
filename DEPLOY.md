# 📋 PANDUAN DEPLOY - PEMILIHAN OSIS 2025

## 🚀 LANGKAH DEPLOY (5 MENIT)

### 1. Persiapan Database

**HeidiSQL:**
- Database `db_pemilos_osis` sudah ada
- Username: `root`
- Password: (sesuai config HeidiSQL Anda)

**Atau buat database baru:**
```sql
CREATE DATABASE db_pemilos_osis;
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install NPM dependencies
npm install
```

### 3. Setup Environment

```bash
# Copy file .env
cp .env.example .env

# Generate application key
php artisan key:generate
```

**Edit file `.env`:**
```env
DB_DATABASE=db_pemilos_osis
DB_USERNAME=root
DB_PASSWORD=[password_heidisql_anda]
```

### 4. Jalankan Migration & Seeder

```bash
# Buat tabel database
php artisan migrate

# Isi data dummy (50 siswa, 2 paslon, 1000 token)
php artisan db:seed
```

### 5. Build Assets

```bash
# Build CSS & JS
npm run build

# Atau untuk development
npm run dev
```

### 6. Jalankan Server

```bash
# Development server
php artisan serve

# Akses di browser: http://localhost:8000
```

---

## 🔐 LOGIN CREDENTIALS

### Login Siswa:
- **NIS:** `100001` (sampai `100050`)
- **Password:** `100001` (sama dengan NIS)

### Login Admin:
- **Username:** `admin`
- **Password:** `admin123`

---

## 📊 FITUR APLIKASI

### ✅ Fitur Siswa:
1. Login dengan NIS dan password (NIS)
2. Melihat daftar kandidat/paslon
3. Melihat detail visi & misi
4. Voting dengan token 12 digit
5. Halaman sukses dengan confetti

### ✅ Fitur Admin:
1. Dashboard dengan statistik real-time
2. Pie Chart: Perbandingan suara paslon
3. Bar Chart: Vote per hari
4. Tabel voting dengan search & pagination
5. Export PDF (Browsershot)
6. Export CSV
7. Reset semua data voting

---

## 🛠️ TEKNOLOGI

- **Framework:** Laravel 12
- **Frontend:** Livewire 3, Alpine.js, TailwindCSS
- **Charts:** ApexCharts
- **PDF Export:** Browsershot
- **Database:** MySQL
- **Font:** Poppins

---

## 🎨 WARNA TEMA

- **Background:** `#dedede` (60%)
- **Primary:** `#4551ff` (30%)
- **Accent:** `#ffd45e` (10%)

---

## 📁 STRUKTUR DATABASE

### Tabel `siswa`:
- id, nis (unique), nama, kelas, has_voted, password

### Tabel `kandidat`:
- id, nama, gambar, visi, misi

### Tabel `tokens`:
- id, token (unique), is_used, used_by_nis, used_at

### Tabel `votes`:
- id, nis, kandidat_id, token, voted_at

---

## ⚠️ TROUBLESHOOTING

### Error: "Class 'Livewire\Component' not found"
```bash
composer require livewire/livewire
```

### Error: "Browsershot not found"
```bash
composer require spatie/browsershot
```

### Error: Migration failed
- Pastikan database `db_pemilos_osis` sudah ada
- Cek kredensial database di `.env`

### Error: Seeder failed
- Pastikan migration sudah berhasil
- Cek koneksi database

---

## 🔄 RESET DATA

Untuk reset semua data voting:
1. Login sebagai admin
2. Klik tombol "Reset All Votes" di dashboard
3. Konfirmasi reset

Atau via command:
```bash
php artisan migrate:fresh --seed
```

---

## 📝 CATATAN PENTING

1. **Token:** 1000 token random 12-digit akan di-generate oleh seeder
2. **Password Siswa:** Default password = NIS (sudah di-hash)
3. **Admin Password:** Bisa diubah di `AuthController.php`
4. **Export PDF:** Memerlukan Node.js dan Puppeteer untuk Browsershot
5. **Responsive:** Aplikasi sudah responsive untuk tablet & mobile

---

## 🎯 TESTING

### Test Case 1: Login Siswa → Vote
1. Login dengan NIS: `100001`, Password: `100001`
2. Pilih paslon
3. Masukkan token (contoh: `ABC123XYZ789`)
4. Vote berhasil → Halaman sukses

### Test Case 2: Token Invalid
1. Login siswa
2. Masukkan token yang tidak valid
3. Error: "Token tidak valid"

### Test Case 3: Double Vote
1. Login siswa yang sudah vote
2. Coba vote lagi
3. Error: "Anda sudah melakukan voting"

### Test Case 4: Admin Dashboard
1. Login admin: `admin` / `admin123`
2. Lihat chart dan statistik
3. Export PDF/CSV
4. Reset votes (jika perlu)

---

## 📞 SUPPORT

Jika ada masalah, pastikan:
1. ✅ PHP >= 8.2
2. ✅ Composer terinstall
3. ✅ Node.js & NPM terinstall
4. ✅ MySQL running
5. ✅ Extension PHP: pdo_mysql, mbstring, openssl

---

**Selamat menggunakan aplikasi Pemilihan OSIS 2025! 🎉**

