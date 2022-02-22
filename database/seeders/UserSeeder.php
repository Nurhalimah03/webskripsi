<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'email' => 'tajudin@gmail.com',
                'password' => '12345678',
                'name' => 'Tajudin',
                'jabatan' => 'Kepala bagian data Puskesos',
                'nohp' => '+628122122122',
                'role' => 'superadmin',
                'created_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
