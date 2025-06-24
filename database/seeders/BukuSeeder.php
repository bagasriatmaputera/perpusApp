<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $bukus = [
            // kategori_id 1: Pemrograman
            ['judul' => 'Pemrograman Python untuk Pemula', 'penulis' => 'Andi Setiawan', 'penerbit' => 'Informatika Bandung', 'tahun' => '2021', 'isbn' => '9786020000001', 'jumlah' => '5', 'kategori_id' => 1],
            ['judul' => 'OOP dengan Java', 'penulis' => 'Eka Prasetya', 'penerbit' => 'Gramedia', 'tahun' => '2020', 'isbn' => '9786020000002', 'jumlah' => '7', 'kategori_id' => 1],
            ['judul' => 'Pemrograman Web Dasar', 'penulis' => 'Dewi Lestari', 'penerbit' => 'Erlangga', 'tahun' => '2022', 'isbn' => '9786020000003', 'jumlah' => '4', 'kategori_id' => 1],

            // kategori_id 2: Statistika
            ['judul' => 'Statistik Deskriptif', 'penulis' => 'Rina Wulandari', 'penerbit' => 'Salemba Empat', 'tahun' => '2019', 'isbn' => '9786020000004', 'jumlah' => '6', 'kategori_id' => 2],
            ['judul' => 'Probabilitas dan Statistik', 'penulis' => 'Budi Hartono', 'penerbit' => 'Andi Publisher', 'tahun' => '2021', 'isbn' => '9786020000005', 'jumlah' => '3', 'kategori_id' => 2],

            // kategori_id 3: Ekonomi
            ['judul' => 'Pengantar Ekonomi Makro', 'penulis' => 'Agus Priyanto', 'penerbit' => 'UI Press', 'tahun' => '2020', 'isbn' => '9786020000006', 'jumlah' => '8', 'kategori_id' => 3],
            ['judul' => 'Teori Ekonomi Mikro', 'penulis' => 'Nur Aisyah', 'penerbit' => 'Deepublish', 'tahun' => '2022', 'isbn' => '9786020000007', 'jumlah' => '5', 'kategori_id' => 3],

            // kategori_id 4: Akuntansi
            ['judul' => 'Akuntansi Dasar', 'penulis' => 'Fitriani M.', 'penerbit' => 'Graha Ilmu', 'tahun' => '2018', 'isbn' => '9786020000008', 'jumlah' => '4', 'kategori_id' => 4],
            ['judul' => 'Akuntansi Biaya', 'penulis' => 'Fauzan Hadi', 'penerbit' => 'Salemba Empat', 'tahun' => '2020', 'isbn' => '9786020000009', 'jumlah' => '6', 'kategori_id' => 4],

            // kategori_id 5: Manajemen
            ['judul' => 'Dasar-Dasar Manajemen', 'penulis' => 'Sutrisno', 'penerbit' => 'Erlangga', 'tahun' => '2020', 'isbn' => '9786020000010', 'jumlah' => '7', 'kategori_id' => 5],
            ['judul' => 'Manajemen Sumber Daya Manusia', 'penulis' => 'Yuliana', 'penerbit' => 'Andi Publisher', 'tahun' => '2021', 'isbn' => '9786020000011', 'jumlah' => '5', 'kategori_id' => 5],

            // kategori_id 6: Hukum
            ['judul' => 'Hukum Perdata Indonesia', 'penulis' => 'Suharto', 'penerbit' => 'UI Press', 'tahun' => '2019', 'isbn' => '9786020000012', 'jumlah' => '3', 'kategori_id' => 6],
            ['judul' => 'Pengantar Ilmu Hukum', 'penulis' => 'Ali Mansur', 'penerbit' => 'Ghalia Indonesia', 'tahun' => '2022', 'isbn' => '9786020000013', 'jumlah' => '5', 'kategori_id' => 6],

            // kategori_id 7: Psikologi
            ['judul' => 'Psikologi Perkembangan Remaja', 'penulis' => 'Dina W.', 'penerbit' => 'Prenada Media', 'tahun' => '2020', 'isbn' => '9786020000014', 'jumlah' => '6', 'kategori_id' => 7],
            ['judul' => 'Psikologi Umum', 'penulis' => 'Sri Lestari', 'penerbit' => 'Kencana', 'tahun' => '2021', 'isbn' => '9786020000015', 'jumlah' => '7', 'kategori_id' => 7],

            // kategori_id 8: Kesehatan
            ['judul' => 'Dasar Keperawatan', 'penulis' => 'Nina Herlina', 'penerbit' => 'EGC', 'tahun' => '2019', 'isbn' => '9786020000016', 'jumlah' => '6', 'kategori_id' => 8],
            ['judul' => 'Anatomi Tubuh Manusia', 'penulis' => 'Rendi P.', 'penerbit' => 'Andi Publisher', 'tahun' => '2022', 'isbn' => '9786020000017', 'jumlah' => '4', 'kategori_id' => 8],

            // kategori_id 9: Desain Grafis
            ['judul' => 'Desain Grafis dengan Photoshop', 'penulis' => 'Dimas Ardi', 'penerbit' => 'Informatika', 'tahun' => '2021', 'isbn' => '9786020000018', 'jumlah' => '5', 'kategori_id' => 9],
            ['judul' => 'Dasar Ilustrasi Digital', 'penulis' => 'Anggi R.', 'penerbit' => 'Gramedia', 'tahun' => '2020', 'isbn' => '9786020000019', 'jumlah' => '3', 'kategori_id' => 9],

            // kategori_id 10: Bahasa Inggris
            ['judul' => 'English Grammar for University Students', 'penulis' => 'John Simanjuntak', 'penerbit' => 'Deepublish', 'tahun' => '2022', 'isbn' => '9786020000020', 'jumlah' => '6', 'kategori_id' => 10],
            ['judul' => 'Academic Writing Guide', 'penulis' => 'Linda Saraswati', 'penerbit' => 'Salemba Empat', 'tahun' => '2021', 'isbn' => '9786020000021', 'jumlah' => '5', 'kategori_id' => 10],
        ];

        foreach ($bukus as $buku) {
            Buku::create($buku);
        }
    }
}
