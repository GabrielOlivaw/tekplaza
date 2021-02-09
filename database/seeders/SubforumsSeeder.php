<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubforumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subforums')->insert([
            'id' => 1,
            'name' => 'Despacho oval',
            'description' => 'Lugar de discusión de temas relativos a la administración de TekPlaza.',
            'min_role' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('subforums')->insert([
            'id' => 2,
            'name' => 'Oficinas centrales',
            'description' => 'Zona de coordinación de las actividades de moderación de todos los subforos.',
            'min_role' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('subforums')->insert([
            'id' => 3,
            'name' => 'Tecnología',
            'description' => 'Discusión de temas tecnológicos no relacionados con el resto de subforos.',
            'min_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('subforums')->insert([
            'id' => 4,
            'name' => 'AMD',
            'description' => 'Discusión general y de novedades de AMD.',
            'min_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('subforums')->insert([
            'id' => 5,
            'name' => 'Intel',
            'description' => 'Discusión general y de novedades de Intel.',
            'min_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('subforums')->insert([
            'id' => 6,
            'name' => 'Nvidia',
            'description' => 'Discusión general y de novedades de Nvidia.',
            'min_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('subforums')->insert([
            'id' => 7,
            'name' => 'Montaje de PCs',
            'description' => '¿Quieres montar tu propio PC? Aquí podrás discutir sobre el proceso y la elección de piezas.',
            'min_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('subforums')->insert([
            'id' => 8,
            'name' => 'Soporte técnico GNU/Linux',
            'description' => '¿Necesitas ayuda con tu instalación de GNU/Linux? Este es el sitio indicado.',
            'min_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('subforums')->insert([
            'id' => 9,
            'name' => 'Soporte técnico macOS',
            'description' => '¿Necesitas ayuda con tu instalación de macOS? Este es el sitio indicado.',
            'min_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('subforums')->insert([
            'id' => 10,
            'name' => 'Soporte técnico Windows',
            'description' => '¿Necesitas ayuda con tu instalación de Windows? Este es el sitio indicado.',
            'min_role' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
