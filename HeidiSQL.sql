-- ============================================
-- Database: db_pemilos_osis
-- Pemilihan Ketua/Wakil OSIS 2025
-- ============================================

-- Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS `db_pemilos_osis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_pemilos_osis`;

-- ============================================
-- Table: siswa
-- ============================================
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nis` VARCHAR(20) NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  `kelas` VARCHAR(20) NULL,
  `has_voted` BOOLEAN DEFAULT FALSE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nis_unique` (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: kandidat
-- ============================================
CREATE TABLE IF NOT EXISTS `kandidat` (
  `id` INT NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  `gambar` VARCHAR(255) NULL,
  `visi` TEXT NULL,
  `misi` TEXT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: tokens
-- ============================================
CREATE TABLE IF NOT EXISTS `tokens` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` VARCHAR(12) NOT NULL,
  `is_used` BOOLEAN DEFAULT FALSE,
  `used_by_nis` VARCHAR(20) NULL,
  `used_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token_unique` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: votes
-- ============================================
CREATE TABLE IF NOT EXISTS `votes` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nis` VARCHAR(20) NOT NULL,
  `kandidat_id` INT NOT NULL,
  `token` VARCHAR(12) NOT NULL,
  `voted_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_nis` (`nis`),
  KEY `idx_kandidat_id` (`kandidat_id`),
  CONSTRAINT `fk_votes_kandidat` FOREIGN KEY (`kandidat_id`) REFERENCES `kandidat` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Insert Kandidat (2 Paslon)
-- ============================================
INSERT INTO `kandidat` (`id`, `nama`, `gambar`, `visi`, `misi`) VALUES
(1, 'Paslon 1 - Andi Pratama & Sari Lestari', 
 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
 'Sekolah Unggul, Berkarakter, dan Berprestasi',
 '1. Meningkatkan kualitas pembelajaran dan prestasi akademik\n2. Mengembangkan kegiatan ekstrakurikuler yang beragam\n3. Menjalin komunikasi yang baik antara OSIS, siswa, dan guru'),

(2, 'Paslon 2 - Rizky Abdullah & Maya Kartika',
 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop',
 'Inovasi Pendidikan untuk Masa Depan Gemilang',
 '1. Memperkenalkan teknologi dalam proses pembelajaran\n2. Menciptakan lingkungan sekolah yang inovatif dan kreatif\n3. Membangun karakter siswa yang tangguh dan mandiri');

-- ============================================
-- Insert Siswa (50 siswa: NIS 100001-100050)
-- Password = NIS (sudah di-hash)
-- ============================================
-- Note: Password di-hash dengan bcrypt, contoh: password untuk NIS 100001 adalah "100001"
-- Untuk seeder lengkap, jalankan: php artisan db:seed

-- ============================================
-- Insert Tokens (1000 random 12-digit tokens)
-- ============================================
-- Note: Token akan di-generate oleh seeder
-- Untuk generate token, jalankan: php artisan db:seed

-- ============================================
-- CATATAN PENTING:
-- 1. Database 'db_pemilos_osis' harus sudah ada di HeidiSQL
-- 2. Jalankan migration: php artisan migrate
-- 3. Jalankan seeder: php artisan db:seed
-- 4. Seeder akan membuat 50 siswa, 2 paslon, dan 1000 token
-- ============================================

