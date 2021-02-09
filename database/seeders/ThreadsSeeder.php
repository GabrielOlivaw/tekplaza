<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThreadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threads')->insert([
            'id' => 1,
            'creator' => 1,
            'title' => 'Hilo inaugural de TekPlaza',
            'locked' => false,
            'pinned' => true,
            'subforum' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 2,
            'creator' => 4,
            'title' => 'Propuesta de nuevas normas para los foros de soporte técnico',
            'locked' => false,
            'pinned' => false,
            'subforum' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 3,
            'creator' => 1,
            'title' => 'Normas del subforo general de tecnología',
            'locked' => true,
            'pinned' => true,
            'subforum' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 4,
            'creator' => 5,
            'title' => 'Normas de los subforos de marcas',
            'locked' => true,
            'pinned' => true,
            'subforum' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 5,
            'creator' => 5,
            'title' => 'Normas de los subforos de marcas',
            'locked' => true,
            'pinned' => true,
            'subforum' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 6,
            'creator' => 5,
            'title' => 'Normas de los subforos de marcas',
            'locked' => true,
            'pinned' => true,
            'subforum' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 7,
            'creator' => 4,
            'title' => 'Normas del subforo de montaje de PCs',
            'locked' => true,
            'pinned' => true,
            'subforum' => 7,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 8,
            'creator' => 3,
            'title' => 'Normas de los subforos de soporte técnico',
            'locked' => true,
            'pinned' => true,
            'subforum' => 8,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 9,
            'creator' => 3,
            'title' => 'Normas de los subforos de soporte técnico',
            'locked' => true,
            'pinned' => true,
            'subforum' => 9,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 10,
            'creator' => 3,
            'title' => 'Normas de los subforos de soporte técnico',
            'locked' => true,
            'pinned' => true,
            'subforum' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 11,
            'creator' => 7,
            'title' => 'Placas solares',
            'locked' => false,
            'pinned' => false,
            'subforum' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 12,
            'creator' => 1,
            'title' => 'Hilo de prueba 1234567890 abcdefg',
            'locked' => true,
            'pinned' => true,
            'subforum' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 13,
            'creator' => 6,
            'title' => 'Hilo 1',
            'locked' => false,
            'pinned' => false,
            'subforum' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 14,
            'creator' => 4,
            'title' => 'Hilo 2',
            'locked' => true,
            'pinned' => false,
            'subforum' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('threads')->insert([
            'id' => 15,
            'creator' => 2,
            'title' => 'Hilo 3',
            'locked' => false,
            'pinned' => false,
            'subforum' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
