<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id' => 1,
            'creator' => 1,
            'title' => 'Hilo inaugural de TekPlaza',
            'content' => 'Con este primer post queda inaugurado el foro de TekPlaza, lugar de discusión de tecnología de consumo.',
            'thread' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 2,
            'creator' => 2,
            'title' => 'RE: Hilo inaugural de TekPlaza',
            'content' => 'Buenas, Gabriel. Espero que este foro sea un lugar concurrido de debate y ayuda.',
            'thread' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 3,
            'creator' => 4,
            'title' => 'Propuesta de nuevas normas para los foros de soporte técnico',
            'content' => 'Hola a todos. Para evitar ambigüedades, considero oportuno añadir algunas normas para estandarizar el proceso de resolución de dudas y que la gente pueda tenerlas resueltas lo antes posible.',
            'thread' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 4,
            'creator' => 1,
            'title' => 'Normas del subforo general de tecnología',
            'content' => 'En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',
            'thread' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 5,
            'creator' => 5,
            'title' => 'Normas de los subforos de marcas',
            'content' => 'En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',
            'thread' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 6,
            'creator' => 5,
            'title' => 'Normas de los subforos de marcas',
            'content' => 'En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',
            'thread' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 7,
            'creator' => 5,
            'title' => 'Normas de los subforos de marcas',
            'content' => 'En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',
            'thread' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 8,
            'creator' => 4,
            'title' => 'Normas del subforo de montaje de PCs',
            'content' => 'En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',
            'thread' => 7,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 9,
            'creator' => 3,
            'title' => 'Normas de los subforos de soporte técnico',
            'content' => 'En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',
            'thread' => 8,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 10,
            'creator' => 3,
            'title' => 'Normas de los subforos de soporte técnico',
            'content' => 'En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',
            'thread' => 9,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 11,
            'creator' => 3,
            'title' => 'Normas de los subforos de soporte técnico',
            'content' => 'En ese subforo tenemos las siguientes normas, basadas en el sentido común y en el respeto al resto de usuarios.',
            'thread' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 12,
            'creator' => 7,
            'title' => 'Placas solares',
            'content' => 'Buenas. Estoy investigando sobre la situación actual para instalar placas solares en mi casa. Agradecería cualquier sugerencia si alguno de vosotros tiene experiencia con el tema, pero de todas formas también iré poniendo respuestas a medida que vaya encontrando información para que pueda ser útil para cualquier otra persona.',
            'thread' => 11,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 13,
            'creator' => 4,
            'title' => 'RE: Placas solares',
            'content' => 'Respuesta 1',
            'thread' => 11,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 14,
            'creator' => 9,
            'title' => 'RE: Placas solares',
            'content' => 'A mí también me interesa el tema, estaré atento a este hilo.',
            'thread' => 11,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 15,
            'creator' => 7,
            'title' => 'RE: Placas solares',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'thread' => 11,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 16,
            'creator' => 1,
            'title' => 'RE: Placas solares',
            'content' => 'Respuesta de prueba 12345.',
            'thread' => 11,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 17,
            'creator' => 2,
            'title' => 'Respuesta al hilo',
            'content' => 'Respuesta 3.',
            'thread' => 11,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 18,
            'creator' => 5,
            'title' => 'RE: Placas solares',
            'content' => 'Respuesta 4.',
            'thread' => 11,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 19,
            'creator' => 1,
            'title' => 'Hilo de prueba 1234567890 abcdefg',
            'content' => 'Post de prueba.',
            'thread' => 12,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 20,
            'creator' => 6,
            'title' => 'Hilo 1',
            'content' => 'Primer post de Hilo 1.',
            'thread' => 13,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 21,
            'creator' => 4,
            'title' => 'Hilo 2',
            'content' => 'Post de prueba 2.',
            'thread' => 14,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'id' => 22,
            'creator' => 2,
            'title' => 'Hilo 3',
            'content' => 'El veloz murciélago hindú comía feliz cardillo y kiwi. La cigüeña toca el saxofón detrás del palenque de paja. 1234567890',
            'thread' => 15,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
