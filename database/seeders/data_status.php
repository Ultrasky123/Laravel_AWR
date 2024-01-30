<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class data_status extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['id_senjata' => 'SS1-1', 'tanggal' => '2023-11-28', 'keluar' => '17:26:38', 'masuk' => '17:27:36', 'durasi' => NULL],
            ['id_senjata' => 'SS1-1', 'tanggal' => '2023-11-29', 'keluar' => '09:58:42', 'masuk' => '12:15:25', 'durasi' => NULL],
            ['id_senjata' => 'SS1-1', 'tanggal' => '2023-12-14', 'keluar' => '10:41:45', 'masuk' => '10:42:38', 'durasi' => NULL],
            ['id_senjata' => 'SS1-1', 'tanggal' => '2024-01-07', 'keluar' => '10:23:40', 'masuk' => '10:23:46', 'durasi' => '00:00:06'],
            ['id_senjata' => 'SS1-1', 'tanggal' => '2024-01-07', 'keluar' => '11:36:12', 'masuk' => '11:36:27', 'durasi' => '00:00:15'],
        ];

        DB::table('status')->insert($data);
    }
}
