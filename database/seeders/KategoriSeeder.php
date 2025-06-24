<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kategoris')->insert([
            [
                'nama' => 'Pemrograman',
                'deskripsi' => 'Buku-buku tentang coding, algoritma, dan pengembangan perangkat lunak.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Desain Grafis',
                'deskripsi' => 'Buku mengenai teori warna, UI/UX, dan software desain.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Manajemen Bisnis',
                'deskripsi' => 'Referensi tentang strategi bisnis, manajemen SDM, dan keuangan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Psikologi',
                'deskripsi' => 'Materi psikologi umum hingga psikologi pendidikan dan klinis.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Matematika',
                'deskripsi' => 'Buku kalkulus, statistika, aljabar linier, dan lainnya.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Teknik',
                'deskripsi' => 'Buku teknik mesin, elektro, sipil, dan bidang teknik lainnya.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Kedokteran',
                'deskripsi' => 'Buku untuk mahasiswa kedokteran, keperawatan, dan farmasi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Bahasa dan Sastra',
                'deskripsi' => 'Kumpulan buku linguistik, sastra Indonesia dan asing.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Ekonomi dan Akuntansi',
                'deskripsi' => 'Topik akuntansi, perpajakan, ekonomi makro dan mikro.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Hukum',
                'deskripsi' => 'Buku hukum pidana, perdata, tata negara, dan teori hukum.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
