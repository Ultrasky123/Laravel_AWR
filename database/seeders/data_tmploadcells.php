<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class data_tmploadcells extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['id_senjata' => 'SS1-1', 'status' => 1, 'berat' => 653.0],
            ['id_senjata' => 'SS1-2', 'status' => 1, 'berat' => 30.0],
            ['id_senjata' => 'SS1-3', 'status' => 1, 'berat' => 20.0],
        ];

        DB::table('tmploadcells')->insert($data);
    }
}
