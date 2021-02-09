<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'TekGabriel',
            'email' => 'administrador1@email.com',
            'password' => bcrypt('12345'),
            'id_role' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Anton512',
            'email' => 'administrador2@email.com',
            'password' => bcrypt('12345'),
            'id_role' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Dany77',
            'email' => 'moderador1@email.com',
            'password' => bcrypt('12345'),
            'id_role' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'name' => 'ChipLucia',
            'email' => 'moderador2@email.com',
            'password' => bcrypt('12345'),
            'id_role' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 5,
            'name' => 'TekMod3',
            'email' => 'moderador3@email.com',
            'password' => bcrypt('12345'),
            'id_role' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 6,
            'name' => 'SarahC',
            'email' => 'usuario1@email.com',
            'password' => bcrypt('12345'),
            'id_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 7,
            'name' => 'Dant3',
            'email' => 'usuario2@email.com',
            'password' => bcrypt('12345'),
            'id_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 8,
            'name' => 'JPerez',
            'email' => 'usuario3@email.com',
            'password' => bcrypt('12345'),
            'id_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 9,
            'name' => 'TekUser4',
            'email' => 'usuario4@email.com',
            'password' => bcrypt('12345'),
            'id_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
