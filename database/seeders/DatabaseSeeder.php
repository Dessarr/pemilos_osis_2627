<?php

namespace Database\Seeders;

use App\Models\Murid;
use App\Models\Kandidat;
use App\Models\Admin;
use Illuminate\Database\Seeder;
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

        // Seed Murid (Ahmad, Ilyas, Dessar)
        $murid = [
            ['nama' => 'Ahmad', 'nis' => '000200001', 'nisn' => '0012345678', 'kelas' => 'XII-1'],
            ['nama' => 'Ilyas', 'nis' => '000200002', 'nisn' => '0012345679', 'kelas' => 'XII-1'],
            ['nama' => 'Dessar', 'nis' => '000200003', 'nisn' => '0012345680', 'kelas' => 'XII-1'],
        ];

        foreach ($murid as $m) {
            Murid::updateOrCreate(
                ['nis' => $m['nis']],
                [
                    'nama' => $m['nama'],
                    'kelas' => $m['kelas'],
                    'nis' => $m['nis'], // Already 9 characters
                    'nisn' => $m['nisn'],
                    'has_voted' => false,
                ]
            );
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
        $this->command->info('- 3 Murid (Ahmad, Ilyas, Dessar)');
    }
}