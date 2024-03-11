<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Paket::create([
            'nama_paket' => 'Paket A',
            'harga_paket' => 100,
        ]);

        Paket::create([
            'nama_paket' => 'Paket B',
            'harga_paket' => 150,
        ]);
}
}