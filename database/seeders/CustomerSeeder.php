<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Customer::create([
            'nama' => 'John Doe',
            'alamat' => 'Jl. Contoh No. 123',
            'no_telp' => '081234567890',
            'paket_id' => '1',
        ]);

        Customer::create([
            'nama' => 'Jane Doe',
            'alamat' => 'Jl. Test No. 456',
            'no_telp' => '081234567891',
            'paket_id' => '2',
        ]);

}
}
