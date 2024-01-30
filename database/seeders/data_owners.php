<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class data_owners extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'id_senjata' => 'SS1-1', 'id_pengguna' => 'JK64R', 'nokartu' => '78GHU32',
            'nama_pengguna' => 'Joko', 'pangkat' => 'prada', 'NRP' => '1234567890', 'jabatan' => 'Taja Baru 10', 'kesatuan' => 'Yonzipur 3'
        ];

        DB::table('owners')->insert($data);
    }
}
