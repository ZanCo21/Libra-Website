<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\KategoriRelasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriRelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bukuIds = Buku::pluck('id')->toArray();

        $kategoriIds = KategoriBuku::pluck('id')->take(5)->toArray();

        foreach ($bukuIds as $bukuId) {
            shuffle($kategoriIds);
            $selectedKategoriIds = array_slice($kategoriIds, 0, 2);

            foreach ($selectedKategoriIds as $kategoriId) {
                KategoriRelasi::insert([
                    'buku_id' => $bukuId,
                    'kategori_id' => $kategoriId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
