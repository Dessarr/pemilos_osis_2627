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
                'ketos_nama' => 'Muhammad Nabil Hafizh',
                'ketos_kelas' => 'XI TKJ A',
                'ketos_foto' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'waketos_nama' => 'Dafaa Maulana Adz Dzikraa',
                'waketos_kelas' => 'X TKRO B',
                'waketos_foto' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop',
                'visi' => 'Mewujudkan siswa/i dan OSIS SMK Negeri 1 Kota Bekasi yang beriman, berkarakter, berprestasi, dan berdaya saing sebagai wadah aspirasi siswa melalui kegiatan sekolah yang aktif, kreatif, serta mendorong berpikir kritis dan berani berkontribusi positif.',
                'misi' => "1. Menanamkan nilai keimanan dan ketakwaan kepada Tuhan Yang Maha Esa sebagai landasan dalam berperilaku dan berakhlak mulia, sehingga terbentuk siswa/i yang berkarakter dan bertakwa.
\n2. Menumbuhkan jiwa sosial, solidaritas, dan kebersamaan dalam menjalin hubungan yang baik antar siswa serta seluruh warga sekolah.
\n3. Mendorong partisipasi aktif siswa dalam berbagai kegiatan sekolah, dan menumbuhkan keberanian dalam mengemukakan pendapat secara jelas dan bertanggung jawab, serta mengembangkan minat dan bakat siswa di bidang akademik, olahraga, dan seni melalui kegiatan yang kreatif, inovatif, dan berorientasi pada prestasi.
\n4. Menciptakan lingkungan sekolah yang kondusif, harmonis, dan positif dengan menjunjung tinggi kedisiplinan, rasa saling menghargai, serta kebersamaan, guna menunjang kenyamanan, keamanan, dan peningkatan prestasi seluruh siswa baik akademik maupun nonakademik.
",
            ]
        );

        Kandidat::updateOrCreate(
            ['id' => 2],
            [
                'nama' => 'Paslon 2',
                'gambar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop',
                'ketos_nama' => 'Rhafkha Rhaivandy',
                'ketos_kelas' => 'XI DKV A',
                'ketos_foto' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'waketos_nama' => 'Annisa Chandra Aurora',
                'waketos_kelas' => 'X DKV A',
                'waketos_foto' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop',
                'visi' => 'Menjadikan OSIS SMKN 1 Kota Bekasi sebagai wadah sekolah untuk menciptakan siswa/i yang aktif dalam kegiatan berorganisasi, berprestasi dengan peduli terhadap lingkungan serta berlandaskan iman dan taqwa',
                'misi' => "1. Membangun karakter siswa/i yang disiplin, bertanggung jawab, berakhlak mulia, serta berlandaskan iman dan takwa.
\n2. Mendorong keaktifan, kreativitas, dan inovasi siswa/i melalui wadah organisasi yang terstruktur untuk mencapai prestasi yang maksimal.
\n3. Menanamkan sikap peduli, solidaritas, toleransi, serta kepedulian terhadap lingkungan antar sesama siswa/i.",
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