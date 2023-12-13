<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\leveljenisbarang::insert([
            [
                'namalevel' => 'Snack'
                
            ],
          [
            'namalevel' => 'Peralatan Olahraga'
            ],
            [
                'namalevel' => 'Peralatan Kebersihan'
            ],
            [
                'namalevel' => 'ATK'
            ]
        ]);
    }
}
