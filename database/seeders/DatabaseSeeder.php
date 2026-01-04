<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\Kandidat;
use App\Models\Token;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Kandidat (2 Paslon)
        Kandidat::updateOrCreate(
            ['id' => 1],
            [
                'nama' => 'Paslon 1',
                'gambar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'ketos_nama' => 'Andi Pratama',
                'ketos_kelas' => 'XII-1',
                'ketos_biodata' => "Ketua OSIS yang berpengalaman dalam organisasi. Aktif dalam berbagai kegiatan sekolah dan memiliki visi untuk meningkatkan kualitas pendidikan di SMKN 1 Kota Bekasi.",
                'ketos_foto' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'waketos_nama' => 'Sari Lestari',
                'waketos_kelas' => 'XII-2',
                'waketos_biodata' => "Wakil Ketua OSIS yang kreatif dan inovatif. Berpengalaman dalam mengorganisir acara sekolah dan memiliki komitmen untuk membangun karakter siswa yang unggul.",
                'waketos_foto' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop',
                'visi' => 'Sekolah Unggul, Berkarakter, dan Berprestasi',
                'misi' => "1. Meningkatkan kualitas pembelajaran dan prestasi akademik\n2. Mengembangkan kegiatan ekstrakurikuler yang beragam\n3. Menjalin komunikasi yang baik antara OSIS, siswa, dan guru",
            ]
        );

        Kandidat::updateOrCreate(
            ['id' => 2],
            [
                'nama' => 'Paslon 2',
                'gambar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop',
                'ketos_nama' => 'Rizky Abdullah',
                'ketos_kelas' => 'XII-3',
                'ketos_biodata' => "Ketua OSIS yang visioner dan berdedikasi tinggi. Memiliki pengalaman dalam kepemimpinan dan berkomitmen untuk membawa inovasi dalam sistem pendidikan sekolah.",
                'ketos_foto' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'waketos_nama' => 'Maya Kartika',
                'waketos_kelas' => 'XII-1',
                'waketos_biodata' => "Wakil Ketua OSIS yang energik dan komunikatif. Aktif dalam berbagai kegiatan sosial dan memiliki passion untuk mengembangkan potensi siswa secara maksimal.",
                'waketos_foto' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop',
                'visi' => 'Inovasi Pendidikan untuk Masa Depan Gemilang',
                'misi' => "1. Memperkenalkan teknologi dalam proses pembelajaran\n2. Menciptakan lingkungan sekolah yang inovatif dan kreatif\n3. Membangun karakter siswa yang tangguh dan mandiri",
            ]
        );

        // Seed Siswa Khusus (Ahmad, Ilyas, Dessar)
        $siswaKhusus = [
            ['nama' => 'Ahmad', 'nis' => '200001', 'kelas' => 'XII-1'],
            ['nama' => 'Ilyas', 'nis' => '200002', 'kelas' => 'XII-1'],
            ['nama' => 'Dessar', 'nis' => '200003', 'kelas' => 'XII-1'],
        ];

        foreach ($siswaKhusus as $siswa) {
            Siswa::updateOrCreate(
                ['nis' => $siswa['nis']],
                [
                    'nama' => $siswa['nama'],
                    'kelas' => $siswa['kelas'],
                    'password' => $siswa['nis'], // Password = NIS (tidak di-hash)
                ]
            );
        }

        // Seed Siswa (50 siswa: NIS 100001-100050)
        $kelas = ['X-1', 'X-2', 'X-3', 'XI-1', 'XI-2', 'XI-3', 'XII-1', 'XII-2', 'XII-3'];
        $namaDepan = ['Andi', 'Budi', 'Citra', 'Dedi', 'Eka', 'Fajar', 'Gita', 'Hadi', 'Indra', 'Joko', 'Kartika', 'Lina', 'Maya', 'Nina', 'Oki', 'Putri', 'Rizky', 'Sari', 'Toni', 'Umi', 'Vina', 'Wawan', 'Yani', 'Zaki'];
        $namaBelakang = ['Pratama', 'Santoso', 'Lestari', 'Wijaya', 'Kurniawan', 'Sari', 'Dewi', 'Rahman', 'Hidayat', 'Sari', 'Kartika', 'Wulandari', 'Sari', 'Ningsih', 'Purnama', 'Sari', 'Abdullah', 'Lestari', 'Kartika', 'Sari', 'Lestari', 'Sari', 'Kartika', 'Sari'];

        for ($i = 1; $i <= 50; $i++) {
            $nis = str_pad(100000 + $i, 6, '0', STR_PAD_LEFT);
            $nama = $namaDepan[array_rand($namaDepan)] . ' ' . $namaBelakang[array_rand($namaBelakang)];
            if ($i > 1) {
                $nama .= ' ' . $i; // Make names unique
            }
            
            Siswa::updateOrCreate(
                ['nis' => $nis],
                [
                    'nama' => $nama,
                    'kelas' => $kelas[array_rand($kelas)],
                    'password' => $nis, // Password = NIS (tidak di-hash)
                ]
            );
        }

        // Seed Tokens (1000 random 12-digit tokens)
        $tokens = [];
        for ($i = 0; $i < 1000; $i++) {
            // Generate random 12-character token (A-Z0-9)
            $token = strtoupper(Str::random(12));
            // Ensure uniqueness
            while (in_array($token, $tokens) || Token::where('token', $token)->exists()) {
                $token = strtoupper(Str::random(12));
            }
            $tokens[] = $token;
            
            Token::create([
                'token' => $token,
                'is_used' => false,
            ]);
        }

        // Seed Admin
        Admin::updateOrCreate(
            ['nama' => 'osissmkn1kotabekasipemilos'],
            [
                'password' => Hash::make('pantangpulangsebelumselesai'),
            ]
        );

        $this->command->info('Seeder berhasil!');
        $this->command->info('- 1 Admin telah dibuat (nama: osissmkn1kotabekasipemilos)');
        $this->command->info('- 2 Kandidat/Paslon telah dibuat');
        $this->command->info('- 3 Siswa Khusus (Ahmad, Ilyas, Dessar) - Password = NIS');
        $this->command->info('- 50 Siswa (NIS: 100001-100050) - Password = NIS');
        $this->command->info('- 1000 Token random telah dibuat');
    }
}