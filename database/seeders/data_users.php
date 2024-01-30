<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class data_users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['id' => 6, 'name' => 'Joko', 'username' => 'admin','email' => 'admin@gmail.com', 'password' => md5('123'), 'created_at' => '2023-09-15 05:21:38', 'updated_at' => NULL, 'deleted_at' => NULL],
            ['id' => 7, 'name' => 'arras', 'username' => 'arras','email' => 'ysafarrasi@gmail.com', 'password' => md5('123'), 'created_at' => '2023-10-22 11:33:30', 'updated_at' => NULL, 'deleted_at' => NULL],
            ['id' => 8, 'name' => 'octopus', 'username' => 'bby octopusz','email' => 'bby.octopuszz@gmail.com', 'password' => md5('bbyoctopusz'), 'created_at' => '2024-01-28 19:33:30', 'updated_at' => NULL, 'deleted_at' => NULL],
        ];

        DB::table('users')->insert($data);
    }
}
