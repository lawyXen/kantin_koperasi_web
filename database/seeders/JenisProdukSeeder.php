<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;


class JenisProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\leveljenisproduks::insert([
            [
                'namalevel' => 'Makanan Berat'
                
            ],
          [
            'namalevel' => 'Makanan Ringan'
            ],
            [
                'namalevel' => 'Minuman Berat'
            ],
            [
                'namalevel' => 'Minuman Ringan'
            ]
        ]);
    }
}
